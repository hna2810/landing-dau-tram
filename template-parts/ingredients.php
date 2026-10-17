<?php
/**
 * Template Part: Ingredients
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title     = lx_get_field('lx_ing_title', 'option', 'Bảng thành phần tự nhiên – <em>Công thức thảo mộc thuần chay độc quyền</em>');
$ing1_name = lx_get_field('lx_ing1_name', 'option', 'Chiết xuất rễ Gừng');
$ing1_lat  = lx_get_field('lx_ing1_latin', 'option', 'Zingiber Officinale Root Extract');
$ing1_desc = lx_get_field('lx_ing1_desc', 'option', 'Mang tính ấm tự nhiên, giúp thúc đẩy tuần hoàn máu dưới da, giữ ấm lòng bàn chân, lưng và ngực, đẩy tan hàn khí tích tụ.');

$ing2_name = lx_get_field('lx_ing2_name', 'option', 'Tinh dầu Lá tía tô');
$ing2_lat  = lx_get_field('lx_ing2_latin', 'option', 'Perilla Frutescens Leaf Oil');
$ing2_desc = lx_get_field('lx_ing2_desc', 'option', 'Giúp làm dịu làn da, hỗ trợ giữ ấm cơ thể nhẹ nhàng, bảo vệ mẹ và bé trước các tác nhân gió lạnh bên ngoài.');

$ing3_name = lx_get_field('lx_ing3_name', 'option', 'Tinh dầu Rau mùi');
$ing3_lat  = lx_get_field('lx_ing3_latin', 'option', 'Coriandrum Sativum Herb Oil');
$ing3_desc = lx_get_field('lx_ing3_desc', 'option', 'Mang lại hương thơm thảo mộc đặc trưng, giúp thư giãn tinh thần, tạo sự dễ chịu, thoải mái cho mẹ và bé.');

$ing4_name = lx_get_field('lx_ing4_name', 'option', 'Tinh dầu Sả chanh');
$ing4_lat  = lx_get_field('lx_ing4_latin', 'option', 'Cymbopogon Citratus Leaf Oil');
$ing4_desc = lx_get_field('lx_ing4_desc', 'option', 'Hương thơm tươi mát, xua tan căng thẳng, hỗ trợ giữ ấm và làm mềm da.');
?>
<section>
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    </div>
    <div class="ingre-wrap">
      <div class="ingre-list">
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing1', 'ing1', 'ẢNH 6: Gừng tươi', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing1_name); ?></h3><div class="latin"><?php echo esc_html($ing1_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing1_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing2', 'ing2', 'ẢNH 7: Lá tía tô', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing2_name); ?></h3><div class="latin"><?php echo esc_html($ing2_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing2_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing3', 'ing3', 'ẢNH 8: Rau mùi', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing3_name); ?></h3><div class="latin"><?php echo esc_html($ing3_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing3_desc); ?></p></div>
        </div>
        <div class="ingre reveal">
          <?php echo lx_render_image_slot('lx_img_ing4', 'ing4', 'ẢNH 9: Sả chanh', '400×400px (1:1)', 'round', 'aspect-ratio:1/1'); ?>
          <div><h3 class="lx_wow_item"><?php echo esc_html($ing4_name); ?></h3><div class="latin"><?php echo esc_html($ing4_lat); ?></div><p class="lx_wow_item"><?php echo esc_html($ing4_desc); ?></p></div>
        </div>
      </div>
      <div class="reveal">
        <?php echo lx_render_image_slot('lx_img_ingredients', 'ingredients', 'ẢNH 10: Ảnh chai xịt Khí Hàn Sinh Khương bên cạnh thảo mộc tự nhiên', '1000×1000px (1:1)', '', 'aspect-ratio:1/1;'); ?>
      </div>
    </div>
  </div>
</section>
