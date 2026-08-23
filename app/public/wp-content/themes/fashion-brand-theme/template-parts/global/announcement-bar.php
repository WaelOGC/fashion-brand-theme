<?php
/**
 * Global announcement bar.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$announcement_text = fashion_brand_theme_get_setting( 'announcement_text' );

if ( ! is_string( $announcement_text ) || '' === trim( $announcement_text ) ) {
	return;
}
?>
<aside class="announcement-bar" aria-label="<?php esc_attr_e( 'Site announcement', 'fashion-brand-theme' ); ?>">
	<div class="announcement-bar__inner container">
		<p class="announcement-bar__text"><?php echo esc_html( $announcement_text ); ?></p>
	</div>
</aside>
