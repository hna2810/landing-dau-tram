<?php
/**
 * ACF Options Page and Fields for Landing Tinh Dầu Tràm
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1. Đăng ký trang cài đặt Theme Options trong WP Admin
 */
function lx_register_theme_options_page() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => __('Cài đặt Landing Tinh Dầu Tràm', 'lx-landing'),
            'menu_title' => __('Cài đặt Landing Page', 'lx-landing'),
            'menu_slug'  => 'lx-landing-settings',
            'capability' => 'manage_options',
            'position'   => 59,
            'icon_url'   => 'dashicons-tagcloud',
            'redirect'   => false,
        ));
    }
}
add_action('acf/init', 'lx_register_theme_options_page');

/**
 * 2. Đăng ký nhóm trường ACF Local Field Group phân theo từng Section
 */
function lx_register_acf_field_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_lx_landing_tinh_dau_tram',
        'title' => __('Nội dung Landing Page Tinh Dầu Tràm', 'lx-landing'),
        'fields' => array(
            // ══════════════════════════════════════════════════════════════════
            // TAB 1: CẤU HÌNH CHUNG & GIÁ BÁN
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_general',
                'label' => __('Cấu hình chung & Giá bán', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_hotline',
                'label' => __('Số điện thoại Hotline', 'lx-landing'),
                'name' => 'lx_hotline',
                'type' => 'text',
                'default_value' => '0989890779',
            ),
            array(
                'key' => 'field_lx_zalo',
                'label' => __('Số điện thoại / Link Zalo', 'lx-landing'),
                'name' => 'lx_zalo',
                'type' => 'text',
                'default_value' => '0989890779',
            ),
            array(
                'key' => 'field_lx_unit_price',
                'label' => __('Giá khuyến mãi Flash Sale (VNĐ)', 'lx-landing'),
                'name' => 'lx_unit_price',
                'type' => 'number',
                'default_value' => 49000,
            ),
            array(
                'key' => 'field_lx_old_price',
                'label' => __('Giá niêm yết gốc (VNĐ)', 'lx-landing'),
                'name' => 'lx_old_price',
                'type' => 'number',
                'default_value' => 87000,
            ),
            array(
                'key' => 'field_lx_sheet_endpoint',
                'label' => __('Google Sheet Webhook URL', 'lx-landing'),
                'name' => 'lx_sheet_endpoint',
                'type' => 'url',
                'default_value' => 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec',
            ),
            array(
                'key' => 'field_lx_show_placeholders',
                'label' => __('Hiển thị khung hướng dẫn vị trí ảnh', 'lx-landing'),
                'name' => 'lx_show_placeholders',
                'type' => 'true_false',
                'ui' => 1,
                'default_value' => 1,
                'instructions' => __('Bật khi đang dàn trang/chờ ảnh thật. Tắt khi đã gắn đầy đủ ảnh.', 'lx-landing'),
            ),
            array(
                'key' => 'field_lx_cf7_shortcode',
                'label' => __('Mã shortcode Contact Form 7 tùy chỉnh', 'lx-landing'),
                'name' => 'lx_cf7_shortcode',
                'type' => 'text',
                'placeholder' => '[contact-form-7 id="5" title="..."]',
                'instructions' => __('Để trống để sử dụng form chuẩn tự động của theme.', 'lx-landing'),
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 2: ĐẦU TRANG & HERO (Bao gồm ẢNH 1)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_hero',
                'label' => __('Đầu trang & Hero', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_topbar_text',
                'label' => __('Nội dung thanh Topbar', 'lx-landing'),
                'name' => 'lx_topbar_text',
                'type' => 'text',
                'default_value' => 'FLASH SALE chỉ <b>49.000đ</b> (niêm yết 87.000đ) · <b>FREESHIP TOÀN QUỐC</b>',
            ),
            array(
                'key' => 'field_lx_nav_cta_text',
                'label' => __('Chữ nút CTA Header', 'lx-landing'),
                'name' => 'lx_nav_cta_text',
                'type' => 'text',
                'default_value' => 'Mua ngay 49K',
            ),
            array(
                'key' => 'field_lx_hero_title',
                'label' => __('Tiêu đề chính H1 Hero', 'lx-landing'),
                'name' => 'lx_hero_title',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giữ ấm lồng ngực,<br><span>ngủ ngon trọn đêm</span>',
            ),
            array(
                'key' => 'field_lx_hero_subtitle',
                'label' => __('Tiêu đề phụ Hero', 'lx-landing'),
                'name' => 'lx_hero_subtitle',
                'type' => 'text',
                'default_value' => 'Để con yêu không bị cơn ho, khò khè cản trở',
            ),
            array(
                'key' => 'field_lx_hero_desc',
                'label' => __('Đoạn văn mô tả Hero', 'lx-landing'),
                'name' => 'lx_hero_desc',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Tinh dầu tràm kết hợp <b>dầu bơ, ô liu và argan</b> – giải pháp dịu nhẹ giúp bảo vệ đường thở của bé mỗi khi thời tiết chuyển mùa hay đêm lạnh.',
            ),
            array(
                'key' => 'field_lx_hero_countdown_title',
                'label' => __('Tiêu đề đếm ngược Flash Sale', 'lx-landing'),
                'name' => 'lx_hero_countdown_title',
                'type' => 'text',
                'default_value' => 'Flash sale kết thúc sau:',
            ),
            array(
                'key' => 'field_lx_hero_cta_text',
                'label' => __('Chữ nút mua hàng Hero', 'lx-landing'),
                'name' => 'lx_hero_cta_text',
                'type' => 'text',
                'default_value' => 'Freeship toàn quốc – Mua ngay!',
            ),
            array(
                'key' => 'field_lx_hero_note',
                'label' => __('Ghi chú uy tín chân Hero', 'lx-landing'),
                'name' => 'lx_hero_note',
                'type' => 'text',
                'default_value' => 'Được dùng trong các liệu trình chăm sóc mẹ & bé tại nhà của <b>Home Care</b>.',
            ),
            array(
                'key' => 'field_lx_hero_badge_percent',
                'label' => __('Phần trăm giảm giá huy hiệu', 'lx-landing'),
                'name' => 'lx_hero_badge_percent',
                'type' => 'text',
                'default_value' => '-44%',
            ),
            array(
                'key' => 'field_lx_hero_chip1',
                'label' => __('Nhãn đặc điểm 1', 'lx-landing'),
                'name' => 'lx_hero_chip1',
                'type' => 'text',
                'default_value' => 'Tràm + Bơ + Ô liu + Argan',
            ),
            array(
                'key' => 'field_lx_hero_chip2',
                'label' => __('Nhãn đặc điểm 2', 'lx-landing'),
                'name' => 'lx_hero_chip2',
                'type' => 'text',
                'default_value' => 'Dịu nhẹ cho da bé',
            ),
            array(
                'key' => 'field_lx_hero_chip3',
                'label' => __('Nhãn đặc điểm 3', 'lx-landing'),
                'name' => 'lx_hero_chip3',
                'type' => 'text',
                'default_value' => 'Chai 30ml',
            ),
            array(
                'key' => 'field_lx_img_hero',
                'label' => __('📷 ẢNH 1: Ảnh sản phẩm chính – chai tinh dầu tràm (Tỉ lệ vuông 1:1, vd: 1000×1000px hoặc 1200×1200px)', 'lx-landing'),
                'name' => 'lx_img_hero',
                'type' => 'image',
                'return_format' => 'url',
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 3: NỖI LO CỦA MẸ (Bao gồm ẢNH 2, 3, 4, 5, 6)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_pain',
                'label' => __('Nỗi lo của mẹ', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_pain_question',
                'label' => __('Câu hỏi mở đầu', 'lx-landing'),
                'name' => 'lx_pain_question',
                'type' => 'text',
                'default_value' => '“Có phải mẹ đang loay hoay với những lo lắng này mỗi ngày?”',
            ),
            array(
                'key' => 'field_lx_pain_lead',
                'label' => __('Lời dẫn dắt nỗi lo', 'lx-landing'),
                'name' => 'lx_pain_lead',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Mỗi lần gió lạnh về hay điều kiện thời tiết thay đổi, sức đề kháng còn non nớt của con lại làm mẹ mất ăn mất ngủ:',
            ),
            array(
                'key' => 'field_lx_pain_card1_title',
                'label' => __('Nỗi lo 1 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_pain_card1_title',
                'type' => 'text',
                'default_value' => 'Con khò khè, trằn trọc cả đêm',
            ),
            array(
                'key' => 'field_lx_pain_card1_desc',
                'label' => __('Nỗi lo 1 - Mô tả', 'lx-landing'),
                'name' => 'lx_pain_card1_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Đêm lạnh khiến đường thở của bé dễ bị nghẹt, con quấy khóc, mẹ thức trắng đêm lo lắng.',
            ),
            array(
                'key' => 'field_lx_img_pain1',
                'label' => __('📷 ẢNH 2: Bé khò khè, trằn trọc ban đêm (600×600px)', 'lx-landing'),
                'name' => 'lx_img_pain1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_card2_title',
                'label' => __('Nỗi lo 2 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_pain_card2_title',
                'type' => 'text',
                'default_value' => 'Sợ con nhiễm lạnh sau khi tắm',
            ),
            array(
                'key' => 'field_lx_pain_card2_desc',
                'label' => __('Nỗi lo 2 - Mô tả', 'lx-landing'),
                'name' => 'lx_pain_card2_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Dù đã che chắn kỹ, bé vẫn dễ bị hắt hơi, sổ mũi do hạ nhiệt đột ngột.',
            ),
            array(
                'key' => 'field_lx_img_pain2',
                'label' => __('📷 ẢNH 3: Bé hắt hơi, sổ mũi sau khi tắm (600×600px)', 'lx-landing'),
                'name' => 'lx_img_pain2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_card3_title',
                'label' => __('Nỗi lo 3 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_pain_card3_title',
                'type' => 'text',
                'default_value' => 'Sợ tinh dầu tràm nóng rát',
            ),
            array(
                'key' => 'field_lx_pain_card3_desc',
                'label' => __('Nỗi lo 3 - Mô tả', 'lx-landing'),
                'name' => 'lx_pain_card3_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Mẹ muốn dùng tinh dầu giữ ấm nhưng lo ngại làn da trẻ sơ sinh mỏng manh bị kích ứng.',
            ),
            array(
                'key' => 'field_lx_img_pain3',
                'label' => __('📷 ẢNH 4: Mẹ ngần ngại khi cầm chai tinh dầu (600×600px)', 'lx-landing'),
                'name' => 'lx_img_pain3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_card4_title',
                'label' => __('Nỗi lo 4 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_pain_card4_title',
                'type' => 'text',
                'default_value' => 'Muỗi & côn trùng đốt',
            ),
            array(
                'key' => 'field_lx_pain_card4_desc',
                'label' => __('Nỗi lo 4 - Mô tả', 'lx-landing'),
                'name' => 'lx_pain_card4_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Vết muỗi cắn làm da bé đỏ ngứa, sưng tấy khiến con khó chịu, mất ngủ.',
            ),
            array(
                'key' => 'field_lx_img_pain4',
                'label' => __('📷 ẢNH 5: Vết muỗi đốt đỏ trên da bé (600×600px)', 'lx-landing'),
                'name' => 'lx_img_pain4',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_pain',
                'label' => __('📷 ẢNH 6: Ảnh cảm xúc: bé quấy khóc ban đêm, mẹ lo lắng bế con (1200×675px, 16:9)', 'lx-landing'),
                'name' => 'lx_img_pain',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_pain_bridge',
                'label' => __('Dòng cầu nối giải pháp', 'lx-landing'),
                'name' => 'lx_pain_bridge',
                'type' => 'text',
                'default_value' => 'Đã có giải pháp dịu nhẹ cho bé yêu',
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 4: CÔNG DỤNG & LỢI ÍCH (Bao gồm ẢNH 7, 8, 9, 10, 11)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_benefits',
                'label' => __('Công dụng & Lợi ích', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_benefits_title',
                'label' => __('Tiêu đề phần công dụng', 'lx-landing'),
                'name' => 'lx_benefits_title',
                'type' => 'text',
                'default_value' => 'Đồng hành cùng mẹ <em>chăm sóc và bảo vệ</em> bé yêu mỗi ngày',
            ),
            array(
                'key' => 'field_lx_benefits_lead',
                'label' => __('Lời dẫn công dụng', 'lx-landing'),
                'name' => 'lx_benefits_lead',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Sản phẩm được nghiên cứu công thức phù hợp cho làn da mỏng manh của bé, mang đến 4 công dụng thiết thực:',
            ),
            array(
                'key' => 'field_lx_ben1_title',
                'label' => __('Công dụng 1 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_ben1_title',
                'type' => 'text',
                'default_value' => 'Giữ ấm cơ thể & đẩy khí lạnh',
            ),
            array(
                'key' => 'field_lx_ben1_desc',
                'label' => __('Công dụng 1 - Mô tả', 'lx-landing'),
                'name' => 'lx_ben1_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giúp cơ thể bé luôn ấm áp, hỗ trợ đẩy khí hàn, đặc biệt thích hợp dùng khi thời tiết se lạnh, giao mùa hoặc sau khi tắm.',
            ),
            array(
                'key' => 'field_lx_img_ben1',
                'label' => __('📷 ẢNH 7: Bé ấm áp trong khăn sau khi tắm (800×600px, 4:3)', 'lx-landing'),
                'name' => 'lx_img_ben1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ben2_title',
                'label' => __('Công dụng 2 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_ben2_title',
                'type' => 'text',
                'default_value' => 'Thông thoáng đường thở',
            ),
            array(
                'key' => 'field_lx_ben2_desc',
                'label' => __('Công dụng 2 - Mô tả', 'lx-landing'),
                'name' => 'lx_ben2_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Hương thơm tự nhiên dễ chịu giúp thông thoáng cho đường thở, giảm tình trạng khò khè, cho bé ngủ sâu giấc hơn.',
            ),
            array(
                'key' => 'field_lx_img_ben2',
                'label' => __('📷 ẢNH 8: Bé ngủ say, thở êm (800×600px, 4:3)', 'lx-landing'),
                'name' => 'lx_img_ben2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ben3_title',
                'label' => __('Công dụng 3 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_ben3_title',
                'type' => 'text',
                'default_value' => 'Xoa dịu vết côn trùng cắn',
            ),
            array(
                'key' => 'field_lx_ben3_desc',
                'label' => __('Công dụng 3 - Mô tả', 'lx-landing'),
                'name' => 'lx_ben3_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giảm cảm giác ngứa ngáy, làm dịu vùng da sưng đỏ do muỗi hoặc côn trùng đốt.',
            ),
            array(
                'key' => 'field_lx_img_ben3',
                'label' => __('📷 ẢNH 9: Mẹ thoa dầu lên vết muỗi đốt (800×600px, 4:3)', 'lx-landing'),
                'name' => 'lx_img_ben3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ben4_title',
                'label' => __('Công dụng 4 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_ben4_title',
                'type' => 'text',
                'default_value' => 'Dưỡng ẩm & bảo vệ da',
            ),
            array(
                'key' => 'field_lx_ben4_desc',
                'label' => __('Công dụng 4 - Mô tả', 'lx-landing'),
                'name' => 'lx_ben4_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Sự có mặt của dầu bơ, ô liu và argan giúp làm mềm da, giảm độ gay gắt của tinh dầu tràm nguyên chất, phù hợp cho cả làn da trẻ sơ sinh.',
            ),
            array(
                'key' => 'field_lx_img_ben4',
                'label' => __('📷 ẢNH 10: Cận cảnh giọt dầu trên da bé (800×600px, 4:3)', 'lx-landing'),
                'name' => 'lx_img_ben4',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_benefits_foot',
                'label' => __('Ghi chú chân công dụng', 'lx-landing'),
                'name' => 'lx_benefits_foot',
                'type' => 'text',
                'default_value' => 'Thoa và massage nhẹ nhàng giúp bé thư giãn, giảm căng thẳng và ngủ sâu giấc hơn.',
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 5: THÀNH PHẦN & THIẾT KẾ (Bao gồm ẢNH 12, 13, 14, 15, 16, 17)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_ingredients',
                'label' => __('Thành phần & Thiết kế', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_ing_title',
                'label' => __('Tiêu đề phần thành phần', 'lx-landing'),
                'name' => 'lx_ing_title',
                'type' => 'text',
                'default_value' => 'Sự kết hợp <em>dịu nhẹ từ tự nhiên</em>',
            ),
            array(
                'key' => 'field_lx_ing1_name',
                'label' => __('Thành phần 1 - Tên', 'lx-landing'),
                'name' => 'lx_ing1_name',
                'type' => 'text',
                'default_value' => 'Tinh dầu tràm',
            ),
            array(
                'key' => 'field_lx_ing1_latin',
                'label' => __('Thành phần 1 - Tên khoa học', 'lx-landing'),
                'name' => 'lx_ing1_latin',
                'type' => 'text',
                'default_value' => 'Melaleuca Leucadendra Leaf Oil',
            ),
            array(
                'key' => 'field_lx_ing1_desc',
                'label' => __('Thành phần 1 - Công dụng', 'lx-landing'),
                'name' => 'lx_ing1_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giúp giữ ấm, xua tan khí lạnh và làm sạch không khí xung quanh bé.',
            ),
            array(
                'key' => 'field_lx_img_ing1',
                'label' => __('📷 ẢNH 12: Lá tràm (400×400px)', 'lx-landing'),
                'name' => 'lx_img_ing1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing2_name',
                'label' => __('Thành phần 2 - Tên', 'lx-landing'),
                'name' => 'lx_ing2_name',
                'type' => 'text',
                'default_value' => 'Dầu bơ',
            ),
            array(
                'key' => 'field_lx_ing2_latin',
                'label' => __('Thành phần 2 - Tên khoa học', 'lx-landing'),
                'name' => 'lx_ing2_latin',
                'type' => 'text',
                'default_value' => 'Persea Gratissima Oil',
            ),
            array(
                'key' => 'field_lx_ing2_desc',
                'label' => __('Thành phần 2 - Công dụng', 'lx-landing'),
                'name' => 'lx_ing2_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giàu vitamin và dưỡng chất giúp nuôi dưỡng làn da bé mềm mại.',
            ),
            array(
                'key' => 'field_lx_img_ing2',
                'label' => __('📷 ẢNH 13: Quả bơ (400×400px)', 'lx-landing'),
                'name' => 'lx_img_ing2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing3_name',
                'label' => __('Thành phần 3 - Tên', 'lx-landing'),
                'name' => 'lx_ing3_name',
                'type' => 'text',
                'default_value' => 'Dầu ô liu',
            ),
            array(
                'key' => 'field_lx_ing3_latin',
                'label' => __('Thành phần 3 - Tên khoa học', 'lx-landing'),
                'name' => 'lx_ing3_latin',
                'type' => 'text',
                'default_value' => 'Olea Europaea Fruit Oil',
            ),
            array(
                'key' => 'field_lx_ing3_desc',
                'label' => __('Thành phần 3 - Công dụng', 'lx-landing'),
                'name' => 'lx_ing3_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Tạo lớp màng bảo vệ, hạn chế tình trạng khô da.',
            ),
            array(
                'key' => 'field_lx_img_ing3',
                'label' => __('📷 ẢNH 14: Quả ô liu (400×400px)', 'lx-landing'),
                'name' => 'lx_img_ing3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_ing4_name',
                'label' => __('Thành phần 4 - Tên', 'lx-landing'),
                'name' => 'lx_ing4_name',
                'type' => 'text',
                'default_value' => 'Dầu Argan',
            ),
            array(
                'key' => 'field_lx_ing4_latin',
                'label' => __('Thành phần 4 - Tên khoa học', 'lx-landing'),
                'name' => 'lx_ing4_latin',
                'type' => 'text',
                'default_value' => 'Argania Spinosa Kernel Oil',
            ),
            array(
                'key' => 'field_lx_ing4_desc',
                'label' => __('Thành phần 4 - Công dụng', 'lx-landing'),
                'name' => 'lx_ing4_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Giúp xoa dịu vùng da nhạy cảm, chống kích ứng.',
            ),
            array(
                'key' => 'field_lx_img_ing4',
                'label' => __('📷 ẢNH 15: Hạt argan (400×400px)', 'lx-landing'),
                'name' => 'lx_img_ing4',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ingredients',
                'label' => __('📷 ẢNH 16: Ảnh chai tinh dầu cạnh nguyên liệu lá tràm, bơ, ô liu, argan (1000×1000px)', 'lx-landing'),
                'name' => 'lx_img_ingredients',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_standards_title',
                'label' => __('Tiêu đề chứng nhận & tiêu chuẩn chất lượng', 'lx-landing'),
                'name' => 'lx_standards_title',
                'type' => 'text',
                'default_value' => 'An tâm tự hào với <em>tiêu chuẩn chất lượng mẹ &amp; bé</em>',
            ),
            array(
                'key' => 'field_lx_img_handheld',
                'label' => __('📷 ẢNH 17: Chai xịt có tem chống hàng giả (800×1000px, 4:5 hoặc 1:1)', 'lx-landing'),
                'name' => 'lx_img_handheld',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_certificate',
                'label' => __('📷 ẢNH 18: Phiếu công bố & Giấy kiểm định chất lượng (800×1000px, 4:5 hoặc 1:1)', 'lx-landing'),
                'name' => 'lx_img_certificate',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_spec_product_name',
                'label' => __('Tên sản phẩm', 'lx-landing'),
                'name' => 'lx_spec_product_name',
                'type' => 'text',
                'default_value' => 'Khí Hàn Sinh Khương Hoàng Cung',
            ),
            array(
                'key' => 'field_lx_spec_cbmp',
                'label' => __('Số công bố mỹ phẩm', 'lx-landing'),
                'name' => 'lx_spec_cbmp',
                'type' => 'text',
                'default_value' => '81/26/CBMP-NB',
            ),
            array(
                'key' => 'field_lx_spec_brand',
                'label' => __('Thương hiệu', 'lx-landing'),
                'name' => 'lx_spec_brand',
                'type' => 'text',
                'default_value' => 'Home Care – Đơn vị đồng hành cùng hàng nghìn mẹ bầu & sau sinh trên khắp 3 miền Bắc - Trung - Nam',
            ),
            array(
                'key' => 'field_lx_spec_design',
                'label' => __('Thiết kế bao bì', 'lx-landing'),
                'name' => 'lx_spec_design',
                'type' => 'text',
                'default_value' => 'Dạng chai xịt tiện lợi, dễ dàng mang theo mọi nơi',
            ),
            array(
                'key' => 'field_lx_spec_commitment',
                'label' => __('Cam kết chất lượng', 'lx-landing'),
                'name' => 'lx_spec_commitment',
                'type' => 'text',
                'default_value' => 'Nguồn gốc thảo mộc thuần chay, có tem chống hàng giả, kiểm định rõ ràng',
            ),

            // ══════════════════════════════════════════════════════════════════
            // ══════════════════════════════════════════════════════════════════
            // TAB 6: HƯỚNG DẪN SỬ DỤNG (VIDEO 9:16 & 3 BƯỚC)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_usage',
                'label' => __('Hướng dẫn sử dụng', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_usage_title',
                'label' => __('Tiêu đề hướng dẫn sử dụng', 'lx-landing'),
                'name' => 'lx_usage_title',
                'type' => 'text',
                'default_value' => 'Dễ dàng chăm sóc bé <em>mỗi ngày</em>',
            ),
            array(
                'key' => 'field_lx_usage_subtitle',
                'label' => __('Mô tả phụ tiêu đề', 'lx-landing'),
                'name' => 'lx_usage_subtitle',
                'type' => 'text',
                'default_value' => 'Chỉ 3 bước đơn giản giúp con yêu ấm áp đường thở, ngủ sâu trọn giấc',
            ),
            array(
                'key' => 'field_lx_usage_video_url',
                'label' => __('🎬 URL Video 9:16 (YouTube Shorts, MP4 hoặc link video)', 'lx-landing'),
                'name' => 'lx_usage_video_url',
                'type' => 'text',
                'instructions' => __('Dán link YouTube (Shorts/Watch) hoặc đường dẫn file MP4 dọc tỉ lệ 9:16.', 'lx-landing'),
                'placeholder' => 'https://www.youtube.com/shorts/... hoặc https://.../video.mp4',
            ),
            array(
                'key' => 'field_lx_usage_video_poster',
                'label' => __('🖼️ Ảnh bìa / Poster video 9:16 (tùy chọn)', 'lx-landing'),
                'name' => 'lx_usage_video_poster',
                'type' => 'image',
                'return_format' => 'url',
                'instructions' => __('Ảnh bìa hiển thị trước khi bấm phát video (khuyên dùng tỉ lệ 9:16 hoặc 720×1280px).', 'lx-landing'),
            ),
            array(
                'key' => 'field_lx_usage_video_badge',
                'label' => __('Nhãn góc trên video', 'lx-landing'),
                'name' => 'lx_usage_video_badge',
                'type' => 'text',
                'default_value' => 'HD 9:16 · HƯỚNG DẪN THỰC TẾ',
            ),
            array(
                'key' => 'field_lx_usage_video_sub',
                'label' => __('Dòng chữ chú thích dưới video', 'lx-landing'),
                'name' => 'lx_usage_video_sub',
                'type' => 'text',
                'default_value' => 'Xem video 30s hướng dẫn mẹ thoa dầu tràm giữ ấm cho bé',
            ),
            array(
                'key' => 'field_lx_usage_step1_title',
                'label' => __('Bước 1 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_usage_step1_title',
                'type' => 'text',
                'default_value' => 'Khi tắm cho bé',
            ),
            array(
                'key' => 'field_lx_usage_step1_desc',
                'label' => __('Bước 1 - Mô tả', 'lx-landing'),
                'name' => 'lx_usage_step1_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Nhỏ 2 - 3 giọt vào chậu nước tắm ấm để giữ ấm cơ thể trong suốt quá trình tắm.',
            ),
            array(
                'key' => 'field_lx_usage_step1_icon',
                'label' => __('Bước 1 - Icon tùy chỉnh (để trống sẽ dùng icon vector bồn tắm mặc định)', 'lx-landing'),
                'name' => 'lx_usage_step1_icon',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_usage_step2_title',
                'label' => __('Bước 2 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_usage_step2_title',
                'type' => 'text',
                'default_value' => 'Trước khi đi ngủ hoặc ra ngoài',
            ),
            array(
                'key' => 'field_lx_usage_step2_desc',
                'label' => __('Bước 2 - Mô tả', 'lx-landing'),
                'name' => 'lx_usage_step2_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Nhỏ vài giọt ra lòng bàn tay mẹ, xoa ấm rồi massage nhẹ nhàng lên cổ, ngực, lưng và lòng bàn chân của bé.',
            ),
            array(
                'key' => 'field_lx_usage_step2_icon',
                'label' => __('Bước 2 - Icon tùy chỉnh (để trống sẽ dùng icon vector massage mặc định)', 'lx-landing'),
                'name' => 'lx_usage_step2_icon',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_usage_step3_title',
                'label' => __('Bước 3 - Tiêu đề', 'lx-landing'),
                'name' => 'lx_usage_step3_title',
                'type' => 'text',
                'default_value' => 'Khi bị côn trùng đốt',
            ),
            array(
                'key' => 'field_lx_usage_step3_desc',
                'label' => __('Bước 3 - Mô tả', 'lx-landing'),
                'name' => 'lx_usage_step3_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Thoa một lượng nhỏ lên vùng da bị cắn để làm dịu ngứa.',
            ),
            array(
                'key' => 'field_lx_usage_step3_icon',
                'label' => __('Bước 3 - Icon tùy chỉnh (để trống sẽ dùng icon vector khiên bảo vệ mặc định)', 'lx-landing'),
                'name' => 'lx_usage_step3_icon',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_usage_warn',
                'label' => __('Khung lưu ý an toàn', 'lx-landing'),
                'name' => 'lx_usage_warn',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '<b>Lưu ý:</b> Nên thử một lượng nhỏ ra tay trước khi dùng cho trẻ sơ sinh. Tránh thoa trực tiếp lên vùng mặt, gần mắt, mũi hoặc vết thương hở.',
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 7: ĐÁNH GIÁ & UY TÍN (Bao gồm ẢNH 21, 22, 23, 24)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_proof',
                'label' => __('Đánh giá & Uy tín', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_proof_title',
                'label' => __('Tiêu đề phần uy tín', 'lx-landing'),
                'name' => 'lx_proof_title',
                'type' => 'text',
                'default_value' => 'Hơn <em>50.000+ mẹ bỉm</em> đã tin dùng & đồng hành cùng tinh dầu tràm Home Care',
            ),
            array(
                'key' => 'field_lx_proof_subtitle',
                'label' => __('Tiêu đề phụ đánh giá', 'lx-landing'),
                'name' => 'lx_proof_subtitle',
                'type' => 'text',
                'default_value' => 'Đánh giá nhanh từ cộng đồng',
            ),
            array(
                'key' => 'field_lx_stat1_num',
                'label' => __('Chỉ số 1 - Con số', 'lx-landing'),
                'name' => 'lx_stat1_num',
                'type' => 'text',
                'default_value' => '50.000+',
            ),
            array(
                'key' => 'field_lx_stat1_lbl',
                'label' => __('Chỉ số 1 - Nhãn', 'lx-landing'),
                'name' => 'lx_stat1_lbl',
                'type' => 'text',
                'default_value' => 'mẹ bỉm tin dùng',
            ),
            array(
                'key' => 'field_lx_stat2_num',
                'label' => __('Chỉ số 2 - Con số', 'lx-landing'),
                'name' => 'lx_stat2_num',
                'type' => 'text',
                'default_value' => '4.9<small>/5</small>',
            ),
            array(
                'key' => 'field_lx_stat2_lbl',
                'label' => __('Chỉ số 2 - Nhãn', 'lx-landing'),
                'name' => 'lx_stat2_lbl',
                'type' => 'text',
                'default_value' => 'sao dựa trên hơn 2.500+ đánh giá thực tế',
            ),
            array(
                'key' => 'field_lx_stat3_num',
                'label' => __('Chỉ số 3 - Con số', 'lx-landing'),
                'name' => 'lx_stat3_num',
                'type' => 'text',
                'default_value' => '98%',
            ),
            array(
                'key' => 'field_lx_stat3_lbl',
                'label' => __('Chỉ số 3 - Nhãn', 'lx-landing'),
                'name' => 'lx_stat3_lbl',
                'type' => 'text',
                'default_value' => 'mẹ phản hồi con ngủ ngon hơn và bớt khò khè sau khi được massage giữ ấm',
            ),
            // Đánh giá 1
            array(
                'key' => 'field_lx_rev1_name',
                'label' => __('Đánh giá 1 - Tên khách hàng', 'lx-landing'),
                'name' => 'lx_rev1_name',
                'type' => 'text',
                'default_value' => 'Đạo diễn Thanh Hằng',
            ),
            array(
                'key' => 'field_lx_rev1_role',
                'label' => __('Đánh giá 1 - Vai trò / Danh xưng', 'lx-landing'),
                'name' => 'lx_rev1_role',
                'type' => 'text',
                'default_value' => 'Khách hàng thân thiết Home Care',
            ),
            array(
                'key' => 'field_lx_rev1_quote',
                'label' => __('Đánh giá 1 - Nội dung đánh giá', 'lx-landing'),
                'name' => 'lx_rev1_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Bé nhà mình da nhạy cảm nên tìm sản phẩm giữ ấm thuần chay như này rất yên tâm. Dung tích 30ml dạng xịt tiện lợi, mang đi đâu cũng tiện. Mùa gió về xịt chút vào lòng bàn chân rồi đi tất cho con là yên tâm bé ngủ ngon cả đêm, không lo lạnh bụng hay giật mình.',
            ),
            array(
                'key' => 'field_lx_rev1_avatar',
                'label' => __('Đánh giá 1 - Viết tắt Avatar', 'lx-landing'),
                'name' => 'lx_rev1_avatar',
                'type' => 'text',
                'default_value' => 'TH',
            ),
            // Đánh giá 2
            array(
                'key' => 'field_lx_rev2_name',
                'label' => __('Đánh giá 2 - Tên khách hàng', 'lx-landing'),
                'name' => 'lx_rev2_name',
                'type' => 'text',
                'default_value' => 'Diễn viên Thanh Huyền',
            ),
            array(
                'key' => 'field_lx_rev2_role',
                'label' => __('Đánh giá 2 - Vai trò / Danh xưng', 'lx-landing'),
                'name' => 'lx_rev2_role',
                'type' => 'text',
                'default_value' => 'Mẹ sau sinh',
            ),
            array(
                'key' => 'field_lx_rev2_quote',
                'label' => __('Đánh giá 2 - Nội dung đánh giá', 'lx-landing'),
                'name' => 'lx_rev2_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Đúng là chân ái cho các mẹ ở cữ mùa này luôn ạ. Em mới sinh xong mệt mỏi mà sợ gió khủng khiếp. Từ hôm dùng chai xịt Khí Hàn Sinh Khương này thấy đỡ hẳn. Tia xịt ra mịn lắm, massage chút là ngấm, người ấm lên nhanh mà không bị rát da. Thích nhất là cái mùi thảo mộc dịu nhẹ, không bị nồng hắc ảnh hưởng tới bé. 10 điểm cho độ tiện lợi!',
            ),
            array(
                'key' => 'field_lx_rev2_avatar',
                'label' => __('Đánh giá 2 - Viết tắt Avatar', 'lx-landing'),
                'name' => 'lx_rev2_avatar',
                'type' => 'text',
                'default_value' => 'TH',
            ),
            // Đánh giá 3
            array(
                'key' => 'field_lx_rev3_name',
                'label' => __('Đánh giá 3 - Tên khách hàng', 'lx-landing'),
                'name' => 'lx_rev3_name',
                'type' => 'text',
                'default_value' => 'Nhà Thiết kế Cao Ngọc',
            ),
            array(
                'key' => 'field_lx_rev3_role',
                'label' => __('Đánh giá 3 - Vai trò / Danh xưng', 'lx-landing'),
                'name' => 'lx_rev3_role',
                'type' => 'text',
                'default_value' => 'Mẹ bỉm sữa',
            ),
            array(
                'key' => 'field_lx_rev3_quote',
                'label' => __('Đánh giá 3 - Nội dung đánh giá', 'lx-landing'),
                'name' => 'lx_rev3_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Bé nhà mình da nhạy cảm nên mình rất ngại dùng dầu gió thông thường vì sợ cay rát. Loại tinh dầu này của Home Care mùi thơm sả chanh tía tô rất dễ chịu, độ ấm dịu nhẹ. Mỗi lần tắm xong xịt chút xíu xoa lưng và lòng bàn chân cho con là yên tâm con không bị nhiễm lạnh.',
            ),
            array(
                'key' => 'field_lx_rev3_avatar',
                'label' => __('Đánh giá 3 - Viết tắt Avatar', 'lx-landing'),
                'name' => 'lx_rev3_avatar',
                'type' => 'text',
                'default_value' => 'CN',
            ),
            // Đánh giá 4
            array(
                'key' => 'field_lx_rev4_name',
                'label' => __('Đánh giá 4 - Tên khách hàng', 'lx-landing'),
                'name' => 'lx_rev4_name',
                'type' => 'text',
                'default_value' => 'Ca sĩ Thu Thảo',
            ),
            array(
                'key' => 'field_lx_rev4_role',
                'label' => __('Đánh giá 4 - Vai trò / Danh xưng', 'lx-landing'),
                'name' => 'lx_rev4_role',
                'type' => 'text',
                'default_value' => 'Mẹ ở cữ',
            ),
            array(
                'key' => 'field_lx_rev4_quote',
                'label' => __('Đánh giá 4 - Nội dung đánh giá', 'lx-landing'),
                'name' => 'lx_rev4_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Trộm vía dùng thích lắm các mom ạ! Sinh xong người mệt với sợ lạnh, may có em xịt giữ ấm này cứu cánh. Tắm xong cho bé xịt chút vào lòng bàn chân bé, còn mẹ thì xịt massage lưng với cổ vai gáy là thấy dịu hẳn. Chai 30ml dạng xịt dùng tiện, không bị dính tay như mấy loại dầu xoa thông thường. Mùi gừng sả thơm tự nhiên, ấm dịu nhẹ. Recomment cho các mom dùng thử nha!',
            ),
            array(
                'key' => 'field_lx_rev4_avatar',
                'label' => __('Đánh giá 4 - Viết tắt Avatar', 'lx-landing'),
                'name' => 'lx_rev4_avatar',
                'type' => 'text',
                'default_value' => 'TT',
            ),
            // Đánh giá 5
            array(
                'key' => 'field_lx_rev5_name',
                'label' => __('Đánh giá 5 - Tên khách hàng', 'lx-landing'),
                'name' => 'lx_rev5_name',
                'type' => 'text',
                'default_value' => 'MC Khánh Chi',
            ),
            array(
                'key' => 'field_lx_rev5_role',
                'label' => __('Đánh giá 5 - Vai trò / Danh xưng', 'lx-landing'),
                'name' => 'lx_rev5_role',
                'type' => 'text',
                'default_value' => 'Truyền hình',
            ),
            array(
                'key' => 'field_lx_rev5_quote',
                'label' => __('Đánh giá 5 - Nội dung đánh giá', 'lx-landing'),
                'name' => 'lx_rev5_quote',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Chai 30ml nhỏ gọn xinh xắn, để trong túi xách mang đi làm hay đi du lịch đều tiện. Mẹ mình bị đau mỏi vai gáy xịt xoa bóp cũng khen êm và thư giãn lắm. Sẽ ủng hộ Home Care dài dài!',
            ),
            array(
                'key' => 'field_lx_rev5_avatar',
                'label' => __('Đánh giá 5 - Viết tắt Avatar', 'lx-landing'),
                'name' => 'lx_rev5_avatar',
                'type' => 'text',
                'default_value' => 'KC',
            ),
            array(
                'key' => 'field_lx_img_feedback1',
                'label' => __('📷 ẢNH 21: Ảnh feedback tin nhắn thật #1 (600×800px, 3:4)', 'lx-landing'),
                'name' => 'lx_img_feedback1',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_feedback2',
                'label' => __('📷 ẢNH 22: Ảnh feedback tin nhắn thật #2 (600×800px, 3:4)', 'lx-landing'),
                'name' => 'lx_img_feedback2',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_feedback3',
                'label' => __('📷 ẢNH 23: Ảnh feedback tin nhắn thật #3 (600×800px, 3:4)', 'lx-landing'),
                'name' => 'lx_img_feedback3',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_service',
                'label' => __('📷 ẢNH 24: Ảnh điều dưỡng Home Care tắm/massage cho bé tại nhà (1200×675px, 16:9)', 'lx-landing'),
                'name' => 'lx_img_service',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_trust_box1',
                'label' => __('Khối uy tín 1', 'lx-landing'),
                'name' => 'lx_trust_box1',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '<b>Sản phẩm tin dùng trong dịch vụ cao cấp:</b> Tinh dầu tràm Home Care được các chuyên viên chăm sóc mẹ và bé của Home Care sử dụng trực tiếp trong các liệu trình tắm bé và tắm xông hơi cho mẹ tại nhà.',
            ),
            array(
                'key' => 'field_lx_trust_box2',
                'label' => __('Khối uy tín 2', 'lx-landing'),
                'name' => 'lx_trust_box2',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => '<b>Phù hợp cho cả gia đình:</b> An toàn cho trẻ sơ sinh, trẻ nhỏ, mẹ bầu và mẹ sau sinh trong thời gian ở cữ.',
            ),
            array(
                'key' => 'field_lx_proof_cta_text',
                'label' => __('Chữ nút mua ở phần uy tín', 'lx-landing'),
                'name' => 'lx_proof_cta_text',
                'type' => 'text',
                'default_value' => 'Đặt mua ngay – chỉ 49.000đ',
            ),

            // ══════════════════════════════════════════════════════════════════
            // TAB 8: ĐẶT HÀNG & CHỐT TRANG (Bao gồm ẢNH 25)
            // ══════════════════════════════════════════════════════════════════
            array(
                'key' => 'field_tab_order',
                'label' => __('Đặt hàng & Chốt trang', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_order_title',
                'label' => __('Tiêu đề khối đặt hàng', 'lx-landing'),
                'name' => 'lx_order_title',
                'type' => 'text',
                'default_value' => 'Cho con cơ thể ấm – <em>Cho mẹ giấc ngủ ngon</em>',
            ),
            array(
                'key' => 'field_lx_order_lead',
                'label' => __('Lời dẫn dắt đặt hàng', 'lx-landing'),
                'name' => 'lx_order_lead',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Đừng để đêm lạnh làm gián đoạn giấc ngủ của con. Chăm sóc sức khỏe bé yêu ngay hôm nay cùng Tinh dầu tràm Hoàng Cung Home Care!',
            ),
            array(
                'key' => 'field_lx_order_badge',
                'label' => __('Tiêu đề đầu bảng giá', 'lx-landing'),
                'name' => 'lx_order_badge',
                'type' => 'text',
                'default_value' => 'ƯU ĐÃI CHỈ ÁP DỤNG HÔM NAY',
            ),
            array(
                'key' => 'field_lx_img_offer',
                'label' => __('📷 ẢNH 18: Banner ưu đãi: sản phẩm + giá 49K/87K (1000×1000px, 1:1 vuông)', 'lx-landing'),
                'name' => 'lx_img_offer',
                'type' => 'image',
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_order_product_name',
                'label' => __('Tên sản phẩm trong bảng giá', 'lx-landing'),
                'name' => 'lx_order_product_name',
                'type' => 'text',
                'default_value' => 'Tinh dầu tràm giữ ấm cho bé 30ml',
            ),
            array(
                'key' => 'field_lx_order_stock_left',
                'label' => __('Số suất ưu đãi còn lại', 'lx-landing'),
                'name' => 'lx_order_stock_left',
                'type' => 'number',
                'default_value' => 17,
            ),
            array(
                'key' => 'field_lx_order_bullet1',
                'label' => __('Cam kết ưu đãi 1', 'lx-landing'),
                'name' => 'lx_order_bullet1',
                'type' => 'text',
                'default_value' => 'Chai 30ml tiện lợi – dùng tiết kiệm cho cả gia đình',
            ),
            array(
                'key' => 'field_lx_order_bullet2',
                'label' => __('Cam kết ưu đãi 2', 'lx-landing'),
                'name' => 'lx_order_bullet2',
                'type' => 'text',
                'default_value' => 'Freeship toàn quốc',
            ),
            array(
                'key' => 'field_lx_order_bullet3',
                'label' => __('Cam kết ưu đãi 3', 'lx-landing'),
                'name' => 'lx_order_bullet3',
                'type' => 'text',
                'default_value' => 'Kiểm tra hàng trước khi thanh toán',
            ),
            array(
                'key' => 'field_lx_order_bullet4',
                'label' => __('Cam kết ưu đãi 4', 'lx-landing'),
                'name' => 'lx_order_bullet4',
                'type' => 'text',
                'default_value' => 'Tư vấn miễn phí cách dùng cho bé',
            ),
            array(
                'key' => 'field_lx_final_title',
                'label' => __('Tiêu đề chốt sale cuối trang', 'lx-landing'),
                'name' => 'lx_final_title',
                'type' => 'text',
                'default_value' => 'Đừng để đêm lạnh làm <em>gián đoạn giấc ngủ</em> của con',
            ),
            array(
                'key' => 'field_lx_final_desc',
                'label' => __('Mô tả chốt sale cuối trang', 'lx-landing'),
                'name' => 'lx_final_desc',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Chỉ 49.000đ cho một mùa đông ấm áp – ưu đãi flash sale có thể kết thúc bất cứ lúc nào.',
            ),
            array(
                'key' => 'field_lx_final_cta_text',
                'label' => __('Chữ nút chốt sale cuối trang', 'lx-landing'),
                'name' => 'lx_final_cta_text',
                'type' => 'text',
                'default_value' => 'Mua ngay 49K – Freeship',
            ),
            array(
                'key' => 'field_lx_footer_copyright',
                'label' => __('Dòng bản quyền Footer', 'lx-landing'),
                'name' => 'lx_footer_copyright',
                'type' => 'text',
                'default_value' => '© Home Care Việt Nam · Chăm sóc mẹ & bé tại nhà',
            ),
            array(
                'key' => 'field_lx_footer_disclaimer',
                'label' => __('Lưu ý miễn trừ trách nhiệm y tế Footer', 'lx-landing'),
                'name' => 'lx_footer_disclaimer',
                'type' => 'textarea',
                'rows' => 2,
                'default_value' => 'Sản phẩm không phải là thuốc và không có tác dụng thay thế thuốc chữa bệnh. Hiệu quả có thể khác nhau tùy cơ địa.',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'lx-landing-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'active' => true,
    ));
}
add_action('acf/init', 'lx_register_acf_field_group');

/**
 * 3. Tự động xóa sạch LiteSpeed Cache khi lưu cài đặt ACF Options
 */
function lx_purge_cache_on_option_update($post_id = null) {
    if (class_exists('\LiteSpeed\Purge')) {
        \LiteSpeed\Purge::purge_all();
    }
    if (function_exists('litespeed_purge_all')) {
        litespeed_purge_all();
    }
    do_action('litespeed_purge_all');
    if (!headers_sent()) {
        header('X-LiteSpeed-Purge: *');
    }
}
add_action('acf/save_post', 'lx_purge_cache_on_option_update', 20);
add_action('updated_option', function($option_name) {
    if (strpos($option_name, 'options_lx_') === 0 || strpos($option_name, 'lx_') === 0) {
        lx_purge_cache_on_option_update();
    }
});
