<?php
/**
 * Theme Helper Functions
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get ACF field with fallback to WordPress option and default value
 *
 * @param string $field_name
 * @param mixed  $post_id
 * @param mixed  $default
 * @return mixed
 */
function lx_get_field($field_name, $post_id = 'option', $default = '') {
    // 1. Check options page storage
    if ($post_id === 'option' || $post_id === 'options') {
        $not_set = '__LX_NOT_SET__';
        $opt = get_option('options_' . $field_name, $not_set);
        if ($opt === $not_set) {
            $opt = get_option($field_name, $not_set);
        }

        // If field exists in database
        if ($opt !== $not_set) {
            // User explicitly cleared/saved as empty
            if ($opt === null || $opt === false || (is_string($opt) && trim($opt) === '')) {
                return '';
            }
            if (function_exists('get_field')) {
                $acf_val = get_field($field_name, 'option');
                if ($acf_val !== null && $acf_val !== false && $acf_val !== '') {
                    return $acf_val;
                }
            }
            return $opt;
        }

        // Field not yet stored in wp_options, check get_field fallback
        if (function_exists('get_field')) {
            $acf_val = get_field($field_name, 'option');
            if ($acf_val !== null && $acf_val !== false && $acf_val !== '') {
                return $acf_val;
            }
        }

        return $default;
    }

    // 2. Check post/page meta
    if (is_numeric($post_id) && function_exists('metadata_exists')) {
        if (metadata_exists('post', (int) $post_id, $field_name)) {
            $meta = get_post_meta((int) $post_id, $field_name, true);
            if ($meta === null || $meta === false || (is_string($meta) && trim($meta) === '')) {
                return '';
            }
            if (function_exists('get_field')) {
                $val = get_field($field_name, $post_id);
                if ($val !== null && $val !== false && $val !== '') {
                    return $val;
                }
            }
            return $meta;
        }
    }

    if (function_exists('get_field')) {
        $val = get_field($field_name, $post_id);
        if ($val !== null && $val !== false && $val !== '') {
            return $val;
        }
    }

    return $default;
}

/**
 * Get image URL from ACF field (ID, Array or string URL) with default fallback
 *
 * @param string $field_name
 * @param string $default_url
 * @param mixed  $post_id
 * @return string
 */
function lx_get_image_url($field_name, $default_url = '', $post_id = 'option') {
    $field = lx_get_field($field_name, $post_id, null);
    if (empty($field)) {
        return $default_url;
    }
    if (is_numeric($field)) {
        $url = wp_get_attachment_image_url((int)$field, 'full');
        return $url ? $url : $default_url;
    }
    if (is_array($field) && !empty($field['url'])) {
        return $field['url'];
    }
    if (is_string($field)) {
        $trimmed = trim($field);
        if (is_numeric($trimmed)) {
            $url = wp_get_attachment_image_url((int)$trimmed, 'full');
            return $url ? $url : $default_url;
        }
        if (filter_var($trimmed, FILTER_VALIDATE_URL) || strpos($trimmed, '/') !== false) {
            return $trimmed;
        }
    }
    return $default_url;
}

/**
 * Render image slot (Server-side <img> if set in ACF, or interactive placeholder)
 *
 * @param string $field_name ACF field name
 * @param string $key        data-img key
 * @param string $title      Image title / description
 * @param string $spec       Dimensions spec
 * @param string $classes    Extra CSS classes
 * @param string $style      Inline style
 * @return string HTML
 */
function lx_render_image_slot($field_name, $key, $title, $spec = '', $classes = '', $style = '') {
    $img_url = lx_get_image_url($field_name, '');
    $show_placeholders = (bool) lx_get_field('lx_show_placeholders', 'option', true);

    $badge = 'ẢNH';
    if (preg_match('/(ẢNH\s+\d+)/u', $title, $m)) {
        $badge = $m[1];
    }

    if (!empty($img_url)) {
        $outer_classes = trim('ph ' . $classes . ' filled');
        return '<div class="' . esc_attr($outer_classes) . '" data-img="' . esc_attr($key) . '" style="' . esc_attr($style) . '">' .
               '<img src="' . esc_url($img_url) . '" alt="' . esc_attr($title) . '" loading="lazy" />' .
               '</div>';
    }

    if (!$show_placeholders) {
        return '';
    }

    $outer_classes = trim('ph ' . $classes);
    $html = '<div class="' . esc_attr($outer_classes) . '" data-img="' . esc_attr($key) . '"';
    if (!empty($spec)) {
        $html .= ' data-spec="' . esc_attr($spec) . '"';
    }
    $html .= ' style="' . esc_attr($style) . '">';
    $html .= '<span class="ph-n">📷 ' . esc_html($badge) . '</span>';
    $html .= '<b>' . esc_html($title) . '</b>';
    if (!empty($spec)) {
        $html .= '<small>' . esc_html($spec) . '</small>';
    }
    $html .= '</div>';

    return $html;
}

/**
 * Render 9:16 vertical video frame for Usage section
 *
 * @return string HTML
 */
function lx_render_usage_video() {
    $video_url   = lx_get_field('lx_usage_video_url', 'option', '');
    $poster_url  = lx_get_image_url('lx_usage_video_poster', '', 'full', 'option');
    $badge_text  = lx_get_field('lx_usage_video_badge', 'option', 'HD 9:16 · HƯỚNG DẪN THỰC TẾ');
    $video_sub   = lx_get_field('lx_usage_video_sub', 'option', 'Xem video 30s hướng dẫn mẹ dùng đúng cách');

    // Parse YouTube ID if YouTube URL
    $yt_id = '';
    if (!empty($video_url) && preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|shorts\/))([\w-]{11})/', $video_url, $m)) {
        $yt_id = $m[1];
        if (empty($poster_url)) {
            $poster_url = 'https://img.youtube.com/vi/' . $yt_id . '/maxresdefault.jpg';
        }
    }

    $has_video = !empty($video_url) || !empty($yt_id);
    $show_placeholders = (bool) lx_get_field('lx_show_placeholders', 'option', true);

    if (!$has_video && empty($poster_url) && !$show_placeholders) {
        return '';
    }

    ob_start();
    ?>
    <div class="usage-video-wrap reveal">
      <div class="usage-phone-frame">
        <div class="usage-phone-notch"></div>
        <div class="usage-video-box" id="usageVideoBox"
             data-has-video="<?php echo $has_video ? '1' : '0'; ?>"
             data-yt-id="<?php echo esc_attr($yt_id); ?>"
             data-video-url="<?php echo esc_url($video_url); ?>">
          
          <div class="usage-video-ratio">
            <?php if (!empty($poster_url)) : ?>
              <img src="<?php echo esc_url($poster_url); ?>" alt="Hướng dẫn sử dụng tinh dầu giữ ấm" class="usage-video-poster" id="usageVideoPoster" loading="lazy">
            <?php else : ?>
              <div class="usage-video-placeholder-bg">
                <div class="usage-placeholder-inner">
                  <span class="usage-ph-tag">9:16 VERTICAL VIDEO</span>
                  <div class="usage-ph-icon">
                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                      <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                      <line x1="7" y1="2" x2="7" y2="22"></line>
                      <line x1="17" y1="2" x2="17" y2="22"></line>
                      <line x1="2" y1="12" x2="22" y2="12"></line>
                    </svg>
                  </div>
                  <b>Video Mẹ Thoa Dầu Cho Bé</b>
                  <small>Tỷ lệ dọc 9:16 chuẩn Reels / TikTok</small>
                </div>
              </div>
            <?php endif; ?>

            <div class="tiktok-overlay" id="tiktokOverlay">
              <div class="tt-top-bar">
                <div class="tt-live-icon">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>
                  <span>LIVE</span>
                </div>
                <div class="tt-tabs">
                  <span class="tt-tab">Bạn bè</span>
                  <span class="tt-tab">Đang Follow</span>
                  <span class="tt-tab is-active">Dành cho bạn</span>
                </div>
                <div class="tt-search-icon">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
              </div>

              <div class="tt-sidebar">
                <div class="tt-action tt-profile">
                  <div class="tt-avatar">
                    <img src="https://daugiuam.homecarevietnam.com/wp-content/uploads/2026/10/Cham-soc-be-diu-nhe-cung-thao-moc.png" alt="Home Care" loading="lazy">
                    <span class="tt-follow-btn">+</span>
                  </div>
                </div>
                <div class="tt-action">
                  <div class="tt-icon-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#fe2c55"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                  </div>
                  <span class="tt-stat">36.8K</span>
                </div>
                <div class="tt-action">
                  <div class="tt-icon-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#ffffff"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
                  </div>
                  <span class="tt-stat">742</span>
                </div>
                <div class="tt-action">
                  <div class="tt-icon-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#facd3b"><path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z"/></svg>
                  </div>
                  <span class="tt-stat">4.2K</span>
                </div>
                <div class="tt-action">
                  <div class="tt-icon-btn">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="#ffffff"><path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92c0-1.61-1.31-2.92-2.92-2.92z"/></svg>
                  </div>
                  <span class="tt-stat">2.1K</span>
                </div>
                <div class="tt-action tt-disc-action">
                  <div class="tt-disc">
                    <div class="tt-disc-inner"></div>
                  </div>
                </div>
              </div>

              <div class="tt-bottom-info">
                <div class="tt-author">
                  <span class="tt-username">@homecare_vietnam</span>
                  <span class="tt-verified">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="#20d5ec"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                  </span>
                </div>
                <div class="tt-caption">Bí quyết giữ ấm cho bé, phòng cảm lạnh và muỗi kiến cắn mỗi ngày mẹ đã biết chưa? 🥰🌿</div>
                <div class="tt-tags">#homecare #tinhdaugiuam #chamsocbe</div>
                <div class="tt-music">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="#ffffff"><path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
                  <div class="tt-music-marquee">
                    <span>Âm thanh gốc - Home Care Chăm Sóc Mẹ &amp; Bé</span>
                  </div>
                </div>
              </div>

              <div class="tt-progress-bar">
                <div class="tt-progress-track"></div>
              </div>
            </div>

            <button type="button" class="usage-play-btn" id="usagePlayBtn" aria-label="Phát video hướng dẫn">
              <span class="play-pulse"></span>
              <span class="play-icon">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                  <path d="M8 5v14l11-7z"/>
                </svg>
              </span>
            </button>

            <div class="usage-video-container" id="usageVideoContainer"></div>
          </div>
        </div>
      </div>
      <div class="usage-video-caption">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="12" cy="12" r="10"></circle>
          <polygon points="10 8 16 12 10 16 10 8"></polygon>
        </svg>
        <span><?php echo esc_html($video_sub); ?></span>
      </div>
    </div>
    <?php
    return ob_get_clean();
}

