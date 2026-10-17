<?php
/**
 * Template Part: Hero
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title           = lx_get_field('lx_hero_title', 'option', 'Mẹ bầu, mẹ ở cữ sợ lạnh, bé dễ nhiễm cảm?');
$subtitle        = lx_get_field('lx_hero_subtitle', 'option', 'Giữ ấm cơ thể với tinh dầu thảo mộc thuần chay Home Care');
$desc            = lx_get_field('lx_hero_desc', 'option', 'Sự kết hợp tinh túy giữa <b>Gừng tươi, Tía tô, Rau mùi &amp; Sả chanh</b> trong thiết kế dạng xịt thông minh giúp làm ấm cơ thể, giải tỏa mệt mỏi vùng cổ vai gáy, xua tan nỗi lo cảm lạnh mùa đông hay phòng điều hòa mà không lo cay rát da.');
$countdown_title = lx_get_field('lx_hero_countdown_title', 'option', 'Flash sale kết thúc sau:');
$cta_text        = lx_get_field('lx_hero_cta_text', 'option', 'FREESHIP TOÀN QUỐC - MUA NGAY!');
$note            = lx_get_field('lx_hero_note', 'option', '👉 Được dùng trong các liệu trình chăm sóc mẹ &amp; bé tại nhà, tại trung tâm ở cữ của <b>Home Care</b>.');
$badge_percent   = lx_get_field('lx_hero_badge_percent', 'option', '-44%');
$chip1           = lx_get_field('lx_hero_chip1', 'option', 'Chiết xuất thuần chay');
$chip2           = lx_get_field('lx_hero_chip2', 'option', 'Dạng xịt tiện lợi');
$chip3           = lx_get_field('lx_hero_chip3', 'option', 'An tâm cho mẹ & bé');

$unit_price = (int) lx_get_field('lx_unit_price', 'option', 49000);
$old_price  = (int) lx_get_field('lx_old_price', 'option', 87000);
$save_price = $old_price - $unit_price;
?>
<section class="hero" id="top">
  <div class="container hero-grid">
    <div class="reveal">
      <h1 class="lx_wow_item"><?php echo $title; ?></h1>
      <p class="sub lx_wow_item"><?php echo esc_html($subtitle); ?></p>
      <p class="desc lx_wow_item"><?php echo $desc; ?></p>

      <div class="countdown"><?php echo esc_html($countdown_title); ?>
        <span class="cd-box"><span id="cd-h">02</span><small>giờ</small></span>
        <span class="cd-box"><span id="cd-m">00</span><small>phút</small></span>
        <span class="cd-box"><span id="cd-s">00</span><small>giây</small></span>
      </div>

      <div class="price-card">
        <span class="flash">FLASH SALE</span>
        <span class="price-now"><?php echo number_format($unit_price, 0, ',', '.'); ?>đ</span>
        <span class="price-old"><?php echo number_format($old_price, 0, ',', '.'); ?>đ</span>
        <span class="save">Tiết kiệm <?php echo number_format($save_price, 0, ',', '.'); ?>đ</span>
      </div>

      <a href="#dat-hang" class="btn btn-buy" data-cta><?php echo esc_html($cta_text); ?></a>
      <p class="hero-note lx_wow_item"><?php echo $note; ?></p>
    </div>

    <div class="hero-visual reveal">
      <div class="glow"></div>
      <?php echo lx_render_image_slot('lx_img_hero', 'hero', 'ẢNH 1: Ảnh sản phẩm chính – chai xịt Khí Hàn Sinh Khương 30ml', 'Tỉ lệ vuông 1:1 · 1000×1000px', 'product-img hero-img-sq'); ?>
      <div class="badge-circle"><span>GIẢM</span><b><?php echo esc_html($badge_percent); ?></b><span>hôm nay</span></div>
      <div class="chip c1"><?php echo esc_html($chip1); ?></div>
      <div class="chip c2"><?php echo esc_html($chip2); ?></div>
      <div class="chip c3"><?php echo esc_html($chip3); ?></div>
    </div>
  </div>
</section>
