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

$active_specs = array();
if (!empty($spec1_val)) $active_specs[] = array('label' => $spec1_label, 'val' => $spec1_val);
if (!empty($spec2_val)) $active_specs[] = array('label' => $spec2_label, 'val' => $spec2_val);
if (!empty($spec3_val)) $active_specs[] = array('label' => $spec3_label, 'val' => $spec3_val);
if (!empty($spec4_val)) $active_specs[] = array('label' => $spec4_label, 'val' => $spec4_val);
if (!empty($spec5_val)) $active_specs[] = array('label' => $spec5_label, 'val' => $spec5_val);

$slot_handheld = lx_render_image_slot('lx_img_handheld', 'handheld', 'ẢNH 17: Chai xịt Khí Hàn Sinh Khương có tem chống giả & kiểm định', '1000×1000px (1:1)', '', 'aspect-ratio:1/1;background-color:rgba(255,255,255,.6)');

if (empty($active_specs) && empty($title) && empty($slot_handheld)) {
    return;
}
?>
<section class="compact wave" id="tieu-chuan">
  <div class="container">
    <div class="center">
      <span class="eyebrow lx_wow_item">CHỨNG NHẬN &amp; CAM KẾT</span>
      <?php if (!empty($title)) : ?><h2 class="reveal lx_wow_item"><?php echo $title; ?></h2><?php endif; ?>
    </div>

    <div class="standards-wrap reveal">
      <?php if (!empty($slot_handheld)) : ?>
        <div class="standards-visual">
          <?php echo $slot_handheld; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($active_specs)) : ?>
        <div class="standards-list">
          <?php foreach ($active_specs as $idx => $spec) : ?>
            <div class="standard-item reveal">
              <div class="standard-badge"><?php echo sprintf('%02d', $idx + 1); ?></div>
              <div class="standard-content">
                <span class="std-lbl"><?php echo esc_html($spec['label']); ?></span>
                <strong class="std-val lx_wow_item"><?php echo esc_html($spec['val']); ?></strong>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
