<?php
/**
 * Primary navigation.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary Navigation', 'fashion-brand-theme' ); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'primary-menu',
			'container'      => false,
			'depth'          => 2,
			'fallback_cb'    => 'fashion_brand_theme_primary_nav_fallback',
		)
	);
	?>
</nav>
