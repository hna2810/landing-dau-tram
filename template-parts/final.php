<?php
/**
 * Template Part: Final
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

// Section disabled per user request
return;

$title    = lx_get_field('lx_final_title', 'option', 'Đừng để đêm lạnh làm <em>gián đoạn giấc ngủ</em> của con');
$desc     = lx_get_field('lx_final_desc', 'option', 'Chỉ 49.000đ cho một mùa đông ấm áp – ưu đãi flash sale có thể kết thúc bất cứ lúc nào.');
$cta_text = lx_get_field('lx_final_cta_text', 'option', 'Mua ngay 49K – Freeship');
?>
<section class="final wave flip">
  <div class="container">
    <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    <p class="reveal lx_wow_item"><?php echo esc_html($desc); ?></p>
    <a href="#dat-hang" class="btn btn-buy reveal" data-cta><?php echo esc_html($cta_text); ?></a>
  </div>
</section>
