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

$has_i1 = (!empty($ing1_name) || !empty($ing1_desc));
$has_i2 = (!empty($ing2_name) || !empty($ing2_desc));
$has_i3 = (!empty($ing3_name) || !empty($ing3_desc));
$has_i4 = (!empty($ing4_name) || !empty($ing4_desc));
$has_ings = ($has_i1 || $has_i2 || $has_i3 || $has_i4);
$slot_ingredients = lx_render_image_slot('lx_img_ingredients', 'ingredients', 'ẢNH 10: Ảnh chai xịt Khí Hàn Sinh Khương bên cạnh thảo mộc tự nhiên', '1000×1000px (1:1)');

if (!$has_ings && empty($title) && empty($slot_ingredients)) {
    return;
}
?>
<section class="ingredients">
  <div class="container">
    <?php if (!empty($title)) : ?>
      <div class="center">
        <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
      </div>
    <?php endif; ?>
    <div class="ingre-wrap">
      <?php if ($has_ings) : ?>
        <div class="ingre-list">
          <?php if ($has_i1) : ?>
            <div class="ingre reveal">
              <?php echo lx_render_image_slot('lx_img_ing1', 'ing1', 'ẢNH 6: Gừng tươi', '400×400px (1:1)', 'round'); ?>
              <div>
                <?php if (!empty($ing1_name)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ing1_name); ?></h3><?php endif; ?>
                <?php if (!empty($ing1_lat)) : ?><div class="latin"><?php echo esc_html($ing1_lat); ?></div><?php endif; ?>
                <?php if (!empty($ing1_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ing1_desc); ?></p><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($has_i2) : ?>
            <div class="ingre reveal">
              <?php echo lx_render_image_slot('lx_img_ing2', 'ing2', 'ẢNH 7: Lá tía tô', '400×400px (1:1)', 'round'); ?>
              <div>
                <?php if (!empty($ing2_name)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ing2_name); ?></h3><?php endif; ?>
                <?php if (!empty($ing2_lat)) : ?><div class="latin"><?php echo esc_html($ing2_lat); ?></div><?php endif; ?>
                <?php if (!empty($ing2_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ing2_desc); ?></p><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($has_i3) : ?>
            <div class="ingre reveal">
              <?php echo lx_render_image_slot('lx_img_ing3', 'ing3', 'ẢNH 8: Rau mùi', '400×400px (1:1)', 'round'); ?>
              <div>
                <?php if (!empty($ing3_name)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ing3_name); ?></h3><?php endif; ?>
                <?php if (!empty($ing3_lat)) : ?><div class="latin"><?php echo esc_html($ing3_lat); ?></div><?php endif; ?>
                <?php if (!empty($ing3_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ing3_desc); ?></p><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <?php if ($has_i4) : ?>
            <div class="ingre reveal">
              <?php echo lx_render_image_slot('lx_img_ing4', 'ing4', 'ẢNH 9: Sả chanh', '400×400px (1:1)', 'round'); ?>
              <div>
                <?php if (!empty($ing4_name)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ing4_name); ?></h3><?php endif; ?>
                <?php if (!empty($ing4_lat)) : ?><div class="latin"><?php echo esc_html($ing4_lat); ?></div><?php endif; ?>
                <?php if (!empty($ing4_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ing4_desc); ?></p><?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($slot_ingredients)) : ?>
        <div class="ingre-visual reveal">
          <?php echo $slot_ingredients; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
