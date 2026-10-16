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
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing1', 'ing1', 'ẢNH 12: Lá tràm', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing1_name); ?></h3><div class="latin"><?php echo esc_html($ing1_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing1_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing2', 'ing2', 'ẢNH 13: Quả bơ', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing2_name); ?></h3><div class="latin"><?php echo esc_html($ing2_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing2_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing3', 'ing3', 'ẢNH 14: Quả ô liu', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing3_name); ?></h3><div class="latin"><?php echo esc_html($ing3_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing3_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing4', 'ing4', 'ẢNH 15: Hạt argan', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing4_name); ?></h3><div class="latin"><?php echo esc_html($ing4_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing4_desc); ?></p></div>
        </div>
      </div>
      <div class="reveal">
        <?php echo lx_render_image_slot('lx_img_ingredients', 'ingredients', 'ẢNH 16: Ảnh chai tinh dầu đặt cạnh nguyên liệu: lá tràm, quả bơ, ô liu, hạt argan', '1000×1000px (1:1)', '', 'aspect-ratio:1/1;'); ?>
      </div>
    </div>
  </div>
</section>
