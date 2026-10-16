<?php
/**
 * Template Part: Ingredients
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title     = lx_get_field('lx_ing_title', 'option', 'Sự kết hợp <em>dịu nhẹ từ tự nhiên</em>');
$ing1_name = lx_get_field('lx_ing1_name', 'option', 'Tinh dầu tràm');
$ing1_lat  = lx_get_field('lx_ing1_latin', 'option', 'Melaleuca Leucadendra Leaf Oil');
$ing1_desc = lx_get_field('lx_ing1_desc', 'option', 'Giúp giữ ấm, xua tan khí lạnh và làm sạch không khí xung quanh bé.');

$ing2_name = lx_get_field('lx_ing2_name', 'option', 'Dầu bơ');
$ing2_lat  = lx_get_field('lx_ing2_latin', 'option', 'Persea Gratissima Oil');
$ing2_desc = lx_get_field('lx_ing2_desc', 'option', 'Giàu vitamin và dưỡng chất giúp nuôi dưỡng làn da bé mềm mại.');

$ing3_name = lx_get_field('lx_ing3_name', 'option', 'Dầu ô liu');
$ing3_lat  = lx_get_field('lx_ing3_latin', 'option', 'Olea Europaea Fruit Oil');
$ing3_desc = lx_get_field('lx_ing3_desc', 'option', 'Tạo lớp màng bảo vệ, hạn chế tình trạng khô da.');

$ing4_name = lx_get_field('lx_ing4_name', 'option', 'Dầu Argan');
$ing4_lat  = lx_get_field('lx_ing4_latin', 'option', 'Argania Spinosa Kernel Oil');
$ing4_desc = lx_get_field('lx_ing4_desc', 'option', 'Giúp xoa dịu vùng da nhạy cảm, chống kích ứng.');
?>
<section>
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    </div>
    <div class="ingre-wrap">
      <div class="ingre-list">
        <div class="ingre reveal"><!-- 📷 ẢNH 12: Lá tràm — 400×400px (1:1). Dán URL vào CONFIG.images.ing1 --><div class="ph round" data-img="ing1" data-spec="400×400px (1:1)" style="aspect-ratio:1/1"><span class="ph-n">📷 ẢNH 12</span><b>Lá tràm</b><small>400×400px (1:1)</small></div><div><h3 class="lx_wow_item"><?php echo esc_html($ing1_name); ?></h3><div class="latin"><?php echo esc_html($ing1_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing1_desc); ?></p></div></div>
        <div class="ingre reveal"><!-- 📷 ẢNH 13: Quả bơ — 400×400px (1:1). Dán URL vào CONFIG.images.ing2 --><div class="ph round" data-img="ing2" data-spec="400×400px (1:1)" style="aspect-ratio:1/1"><span class="ph-n">📷 ẢNH 13</span><b>Quả bơ</b><small>400×400px (1:1)</small></div><div><h3 class="lx_wow_item"><?php echo esc_html($ing2_name); ?></h3><div class="latin"><?php echo esc_html($ing2_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing2_desc); ?></p></div></div>
        <div class="ingre reveal"><!-- 📷 ẢNH 14: Quả ô liu — 400×400px (1:1). Dán URL vào CONFIG.images.ing3 --><div class="ph round" data-img="ing3" data-spec="400×400px (1:1)" style="aspect-ratio:1/1"><span class="ph-n">📷 ẢNH 14</span><b>Quả ô liu</b><small>400×400px (1:1)</small></div><div><h3 class="lx_wow_item"><?php echo esc_html($ing3_name); ?></h3><div class="latin"><?php echo esc_html($ing3_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing3_desc); ?></p></div></div>
        <div class="ingre reveal"><!-- 📷 ẢNH 15: Hạt argan — 400×400px (1:1). Dán URL vào CONFIG.images.ing4 --><div class="ph round" data-img="ing4" data-spec="400×400px (1:1)" style="aspect-ratio:1/1"><span class="ph-n">📷 ẢNH 15</span><b>Hạt argan</b><small>400×400px (1:1)</small></div><div><h3 class="lx_wow_item"><?php echo esc_html($ing4_name); ?></h3><div class="latin"><?php echo esc_html($ing4_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing4_desc); ?></p></div></div>
      </div>
      <div class="reveal"><!-- 📷 ẢNH 16: Ảnh chai tinh dầu đặt cạnh nguyên liệu: lá tràm, quả bơ, ô liu, hạt argan — Ảnh vuông 1000×1000px (1:1). Dán URL vào CONFIG.images.ingredients -->
<div class="ph " data-img="ingredients" style="aspect-ratio:1/1;"><span class="ph-n">📷 ẢNH 16</span><b>Ảnh chai tinh dầu đặt cạnh nguyên liệu: lá tràm, quả bơ, ô liu, hạt argan</b><small>Ảnh vuông 1000×1000px (1:1)</small></div></div>
    </div>
  </div>
</section>
