<?php
/**
 * Theme Helper Functions
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get ACF field with fallback to WordPress option and default value
 *
 * @param string $field_name
 * @param mixed  $post_id
 * @param mixed  $default
 * @return mixed
 */
function lx_get_field($field_name, $post_id = 'option', $default = '') {
    // 1. Try ACF get_field first
    if (function_exists('get_field')) {
        $value = get_field($field_name, $post_id);
        if ($value !== null && $value !== false && $value !== '') {
            return $value;
        }
    }

    // 2. Fallback to direct WordPress get_option
    if ($post_id === 'option' || $post_id === 'options') {
        $opt = get_option('options_' . $field_name, null);
        if ($opt !== null && $opt !== false && $opt !== '') {
            return $opt;
        }
        $opt_direct = get_option($field_name, null);
        if ($opt_direct !== null && $opt_direct !== false && $opt_direct !== '') {
            return $opt_direct;
        }
    }

    return $default;
}

/**
 * Get image URL from ACF field (ID, Array or string URL) with default fallback
 *
 * @param string $field_name
 * @param string $default_url
 * @param mixed  $post_id
 * @return string
 */
function lx_get_image_url($field_name, $default_url = '', $post_id = 'option') {
    $field = lx_get_field($field_name, $post_id, null);
    if (empty($field)) {
        return $default_url;
    }
    if (is_numeric($field)) {
        $url = wp_get_attachment_image_url((int)$field, 'full');
        return $url ? $url : $default_url;
    }
    if (is_array($field) && !empty($field['url'])) {
        return $field['url'];
    }
    if (is_string($field)) {
        $trimmed = trim($field);
        if (is_numeric($trimmed)) {
            $url = wp_get_attachment_image_url((int)$trimmed, 'full');
            return $url ? $url : $default_url;
        }
        if (filter_var($trimmed, FILTER_VALIDATE_URL) || strpos($trimmed, '/') !== false) {
            return $trimmed;
        }
    }
    return $default_url;
}

/**
 * Render image slot (Server-side <img> if set in ACF, or interactive placeholder)
 *
 * @param string $field_name ACF field name
 * @param string $key        data-img key
 * @param string $title      Image title / description
 * @param string $spec       Dimensions spec
 * @param string $classes    Extra CSS classes
 * @param string $style      Inline style
 * @return string HTML
 */
function lx_render_image_slot($field_name, $key, $title, $spec = '', $classes = '', $style = '') {
    $img_url = lx_get_image_url($field_name, '');
    $show_placeholders = (bool) lx_get_field('lx_show_placeholders', 'option', true);

    $badge = 'ẢNH';
    if (preg_match('/(ẢNH\s+\d+)/u', $title, $m)) {
        $badge = $m[1];
    }

    if (!empty($img_url)) {
        $outer_classes = trim('ph ' . $classes . ' filled');
        return '<div class="' . esc_attr($outer_classes) . '" data-img="' . esc_attr($key) . '" style="' . esc_attr($style) . '">' .
               '<img src="' . esc_url($img_url) . '" alt="' . esc_attr($title) . '" loading="lazy" />' .
               '</div>';
    }

    if (!$show_placeholders) {
        $outer_classes = trim('ph ' . $classes . ' hide');
        return '<div class="' . esc_attr($outer_classes) . '" data-img="' . esc_attr($key) . '" style="' . esc_attr($style) . '"></div>';
    }

    $outer_classes = trim('ph ' . $classes);
    $html = '<div class="' . esc_attr($outer_classes) . '" data-img="' . esc_attr($key) . '"';
    if (!empty($spec)) {
        $html .= ' data-spec="' . esc_attr($spec) . '"';
    }
    $html .= ' style="' . esc_attr($style) . '">';
    $html .= '<span class="ph-n">📷 ' . esc_html($badge) . '</span>';
    $html .= '<b>' . esc_html($title) . '</b>';
    if (!empty($spec)) {
        $html .= '<small>' . esc_html($spec) . '</small>';
    }
    $html .= '</div>';

    return $html;
}
