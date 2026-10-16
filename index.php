<?php
/**
 * Main Template File
 *
 * @package LXLanding
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

get_template_part('template-parts/hero');
get_template_part('template-parts/pain');
get_template_part('template-parts/benefits');
get_template_part('template-parts/ingredients');
get_template_part('template-parts/compact');
get_template_part('template-parts/usage');
get_template_part('template-parts/proof');
get_template_part('template-parts/order');
get_template_part('template-parts/final');

get_footer();
