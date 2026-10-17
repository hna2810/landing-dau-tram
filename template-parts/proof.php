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

// 5 Reviews loaded dynamically from ACF
$reviews = array();
$default_reviews = array(
    1 => array('name' => 'Đạo diễn Thanh Hằng', 'role' => 'Khách hàng thân thiết Home Care', 'avatar' => 'TH', 'quote' => 'Bé nhà mình da nhạy cảm nên tìm sản phẩm giữ ấm thuần chay như này rất yên tâm. Dung tích 30ml dạng xịt tiện lợi, mang đi đâu cũng tiện. Mùa gió về xịt chút vào lòng bàn chân rồi đi tất cho con là yên tâm bé ngủ ngon cả đêm, không lo lạnh bụng hay giật mình.'),
    2 => array('name' => 'Diễn viên Thanh Huyền', 'role' => 'Mẹ sau sinh', 'avatar' => 'TH', 'quote' => 'Đúng là chân ái cho các mẹ ở cữ mùa này luôn ạ. Em mới sinh xong mệt mỏi mà sợ gió khủng khiếp. Từ hôm dùng chai xịt Khí Hàn Sinh Khương này thấy đỡ hẳn. Tia xịt ra mịn lắm, massage chút là ngấm, người ấm lên nhanh mà không bị rát da. Thích nhất là cái mùi thảo mộc dịu nhẹ, không bị nồng hắc ảnh hưởng tới bé. 10 điểm cho độ tiện lợi!'),
    3 => array('name' => 'Nhà Thiết kế Cao Ngọc', 'role' => 'Mẹ bỉm sữa', 'avatar' => 'CN', 'quote' => 'Bé nhà mình da nhạy cảm nên mình rất ngại dùng dầu gió thông thường vì sợ cay rát. Loại tinh dầu này của Home Care mùi thơm sả chanh tía tô rất dễ chịu, độ ấm dịu nhẹ. Mỗi lần tắm xong xịt chút xíu xoa lưng và lòng bàn chân cho con là yên tâm con không bị nhiễm lạnh.'),
    4 => array('name' => 'Ca sĩ Thu Thảo', 'role' => 'Mẹ ở cữ', 'avatar' => 'TT', 'quote' => 'Trộm vía dùng thích lắm các mom ạ! Sinh xong người mệt với sợ lạnh, may có em xịt giữ ấm này cứu cánh. Tắm xong cho bé xịt chút vào lòng bàn chân bé, còn mẹ thì xịt massage lưng với cổ vai gáy là thấy dịu hẳn. Chai 30ml dạng xịt dùng tiện, không bị dính tay như mấy loại dầu xoa thông thường. Mùi gừng sả thơm tự nhiên, ấm dịu nhẹ. Recomment cho các mom dùng thử nha!'),
    5 => array('name' => 'MC Khánh Chi', 'role' => 'Truyền hình', 'avatar' => 'KC', 'quote' => 'Chai 30ml nhỏ gọn xinh xắn, để trong túi xách mang đi làm hay đi du lịch đều tiện. Mẹ mình bị đau mỏi vai gáy xịt xoa bóp cũng khen êm và thư giãn lắm. Sẽ ủng hộ Home Care dài dài!'),
);

for ($i = 1; $i <= 5; $i++) {
    $rev_name   = lx_get_field('lx_rev' . $i . '_name', 'option', isset($default_reviews[$i]) ? $default_reviews[$i]['name'] : '');
    $rev_role   = lx_get_field('lx_rev' . $i . '_role', 'option', isset($default_reviews[$i]) ? $default_reviews[$i]['role'] : '');
    $rev_quote  = lx_get_field('lx_rev' . $i . '_quote', 'option', isset($default_reviews[$i]) ? $default_reviews[$i]['quote'] : '');
    $rev_avatar = lx_get_field('lx_rev' . $i . '_avatar', 'option', isset($default_reviews[$i]) ? $default_reviews[$i]['avatar'] : 'TH');

    if (!empty($rev_name) || !empty($rev_quote)) {
        $reviews[] = array(
            'name'   => $rev_name,
            'role'   => $rev_role,
            'quote'  => $rev_quote,
            'avatar' => !empty($rev_avatar) ? $rev_avatar : (!empty($rev_name) ? mb_substr($rev_name, 0, 2) : 'HC'),
        );
    }
}

$has_stat1 = (!empty($stat1_num) || !empty($stat1_lbl));
$has_stat2 = (!empty($stat2_num) || !empty($stat2_lbl));
$has_stat3 = (!empty($stat3_num) || !empty($stat3_lbl));
$has_stats = ($has_stat1 || $has_stat2 || $has_stat3);

$slot_fb1 = lx_render_image_slot('lx_img_feedback1', 'feedback1', 'ẢNH 13: Ảnh feedback tin nhắn thật #1', 'Tin nhắn Zalo/Messenger · 600×800px (3:4)', '', 'aspect-ratio:3/4;');
$slot_fb2 = lx_render_image_slot('lx_img_feedback2', 'feedback2', 'ẢNH 14: Ảnh feedback tin nhắn thật #2', '600×800px (3:4)', '', 'aspect-ratio:3/4;');
$slot_fb3 = lx_render_image_slot('lx_img_feedback3', 'feedback3', 'ẢNH 15: Ảnh feedback tin nhắn thật #3', '600×800px (3:4)', '', 'aspect-ratio:3/4;');
$has_fbs  = (!empty($slot_fb1) || !empty($slot_fb2) || !empty($slot_fb3));

$slot_service = lx_render_image_slot('lx_img_service', 'service', 'ẢNH 16: Ảnh chuyên viên Home Care chăm sóc mẹ và bé', '1200×675px (16:9)', '', 'aspect-ratio:16/9;');
$has_trusts   = (!empty($trust1) || !empty($trust2));

if (empty($title) && empty($subtitle) && !$has_stats && empty($reviews) && !$has_fbs && empty($slot_service) && !$has_trusts) {
    return;
}
?>
<section class="proof wave">
  <div class="container">
    <?php if (!empty($title)) : ?>
      <div class="center">
        <h2 class="reveal lx_wow_item"><?php echo $title; ?></h2>
      </div>
    <?php endif; ?>

    <?php if (!empty($subtitle)) : ?>
      <h3 class="center reveal lx_wow_item" style="margin-top:28px;font-size:20px"><?php echo esc_html($subtitle); ?></h3>
    <?php endif; ?>

    <?php if ($has_stats) : ?>
      <div class="stats">
        <?php if ($has_stat1) : ?>
          <div class="stat reveal">
            <div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat1_num)); ?>">0</span>+</div>
            <?php if (!empty($stat1_lbl)) : ?><div class="lbl"><?php echo esc_html($stat1_lbl); ?></div><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($has_stat2) : ?>
          <div class="stat reveal">
            <div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat2_num)); ?>">0</span>%</div>
            <div class="stars">★★★★★</div>
            <?php if (!empty($stat2_lbl)) : ?><div class="lbl"><?php echo esc_html($stat2_lbl); ?></div><?php endif; ?>
          </div>
        <?php endif; ?>

        <?php if ($has_stat3) : ?>
          <div class="stat reveal">
            <div class="num"><span data-count="<?php echo esc_attr(preg_replace('/[^0-9]/', '', $stat3_num)); ?>">0</span>%</div>
            <?php if (!empty($stat3_lbl)) : ?><div class="lbl"><?php echo esc_html($stat3_lbl); ?></div><?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($reviews)) : ?>
      <div class="reviews">
        <?php foreach ($reviews as $rev) : ?>
          <div class="review reveal">
            <span class="stars">★★★★★</span>
            <p class="lx_wow_item">“<?php echo esc_html($rev['quote']); ?>”</p>
            <div class="who">
              <span class="avatar"><?php echo esc_html($rev['avatar']); ?></span>
              <div>
                <b><?php echo esc_html($rev['name']); ?></b>
                <?php if (!empty($rev['role'])) : ?><small><?php echo esc_html($rev['role']); ?></small><?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <?php if ($has_fbs) : ?>
      <div class="fb-grid">
        <?php if (!empty($slot_fb1)) : ?><div class="reveal"><?php echo $slot_fb1; ?></div><?php endif; ?>
        <?php if (!empty($slot_fb2)) : ?><div class="reveal"><?php echo $slot_fb2; ?></div><?php endif; ?>
        <?php if (!empty($slot_fb3)) : ?><div class="reveal"><?php echo $slot_fb3; ?></div><?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($slot_service)) : ?>
      <div class="img-row reveal">
        <?php echo $slot_service; ?>
      </div>
    <?php endif; ?>

    <?php if ($has_trusts) : ?>
      <div class="trust-box">
        <?php if (!empty($trust1)) : ?><div class="reveal"><?php echo $trust1; ?></div><?php endif; ?>
        <?php if (!empty($trust2)) : ?><div class="reveal"><?php echo $trust2; ?></div><?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($cta_text)) : ?>
      <div class="center" style="margin-top:30px"><a href="#dat-hang" class="btn btn-buy" data-cta><?php echo esc_html($cta_text); ?></a></div>
    <?php endif; ?>
  </div>
</section>
