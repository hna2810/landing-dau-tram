<?php
/**
 * Template Part: Proof
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

$title     = lx_get_field('lx_proof_title', 'option', 'Hàng ngàn mẹ tin dùng &amp; đồng hành cùng <em>tinh dầu giữ ấm thảo mộc thuần chay Home Care</em>');
$subtitle  = lx_get_field('lx_proof_subtitle', 'option', 'Đánh giá chân thực từ khách hàng');
$stat1_num = lx_get_field('lx_stat1_num', 'option', '10000');
$stat1_lbl = lx_get_field('lx_stat1_lbl', 'option', 'Chai Khí Hàn Sinh Khương đã gửi tới các gia đình toàn quốc');
$stat2_num = lx_get_field('lx_stat2_num', 'option', '98');
$stat2_lbl = lx_get_field('lx_stat2_lbl', 'option', 'Mẹ bỉm hài lòng với độ ấm dịu nhẹ & khả năng thẩm thấu nhanh');
$stat3_num = lx_get_field('lx_stat3_num', 'option', '95');
$stat3_lbl = lx_get_field('lx_stat3_lbl', 'option', 'Đánh giá cao thiết kế dạng xịt 30ml nhỏ gọn, tiện lợi');
$trust1    = lx_get_field('lx_trust_box1', 'option', '<b>👉 Dùng trong liệu trình chuyên nghiệp:</b> Khí Hàn Sinh Khương Home Care là sản phẩm được các chuyên viên chăm sóc mẹ và bé của Home Care sử dụng trực tiếp trong các liệu trình massage tắm bé và tắm xông hơi cho mẹ tại nhà, tại trung tâm ở cữ.');
$trust2    = lx_get_field('lx_trust_box2', 'option', '<b>👉 Phù hợp cho cả gia đình:</b> An lành cho trẻ sơ sinh, trẻ nhỏ, mẹ bầu và mẹ sau sinh trong thời gian ở cữ.');
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
      <div class="stat reveal"><div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat2_num)); ?>">0</span>%</div><div class="stars">★★★★★</div><div class="lbl"><?php echo esc_html($stat2_lbl); ?></div></div>
      <div class="stat reveal"><div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat3_num)); ?>">0</span>%</div><div class="lbl"><?php echo esc_html($stat3_lbl); ?></div></div>
    </div>
    <div class="reviews">
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Bé nhà mình da nhạy cảm nên tìm sản phẩm giữ ấm thuần chay như này rất yên tâm. Dung tích 30ml dạng xịt tiện lợi, mang đi đâu cũng tiện. Mùa gió về xịt chút vào lòng bàn chân rồi đi tất cho con là yên tâm bé ngủ ngon cả đêm, không lo lạnh bụng hay giật mình.”</p><div class="who"><span class="avatar">TH</span><div><b>Đạo diễn Thanh Hằng</b><small>Khách hàng thân thiết Home Care</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Đúng là chân ái cho các mẹ ở cữ mùa này luôn ạ. Em mới sinh xong mệt mỏi mà sợ gió khủng khiếp. Từ hôm dùng chai xịt Khí Hàn Sinh Khương này thấy đỡ hẳn. Tia xịt ra mịn lắm, massage chút là ngấm, người ấm lên nhanh mà không bị rát da. Thích nhất là cái mùi thảo mộc dịu nhẹ, không bị nồng hắc ảnh hưởng tới bé. 10 điểm cho độ tiện lợi!”</p><div class="who"><span class="avatar" style="background:var(--leaf)">TH</span><div><b>Diễn viên Thanh Huyền</b><small>Mẹ sau sinh</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Bé nhà mình da nhạy cảm nên mình rất ngại dùng dầu gió thông thường vì sợ cay rát. Loại tinh dầu này của Home Care mùi thơm sả chanh tía tô rất dễ chịu, độ ấm dịu nhẹ. Mỗi lần tắm xong xịt chút xíu xoa lưng và lòng bàn chân cho con là yên tâm con không bị nhiễm lạnh.”</p><div class="who"><span class="avatar" style="background:#e9a3b8">CN</span><div><b>Nhà Thiết kế Cao Ngọc</b><small>Mẹ bỉm sữa</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Trộm vía dùng thích lắm các mom ạ! Sinh xong người mệt với sợ lạnh, may có em xịt giữ ấm này cứu cánh. Tắm xong cho bé xịt chút vào lòng bàn chân bé, còn mẹ thì xịt massage lưng với cổ vai gáy là thấy dịu hẳn. Chai 30ml dạng xịt dùng tiện, không bị dính tay như mấy loại dầu xoa thông thường. Mùi gừng sả thơm tự nhiên, ấm dịu nhẹ. Recomment cho các mom dùng thử nha!”</p><div class="who"><span class="avatar" style="background:var(--leaf-btn)">TT</span><div><b>Ca sĩ Thu Thảo</b><small>Mẹ ở cữ</small></div></div></div>
      <div class="review reveal"><span class="stars">★★★★★</span><p class="lx_wow_item">“Chai 30ml nhỏ gọn xinh xắn, để trong túi xách mang đi làm hay đi du lịch đều tiện. Mẹ mình bị đau mỏi vai gáy xịt xoa bóp cũng khen êm và thư giãn lắm. Sẽ ủng hộ Home Care dài dài!”</p><div class="who"><span class="avatar" style="background:var(--amber-dark)">KC</span><div><b>MC Khánh Chi</b><small>Truyền hình</small></div></div></div>
    </div>
    <div class="fb-grid">
      <div class="reveal">
        <?php echo lx_render_image_slot('lx_img_feedback1', 'feedback1', 'ẢNH 13: Ảnh feedback tin nhắn thật #1', 'Tin nhắn Zalo/Messenger · 600×800px (3:4)', '', 'aspect-ratio:3/4;'); ?>
      </div>
      <div class="reveal">
        <?php echo lx_render_image_slot('lx_img_feedback2', 'feedback2', 'ẢNH 14: Ảnh feedback tin nhắn thật #2', '600×800px (3:4)', '', 'aspect-ratio:3/4;'); ?>
      </div>
      <div class="reveal">
        <?php echo lx_render_image_slot('lx_img_feedback3', 'feedback3', 'ẢNH 15: Ảnh feedback tin nhắn thật #3', '600×800px (3:4)', '', 'aspect-ratio:3/4;'); ?>
      </div>
    </div>
    <div class="img-row reveal">
      <?php echo lx_render_image_slot('lx_img_service', 'service', 'ẢNH 16: Ảnh chuyên viên Home Care chăm sóc mẹ và bé', '1200×675px (16:9)', '', 'aspect-ratio:16/9;'); ?>
    </div>
    <div class="trust-box">
      <div class="reveal"><?php echo $trust1; ?></div>
      <div class="reveal"><?php echo $trust2; ?></div>
    </div>
    <div class="center" style="margin-top:30px"><a href="#dat-hang" class="btn btn-buy" data-cta><?php echo esc_html($cta_text); ?></a></div>
  </div>
</section>
