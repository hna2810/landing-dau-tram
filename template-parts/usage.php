<?php
/**
 * Template Part: Usage
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title       = lx_get_field('lx_usage_title', 'option', 'Dễ dàng chăm sóc bé <em>mỗi ngày</em>');
$step1_title = lx_get_field('lx_usage_step1_title', 'option', 'Khi tắm cho bé');
$step1_desc  = lx_get_field('lx_usage_step1_desc', 'option', 'Nhỏ 2 - 3 giọt vào chậu nước tắm ấm để giữ ấm cơ thể trong suốt quá trình tắm.');
$step2_title = lx_get_field('lx_usage_step2_title', 'option', 'Trước khi đi ngủ hoặc ra ngoài');
$step2_desc  = lx_get_field('lx_usage_step2_desc', 'option', 'Nhỏ vài giọt ra lòng bàn tay mẹ, xoa ấm rồi massage nhẹ nhàng lên cổ, ngực, lưng và lòng bàn chân của bé.');
$step3_title = lx_get_field('lx_usage_step3_title', 'option', 'Khi bị côn trùng đốt');
$step3_desc  = lx_get_field('lx_usage_step3_desc', 'option', 'Thoa một lượng nhỏ lên vùng da bị cắn để làm dịu ngứa.');
$warn        = lx_get_field('lx_usage_warn', 'option', '<b>Lưu ý:</b> Nên thử một lượng nhỏ ra tay trước khi dùng cho trẻ sơ sinh. Tránh thoa trực tiếp lên vùng mặt, gần mắt, mũi hoặc vết thương hở.');
?>
<section class="usage wave flip" style="--wave:var(--cream)">
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    </div>
    <div class="steps">
      <div class="step reveal">
        <span class="step-n">1</span>
        <?php echo lx_render_image_slot('lx_img_step1', 'step1', 'ẢNH 18: Nhỏ 2–3 giọt vào chậu nước tắm ấm của bé', '800×600px (4:3)', '', 'aspect-ratio:4/3;'); ?>
        <h3 class="lx_wow_item"><?php echo esc_html($step1_title); ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($step1_desc); ?></p>
      </div>
      <div class="step reveal">
        <span class="step-n">2</span>
        <?php echo lx_render_image_slot('lx_img_step2', 'step2', 'ẢNH 19: Massage cổ, ngực, lưng, lòng bàn chân bé', '800×600px (4:3)', '', 'aspect-ratio:4/3;'); ?>
        <h3 class="lx_wow_item"><?php echo esc_html($step2_title); ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($step2_desc); ?></p>
      </div>
      <div class="step reveal">
        <span class="step-n">3</span>
        <?php echo lx_render_image_slot('lx_img_step3', 'step3', 'ẢNH 20: Thoa một lượng nhỏ lên vết muỗi đốt trên da bé', '800×600px (4:3)', '', 'aspect-ratio:4/3;'); ?>
        <h3 class="lx_wow_item"><?php echo esc_html($step3_title); ?></h3>
        <p class="lx_wow_item"><?php echo esc_html($step3_desc); ?></p>
      </div>
    </div>
    <div class="warn reveal"><?php echo $warn; ?></div>
  </div>
</section>
