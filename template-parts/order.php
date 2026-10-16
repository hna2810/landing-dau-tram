<?php
/**
 * Template Part: Order
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<section class="order wave" id="dat-hang">
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item">Cho con cơ thể ấm – <em>Cho mẹ giấc ngủ ngon</em></h2>
      <p class="lead reveal lx_wow_item">Đừng để đêm lạnh làm gián đoạn giấc ngủ của con. Chăm sóc sức khỏe bé yêu ngay hôm nay cùng Tinh dầu tràm Hoàng Cung Home Care!</p>
    </div>
    <div class="order-grid">
      <div class="offer reveal">
        <div class="offer-head">ƯU ĐÃI CHỈ ÁP DỤNG HÔM NAY</div>
        <!-- 📷 ẢNH 25: Banner ưu đãi: sản phẩm + giá 49K / 87K — 1200×675px (16:9). Dán URL vào CONFIG.images.offer -->
<div class="ph " data-img="offer" style="aspect-ratio:16/9;"><span class="ph-n">📷 ẢNH 25</span><b>Banner ưu đãi: sản phẩm + giá 49K / 87K</b><small>1200×675px (16:9)</small></div>
        <table>
          <thead><tr><th>Tên</th><th>Giá gốc</th><th>Giá ưu đãi</th></tr></thead>
          <tbody><tr><td><b>Tinh dầu tràm giữ ấm cho bé 30ml</b></td><td class="old">87.000đ</td><td class="new">49.000đ</td></tr></tbody>
        </table>
        <ul>
          <li>Chai 30ml tiện lợi – dùng tiết kiệm cho cả gia đình</li>
          <li>Freeship toàn quốc</li>
          <li>Kiểm tra hàng trước khi thanh toán</li>
          <li>Tư vấn miễn phí cách dùng cho bé</li>
        </ul>
        <div class="stock"><small>Chỉ còn <span id="stockLeft">17</span> suất flash sale hôm nay</small><div class="stock-bar"><i id="stockBar"></i></div></div>
      </div>

      <?php echo lx_render_order_form(); ?>
    </div>
  </div>
</section>
