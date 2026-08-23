<?php
/**
 * Site footer partial.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! fashion_brand_theme_is_setting_enabled( 'footer_visible' ) ) {
	return;
}

$copyright_text = fashion_brand_theme_get_setting( 'footer_copyright_text' );
$social_links     = fashion_brand_theme_get_social_links();
?>
<footer id="colophon" class="site-footer">
	<div class="site-footer__inner container">
		<p class="site-footer__copyright">
			<?php if ( is_string( $copyright_text ) && '' !== trim( $copyright_text ) ) : ?>
				<?php echo esc_html( $copyright_text ); ?>
			<?php else : ?>
				&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
			<?php endif; ?>
		</p>

		<?php if ( ! empty( $social_links ) ) : ?>
			<nav class="site-footer__social" aria-label="<?php esc_attr_e( 'Social links', 'fashion-brand-theme' ); ?>">
				<ul class="site-footer__social-list">
					<?php foreach ( $social_links as $platform => $url ) : ?>
						<li>
							<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
								<?php echo esc_html( ucfirst( $platform ) ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endif; ?>
	</div>
</footer>
