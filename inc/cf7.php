<?php
/**
 * Contact Form 7 Integration & Google Sheet Sync
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

// Disable automatic <p> and <br> wrapping in Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * 1. Đảm bảo form Contact Form 7 tiêu chuẩn cho Tinh Dầu Tràm luôn tồn tại
 *
 * @return int|false Form ID or false
 */
function lx_ensure_cf7_form() {
    if (!class_exists('WPCF7_ContactForm')) {
        return false;
    }

    $form_content = '<div class="field">' . "\n"
        . '  <label for="fName">Họ và tên mẹ <i>*</i></label>' . "\n"
        . '  [text* your-name id:fName class:input autocomplete:name placeholder "VD: Nguyễn Thu Hà"]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fPhone">Số điện thoại <i>*</i></label>' . "\n"
        . '  [tel* your-phone id:fPhone class:input autocomplete:tel placeholder "VD: 0912 345 678"]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fAddress">Địa chỉ nhận hàng <i>*</i></label>' . "\n"
        . '  [textarea* your-address id:fAddress class:input autocomplete:street-address placeholder "Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành..."]' . "\n"
        . '</div>' . "\n"
        . '<div class="field" style="display:none">' . "\n"
        . '  [hidden package default:"1 chai 30ml – 49.000đ (giá gốc 87.000đ) + FREESHIP"]' . "\n"
        . '</div>' . "\n"
        . '<div class="field">' . "\n"
        . '  <label for="fNote">Ghi chú (nếu có)</label>' . "\n"
        . '  [text your-note id:fNote class:input placeholder "Ví dụ: Giao giờ hành chính, gọi trước khi giao..."]' . "\n"
        . '</div>' . "\n"
        . '[submit class:btn class:btn-buy class:btn-block id:submitBtn "Đặt mua ngay – Bảo vệ sức khỏe bé"]' . "\n"
        . '<p class="form-foot">(Tư vấn miễn phí &amp; Kiểm tra hàng trước khi thanh toán)</p>';

    $messages = array(
        'mail_sent_ok'     => '🎉 Cảm ơn mẹ! Đơn đặt hàng đã được gửi thành công. Home Care sẽ gọi lại để xác nhận đơn ngay!',
        'mail_sent_ng'     => '❌ Có lỗi xảy ra trong quá trình gửi đơn. Mẹ vui lòng liên hệ hotline hoặc thử lại sau nhé.',
        'validation_error' => '⚠️ Mẹ vui lòng kiểm tra lại thông tin và điền đầy đủ các mục bắt buộc nhé!',
        'spam'             => '❌ Có lỗi xảy ra trong quá trình gửi đơn. Vui lòng thử lại sau nhé.',
        'accept_terms'     => 'Vui lòng đồng ý với các điều khoản trước khi gửi đơn.',
        'invalid_required' => 'Vui lòng nhập thông tin vào trường này.',
        'invalid_tel'      => 'Số điện thoại chưa đúng định dạng (10 chữ số).',
    );

    // Kiểm tra xem form đã tồn tại chưa
    $existing = get_posts(array(
        'post_type'      => 'wpcf7_contact_form',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'          => 'Đặt Hàng Tinh Dầu Tràm Home Care',
    ));

    if (!empty($existing)) {
        $fid = $existing[0]->ID;
        update_post_meta($fid, '_form', $form_content);
        update_post_meta($fid, '_messages', $messages);
        update_post_meta($fid, '_locale', 'vi');
        return $fid;
    }

    $form_id = wp_insert_post(array(
        'post_title'  => 'Đặt Hàng Tinh Dầu Tràm Home Care',
        'post_type'   => 'wpcf7_contact_form',
        'post_status' => 'publish',
    ));

    if ($form_id && !is_wp_error($form_id)) {
        $server_host = isset($_SERVER['SERVER_NAME']) ? sanitize_text_field($_SERVER['SERVER_NAME']) : 'dautram.homecarevietnam.com';
        $mail_tags = array(
            'active'    => true,
            'subject'   => 'Đơn đặt hàng Tinh Dầu Tràm từ [your-name]',
            'sender'    => '[_site_title] <wordpress@' . $server_host . '>',
            'recipient' => get_option('admin_email'),
            'body'      => "Thông tin đơn hàng mới từ Landing Page:\n\n"
                         . "Họ tên mẹ: [your-name]\n"
                         . "Số điện thoại: [your-phone]\n"
                         . "Địa chỉ nhận hàng: [your-address]\n"
                         . "Ghi chú: [your-note]\n"
                         . "Thời gian: [_date] [_time]\n"
                         . "Trang gửi: [_url]\n",
        );

        update_post_meta($form_id, '_form', $form_content);
        update_post_meta($form_id, '_mail', $mail_tags);
        update_post_meta($form_id, '_messages', $messages);
        update_post_meta($form_id, '_locale', 'vi');
        return $form_id;
    }

    return false;
}
add_action('init', 'lx_ensure_cf7_form');

/**
 * 2. Tự động gửi dữ liệu đơn hàng Contact Form 7 sang Google Sheet Webhook
 *
 * @param WPCF7_ContactForm $contact_form
 */
function lx_cf7_save_to_google_sheet($contact_form) {
    if (!class_exists('WPCF7_Submission')) {
        return;
    }

    $submission = WPCF7_Submission::get_instance();
    if (!$submission) {
        return;
    }

    $posted_data = $submission->get_posted_data();
    $name    = sanitize_text_field(isset($posted_data['your-name']) ? $posted_data['your-name'] : (isset($posted_data['name']) ? $posted_data['name'] : ''));
    $phone   = sanitize_text_field(isset($posted_data['your-phone']) ? $posted_data['your-phone'] : (isset($posted_data['phone']) ? $posted_data['phone'] : ''));
    $address = sanitize_text_field(isset($posted_data['your-address']) ? $posted_data['your-address'] : (isset($posted_data['address']) ? $posted_data['address'] : ''));
    $note    = sanitize_text_field(isset($posted_data['your-note']) ? $posted_data['your-note'] : (isset($posted_data['note']) ? $posted_data['note'] : ''));

    // Bỏ qua nếu thiếu họ tên hoặc số điện thoại
    if (empty($name) || empty($phone)) {
        return;
    }

    // Cơ chế chống gửi trùng đơn (Anti-duplicate lock trong 30 giây)
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    $dup_transient_key = 'lx_lead_tram_' . md5($clean_phone);
    if (get_transient($dup_transient_key)) {
        return;
    }
    set_transient($dup_transient_key, 1, 30);

    // Lấy URL Web App Google Sheet từ ACF options hoặc hằng số
    $default_sheet = 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec';
    $sheet_url = lx_get_field('lx_sheet_endpoint', 'option', $default_sheet);
    if (empty($sheet_url)) {
        $sheet_url = $default_sheet;
    }

    if (!empty($sheet_url) && filter_var($sheet_url, FILTER_VALIDATE_URL)) {
        $price = '49.000đ';
        $quantity = 1;

        $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? sanitize_text_field($_SERVER['HTTP_USER_AGENT']) : '';
        $page_url = wp_get_referer() ? wp_get_referer() : home_url();

        $payload = array(
            'time'       => current_time('d/m/Y H:i:s'),
            'name'       => $name,
            'phone'      => $phone,
            'address'    => $address,
            'package'    => '1 chai 30ml – 49.000đ (Freeship)',
            'product'    => 'Tinh dầu tràm giữ ấm cho bé 30ml',
            'price'      => $price,
            'quantity'   => $quantity,
            'note'       => $note,
            'page'       => $page_url,
            'user_agent' => $user_agent,
        );

        // Đính kèm các tham số UTM Tracking nếu có
        $tracking_keys = array('utm_source', 'utm_medium', 'utm_campaign', 'utm_content', 'utm_term', 'fbclid', 'gclid', 'ttclid');
        foreach ($tracking_keys as $key) {
            if (!empty($_COOKIE[$key])) {
                $payload[$key] = sanitize_text_field($_COOKIE[$key]);
            } elseif (!empty($_GET[$key])) {
                $payload[$key] = sanitize_text_field($_GET[$key]);
            }
        }

        // Gửi ngầm không chặn luồng (Non-blocking) để form phản hồi tức thì
        wp_remote_post($sheet_url, array(
            'method'      => 'POST',
            'timeout'     => 15,
            'redirection' => 5,
            'blocking'    => false,
            'body'        => $payload,
        ));
    }
}
add_action('wpcf7_mail_sent', 'lx_cf7_save_to_google_sheet');

/**
 * 3. Render Contact Form 7 hoặc HTML Fallback
 *
 * @return string HTML
 */
function lx_render_order_form() {
    $shortcode = lx_get_field('lx_cf7_shortcode', 'option', '');

    if (!empty($shortcode)) {
        return do_shortcode($shortcode);
    }

    if (class_exists('WPCF7_ContactForm')) {
        $form_id = lx_ensure_cf7_form();
        if ($form_id) {
            return do_shortcode('[contact-form-7 id="' . $form_id . '" title="Đặt Hàng Tinh Dầu Tràm Home Care"]');
        }
    }

    // Form tĩnh fallback nếu chưa kích hoạt CF7
    ob_start();
    ?>
    <form class="card reveal" id="orderForm" novalidate>
      <div id="formBody">
        <h3>FORM ĐẶT HÀNG NHANH</h3>
        <p class="hint">Điền thông tin, Home Care gọi xác nhận trong ít phút</p>
        <div class="field">
          <label for="fName">Họ và tên mẹ *</label>
          <input id="fName" name="name" autocomplete="name" placeholder="VD: Nguyễn Thu Hà">
          <div class="msg">Vui lòng nhập họ tên</div>
        </div>
        <div class="field">
          <label for="fPhone">Số điện thoại *</label>
          <input id="fPhone" name="phone" type="tel" inputmode="numeric" autocomplete="tel" placeholder="VD: 0912 345 678">
          <div class="msg">Số điện thoại chưa đúng (10 số)</div>
        </div>
        <div class="field">
          <label for="fAddr">Địa chỉ nhận hàng *</label>
          <textarea id="fAddr" name="address" rows="2" autocomplete="street-address" placeholder="Số nhà, đường, phường/xã, quận/huyện, tỉnh/thành"></textarea>
          <div class="msg">Vui lòng nhập địa chỉ nhận hàng</div>
        </div>
        <button type="submit" class="btn btn-buy" id="submitBtn">Đặt mua ngay – Bảo vệ sức khỏe bé</button>
        <p class="form-foot">(Tư vấn miễn phí &amp; Kiểm tra hàng trước khi thanh toán)</p>
      </div>
      <div class="success" id="formSuccess">
        <div class="big">✓</div>
        <h3>Đặt hàng thành công!</h3>
        <p>Cảm ơn mẹ <b id="sName"></b>. Home Care sẽ gọi số <b id="sPhone"></b> để xác nhận đơn trong ít phút nữa.</p>
      </div>
    </form>
    <?php
    return ob_get_clean();
}
