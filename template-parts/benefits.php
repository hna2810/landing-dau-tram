<?php
/**
 * Template Part: Benefits
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title      = lx_get_field('lx_benefits_title', 'option', 'Đồng hành cùng mẹ <em>chăm sóc và bảo vệ</em> bé yêu mỗi ngày');
$lead       = lx_get_field('lx_benefits_lead', 'option', 'Sản phẩm được nghiên cứu công thức phù hợp cho làn da mỏng manh của bé, mang đến 4 công dụng thiết thực:');
$ben1_title = lx_get_field('lx_ben1_title', 'option', 'Giữ ấm cơ thể &amp; đẩy khí lạnh');
$ben1_desc  = lx_get_field('lx_ben1_desc', 'option', 'Giúp cơ thể bé luôn ấm áp, hỗ trợ đẩy khí hàn, đặc biệt thích hợp dùng khi thời tiết se lạnh, giao mùa hoặc sau khi tắm.');
$ben2_title = lx_get_field('lx_ben2_title', 'option', 'Thông thoáng đường thở');
$ben2_desc  = lx_get_field('lx_ben2_desc', 'option', 'Hương thơm tự nhiên dễ chịu giúp thông thoáng cho đường thở, giảm tình trạng khò khè, cho bé ngủ sâu giấc hơn.');
$ben3_title = lx_get_field('lx_ben3_title', 'option', 'Xoa dịu vết côn trùng cắn');
$ben3_desc  = lx_get_field('lx_ben3_desc', 'option', 'Giảm cảm giác ngứa ngáy, làm dịu vùng da sưng đỏ do muỗi hoặc côn trùng đốt.');
$ben4_title = lx_get_field('lx_ben4_title', 'option', 'Dưỡng ẩm &amp; bảo vệ da');
$ben4_desc  = lx_get_field('lx_ben4_desc', 'option', 'Sự có mặt của dầu bơ, ô liu và argan giúp làm mềm da, giảm độ gay gắt của tinh dầu tràm nguyên chất, phù hợp cho cả làn da trẻ sơ sinh.');
$foot       = lx_get_field('lx_benefits_foot', 'option', 'Thoa và massage nhẹ nhàng giúp bé thư giãn, giảm căng thẳng và ngủ sâu giấc hơn.');
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
