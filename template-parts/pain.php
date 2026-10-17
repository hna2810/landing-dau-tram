<?php
/**
 * Template Part: Pain
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$question    = lx_get_field('lx_pain_question', 'option', 'Mẹ có đang lặp lại những mối lo này mỗi ngày?');
$lead        = lx_get_field('lx_pain_lead', 'option', 'Khí lạnh không chỉ làm cơ thể khó chịu, mà còn lặng lẽ bào mòn sức khỏe của cả mẹ và bé nếu không được chăm sóc đúng cách.');
$card1_title = lx_get_field('lx_pain_card1_title', 'option', 'Mẹ ở cữ & Sau sinh');
$card1_desc  = lx_get_field('lx_pain_card1_desc', 'option', 'Cơ thể suy giảm sức đề kháng, mồ hôi trộm ra nhiều gặp gió là nhiễm lạnh, tay chân lạnh ngắt, dễ đau mỏi cổ vai gáy?');
$card2_title = lx_get_field('lx_pain_card2_title', 'option', 'Trẻ sơ sinh & Trẻ nhỏ');
$card2_desc  = lx_get_field('lx_pain_card2_desc', 'option', 'Làn da nhạy cảm, dễ bị nhiễm lạnh mỗi khi tắm xong, hay giật mình, khó ngủ khi thời tiết chuyển mùa?');
$card3_title = lx_get_field('lx_pain_card3_title', 'option', 'Bất tiện từ các phương pháp dân gian cũ');
$card3_desc  = lx_get_field('lx_pain_card3_desc', 'option', 'Cốt gừng tự ngâm hay các loại dầu xoa dạng chai đổ thường dễ làm bẩn quần áo, dính bết bàn tay, bất tiện khi muốn mang theo ra ngoài.');
$bridge      = lx_get_field('lx_pain_bridge', 'option', 'Đã có Khí Hàn Sinh Khương Home Care – Giữ ấm dịu lành cho mẹ và bé');

$has_c1 = (!empty($card1_title) || !empty($card1_desc));
$has_c2 = (!empty($card2_title) || !empty($card2_desc));
$has_c3 = (!empty($card3_title) || !empty($card3_desc));
$has_cards = ($has_c1 || $has_c2 || $has_c3);
$slot_pain = lx_render_image_slot('lx_img_pain', 'pain', 'ẢNH 5: Ảnh cảm xúc: mẹ và bé trong mùa lạnh', '1200×675px (16:9), tông ấm, ánh sáng dịu', '', 'aspect-ratio:16/9;');

if (!$has_cards && empty($question) && empty($lead) && empty($bridge) && empty($slot_pain)) {
    return;
}
?>
<section class="pain wave">
  <div class="container center">
    <?php if (!empty($question)) : ?>
      <h2 class="reveal lx_wow_item"><?php echo $question; ?></h2>
    <?php endif; ?>

    <?php if (!empty($lead)) : ?>
      <p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p>
    <?php endif; ?>

    <?php if ($has_cards) : ?>
      <div class="pain-grid pain-grid-3" style="text-align:left">
        <?php if ($has_c1) : ?>
          <div class="pain-card reveal">
            <?php echo lx_render_image_slot('lx_img_pain1', 'pain1', 'ẢNH 2: Mẹ ở cữ & Sau sinh mệt mỏi, sợ lạnh', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
            <div>
              <?php if (!empty($card1_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($card1_title); ?></h3><?php endif; ?>
              <?php if (!empty($card1_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($card1_desc); ?></p><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($has_c2) : ?>
          <div class="pain-card reveal">
            <?php echo lx_render_image_slot('lx_img_pain2', 'pain2', 'ẢNH 3: Trẻ sơ sinh & Trẻ nhỏ dễ nhiễm lạnh sau tắm', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
            <div>
              <?php if (!empty($card2_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($card2_title); ?></h3><?php endif; ?>
              <?php if (!empty($card2_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($card2_desc); ?></p><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($has_c3) : ?>
          <div class="pain-card reveal">
            <?php echo lx_render_image_slot('lx_img_pain3', 'pain3', 'ẢNH 4: Bất tiện từ cốt gừng tự ngâm, dầu đổ dính bết', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
            <div>
              <?php if (!empty($card3_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($card3_title); ?></h3><?php endif; ?>
              <?php if (!empty($card3_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($card3_desc); ?></p><?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($slot_pain)) : ?>
      <div class="img-row reveal">
        <?php echo $slot_pain; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($bridge)) : ?>
      <p class="bridge reveal lx_wow_item"><?php echo esc_html($bridge); ?></p>
    <?php endif; ?>
  </div>
</section>
