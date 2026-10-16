<?php
/**
 * Template Part: Compact
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title = lx_get_field('lx_compact_title', 'option', 'Nhỏ gọn trong tay mẹ, tiện chăm sóc bé mỗi ngày');
$h1    = lx_get_field('lx_compact_h1', 'option', 'Bỏ túi mang theo mọi nơi');
$h2    = lx_get_field('lx_compact_h2', 'option', 'Chai 30ml tiện lợi');
$h3    = lx_get_field('lx_compact_h3', 'option', 'Dùng tiết kiệm cho cả gia đình');
?>
<section class="compact wave">
  <div class="container">
    <h2 class="reveal lx_wow_item"><?php echo esc_html($title); ?></h2>
    <div class="img-row reveal" style="margin:0 auto 22px">
      <?php echo lx_render_image_slot('lx_img_handheld', 'handheld', 'ẢNH 17: Ảnh chai tinh dầu cầm gọn trong lòng bàn tay mẹ', '1200×675px (16:9), cho thấy kích thước nhỏ gọn', '', 'aspect-ratio:16/9;background-color:rgba(255,255,255,.6)'); ?>
    </div>
    <div class="row reveal"><span><?php echo esc_html($h1); ?></span><span><?php echo esc_html($h2); ?></span><span><?php echo esc_html($h3); ?></span></div>
  </div>
</section>
