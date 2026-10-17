<?php
/**
 * Template Part: Usage
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title       = lx_get_field('lx_usage_title', 'option', '2 Bước đơn giản để <em>cơ thể luôn ấm áp &amp; thư giãn</em>');
$subtitle    = lx_get_field('lx_usage_subtitle', 'option', 'Chăm sóc nhanh chóng, tiện lợi với thiết kế dạng xịt thông minh');

$step1_title = lx_get_field('lx_usage_step1_title', 'option', 'Xịt tinh dầu lên vùng cần giữ ấm');
$step1_desc  = lx_get_field('lx_usage_step1_desc', 'option', 'Xịt một lượng vừa đủ lên các vùng cơ thể cần giữ ấm: cổ, vai, gáy, lưng, ngực hoặc lòng bàn chân.');
$step1_icon  = lx_get_image_url('lx_usage_step1_icon', '');

$step2_title = lx_get_field('lx_usage_step2_title', 'option', 'Massage nhẹ nhàng 1–2 phút');
$step2_desc  = lx_get_field('lx_usage_step2_desc', 'option', 'Massage nhẹ nhàng trong 1–2 phút để tinh dầu thẩm thấu sâu.');
$step2_icon  = lx_get_image_url('lx_usage_step2_icon', '');

$tip_text    = lx_get_field('lx_usage_tip', 'option', '<b>💡 Mẹo nhỏ:</b> Sử dụng trước và sau khi tắm cho bé, hoặc kết hợp cùng tinh dầu tràm để nhân đôi hiệu quả giữ ấm.');
$warn_text   = lx_get_field('lx_usage_warn', 'option', '<b>👉 Lưu ý:</b> Nên xịt một lượng nhỏ ra tay trước khi dùng cho trẻ sơ sinh. Tránh xịt trực tiếp lên vùng mặt, gần mắt, mũi hoặc vết thương hở.');

$has_s1 = (!empty($step1_title) || !empty($step1_desc));
$has_s2 = (!empty($step2_title) || !empty($step2_desc));
$has_steps = ($has_s1 || $has_s2);
$video_html = lx_render_usage_video();

if (!$has_steps && empty($title) && empty($subtitle) && empty($tip_text) && empty($warn_text) && empty($video_html)) {
    return;
}
?>
<section class="usage wave flip" id="huong-dan" style="--wave:var(--cream)">
  <div class="container">
    <div class="center">
      <span class="eyebrow lx_wow_item">HƯỚNG DẪN SỬ DỤNG</span>
      <?php if (!empty($title)) : ?><h2 class="reveal lx_wow_item"><?php echo $title; ?></h2><?php endif; ?>
      <?php if (!empty($subtitle)) : ?>
        <p class="lead reveal lx_wow_item"><?php echo esc_html($subtitle); ?></p>
      <?php endif; ?>
    </div>

    <div class="usage-layout">
      <!-- Cột Trái: Video 9:16 Vertical Video Player -->
      <?php if (!empty($video_html)) : ?>
        <?php echo $video_html; ?>
      <?php endif; ?>

      <!-- Cột Phải: 2 Bước chăm sóc dạng thẻ Icon thanh lịch -->
      <div class="usage-steps-col">
        <!-- Bước 1 -->
        <?php if ($has_s1) : ?>
          <div class="usage-step-card reveal">
            <span class="step-num-pill">BƯỚC 01</span>
            <div class="step-icon-box icon-bath">
              <?php if (!empty($step1_icon)) : ?>
                <img src="<?php echo esc_url($step1_icon); ?>" alt="<?php echo esc_attr($step1_title); ?>" loading="lazy">
              <?php else : ?>
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                </svg>
              <?php endif; ?>
            </div>
            <div class="step-text-body">
              <?php if (!empty($step1_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($step1_title); ?></h3><?php endif; ?>
              <?php if (!empty($step1_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($step1_desc); ?></p><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Bước 2 -->
        <?php if ($has_s2) : ?>
          <div class="usage-step-card reveal">
            <span class="step-num-pill">BƯỚC 02</span>
            <div class="step-icon-box icon-massage">
              <?php if (!empty($step2_icon)) : ?>
                <img src="<?php echo esc_url($step2_icon); ?>" alt="<?php echo esc_attr($step2_title); ?>" loading="lazy">
              <?php else : ?>
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M12 21a9 9 0 0 1-9-9c0-4.6 3.5-8.4 8-8.9A9 9 0 0 0 20.9 13a9 9 0 0 1-8.9 8z"/>
                  <path d="M12 7c0-1.5 1.5-3 1.5-3s1.5 1.5 1.5 3a1.5 1.5 0 0 1-3 0z" fill="currentColor"/>
                  <path d="M18 4v2m-1-1h2"/>
                  <path d="M8 15s1.5 1.5 4 1.5 4-1.5 4-1.5"/>
                </svg>
              <?php endif; ?>
            </div>
            <div class="step-text-body">
              <?php if (!empty($step2_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($step2_title); ?></h3><?php endif; ?>
              <?php if (!empty($step2_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($step2_desc); ?></p><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Khung mẹo nhỏ -->
        <?php if (!empty($tip_text)) : ?>
          <div class="usage-warn-box reveal" style="border-color:rgba(111,174,143,.35);background:#f9fcfb">
            <div class="usage-warn-ico" style="color:var(--leaf-dark)">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7V17h8v-2.3A7 7 0 0 0 12 2z"/>
              </svg>
            </div>
            <div class="usage-warn-text lx_wow_item"><?php echo $tip_text; ?></div>
          </div>
        <?php endif; ?>

        <!-- Khung lưu ý an toàn -->
        <?php if (!empty($warn_text)) : ?>
          <div class="usage-warn-box reveal">
            <div class="usage-warn-ico">
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
              </svg>
            </div>
            <div class="usage-warn-text lx_wow_item"><?php echo $warn_text; ?></div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

