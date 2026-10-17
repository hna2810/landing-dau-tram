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

$slot_handheld    = lx_render_image_slot('lx_img_handheld', 'handheld', 'ẢNH 17: Chai xịt có tem chống hàng giả', '800×1000px (4:5)', 'std-img-slot');
$slot_certificate = lx_render_image_slot('lx_img_certificate', 'certificate', 'ẢNH 18: Giấy kiểm định & Công bố mỹ phẩm', '800×1000px (4:5)', 'std-img-slot');

$has_visual = (!empty($slot_handheld) || !empty($slot_certificate));

if (empty($active_specs) && empty($title) && !$has_visual) {
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
      <?php if ($has_visual) : ?>
        <div class="standards-visual">
          <div class="standards-visual-grid<?php echo (empty($slot_handheld) || empty($slot_certificate)) ? ' is-single' : ''; ?>">
            <?php if (!empty($slot_certificate)) : ?>
              <div class="standard-img-card">
                <div class="std-img-box">
                  <?php echo $slot_certificate; ?>
                </div>
                <div class="std-img-caption">
                  <span class="std-img-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                  </span>
                  <span class="std-img-text">Kiểm định &amp; Công bố</span>
                </div>
              </div>
            <?php endif; ?>

            <?php if (!empty($slot_handheld)) : ?>
              <div class="standard-img-card">
                <div class="std-img-box">
                  <?php echo $slot_handheld; ?>
                </div>
                <div class="std-img-caption">
                  <span class="std-img-icon">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  </span>
                  <span class="std-img-text">Tem chống hàng giả</span>
                </div>
              </div>
            <?php endif; ?>
          </div>
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
