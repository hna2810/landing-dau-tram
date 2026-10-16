<?php
/**
 * Template Part: Pain
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$question    = lx_get_field('lx_pain_question', 'option', '“Có phải mẹ đang loay hoay với những lo lắng này mỗi ngày?”');
$lead        = lx_get_field('lx_pain_lead', 'option', 'Mỗi lần gió lạnh về hay điều kiện thời tiết thay đổi, sức đề kháng còn non nớt của con lại làm mẹ mất ăn mất ngủ:');
$card1_title = lx_get_field('lx_pain_card1_title', 'option', 'Con khò khè, trằn trọc cả đêm');
$card1_desc  = lx_get_field('lx_pain_card1_desc', 'option', 'Đêm lạnh khiến đường thở của bé dễ bị nghẹt, con quấy khóc, mẹ thức trắng đêm lo lắng.');
$card2_title = lx_get_field('lx_pain_card2_title', 'option', 'Sợ con nhiễm lạnh sau khi tắm');
$card2_desc  = lx_get_field('lx_pain_card2_desc', 'option', 'Dù đã che chắn kỹ, bé vẫn dễ bị hắt hơi, sổ mũi do hạ nhiệt đột ngột.');
$card3_title = lx_get_field('lx_pain_card3_title', 'option', 'Sợ tinh dầu tràm nóng rát');
$card3_desc  = lx_get_field('lx_pain_card3_desc', 'option', 'Mẹ muốn dùng tinh dầu giữ ấm nhưng lo ngại làn da trẻ sơ sinh mỏng manh bị kích ứng.');
$card4_title = lx_get_field('lx_pain_card4_title', 'option', 'Muỗi &amp; côn trùng đốt');
$card4_desc  = lx_get_field('lx_pain_card4_desc', 'option', 'Vết muỗi cắn làm da bé đỏ ngứa, sưng tấy khiến con khó chịu, mất ngủ.');
$bridge      = lx_get_field('lx_pain_bridge', 'option', 'Đã có giải pháp dịu nhẹ cho bé yêu');
?>
<section class="pain wave">
  <div class="container center">
    <div class="pain-qs">
      <div class="pain-q reveal"><?php echo esc_html($question); ?></div>
    </div>
    <p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p>

    <div class="pain-grid" style="text-align:left">
      <div class="pain-card reveal">
        <?php echo lx_render_image_slot('lx_img_pain1', 'pain1', 'ẢNH 2: Bé khò khè, trằn trọc ban đêm', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
        <div><h3 class="lx_wow_item"><?php echo esc_html($card1_title); ?></h3><p class="lx_wow_item"><?php echo esc_html($card1_desc); ?></p></div>
      </div>
      <div class="pain-card reveal">
        <?php echo lx_render_image_slot('lx_img_pain2', 'pain2', 'ẢNH 3: Bé hắt hơi, sổ mũi sau khi tắm', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
        <div><h3 class="lx_wow_item"><?php echo esc_html($card2_title); ?></h3><p class="lx_wow_item"><?php echo esc_html($card2_desc); ?></p></div>
      </div>
      <div class="pain-card reveal">
        <?php echo lx_render_image_slot('lx_img_pain3', 'pain3', 'ẢNH 4: Mẹ ngần ngại khi cầm chai tinh dầu', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
        <div><h3 class="lx_wow_item"><?php echo esc_html($card3_title); ?></h3><p class="lx_wow_item"><?php echo esc_html($card3_desc); ?></p></div>
      </div>
      <div class="pain-card reveal">
        <?php echo lx_render_image_slot('lx_img_pain4', 'pain4', 'ẢNH 5: Vết muỗi đốt đỏ trên da bé', '600×600px (1:1)', 'thumb', 'aspect-ratio:1/1'); ?>
        <div><h3 class="lx_wow_item"><?php echo $card4_title; ?></h3><p class="lx_wow_item"><?php echo esc_html($card4_desc); ?></p></div>
      </div>
    </div>
    <div class="img-row reveal">
      <?php echo lx_render_image_slot('lx_img_pain', 'pain', 'ẢNH 6: Ảnh cảm xúc: bé quấy khóc ban đêm, mẹ lo lắng bế con', '1200×675px (16:9), tông ấm, ánh sáng dịu', '', 'aspect-ratio:16/9;'); ?>
    </div>
    <p class="bridge reveal lx_wow_item"><?php echo esc_html($bridge); ?></p>
  </div>
</section>
