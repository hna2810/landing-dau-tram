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
 * 2. Đăng ký nhóm trường ACF Local Field Group
 */
function lx_register_acf_field_group() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_lx_landing_tinh_dau_tram',
        'title' => __('Nội dung Landing Page Tinh Dầu Tràm', 'lx-landing'),
        'fields' => array(
            // ── TAB 1: THIẾT LẬP CHUNG & ĐẶT HÀNG ──────────────────────────
            array(
                'key' => 'field_tab_general',
                'label' => __('Cấu hình chung & Đơn hàng', 'lx-landing'),
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
                'key' => 'field_lx_show_placeholders',
                'label' => __('Hiển thị khung hướng dẫn ảnh trống (Placeholders)', 'lx-landing'),
                'name' => 'lx_show_placeholders',
                'type' => 'true_false',
                'instructions' => __('Bật để hiển thị nhãn vị trí ảnh cho người thiết kế. Tắt trước khi chạy quảng cáo để ẩn các ô chưa tải ảnh.', 'lx-landing'),
                'default_value' => 1,
                'ui' => 1,
            ),
            array(
                'key' => 'field_lx_sheet_endpoint',
                'label' => __('Google Sheet Webhook URL', 'lx-landing'),
                'name' => 'lx_sheet_endpoint',
                'type' => 'url',
                'default_value' => 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec',
                'instructions' => __('Endpoint Google Apps Script nhận dữ liệu form đặt hàng.', 'lx-landing'),
            ),
            array(
                'key' => 'field_lx_cf7_shortcode',
                'label' => __('Contact Form 7 Shortcode tùy chỉnh (Nếu có)', 'lx-landing'),
                'name' => 'lx_cf7_shortcode',
                'type' => 'text',
                'instructions' => __('Để trống để sử dụng form tự động mặc định.', 'lx-landing'),
            ),
            array(
                'key' => 'field_lx_unit_price',
                'label' => __('Giá khuyến mãi (VNĐ)', 'lx-landing'),
                'name' => 'lx_unit_price',
                'type' => 'number',
                'default_value' => 49000,
            ),
            array(
                'key' => 'field_lx_old_price',
                'label' => __('Giá gốc niêm yết (VNĐ)', 'lx-landing'),
                'name' => 'lx_old_price',
                'type' => 'number',
                'default_value' => 87000,
            ),

            // ── TAB 2: HERO & NỖI LO (PAIN) ──────────────────────────
            array(
                'key' => 'field_tab_hero_pain',
                'label' => __('Hero & Nỗi lo', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_img_hero',
                'label' => __('ẢNH 1: Ảnh sản phẩm chính Hero (Chai 30ml)', 'lx-landing'),
                'name' => 'lx_img_hero',
                'type' => 'image',
                'instructions' => __('PNG nền trong suốt hoặc nền sáng · 1000×1000px (1:1)', 'lx-landing'),
                'return_format' => 'url',
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_lx_img_pain1',
                'label' => __('ẢNH 2: Bé khò khè, trằn trọc ban đêm', 'lx-landing'),
                'name' => 'lx_img_pain1',
                'type' => 'image',
                'instructions' => __('600×600px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_pain2',
                'label' => __('ẢNH 3: Bé hắt hơi, sổ mũi sau khi tắm', 'lx-landing'),
                'name' => 'lx_img_pain2',
                'type' => 'image',
                'instructions' => __('600×600px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_pain3',
                'label' => __('ẢNH 4: Mẹ ngần ngại khi cầm chai tinh dầu', 'lx-landing'),
                'name' => 'lx_img_pain3',
                'type' => 'image',
                'instructions' => __('600×600px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_pain4',
                'label' => __('ẢNH 5: Vết muỗi đốt đỏ trên da bé', 'lx-landing'),
                'name' => 'lx_img_pain4',
                'type' => 'image',
                'instructions' => __('600×600px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_pain',
                'label' => __('ẢNH 6: Ảnh cảm xúc mẹ bế con khò khè ban đêm', 'lx-landing'),
                'name' => 'lx_img_pain',
                'type' => 'image',
                'instructions' => __('Ảnh ngang 1200×675px (16:9), tông ấm', 'lx-landing'),
                'return_format' => 'url',
            ),

            // ── TAB 3: CÔNG DỤNG & NGUYÊN LIỆU ──────────────────────────
            array(
                'key' => 'field_tab_ben_ing',
                'label' => __('Công dụng & Nguyên liệu', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_img_ben1',
                'label' => __('ẢNH 7: Bé ấm áp trong khăn sau khi tắm', 'lx-landing'),
                'name' => 'lx_img_ben1',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ben2',
                'label' => __('ẢNH 8: Bé ngủ say, thở êm', 'lx-landing'),
                'name' => 'lx_img_ben2',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ben3',
                'label' => __('ẢNH 9: Mẹ thoa dầu lên vết muỗi đốt', 'lx-landing'),
                'name' => 'lx_img_ben3',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ben4',
                'label' => __('ẢNH 10: Cận cảnh giọt dầu trên da bé', 'lx-landing'),
                'name' => 'lx_img_ben4',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_benefit',
                'label' => __('ẢNH 11: Mẹ thoa & massage ngực, lưng cho bé', 'lx-landing'),
                'name' => 'lx_img_benefit',
                'type' => 'image',
                'instructions' => __('Ảnh ngang 1200×675px (16:9)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ing1',
                'label' => __('ẢNH 12: Lá tràm', 'lx-landing'),
                'name' => 'lx_img_ing1',
                'type' => 'image',
                'instructions' => __('400×400px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ing2',
                'label' => __('ẢNH 13: Quả bơ', 'lx-landing'),
                'name' => 'lx_img_ing2',
                'type' => 'image',
                'instructions' => __('400×400px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ing3',
                'label' => __('ẢNH 14: Quả ô liu', 'lx-landing'),
                'name' => 'lx_img_ing3',
                'type' => 'image',
                'instructions' => __('400×400px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ing4',
                'label' => __('ẢNH 15: Hạt argan', 'lx-landing'),
                'name' => 'lx_img_ing4',
                'type' => 'image',
                'instructions' => __('400×400px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_ingredients',
                'label' => __('ẢNH 16: Chai tinh dầu đặt cạnh 4 thành phần', 'lx-landing'),
                'name' => 'lx_img_ingredients',
                'type' => 'image',
                'instructions' => __('1000×1000px (1:1)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_handheld',
                'label' => __('ẢNH 17: Chai tinh dầu cầm gọn trong lòng bàn tay', 'lx-landing'),
                'name' => 'lx_img_handheld',
                'type' => 'image',
                'instructions' => __('1200×675px (16:9)', 'lx-landing'),
                'return_format' => 'url',
            ),

            // ── TAB 4: HƯỚNG DẪN DÙNG & FEEDBACK ──────────────────────────
            array(
                'key' => 'field_tab_usage_feedback',
                'label' => __('HDSD, Feedback & Ưu đãi', 'lx-landing'),
                'type' => 'tab',
            ),
            array(
                'key' => 'field_lx_img_step1',
                'label' => __('ẢNH 18: Nhỏ 2-3 giọt vào chậu nước tắm ấm', 'lx-landing'),
                'name' => 'lx_img_step1',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_step2',
                'label' => __('ẢNH 19: Massage cổ, ngực, lưng, bàn chân bé', 'lx-landing'),
                'name' => 'lx_img_step2',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_step3',
                'label' => __('ẢNH 20: Thoa nhẹ lên vết côn trùng cắn', 'lx-landing'),
                'name' => 'lx_img_step3',
                'type' => 'image',
                'instructions' => __('800×600px (4:3)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_feedback1',
                'label' => __('ẢNH 21: Ảnh chụp màn hình feedback 1', 'lx-landing'),
                'name' => 'lx_img_feedback1',
                'type' => 'image',
                'instructions' => __('600×800px (3:4)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_feedback2',
                'label' => __('ẢNH 22: Ảnh chụp màn hình feedback 2', 'lx-landing'),
                'name' => 'lx_img_feedback2',
                'type' => 'image',
                'instructions' => __('600×800px (3:4)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_feedback3',
                'label' => __('ẢNH 23: Ảnh chụp màn hình feedback 3', 'lx-landing'),
                'name' => 'lx_img_feedback3',
                'type' => 'image',
                'instructions' => __('600×800px (3:4)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_service',
                'label' => __('ẢNH 24: Điều dưỡng Home Care tắm / massage cho bé tại nhà', 'lx-landing'),
                'name' => 'lx_img_service',
                'type' => 'image',
                'instructions' => __('1200×675px (16:9)', 'lx-landing'),
                'return_format' => 'url',
            ),
            array(
                'key' => 'field_lx_img_offer',
                'label' => __('ẢNH 25: Banner ưu đãi Flash Sale 49K/87K', 'lx-landing'),
                'name' => 'lx_img_offer',
                'type' => 'image',
                'instructions' => __('1200×675px (16:9)', 'lx-landing'),
                'return_format' => 'url',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param'    => 'options_page',
                    'operator' => '==',
                    'value'    => 'lx-landing-settings',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
    ));
}
add_action('acf/init', 'lx_register_acf_field_group');
