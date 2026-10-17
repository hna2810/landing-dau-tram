<?php
/**
 * Template Part: Quality Standards & Specs
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title       = lx_get_field('lx_standards_title', 'option', 'An tâm tự hào với <em>tiêu chuẩn chất lượng mẹ &amp; bé</em>');
$spec1_label = 'Tên sản phẩm';
$spec1_val   = lx_get_field('lx_spec_product_name', 'option', 'Khí Hàn Sinh Khương Hoàng Cung');

$spec2_label = 'Số công bố mỹ phẩm';
$spec2_val   = lx_get_field('lx_spec_cbmp', 'option', '81/26/CBMP-NB');

$spec3_label = 'Thương hiệu';
$spec3_val   = lx_get_field('lx_spec_brand', 'option', 'Home Care – Đơn vị đồng hành cùng hàng nghìn mẹ bầu & sau sinh trên khắp 3 miền Bắc - Trung - Nam');

$spec4_label = 'Thiết kế';
$spec4_val   = lx_get_field('lx_spec_design', 'option', 'Dạng chai xịt tiện lợi, dễ dàng mang theo mọi nơi');

$spec5_label = 'Cam kết chất lượng';
$spec5_val   = lx_get_field('lx_spec_commitment', 'option', 'Nguồn gốc thảo mộc thuần chay, có tem chống hàng giả, kiểm định rõ ràng');
?>
<section class="compact wave" id="tieu-chuan">
  <div class="container">
    <div class="center">
      <span class="eyebrow lx_wow_item">CHỨNG NHẬN &amp; CAM KẾT</span>
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    </div>

    <div class="standards-wrap reveal">
      <div class="standards-visual">
        <?php echo lx_render_image_slot('lx_img_handheld', 'handheld', 'ẢNH 17: Chai xịt Khí Hàn Sinh Khương có tem chống giả & kiểm định', '1000×1000px (1:1)', '', 'aspect-ratio:1/1;background-color:rgba(255,255,255,.6)'); ?>
      </div>
      <div class="standards-list">
        <div class="standard-item reveal">
          <div class="standard-badge">01</div>
          <div class="standard-content">
            <span class="std-lbl"><?php echo esc_html($spec1_label); ?></span>
            <strong class="std-val lx_wow_item"><?php echo esc_html($spec1_val); ?></strong>
          </div>
        </div>
        <div class="standard-item reveal">
          <div class="standard-badge">02</div>
          <div class="standard-content">
            <span class="std-lbl"><?php echo esc_html($spec2_label); ?></span>
            <strong class="std-val lx_wow_item"><?php echo esc_html($spec2_val); ?></strong>
          </div>
        </div>
        <div class="standard-item reveal">
          <div class="standard-badge">03</div>
          <div class="standard-content">
            <span class="std-lbl"><?php echo esc_html($spec3_label); ?></span>
            <strong class="std-val lx_wow_item"><?php echo esc_html($spec3_val); ?></strong>
          </div>
        </div>
        <div class="standard-item reveal">
          <div class="standard-badge">04</div>
          <div class="standard-content">
            <span class="std-lbl"><?php echo esc_html($spec4_label); ?></span>
            <strong class="std-val lx_wow_item"><?php echo esc_html($spec4_val); ?></strong>
          </div>
        </div>
        <div class="standard-item reveal">
          <div class="standard-badge">05</div>
          <div class="standard-content">
            <span class="std-lbl"><?php echo esc_html($spec5_label); ?></span>
            <strong class="std-val lx_wow_item"><?php echo esc_html($spec5_val); ?></strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
