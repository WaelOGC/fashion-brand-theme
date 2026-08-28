<?php
/**
 * Theme bootstrap.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FASHION_BRAND_THEME_VERSION', '0.4.1' );
define( 'FASHION_BRAND_THEME_DIR', get_template_directory() );
define( 'FASHION_BRAND_THEME_URI', get_template_directory_uri() );

require FASHION_BRAND_THEME_DIR . '/inc/setup.php';
require FASHION_BRAND_THEME_DIR . '/inc/social-media.php';
require FASHION_BRAND_THEME_DIR . '/inc/enqueue.php';
require FASHION_BRAND_THEME_DIR . '/inc/template-functions.php';
require FASHION_BRAND_THEME_DIR . '/inc/navigation.php';
require FASHION_BRAND_THEME_DIR . '/inc/homepage.php';
require FASHION_BRAND_THEME_DIR . '/inc/template-hooks.php';
require FASHION_BRAND_THEME_DIR . '/inc/accessibility.php';
require FASHION_BRAND_THEME_DIR . '/inc/woocommerce.php';
require FASHION_BRAND_THEME_DIR . '/inc/woocommerce-catalog.php';
require FASHION_BRAND_THEME_DIR . '/inc/admin/settings.php';
require FASHION_BRAND_THEME_DIR . '/inc/admin/customizer.php';
require FASHION_BRAND_THEME_DIR . '/inc/admin/collections-admin.php';

if ( is_admin() ) {
	require FASHION_BRAND_THEME_DIR . '/inc/admin/admin.php';
}
