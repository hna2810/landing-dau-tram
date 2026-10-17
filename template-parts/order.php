<?php
/**
 * Template Part: Order
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title        = lx_get_field('lx_order_title', 'option', 'Cho con cơ thể ấm – <em>Cho mẹ giấc ngủ ngon</em>');
$lead         = lx_get_field('lx_order_lead', 'option', 'Đừng để khí lạnh làm ảnh hưởng sức khỏe mẹ và bé! Đặt mua Khí Hàn Sinh Khương ngay!');
$badge        = lx_get_field('lx_order_badge', 'option', 'ƯU ĐÃI ĐẶC BIỆT DÀNH TẶNG MẸ TRONG HÔM NAY');
$product_name = lx_get_field('lx_order_product_name', 'option', 'Khí Hàn Sinh Khương Hoàng Cung 30ml');
$stock_left   = lx_get_field('lx_order_stock_left', 'option', '15');
$b1           = lx_get_field('lx_order_bullet1', 'option', 'Chai 30ml tiện lợi – Dùng tiết kiệm cho cả gia đình!');
$b2           = lx_get_field('lx_order_bullet2', 'option', 'Miễn phí vận chuyển toàn quốc (Freeship)');
$b3           = lx_get_field('lx_order_bullet3', 'option', 'Kiểm tra hàng trước khi thanh toán');
$b4           = lx_get_field('lx_order_bullet4', 'option', 'Tư vấn miễn phí & Đồng hành cùng mẹ trong suốt quá trình sử dụng');

$unit_price = (int) lx_get_field('lx_unit_price', 'option', 49000);
$old_price  = (int) lx_get_field('lx_old_price', 'option', 87000);
?>
<section class="order wave" id="dat-hang">
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
      <p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p>
    </div>
    <div class="order-grid">
      <div class="offer reveal">
        <div class="offer-head"><?php echo esc_html($badge); ?></div>
        <?php echo lx_render_image_slot('lx_img_offer', 'offer', 'ẢNH 18: Banner ưu đãi trải nghiệm Khí Hàn Sinh Khương 49.000đ', '1200×675px (16:9)', '', 'aspect-ratio:16/9;'); ?>
        <table>
          <thead><tr><th>Tên</th><th>Giá gốc</th><th>Giá ưu đãi</th></tr></thead>
          <tbody><tr><td><b><?php echo esc_html($product_name); ?></b></td><td class="old"><?php echo number_format($old_price, 0, ',', '.'); ?>đ</td><td class="new"><?php echo number_format($unit_price, 0, ',', '.'); ?>đ</td></tr></tbody>
        </table>
        <ul>
          <li><?php echo esc_html($b1); ?></li>
          <li><?php echo esc_html($b2); ?></li>
          <li><?php echo esc_html($b3); ?></li>
          <li><?php echo esc_html($b4); ?></li>
        </ul>
        <div class="stock"><small>Chỉ còn <span id="stockLeft"><?php echo esc_html($stock_left); ?></span> suất flash sale hôm nay</small><div class="stock-bar"><i id="stockBar"></i></div></div>
      </div>

      <?php echo lx_render_order_form(); ?>
    </div>
  </div>
</section>
