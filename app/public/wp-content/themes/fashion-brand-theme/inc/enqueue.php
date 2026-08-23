<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue front-end assets.
 */
function fashion_brand_theme_enqueue_assets() {
	wp_enqueue_style(
		'fashion-brand-theme-main',
		FASHION_BRAND_THEME_URI . '/assets/css/main.css',
		array(),
		FASHION_BRAND_THEME_VERSION
	);

	wp_enqueue_script(
		'fashion-brand-theme-main',
		FASHION_BRAND_THEME_URI . '/assets/js/main.js',
		array(),
		FASHION_BRAND_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'fashion_brand_theme_enqueue_assets' );
