<?php
/**
 * Footer Template
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$hotline    = lx_get_field('lx_hotline', 'option', '0989890779');
$zalo       = lx_get_field('lx_zalo', 'option', '0989890779');
$copyright  = lx_get_field('lx_footer_copyright', 'option', '© Home Care Việt Nam · Chăm sóc mẹ &amp; bé tại nhà');
$disclaimer = lx_get_field('lx_footer_disclaimer', 'option', 'Sản phẩm không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Hiệu quả có thể khác nhau tùy cơ địa.');

$unit_price = (int) lx_get_field('lx_unit_price', 'option', 49000);
$old_price  = (int) lx_get_field('lx_old_price', 'option', 87000);

$hotline_formatted = preg_replace('/(\d{4})(\d{3})(\d+)/', '$1 $2 $3', $hotline);
?>
<footer class="wave">
  <div class="container">
    <p class="lx_wow_item"><?php echo $copyright; ?></p>
    <p class="lx_wow_item">Hotline: <a id="footPhone" href="tel:<?php echo esc_attr($hotline); ?>"><?php echo esc_html($hotline_formatted); ?></a> · <a href="https://homecarevietnam.com/products/tinh-dau-tram-cho-be" target="_blank" rel="noopener">homecarevietnam.com</a></p>
    <p class="lx_wow_item" style="margin-top:8px;font-size:12px"><?php echo esc_html($disclaimer); ?></p>
  </div>
</footer>

<div class="float-call">
  <a class="zl" id="zaloBtn" href="https://zalo.me/<?php echo esc_attr($zalo); ?>" target="_blank" rel="noopener" title="Chat Zalo">Zalo</a>
  <a class="call" id="callBtn" href="tel:<?php echo esc_attr($hotline); ?>" title="Gọi ngay">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="#fff" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1z"/></svg>
  </a>
</div>

<div class="toast" id="toast">
  <span class="t-ico"></span>
  <div id="toastText"></div>
</div>

<div class="sticky" id="sticky">
  <div class="p"><s><?php echo number_format($old_price, 0, ',', '.'); ?>đ</s><b><?php echo number_format($unit_price, 0, ',', '.'); ?>đ</b></div>
  <a href="#dat-hang" class="btn btn-buy" data-cta>Mua ngay – Freeship</a>
</div>

<?php wp_footer(); ?>
</body>
</html>
