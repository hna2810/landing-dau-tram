<?php
/**
 * Header Template
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
<link rel="icon" href="https://cdn.hstatic.net/themes/200001066686/1001439050/14/favicon.png" type="image/png">
<?php wp_head(); ?>
</head>
<body <?php body_class('lx_landing_theme'); ?>>
<?php wp_body_open(); ?>

<div class="topbar">FLASH SALE chỉ <b>49.000đ</b> (niêm yết 87.000đ) · <b>FREESHIP TOÀN QUỐC</b></div>

<header class="nav">
  <div class="container">
    <a href="#top" class="logo" id="logo"><span class="logo-text">Home Care</span></a>
    <a href="#dat-hang" class="nav-cta" data-cta>Mua ngay 49K</a>
  </div>
</header>
