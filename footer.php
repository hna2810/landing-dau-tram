<?php
/**
 * Footer Template
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$footer_title   = lx_get_field('lx_footer_title', 'option', 'Home Care – Chăm Sóc Mẹ & Bé Tại Nhà');
$website_url    = lx_get_field('lx_footer_website_url', 'option', 'https://homecarevietnam.com');
$website_label  = lx_get_field('lx_footer_website_label', 'option', 'homecarevietnam.com');
$hotline1       = lx_get_field('lx_hotline', 'option', '0973871376');
$hotline1_disp  = lx_get_field('lx_hotline_display', 'option', '0973.871.376');
$hotline2       = lx_get_field('lx_hotline2', 'option', '0962131515');
$hotline2_disp  = lx_get_field('lx_hotline2_display', 'option', '0962.131.515');

$footer_company = lx_get_field('lx_footer_company', 'option', 'CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE');
$footer_address = lx_get_field('lx_footer_address', 'option', 'Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.');
$footer_tax     = lx_get_field('lx_footer_tax', 'option', 'Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016');
$copyright      = lx_get_field('lx_footer_copyright', 'option', '© 2026 Home Care. All rights reserved.');

$zalo           = lx_get_field('lx_zalo', 'option', '0962131515');
$unit_price     = (int) lx_get_field('lx_unit_price', 'option', 49000);
$old_price      = (int) lx_get_field('lx_old_price', 'option', 87000);
?>
<footer class="footer">
  <div class="container">
    <?php if (!empty($footer_title)) : ?>
      <h4 class="footer-title lx_wow_item"><?php echo esc_html($footer_title); ?></h4>
    <?php endif; ?>

    <?php if (!empty($website_label)) : ?>
      <p class="footer-website lx_wow_item">Website: <a href="<?php echo esc_url($website_url); ?>" target="_blank" rel="noopener"><?php echo esc_html($website_label); ?></a></p>
    <?php endif; ?>

    <p class="footer-hotline lx_wow_item">
      Hotline: <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $hotline1)); ?>"><?php echo esc_html($hotline1_disp); ?></a> - <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $hotline2)); ?>"><?php echo esc_html($hotline2_disp); ?></a>
    </p>

    <?php if (!empty($footer_company)) : ?>
      <p class="footer-company lx_wow_item"><?php echo esc_html($footer_company); ?></p>
    <?php endif; ?>

    <?php if (!empty($footer_address)) : ?>
      <p class="footer-address lx_wow_item"><?php echo esc_html($footer_address); ?></p>
    <?php endif; ?>

    <?php if (!empty($footer_tax)) : ?>
      <p class="footer-tax lx_wow_item"><?php echo esc_html($footer_tax); ?></p>
    <?php endif; ?>

    <?php if (!empty($copyright)) : ?>
      <div class="footer-copy"><?php echo esc_html($copyright); ?></div>
    <?php endif; ?>
  </div>
</footer>

<?php if (!empty($zalo) || !empty($hotline)) : ?>
<div class="float-call">
  <?php if (!empty($zalo)) : ?><a class="zl" id="zaloBtn" href="https://zalo.me/<?php echo esc_attr($zalo); ?>" target="_blank" rel="noopener" title="Chat Zalo">Zalo</a><?php endif; ?>
  <?php if (!empty($hotline)) : ?>
  <a class="call" id="callBtn" href="tel:<?php echo esc_attr($hotline); ?>" title="Gọi ngay">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="#fff" aria-hidden="true"><path d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.45.57 3.57a1 1 0 0 1-.25 1z"/></svg>
  </a>
  <?php endif; ?>
</div>
<?php endif; ?>

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
