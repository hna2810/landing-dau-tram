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
?>
<section class="benefits wave flip">
  <div class="container center">
    <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    <p class="lead reveal lx_wow_item"><?php echo esc_html($lead); ?></p>
    <div class="ben-grid" style="text-align:left">
      <div class="ben-card reveal">
        <span class="ben-num">01</span>
        <?php echo lx_render_image_slot('lx_img_ben1', 'ben1', 'ẢNH 7: Bé ấm áp trong khăn sau khi tắm', '800×600px (4:3)', 'card-img', 'aspect-ratio:4/3'); ?>
        <h3 class="lx_wow_item"><?php echo $ben1_title; ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($ben1_desc); ?></p>
      </div>
      <div class="ben-card reveal">
        <span class="ben-num">02</span>
        <?php echo lx_render_image_slot('lx_img_ben2', 'ben2', 'ẢNH 8: Bé ngủ say, thở êm', '800×600px (4:3)', 'card-img', 'aspect-ratio:4/3'); ?>
        <h3 class="lx_wow_item"><?php echo esc_html($ben2_title); ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($ben2_desc); ?></p>
      </div>
      <div class="ben-card reveal">
        <span class="ben-num">03</span>
        <?php echo lx_render_image_slot('lx_img_ben3', 'ben3', 'ẢNH 9: Mẹ thoa dầu lên vết muỗi đốt', '800×600px (4:3)', 'card-img', 'aspect-ratio:4/3'); ?>
        <h3 class="lx_wow_item"><?php echo esc_html($ben3_title); ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($ben3_desc); ?></p>
      </div>
      <div class="ben-card reveal">
        <span class="ben-num">04</span>
        <?php echo lx_render_image_slot('lx_img_ben4', 'ben4', 'ẢNH 10: Cận cảnh giọt dầu trên da bé', '800×600px (4:3)', 'card-img', 'aspect-ratio:4/3'); ?>
        <h3 class="lx_wow_item"><?php echo $ben4_title; ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($ben4_desc); ?></p>
      </div>
    </div>
    <div class="img-row reveal">
      <?php echo lx_render_image_slot('lx_img_benefit', 'benefit', 'ẢNH 11: Ảnh mẹ thoa & massage ngực, lưng hoặc lòng bàn chân cho bé', '1200×675px (16:9)', '', 'aspect-ratio:16/9;'); ?>
    </div>
    <p class="ben-foot reveal lx_wow_item"><?php echo esc_html($foot); ?></p>
  </div>
</section>
