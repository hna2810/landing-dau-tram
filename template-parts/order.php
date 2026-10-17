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
$lead         = lx_get_field('lx_order_lead', 'option', 'Đừng để đêm lạnh làm gián đoạn giấc ngủ. Đặt mua Khí Hàn Sinh Khương ngay!');
$lead         = trim(str_replace(array('của con.', 'của con'), '', $lead));
$lead         = preg_replace('/\s+/', ' ', $lead);
$badge        = lx_get_field('lx_order_badge', 'option', 'ƯU ĐÃI SẮP KẾT THÚC');
$badge_hot    = lx_get_field('lx_order_badge_hot', 'option', '🔥 BÁN CHẠY NHẤT');
$product_name = lx_get_field('lx_order_product_name', 'option', 'Khí Hàn Sinh Khương Hoàng Cung 30ml');
$stock_left   = lx_get_field('lx_order_stock_left', 'option', '5');

$unit_price = (int) lx_get_field('lx_unit_price', 'option', 49000);
$old_price  = (int) lx_get_field('lx_old_price', 'option', 87000);
$saving_k   = ($old_price > $unit_price) ? round(($old_price - $unit_price) / 1000) . 'K' : '38K';

$slot_offer = lx_render_image_slot('lx_img_offer', 'offer', 'ẢNH 18: Banner ưu đãi trải nghiệm Khí Hàn Sinh Khương 49.000đ', '1000×1000px (1:1 vuông)', 'offer-img-slot');
?>
<section class="order wave" id="dat-hang">
  <div class="container">
    <div class="center">
      <?php if (!empty($title)) : ?><h2 class="reveal lx_wow_item"><?php echo $title; ?></h2><?php endif; ?>
      <?php if (!empty($lead)) : ?><p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p><?php endif; ?>
    </div>

    <div class="unified-order-card reveal">
      <!-- 1. Header Bar: Tag + Live Countdown + Stock Pill -->
      <div class="uoc-header">
        <div class="uoc-tag">
          <span class="uoc-tag-icon">🔥 ⏰</span> <?php echo esc_html($badge); ?>
        </div>
        <div class="uoc-countdown" role="timer" aria-live="off">
          <div class="uoc-unit"><b id="cdHour">01</b><span>GIỜ</span></div>
          <span class="uoc-sep">:</span>
          <div class="uoc-unit"><b id="cdMin">26</b><span>PHÚT</span></div>
          <span class="uoc-sep">:</span>
          <div class="uoc-unit"><b id="cdSec">50</b><span>GIÂY</span></div>
        </div>
        <div class="uoc-stock">
          ⚡ Chỉ còn <span id="stockLeft"><?php echo esc_html($stock_left); ?></span> suất!
        </div>
      </div>

      <!-- 2. Card Body: 2 Columns Layout -->
      <div class="uoc-body">
        <!-- Left Column: Product Information -->
        <div class="uoc-col-left">
          <?php if (!empty($badge_hot)) : ?>
            <div class="uoc-badge-hot"><?php echo esc_html($badge_hot); ?></div>
          <?php endif; ?>

          <div class="uoc-img-box">
            <span class="uoc-save-tag">TIẾT KIỆM <?php echo esc_html($saving_k); ?> 🔥</span>
            <?php echo $slot_offer; ?>
          </div>

          <?php if (!empty($product_name)) : ?>
            <h3 class="uoc-prod-title"><?php echo esc_html($product_name); ?></h3>
          <?php endif; ?>

          <div class="uoc-price-pill">
            <div class="uoc-price-main">
              <span class="uoc-price-lbl">Giá ưu đãi:</span>
              <span class="uoc-price-val"><?php echo number_format($unit_price, 0, ',', '.'); ?>đ</span>
            </div>
            <div class="uoc-price-sub">
              <span class="uoc-price-lbl">Giá gốc:</span>
              <del class="uoc-price-old"><?php echo number_format($old_price, 0, ',', '.'); ?>đ</del>
            </div>
          </div>


        </div>

        <!-- Right Column: Registration Form -->
        <div class="uoc-col-right">
          <div class="uoc-form-header">
            <h3 class="uoc-form-title">ĐĂNG KÝ TƯ VẤN &amp; ĐẶT HÀNG</h3>
            <p class="uoc-form-sub">Miễn Phí giao hàng toàn quốc.</p>
          </div>

          <?php echo lx_render_order_form(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
