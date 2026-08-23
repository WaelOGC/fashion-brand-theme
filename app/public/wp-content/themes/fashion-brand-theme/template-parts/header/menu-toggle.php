<?php
/**
 * Mobile menu toggle.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<button
	type="button"
	class="menu-toggle"
	aria-expanded="false"
	aria-controls="site-navigation"
	aria-label="<?php esc_attr_e( 'Open menu', 'fashion-brand-theme' ); ?>"
	data-menu-toggle
>
	<span class="menu-toggle__label"><?php esc_html_e( 'Menu', 'fashion-brand-theme' ); ?></span>
	<span class="menu-toggle__icon" aria-hidden="true"></span>
</button>
