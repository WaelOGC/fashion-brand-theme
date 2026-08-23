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

$link_enabled = fashion_brand_theme_is_setting_enabled( 'announcement_link_enabled' );
$link_url     = fashion_brand_theme_get_setting( 'announcement_link_url' );
$link_label   = fashion_brand_theme_get_setting( 'announcement_link_label' );
$has_link     = $link_enabled && is_string( $link_url ) && '' !== trim( $link_url );
?>
<aside class="announcement-bar" aria-label="<?php esc_attr_e( 'Site announcement', 'fashion-brand-theme' ); ?>">
	<div class="announcement-bar__inner container">
		<p class="announcement-bar__text">
			<?php echo esc_html( $announcement_text ); ?>
			<?php if ( $has_link ) : ?>
				<a class="announcement-bar__link" href="<?php echo esc_url( $link_url ); ?>">
					<?php
					echo esc_html(
						is_string( $link_label ) && '' !== trim( $link_label )
							? $link_label
							: __( 'Learn more', 'fashion-brand-theme' )
					);
					?>
				</a>
			<?php endif; ?>
		</p>
	</div>
</aside>
