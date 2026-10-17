<?php
/**
 * Auto-sync Khí Hàn Sinh Khương content into WordPress options & ACF
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

function lx_sync_khi_han_sinh_khuong_content() {
    $synced_ver = get_option('lx_content_sync_version', '');
    if ($synced_ver === '2.5.0') {
        return;
    }

    $data = array(
        // General
        'lx_hotline'      => '0962131515',
        'lx_zalo'         => '0962131515',
        'lx_unit_price'   => 49000,
        'lx_old_price'    => 87000,
        'lx_topbar_text'  => 'FLASH SALE chỉ <b>49.000đ</b> (niêm yết 87.000đ) · <b>FREESHIP TOÀN QUỐC</b>',
        'lx_nav_cta_text' => 'Mua ngay 49K',

        // Hero
        'lx_hero_title'           => 'Mẹ bầu, mẹ ở cữ sợ lạnh, bé dễ nhiễm cảm?',
        'lx_hero_subtitle'        => 'Giữ ấm cơ thể với tinh dầu thảo mộc thuần chay Home Care',
        'lx_hero_desc'            => 'Sự kết hợp tinh túy giữa <b>Gừng tươi, Tía tô, Rau mùi &amp; Sả chanh</b> trong thiết kế dạng xịt thông minh giúp làm ấm cơ thể, giải tỏa mệt mỏi vùng cổ vai gáy, xua tan nỗi lo cảm lạnh mùa đông hay phòng điều hòa mà không lo cay rát da.',
        'lx_hero_countdown_title' => 'Flash sale kết thúc sau:',
        'lx_hero_cta_text'        => 'FREESHIP TOÀN QUỐC - MUA NGAY!',
        'lx_hero_note'            => '👉 Được dùng trong các liệu trình chăm sóc mẹ &amp; bé tại nhà, tại trung tâm ở cữ của <b>Home Care</b>.',
        'lx_hero_badge_percent'   => '-44%',
        'lx_hero_chip1'           => 'Chiết xuất thuần chay',
        'lx_hero_chip2'           => 'Dạng xịt tiện lợi',
        'lx_hero_chip3'           => 'An tâm cho mẹ & bé',

        // Pain
        'lx_pain_question'    => 'Mẹ có đang lặp lại những mối lo này mỗi ngày?',
        'lx_pain_lead'        => 'Khí lạnh không chỉ làm cơ thể khó chịu, mà còn lặng lẽ bào mòn sức khỏe của cả mẹ và bé nếu không được chăm sóc đúng cách.',
        'lx_pain_card1_title' => 'Mẹ ở cữ & Sau sinh',
        'lx_pain_card1_desc'  => 'Cơ thể suy giảm sức đề kháng, mồ hôi trộm ra nhiều gặp gió là nhiễm lạnh, tay chân lạnh ngắt, dễ đau mỏi cổ vai gáy?',
        'lx_pain_card2_title' => 'Trẻ sơ sinh & Trẻ nhỏ',
        'lx_pain_card2_desc'  => 'Làn da nhạy cảm, dễ bị nhiễm lạnh mỗi khi tắm xong, hay giật mình, khó ngủ khi thời tiết chuyển mùa?',
        'lx_pain_card3_title' => 'Bất tiện từ các phương pháp dân gian cũ',
        'lx_pain_card3_desc'  => 'Cốt gừng tự ngâm hay các loại dầu xoa dạng chai đổ thường dễ làm bẩn quần áo, dính bết bàn tay, bất tiện khi muốn mang theo ra ngoài.',
        'lx_pain_bridge'      => 'Đã có Khí Hàn Sinh Khương Home Care – Giữ ấm dịu lành cho mẹ và bé',

        // Benefits
        'lx_benefits_title' => 'Giữ ấm dịu nhẹ, <em>bảo vệ sức khỏe</em> cho cả gia đình',
        'lx_benefits_lead'  => 'Khí Hàn Sinh Khương Home Care mang đến trải nghiệm giữ ấm hoàn toàn mới: Nhẹ nhàng – Tinh tế – Tiện lợi.',
        'lx_ben1_title'     => 'Giữ ấm cơ thể &amp; Đẩy khí lạnh',
        'lx_ben1_desc'      => 'Giúp cơ thể bé luôn ấm áp, hỗ trợ đẩy khí hàn, đặc biệt thích hợp dùng khi thời tiết se lạnh, giao mùa hoặc sau khi tắm.',
        'lx_ben2_title'     => 'Thiết kế dạng xịt 30ml thông minh',
        'lx_ben2_desc'      => 'Tiện lợi, không dính tay, dễ định lượng dùng, dễ dàng bỏ túi xách mang đi bất cứ đâu.',
        'lx_ben3_title'     => 'Ấm dịu vừa đủ – Không gây rát da',
        'lx_ben3_desc'      => 'Chiết xuất gừng tự nhiên tạo độ ấm dễ chịu, an lành, dịu nhẹ cho làn da nhạy cảm.',
        'lx_ben4_title'     => 'Hương thơm thảo mộc thư giãn',
        'lx_ben4_desc'      => 'Mùi hương tự nhiên từ sả chanh, rau mùi và tía tô giúp giải tỏa căng thẳng, mang lại cảm giác thư thái như đi spa.',
        'lx_benefits_foot'  => 'Thoa và massage nhẹ nhàng giúp mẹ và bé thư giãn, giảm căng thẳng và ngủ sâu giấc hơn.',

        // Ingredients
        'lx_ing_title'  => 'Bảng thành phần tự nhiên – <em>Công thức thảo mộc thuần chay độc quyền</em>',
        'lx_ing1_name'  => 'Chiết xuất rễ Gừng',
        'lx_ing1_latin' => 'Zingiber Officinale Root Extract',
        'lx_ing1_desc'  => 'Mang tính ấm tự nhiên, giúp thúc đẩy tuần hoàn máu dưới da, giữ ấm lòng bàn chân, lưng và ngực, đẩy tan hàn khí tích tụ.',
        'lx_ing2_name'  => 'Tinh dầu Lá tía tô',
        'lx_ing2_latin' => 'Perilla Frutescens Leaf Oil',
        'lx_ing2_desc'  => 'Giúp làm dịu làn da, hỗ trợ giữ ấm cơ thể nhẹ nhàng, bảo vệ mẹ và bé trước các tác nhân gió lạnh bên ngoài.',
        'lx_ing3_name'  => 'Tinh dầu Rau mùi',
        'lx_ing3_latin' => 'Coriandrum Sativum Herb Oil',
        'lx_ing3_desc'  => 'Mang lại hương thơm thảo mộc đặc trưng, giúp thư giãn tinh thần, tạo sự dễ chịu, thoải mái cho mẹ và bé.',
        'lx_ing4_name'  => 'Tinh dầu Sả chanh',
        'lx_ing4_latin' => 'Cymbopogon Citratus Leaf Oil',
        'lx_ing4_desc'  => 'Hương thơm tươi mát, xua tan căng thẳng, hỗ trợ giữ ấm và làm mềm da.',

        // Usage
        'lx_usage_title'       => '2 Bước đơn giản để <em>cơ thể luôn ấm áp &amp; thư giãn</em>',
        'lx_usage_subtitle'    => 'Chăm sóc nhanh chóng, tiện lợi với thiết kế dạng xịt thông minh',
        'lx_usage_step1_title' => 'Xịt tinh dầu lên vùng cần giữ ấm',
        'lx_usage_step1_desc'  => 'Xịt một lượng vừa đủ lên các vùng cơ thể cần giữ ấm: cổ, vai, gáy, lưng, ngực hoặc lòng bàn chân.',
        'lx_usage_step2_title' => 'Massage nhẹ nhàng 1–2 phút',
        'lx_usage_step2_desc'  => 'Massage nhẹ nhàng trong 1–2 phút để tinh dầu thẩm thấu sâu.',
        'lx_usage_tip'         => '<b>💡 Mẹo nhỏ:</b> Sử dụng trước và sau khi tắm cho bé, hoặc kết hợp massage nhẹ nhàng để nhân đôi hiệu quả giữ ấm.',
        'lx_usage_warn'        => '<b>👉 Lưu ý:</b> Nên xịt một lượng nhỏ ra tay trước khi dùng cho trẻ sơ sinh. Tránh xịt trực tiếp lên vùng mặt, gần mắt, mũi hoặc vết thương hở.',

        // Proof
        'lx_proof_title'    => 'Hàng ngàn mẹ tin dùng &amp; đồng hành cùng <em>tinh dầu giữ ấm thảo mộc thuần chay Home Care</em>',
        'lx_proof_subtitle' => 'Đánh giá chân thực từ khách hàng',
        'lx_stat1_num'      => '10000',
        'lx_stat1_lbl'      => 'Chai Khí Hàn Sinh Khương đã gửi tới các gia đình toàn quốc',
        'lx_stat2_num'      => '98',
        'lx_stat2_lbl'      => 'Mẹ bỉm hài lòng với độ ấm dịu nhẹ & khả năng thẩm thấu nhanh',
        'lx_stat3_num'      => '95',
        'lx_stat3_lbl'      => 'Đánh giá cao thiết kế dạng xịt 30ml nhỏ gọn, tiện lợi',
        'lx_trust_box1'     => '<b>👉 Dùng trong liệu trình chuyên nghiệp:</b> Khí Hàn Sinh Khương Home Care là sản phẩm được các chuyên viên chăm sóc mẹ và bé của Home Care sử dụng trực tiếp trong các liệu trình massage tắm bé và tắm xông hơi cho mẹ tại nhà, tại trung tâm ở cữ.',
        'lx_trust_box2'     => '<b>👉 Phù hợp cho cả gia đình:</b> An lành cho trẻ sơ sinh, trẻ nhỏ, mẹ bầu và mẹ sau sinh trong thời gian ở cữ.',
        'lx_proof_cta_text' => 'Đặt mua ngay – chỉ 49.000đ',

        // Standards & Specs
        'lx_standards_title'   => 'An tâm tự hào với <em>tiêu chuẩn chất lượng mẹ &amp; bé</em>',
        'lx_spec_product_name' => 'Khí Hàn Sinh Khương Hoàng Cung',
        'lx_spec_cbmp'         => '81/26/CBMP-NB',
        'lx_spec_brand'        => 'Home Care – Đơn vị đồng hành cùng hàng nghìn mẹ bầu & sau sinh trên khắp 3 miền Bắc - Trung - Nam',
        'lx_spec_design'       => 'Dạng chai xịt tiện lợi, dễ dàng mang theo mọi nơi',
        'lx_spec_commitment'   => 'Nguồn gốc thảo mộc thuần chay, có tem chống hàng giả, kiểm định rõ ràng',

        // Order
        'lx_order_title'        => 'Cho con cơ thể ấm – <em>Cho mẹ giấc ngủ ngon</em>',
        'lx_order_lead'         => 'Đừng để khí lạnh làm ảnh hưởng sức khỏe mẹ và bé! Đặt mua Khí Hàn Sinh Khương ngay!',
        'lx_order_badge'        => 'ƯU ĐÃI ĐẶC BIỆT DÀNH TẶNG MẸ TRONG HÔM NAY',
        'lx_order_product_name' => 'Khí Hàn Sinh Khương Hoàng Cung 30ml',
        'lx_order_stock_left'   => '15',
        'lx_order_bullet1'      => 'Chai 30ml tiện lợi – Dùng tiết kiệm cho cả gia đình!',
        'lx_order_bullet2'      => 'Miễn phí vận chuyển toàn quốc (Freeship)',
        'lx_order_bullet3'      => 'Kiểm tra hàng trước khi thanh toán',
        'lx_order_bullet4'      => 'Tư vấn miễn phí & Đồng hành cùng mẹ trong suốt quá trình sử dụng',
        'lx_order_cta_text'     => 'MUA NGAY 49K – FREESHIP',

        // Reviews
        'lx_rev1_name'   => 'Đạo diễn Thanh Hằng',
        'lx_rev1_role'   => 'Khách hàng thân thiết Home Care',
        'lx_rev1_quote'  => 'Bé nhà mình da nhạy cảm nên tìm sản phẩm giữ ấm thuần chay như này rất yên tâm. Dung tích 30ml dạng xịt tiện lợi, mang đi đâu cũng tiện. Mùa gió về xịt chút vào lòng bàn chân rồi đi tất cho con là yên tâm bé ngủ ngon cả đêm, không lo lạnh bụng hay giật mình.',
        'lx_rev1_avatar' => 'TH',

        'lx_rev2_name'   => 'Diễn viên Thanh Huyền',
        'lx_rev2_role'   => 'Mẹ sau sinh',
        'lx_rev2_quote'  => 'Đúng là chân ái cho các mẹ ở cữ mùa này luôn ạ. Em mới sinh xong mệt mỏi mà sợ gió khủng khiếp. Từ hôm dùng chai xịt Khí Hàn Sinh Khương này thấy đỡ hẳn. Tia xịt ra mịn lắm, massage chút là ngấm, người ấm lên nhanh mà không bị rát da. Thích nhất là cái mùi thảo mộc dịu nhẹ, không bị nồng hắc ảnh hưởng tới bé. 10 điểm cho độ tiện lợi!',
        'lx_rev2_avatar' => 'TH',

        'lx_rev3_name'   => 'Nhà Thiết kế Cao Ngọc',
        'lx_rev3_role'   => 'Mẹ bỉm sữa',
        'lx_rev3_quote'  => 'Bé nhà mình da nhạy cảm nên mình rất ngại dùng dầu gió thông thường vì sợ cay rát. Loại tinh dầu này của Home Care mùi thơm sả chanh tía tô rất dễ chịu, độ ấm dịu nhẹ. Mỗi lần tắm xong xịt chút xíu xoa lưng và lòng bàn chân cho con là yên tâm con không bị nhiễm lạnh.',
        'lx_rev3_avatar' => 'CN',

        'lx_rev4_name'   => 'Ca sĩ Thu Thảo',
        'lx_rev4_role'   => 'Mẹ ở cữ',
        'lx_rev4_quote'  => 'Trộm vía dùng thích lắm các mom ạ! Sinh xong người mệt với sợ lạnh, may có em xịt giữ ấm này cứu cánh. Tắm xong cho bé xịt chút vào lòng bàn chân bé, còn mẹ thì xịt massage lưng với cổ vai gáy là thấy dịu hẳn. Chai 30ml dạng xịt dùng tiện, không bị dính tay như mấy loại dầu xoa thông thường. Mùi gừng sả thơm tự nhiên, ấm dịu nhẹ. Recomment cho các mom dùng thử nha!',
        'lx_rev4_avatar' => 'TT',

        'lx_rev5_name'   => 'MC Khánh Chi',
        'lx_rev5_role'   => 'Truyền hình',
        'lx_rev5_quote'  => 'Chai 30ml nhỏ gọn xinh xắn, để trong túi xách mang đi làm hay đi du lịch đều tiện. Mẹ mình bị đau mỏi vai gáy xịt xoa bóp cũng khen êm và thư giãn lắm. Sẽ ủng hộ Home Care dài dài!',
        'lx_rev5_avatar' => 'KC',

        // Footer
        'lx_footer_title'            => 'Home Care – Chăm Sóc Mẹ & Bé Tại Nhà',
        'lx_footer_website_url'      => 'https://homecarevietnam.com',
        'lx_footer_website_label'    => 'homecarevietnam.com',
        'lx_footer_hotline1'         => '0973871376',
        'lx_footer_hotline1_display' => '0973.871.376',
        'lx_footer_hotline2'         => '0962131515',
        'lx_footer_hotline2_display' => '0962.131.515',
        'lx_footer_company'          => 'CÔNG TY TNHH CHĂM SÓC MẸ VÀ BÉ TẠI NHÀ HOME CARE',
        'lx_footer_address'          => 'Địa chỉ: 20 Huy Du, Phường Từ Liêm, TP Hà Nội, Việt Nam.',
        'lx_footer_tax'              => 'Mã số doanh nghiệp: 0107375668 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 29/03/2016',
        'lx_footer_copyright'        => '© 2026 Home Care. All rights reserved.',
    );

    foreach ($data as $key => $val) {
        // Only set if not already defined in options table (never overwrite user edits or cleared fields)
        if (get_option('options_' . $key, '__LX_NOT_EXISTS__') === '__LX_NOT_EXISTS__') {
            update_option('options_' . $key, $val);
        }
        if (get_option($key, '__LX_NOT_EXISTS__') === '__LX_NOT_EXISTS__') {
            update_option($key, $val);
        }
    }

    // Force update footer copyright to 2026 standard if using the old default
    $cur_copy = get_option('options_lx_footer_copyright', '');
    if (empty($cur_copy) || strpos($cur_copy, 'Chăm sóc mẹ') !== false) {
        update_option('options_lx_footer_copyright', '© 2026 Home Care. All rights reserved.');
        update_option('lx_footer_copyright', '© 2026 Home Care. All rights reserved.');
    }

    // Ensure hero title has <em> emphasis tags
    $cur_hero = get_option('options_lx_hero_title', '');
    if (strpos($cur_hero, '<em>') === false && (strpos($cur_hero, 'sợ lạnh') !== false || strpos($cur_hero, 'nhiễm cảm') !== false)) {
        update_option('options_lx_hero_title', 'Mẹ ở cữ <em>sợ lạnh</em>, bé dễ <em>nhiễm cảm</em>?');
        update_option('lx_hero_title', 'Mẹ ở cữ <em>sợ lạnh</em>, bé dễ <em>nhiễm cảm</em>?');
    }

    // Ensure form submit CTA text is updated
    $cur_cta = get_option('options_lx_order_cta_text', '');
    if (empty($cur_cta) || strpos($cur_cta, 'GỬI NGAY') !== false) {
        update_option('options_lx_order_cta_text', 'MUA NGAY 49K – FREESHIP');
        update_option('lx_order_cta_text', 'MUA NGAY 49K – FREESHIP');
    }

    // Ensure usage tip doesn't mention tinh dầu tràm
    $cur_tip = get_option('options_lx_usage_tip', '');
    if (strpos($cur_tip, 'tinh dầu tràm') !== false) {
        $new_tip = str_replace('kết hợp cùng tinh dầu tràm', 'kết hợp massage nhẹ nhàng', $cur_tip);
        $new_tip = str_replace('tinh dầu tràm', 'tinh dầu giữ ấm', $new_tip);
        update_option('options_lx_usage_tip', $new_tip);
        update_option('lx_usage_tip', $new_tip);
    }

    // Clean order lead (remove 'của con.')
    $cur_lead = get_option('options_lx_order_lead', '');
    if (strpos($cur_lead, 'của con') !== false) {
        $new_lead = trim(str_replace(array('của con.', 'của con'), '', $cur_lead));
        $new_lead = preg_replace('/\s+/', ' ', $new_lead);
        update_option('options_lx_order_lead', $new_lead);
        update_option('lx_order_lead', $new_lead);
    }

    // Clear order product desc
    update_option('options_lx_order_product_desc', '');
    update_option('lx_order_product_desc', '');

    // Clean up CF7 forms in database (remove form-foot)
    $forms = get_posts(array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1));
    if (!empty($forms)) {
        foreach ($forms as $f) {
            $c = $f->post_content;
            if (strpos($c, 'form-foot') !== false || strpos($c, 'Tư vấn miễn phí') !== false) {
                $c = preg_replace('/<p class="form-foot">.*?<\/p>/s', '', $c);
                wp_update_post(array('ID' => $f->ID, 'post_content' => $c));
                update_post_meta($f->ID, '_form', $c);
            }
        }
    }

    // Ensure hero video url option default
    if (get_option('options_lx_hero_video_url', '__LX_NOT_EXISTS__') === '__LX_NOT_EXISTS__') {
        update_option('options_lx_hero_video_url', 'https://www.youtube.com/shorts/4kOgpS5Yq5g');
        update_option('lx_hero_video_url', 'https://www.youtube.com/shorts/4kOgpS5Yq5g');
    }

    update_option('lx_content_sync_version', '2.7.0');
}
add_action('init', 'lx_sync_khi_han_sinh_khuong_content');
