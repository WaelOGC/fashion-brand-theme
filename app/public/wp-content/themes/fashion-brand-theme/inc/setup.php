<?php
/**
 * Theme setup.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme defaults and WordPress feature support.
 */
function fashion_brand_theme_setup() {
	load_theme_textdomain( 'fashion-brand-theme', FASHION_BRAND_THEME_DIR . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Navigation', 'fashion-brand-theme' ),
			'utility' => esc_html__( 'Utility Navigation', 'fashion-brand-theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'fashion_brand_theme_setup' );

/**
 * Set the content width in pixels.
 */
function fashion_brand_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fashion_brand_theme_content_width', 1200 );
}
add_action( 'after_setup_theme', 'fashion_brand_theme_content_width', 0 );
