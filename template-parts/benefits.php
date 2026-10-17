<?php
/**
 * Template Part: Benefits
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title      = lx_get_field('lx_benefits_title', 'option', 'Giữ ấm dịu nhẹ, <em>bảo vệ sức khỏe</em> cho cả gia đình');
$lead       = lx_get_field('lx_benefits_lead', 'option', 'Khí Hàn Sinh Khương Home Care mang đến trải nghiệm giữ ấm hoàn toàn mới: Nhẹ nhàng – Tinh tế – Tiện lợi.');
$ben1_title = lx_get_field('lx_ben1_title', 'option', 'Giữ ấm cơ thể &amp; Đẩy khí lạnh');
$ben1_desc  = lx_get_field('lx_ben1_desc', 'option', 'Giúp cơ thể bé luôn ấm áp, hỗ trợ đẩy khí hàn, đặc biệt thích hợp dùng khi thời tiết se lạnh, giao mùa hoặc sau khi tắm.');
$ben2_title = lx_get_field('lx_ben2_title', 'option', 'Thiết kế dạng xịt 30ml thông minh');
$ben2_desc  = lx_get_field('lx_ben2_desc', 'option', 'Tiện lợi, không dính tay, dễ định lượng dùng, dễ dàng bỏ túi xách mang đi bất cứ đâu.');
$ben3_title = lx_get_field('lx_ben3_title', 'option', 'Ấm dịu vừa đủ – Không gây rát da');
$ben3_desc  = lx_get_field('lx_ben3_desc', 'option', 'Chiết xuất gừng tự nhiên tạo độ ấm dễ chịu, an lành, dịu nhẹ cho làn da nhạy cảm.');
$ben4_title = lx_get_field('lx_ben4_title', 'option', 'Hương thơm thảo mộc thư giãn');
$ben4_desc  = lx_get_field('lx_ben4_desc', 'option', 'Mùi hương tự nhiên từ sả chanh, rau mùi và tía tô giúp giải tỏa căng thẳng, mang lại cảm giác thư thái như đi spa.');
$foot       = lx_get_field('lx_benefits_foot', 'option', 'Thoa và massage nhẹ nhàng giúp mẹ và bé thư giãn, giảm căng thẳng và ngủ sâu giấc hơn.');

$has_b1 = (!empty($ben1_title) || !empty($ben1_desc));
$has_b2 = (!empty($ben2_title) || !empty($ben2_desc));
$has_b3 = (!empty($ben3_title) || !empty($ben3_desc));
$has_b4 = (!empty($ben4_title) || !empty($ben4_desc));
$has_bens = ($has_b1 || $has_b2 || $has_b3 || $has_b4);

if (!$has_bens && empty($title) && empty($lead) && empty($foot)) {
    return;
}
?>
<section class="benefits wave flip">
  <div class="container center">
    <?php if (!empty($title)) : ?><h2 class="reveal lx_wow_item"><?php echo $title; ?></h2><?php endif; ?>
    <?php if (!empty($lead)) : ?><p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p><?php endif; ?>

    <?php if ($has_bens) : ?>
      <div class="ben-grid" style="text-align:left">
        <?php if ($has_b1) : ?>
          <div class="ben-card reveal">
            <?php echo lx_render_image_slot('lx_img_ben1', 'ben1', 'ẢNH 7: Bé ấm áp trong khăn sau khi tắm', '800×800px (1:1)', 'card-img'); ?>
            <?php if (!empty($ben1_title)) : ?><h3 class="lx_wow_item"><?php echo $ben1_title; ?></h3><?php endif; ?>
            <?php if (!empty($ben1_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ben1_desc); ?></p><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($has_b2) : ?>
          <div class="ben-card reveal">
            <?php echo lx_render_image_slot('lx_img_ben2', 'ben2', 'ẢNH 8: Bé ngủ say, thở êm', '800×800px (1:1)', 'card-img'); ?>
            <?php if (!empty($ben2_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ben2_title); ?></h3><?php endif; ?>
            <?php if (!empty($ben2_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ben2_desc); ?></p><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($has_b3) : ?>
          <div class="ben-card reveal">
            <?php echo lx_render_image_slot('lx_img_ben3', 'ben3', 'ẢNH 9: Mẹ thoa dầu lên vết muỗi đốt', '800×800px (1:1)', 'card-img'); ?>
            <?php if (!empty($ben3_title)) : ?><h3 class="lx_wow_item"><?php echo esc_html($ben3_title); ?></h3><?php endif; ?>
            <?php if (!empty($ben3_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ben3_desc); ?></p><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($has_b4) : ?>
          <div class="ben-card reveal">
            <?php echo lx_render_image_slot('lx_img_ben4', 'ben4', 'ẢNH 10: Cận cảnh giọt dầu trên da bé', '800×800px (1:1)', 'card-img'); ?>
            <?php if (!empty($ben4_title)) : ?><h3 class="lx_wow_item"><?php echo $ben4_title; ?></h3><?php endif; ?>
            <?php if (!empty($ben4_desc)) : ?><p class="lx_wow_item"><?php echo esc_html($ben4_desc); ?></p><?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($foot)) : ?>
      <p class="ben-foot reveal lx_wow_item"><?php echo esc_html($foot); ?></p>
    <?php endif; ?>
  </div>
</section>
