<?php
/**
 * Enqueue Styles and Scripts
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add preconnect resource hints for Google Fonts
 *
 * @param array  $urls
 * @param string $relation_type
 * @return array
 */
function lx_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'lx_resource_hints', 10, 2);

/**
 * Enqueue scripts and styles
 */
function lx_enqueue_scripts() {
    // Google Fonts: Nunito & Quicksand
    wp_enqueue_style(
        'lx-landing-fonts',
        'https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&family=Quicksand:wght@500;600;700&display=swap',
        array(),
        null
    );

    // Main Theme CSS
    wp_enqueue_style(
        'lx-landing-main',
        LX_THEME_URI . '/assets/css/main.css',
        array(),
        LX_THEME_VERSION
    );

    // Main Theme JS
    wp_enqueue_script(
        'lx-landing-main',
        LX_THEME_URI . '/assets/js/main.js',
        array(),
        LX_THEME_VERSION,
        true
    );

    $default_sheet = 'https://script.google.com/macros/s/AKfycbx2mCi48FGEQtg9pjX_YuWUxFbQdxe2aj5iUHDDj4-4s9qLyykE6EZySZ1V6UnZydHJ-A/exec';
    $sheet_url = lx_get_field('lx_sheet_endpoint', 'option', $default_sheet);

    $config = array(
        'hotline'        => lx_get_field('lx_hotline', 'option', '0989890779'),
        'zalo'           => lx_get_field('lx_zalo', 'option', '0989890779'),
        'logo'           => 'https://cdn.hstatic.net/themes/200001066686/1001439050/14/logo.png',
        'showImageNotes' => (bool) lx_get_field('lx_show_placeholders', 'option', true),
        'orderEndpoint'  => $sheet_url,
        'unitPrice'      => (int) lx_get_field('lx_unit_price', 'option', 49000),
        'oldPrice'       => (int) lx_get_field('lx_old_price', 'option', 87000),
        'countdownHours' => 2,
        'images'         => array(
            'hero'        => lx_get_image_url('lx_img_hero', ''),
            'pain1'       => lx_get_image_url('lx_img_pain1', ''),
            'pain2'       => lx_get_image_url('lx_img_pain2', ''),
            'pain3'       => lx_get_image_url('lx_img_pain3', ''),
            'pain4'       => lx_get_image_url('lx_img_pain4', ''),
            'pain'        => lx_get_image_url('lx_img_pain', ''),
            'ben1'        => lx_get_image_url('lx_img_ben1', ''),
            'ben2'        => lx_get_image_url('lx_img_ben2', ''),
            'ben3'        => lx_get_image_url('lx_img_ben3', ''),
            'ben4'        => lx_get_image_url('lx_img_ben4', ''),
            'ing1'        => lx_get_image_url('lx_img_ing1', ''),
            'ing2'        => lx_get_image_url('lx_img_ing2', ''),
            'ing3'        => lx_get_image_url('lx_img_ing3', ''),
            'ing4'        => lx_get_image_url('lx_img_ing4', ''),
            'ingredients' => lx_get_image_url('lx_img_ingredients', ''),
            'handheld'    => lx_get_image_url('lx_img_handheld', ''),
            'certificate' => lx_get_image_url('lx_img_certificate', ''),
            'step1'       => lx_get_image_url('lx_img_step1', ''),
            'step2'       => lx_get_image_url('lx_img_step2', ''),
            'step3'       => lx_get_image_url('lx_img_step3', ''),
            'feedback1'   => lx_get_image_url('lx_img_feedback1', ''),
            'feedback2'   => lx_get_image_url('lx_img_feedback2', ''),
            'feedback3'   => lx_get_image_url('lx_img_feedback3', ''),
            'feedback4'   => lx_get_image_url('lx_img_feedback4', ''),
            'service'     => lx_get_image_url('lx_img_service', ''),
            'offer'       => lx_get_image_url('lx_img_offer', ''),
        ),
    );

    wp_localize_script('lx-landing-main', 'CONFIG', $config);
}
add_action('wp_enqueue_scripts', 'lx_enqueue_scripts');
