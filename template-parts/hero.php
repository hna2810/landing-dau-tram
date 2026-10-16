<?php
/**
 * Template Part: Hero
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title           = lx_get_field('lx_hero_title', 'option', "Giữ ấm lồng ngực,<br><span>ngủ ngon trọn đêm</span>");
$subtitle        = lx_get_field('lx_hero_subtitle', 'option', 'Để con yêu không bị cơn ho, khò khè cản trở');
$desc            = lx_get_field('lx_hero_desc', 'option', 'Tinh dầu tràm kết hợp <b>dầu bơ, ô liu và argan</b> – giải pháp dịu nhẹ giúp bảo vệ đường thở của bé mỗi khi thời tiết chuyển mùa hay đêm lạnh.');
$countdown_title = lx_get_field('lx_hero_countdown_title', 'option', 'Flash sale kết thúc sau:');
$cta_text        = lx_get_field('lx_hero_cta_text', 'option', 'Freeship toàn quốc – Mua ngay!');
$note            = lx_get_field('lx_hero_note', 'option', 'Được dùng trong các liệu trình chăm sóc mẹ &amp; bé tại nhà của <b>Home Care</b>.');
$badge_percent   = lx_get_field('lx_hero_badge_percent', 'option', '-44%');
$chip1           = lx_get_field('lx_hero_chip1', 'option', 'Tràm + Bơ + Ô liu + Argan');
$chip2           = lx_get_field('lx_hero_chip2', 'option', 'Dịu nhẹ cho da bé');
$chip3           = lx_get_field('lx_hero_chip3', 'option', 'Chai 30ml');

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
      <?php echo lx_render_image_slot('lx_img_hero', 'hero', 'ẢNH 1: Ảnh sản phẩm chính – chai tinh dầu tràm 30ml', 'PNG nền trong suốt hoặc nền sáng · 1000×1000px (1:1)', 'product-img', 'aspect-ratio:1/1;max-width:400px;background-color:#fff'); ?>
      <div class="badge-circle"><span>GIẢM</span><b><?php echo esc_html($badge_percent); ?></b><span>hôm nay</span></div>
      <div class="chip c1"><?php echo esc_html($chip1); ?></div>
      <div class="chip c2"><?php echo esc_html($chip2); ?></div>
      <div class="chip c3"><?php echo esc_html($chip3); ?></div>
    </div>
  </div>
</section>
