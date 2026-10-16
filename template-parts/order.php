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
$lead         = lx_get_field('lx_order_lead', 'option', 'Đừng để đêm lạnh làm gián đoạn giấc ngủ của con. Chăm sóc sức khỏe bé yêu ngay hôm nay cùng Tinh dầu tràm Hoàng Cung Home Care!');
$badge        = lx_get_field('lx_order_badge', 'option', 'ƯU ĐÃI CHỈ ÁP DỤNG HÔM NAY');
$product_name = lx_get_field('lx_order_product_name', 'option', 'Tinh dầu tràm giữ ấm cho bé 30ml');
$stock_left   = lx_get_field('lx_order_stock_left', 'option', '17');
$b1           = lx_get_field('lx_order_bullet1', 'option', 'Chai 30ml tiện lợi – dùng tiết kiệm cho cả gia đình');
$b2           = lx_get_field('lx_order_bullet2', 'option', 'Freeship toàn quốc');
$b3           = lx_get_field('lx_order_bullet3', 'option', 'Kiểm tra hàng trước khi thanh toán');
$b4           = lx_get_field('lx_order_bullet4', 'option', 'Tư vấn miễn phí cách dùng cho bé');

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
        <!-- 📷 ẢNH 25: Banner ưu đãi: sản phẩm + giá 49K / 87K — 1200×675px (16:9). Dán URL vào CONFIG.images.offer -->
<div class="ph " data-img="offer" style="aspect-ratio:16/9;"><span class="ph-n">📷 ẢNH 25</span><b>Banner ưu đãi: sản phẩm + giá 49K / 87K</b><small>1200×675px (16:9)</small></div>
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
