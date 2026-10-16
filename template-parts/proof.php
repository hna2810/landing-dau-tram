<?php
/**
 * Template Part: Proof
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title     = lx_get_field('lx_proof_title', 'option', 'Hơn <em>50.000+ mẹ bỉm</em> đã tin dùng &amp; đồng hành cùng tinh dầu tràm Home Care');
$subtitle  = lx_get_field('lx_proof_subtitle', 'option', 'Đánh giá nhanh từ cộng đồng');
$stat1_num = lx_get_field('lx_stat1_num', 'option', '50000');
$stat1_lbl = lx_get_field('lx_stat1_lbl', 'option', 'mẹ bỉm tin dùng');
$stat2_num = lx_get_field('lx_stat2_num', 'option', '4.9<small>/5</small>');
$stat2_lbl = lx_get_field('lx_stat2_lbl', 'option', 'sao dựa trên hơn 2.500+ đánh giá thực tế');
$stat3_num = lx_get_field('lx_stat3_num', 'option', '98');
$stat3_lbl = lx_get_field('lx_stat3_lbl', 'option', 'mẹ phản hồi con ngủ ngon hơn và bớt khò khè sau khi được massage giữ ấm');
$trust1    = lx_get_field('lx_trust_box1', 'option', '<b>Sản phẩm tin dùng trong dịch vụ cao cấp:</b> Tinh dầu tràm Home Care được các chuyên viên chăm sóc mẹ và bé của Home Care sử dụng trực tiếp trong các liệu trình tắm bé và tắm xông hơi cho mẹ tại nhà.');
$trust2    = lx_get_field('lx_trust_box2', 'option', '<b>Phù hợp cho cả gia đình:</b> An toàn cho trẻ sơ sinh, trẻ nhỏ, mẹ bầu và mẹ sau sinh trong thời gian ở cữ.');
$cta_text  = lx_get_field('lx_proof_cta_text', 'option', 'Đặt mua ngay – chỉ 49.000đ');
?>
<section class="proof wave">
  <div class="container">
    <div class="center">
      <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
    </div>
    <h3 class="center reveal lx_wow_item" style="margin-top:28px;font-size:20px"><?php echo esc_html($subtitle); ?></h3>
    <div class="stats">
      <div class="stat reveal"><div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat1_num)); ?>">0</span>+</div><div class="lbl"><?php echo esc_html($stat1_lbl); ?></div></div>
      <div class="stat reveal"><div class="num"><?php echo $stat2_num; ?></div><div class="stars">★★★★★</div><div class="lbl"><?php echo esc_html($stat2_lbl); ?></div></div>
      <div class="stat reveal"><div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat3_num)); ?>">0</span>%</div><div class="lbl"><?php echo esc_html($stat3_lbl); ?></div></div>
    </div>
    <div class="reviews">
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Trước đây mỗi lần giao mùa là bé nhà mình lại khò khè, đêm quấy khóc suốt vì khó thở. Từ ngày dùng tinh dầu tràm Home Care, tối nào tắm xong mình cũng massage chân và ngực cho con. Mùi thơm nhẹ, không hề bị hắc hay nóng rát da bé. Cu cậu ngủ một mạch đến sáng, mẹ khỏe mà con khỏe!”</p><div class="who"><span class="avatar">TH</span><div><b>Mẹ Thanh Hằng</b><small>Hà Nội · Bé 4 tháng tuổi</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Lúc đầu mình cũng lo tinh dầu nóng quá làm đỏ da con, nhưng loại này có kết hợp dầu bơ với ô liu nên thoa lên da bé rất mềm mại, dịu nhẹ. Mấy vết muỗi đốt thoa vào một lúc là dịu ngay. Chai nhỏ gọn mang đi đâu cũng tiện.”</p><div class="who"><span class="avatar" style="background:var(--leaf)">BN</span><div><b>Mẹ Bích Ngọc</b><small>Hải Phòng · Bé 2 tháng tuổi</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Mình biết đến sản phẩm này nhờ sử dụng dịch vụ tắm bé tại nhà của Home Care. Thấy các cô điều dưỡng dùng cho bé thích quá nên mua luôn 2 chai về dùng dần. Mẹ ở cữ xoa vào lòng bàn chân giữ ấm cực kỳ tốt!”</p><div class="who"><span class="avatar" style="background:#e9a3b8">LA</span><div><b>Mẹ Lan Anh</b><small>Thanh Hóa · Bé 5 tháng tuổi</small></div></div></div>
    </div>
    <div class="fb-grid">
      <div class="reveal"><!-- 📷 ẢNH 21: Ảnh chụp màn hình feedback thật #1 — Tin nhắn Zalo/Messenger · 600×800px (3:4). Dán URL vào CONFIG.images.feedback1 -->
<div class="ph " data-img="feedback1" style="aspect-ratio:3/4;"><span class="ph-n">📷 ẢNH 21</span><b>Ảnh chụp màn hình feedback thật #1</b><small>Tin nhắn Zalo/Messenger · 600×800px (3:4)</small></div></div>
      <div class="reveal"><!-- 📷 ẢNH 22: Ảnh chụp màn hình feedback thật #2 — 600×800px (3:4). Dán URL vào CONFIG.images.feedback2 -->
<div class="ph " data-img="feedback2" style="aspect-ratio:3/4;"><span class="ph-n">📷 ẢNH 22</span><b>Ảnh chụp màn hình feedback thật #2</b><small>600×800px (3:4)</small></div></div>
      <div class="reveal"><!-- 📷 ẢNH 23: Ảnh chụp màn hình feedback thật #3 — 600×800px (3:4). Dán URL vào CONFIG.images.feedback3 -->
<div class="ph " data-img="feedback3" style="aspect-ratio:3/4;"><span class="ph-n">📷 ẢNH 23</span><b>Ảnh chụp màn hình feedback thật #3</b><small>600×800px (3:4)</small></div></div>
    </div>
    <div class="img-row reveal"><!-- 📷 ẢNH 24: Ảnh điều dưỡng Home Care tắm bé / massage cho bé tại nhà — Ảnh ngang 1200×675px (16:9). Dán URL vào CONFIG.images.service -->
<div class="ph " data-img="service" style="aspect-ratio:16/9;"><span class="ph-n">📷 ẢNH 24</span><b>Ảnh điều dưỡng Home Care tắm bé / massage cho bé tại nhà</b><small>Ảnh ngang 1200×675px (16:9)</small></div></div>
    <div class="trust-box">
      <div class="reveal"><?php echo $trust1; ?></div>
      <div class="reveal"><?php echo $trust2; ?></div>
    </div>
    <div class="center" style="margin-top:30px"><a href="#dat-hang" class="btn btn-buy" data-cta><?php echo esc_html($cta_text); ?></a></div>
  </div>
</section>
