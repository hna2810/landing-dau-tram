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
              <img src="<?php echo esc_url($poster_url); ?>" alt="Hướng dẫn sử dụng tinh dầu tràm" class="usage-video-poster" id="usageVideoPoster" loading="lazy">
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

            <div class="usage-video-badge">
              <span><i class="badge-dot"></i> <?php echo esc_html($badge_text); ?></span>
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

