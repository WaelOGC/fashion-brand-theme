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

	if ( is_front_page() ) {
		wp_enqueue_script(
			'fashion-brand-theme-homepage',
			FASHION_BRAND_THEME_URI . '/assets/js/homepage.js',
			array(),
			FASHION_BRAND_THEME_VERSION,
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'fashion_brand_theme_enqueue_assets' );

/**
 * Output production favicon links when no Customizer site icon is set.
 *
 * @return void
 */
function fashion_brand_theme_brand_icons() {
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) {
		return;
	}

	$ico   = fashion_brand_theme_get_brand_asset_uri( 'favicon/wren-wold-favicon.ico' );
	$png   = fashion_brand_theme_get_brand_asset_uri( 'favicon/wren-wold-favicon-32.png' );
	$apple = fashion_brand_theme_get_brand_asset_uri( 'favicon/wren-wold-favicon-180.png' );

	if ( $ico ) {
		printf( '<link rel="icon" href="%s" sizes="any">' . "\n", esc_url( $ico ) );
	}

	if ( $png ) {
		printf( '<link rel="icon" type="image/png" href="%s" sizes="32x32">' . "\n", esc_url( $png ) );
	}

	if ( $apple ) {
		printf( '<link rel="apple-touch-icon" href="%s">' . "\n", esc_url( $apple ) );
	}
}
add_action( 'wp_head', 'fashion_brand_theme_brand_icons', 2 );
