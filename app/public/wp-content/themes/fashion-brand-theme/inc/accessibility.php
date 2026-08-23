<?php
/**
 * Accessibility helpers.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output a skip link to the main content area.
 */
function fashion_brand_theme_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#primary">' . esc_html__( 'Skip to content', 'fashion-brand-theme' ) . '</a>';
}
add_action( 'wp_body_open', 'fashion_brand_theme_skip_link', 5 );
