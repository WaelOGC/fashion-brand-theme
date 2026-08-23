<?php
/**
 * Custom action and filter hooks.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output opening markup for the site header region.
 */
function fashion_brand_theme_header() {
	do_action( 'fashion_brand_theme_before_header' );
	get_template_part( 'template-parts/header/site', 'header' );
	do_action( 'fashion_brand_theme_after_header' );
}

/**
 * Output closing markup for the site footer region.
 */
function fashion_brand_theme_footer() {
	do_action( 'fashion_brand_theme_before_footer' );
	get_template_part( 'template-parts/footer/site', 'footer' );
	do_action( 'fashion_brand_theme_after_footer' );
}
