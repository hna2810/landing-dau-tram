<?php
/**
 * Template Part: Usage
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title       = lx_get_field('lx_usage_title', 'option', 'Dễ dàng chăm sóc bé <em>mỗi ngày</em>');
$subtitle    = lx_get_field('lx_usage_subtitle', 'option', 'Chỉ 3 bước đơn giản giúp con yêu ấm áp đường thở, ngủ sâu trọn giấc');

$step1_title = lx_get_field('lx_usage_step1_title', 'option', 'Khi tắm cho bé');
$step1_desc  = lx_get_field('lx_usage_step1_desc', 'option', 'Nhỏ 2 - 3 giọt vào chậu nước tắm ấm để giữ ấm cơ thể trong suốt quá trình tắm.');
$step1_icon  = lx_get_image_url('lx_usage_step1_icon', '');

$step2_title = lx_get_field('lx_usage_step2_title', 'option', 'Trước khi đi ngủ hoặc ra ngoài');
$step2_desc  = lx_get_field('lx_usage_step2_desc', 'option', 'Nhỏ vài giọt ra lòng bàn tay mẹ, xoa ấm rồi massage nhẹ nhàng lên cổ, ngực, lưng và lòng bàn chân của bé.');
$step2_icon  = lx_get_image_url('lx_usage_step2_icon', '');

$step3_title = lx_get_field('lx_usage_step3_title', 'option', 'Khi bị côn trùng đốt');
$step3_desc  = lx_get_field('lx_usage_step3_desc', 'option', 'Thoa một lượng nhỏ lên vùng da bị cắn để làm dịu ngứa.');
$step3_icon  = lx_get_image_url('lx_usage_step3_icon', '');

$warn        = lx_get_field('lx_usage_warn', 'option', '<b>Lưu ý:</b> Nên thử một lượng nhỏ ra tay trước khi dùng cho trẻ sơ sinh. Tránh thoa trực tiếp lên vùng mặt, gần mắt, mũi hoặc vết thương hở.');
?>
<section class="usage wave flip" id="huong-dan" style="--wave:var(--cream)">
  <div class="container">
    <div class="center">
      <span class="eyebrow lx_wow_item">HƯỚNG DẪN SỬ DỤNG</span>
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
      <?php if (!empty($subtitle)) : ?>
        <p class="lead reveal lx_wow_item"><?php echo esc_html($subtitle); ?></p>
      <?php endif; ?>
    </div>

    <div class="usage-layout">
      <!-- Cột Trái: Video 9:16 Vertical Video Player -->
      <?php echo lx_render_usage_video(); ?>

      <!-- Cột Phải: 3 Bước chăm sóc dạng thẻ Icon thanh lịch -->
      <div class="usage-steps-col">
        <!-- Bước 1 -->
        <div class="usage-step-card reveal">
          <span class="step-num-pill">BƯỚC 01</span>
          <div class="step-icon-box icon-bath">
            <?php if (!empty($step1_icon)) : ?>
              <img src="<?php echo esc_url($step1_icon); ?>" alt="<?php echo esc_attr($step1_title); ?>" loading="lazy">
            <?php else : ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 13h18c.6 0 1 .4 1 1v1c0 3.3-2.7 6-6 6H8c-3.3 0-6-2.7-6-6v-1c0-.6.4-1 1-1z"/>
                <path d="M7 21v1M17 21v1"/>
                <path d="M4 13V5a2 2 0 0 1 2-2h2"/>
                <circle cx="12" cy="7" r="1.2" fill="currentColor"/>
                <circle cx="16" cy="6" r="1" fill="currentColor"/>
                <path d="M12 11c0-.8 1.5-2.5 1.5-2.5s1.5 1.7 1.5 2.5a1.5 1.5 0 0 1-3 0z" fill="currentColor"/>
              </svg>
            <?php endif; ?>
          </div>
          <div class="step-text-body">
            <h3 class="lx_wow_item"><?php echo esc_html($step1_title); ?></h3>
            <p class="lx_wow_item"><?php echo esc_html($step1_desc); ?></p>
          </div>
        </div>

        <!-- Bước 2 -->
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
            <h3 class="lx_wow_item"><?php echo esc_html($step2_title); ?></h3>
            <p class="lx_wow_item"><?php echo esc_html($step2_desc); ?></p>
          </div>
        </div>

        <!-- Bước 3 -->
        <div class="usage-step-card reveal">
          <span class="step-num-pill">BƯỚC 03</span>
          <div class="step-icon-box icon-bite">
            <?php if (!empty($step3_icon)) : ?>
              <img src="<?php echo esc_url($step3_icon); ?>" alt="<?php echo esc_attr($step3_title); ?>" loading="lazy">
            <?php else : ?>
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                <path d="M9 12l2 2 4-4"/>
              </svg>
            <?php endif; ?>
          </div>
          <div class="step-text-body">
            <h3 class="lx_wow_item"><?php echo esc_html($step3_title); ?></h3>
            <p class="lx_wow_item"><?php echo esc_html($step3_desc); ?></p>
          </div>
        </div>

        <!-- Khung lưu ý an toàn -->
        <div class="usage-warn-box reveal">
          <div class="usage-warn-ico">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"></circle>
              <line x1="12" y1="8" x2="12" y2="12"></line>
              <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>
          </div>
          <div class="usage-warn-text lx_wow_item"><?php echo $warn; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>

