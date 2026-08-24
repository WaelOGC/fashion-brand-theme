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

$copyright_text   = fashion_brand_theme_get_setting( 'footer_copyright_text' );
$show_copyright   = fashion_brand_theme_is_setting_enabled( 'footer_copyright_enabled' );
$show_social      = fashion_brand_theme_is_setting_enabled( 'footer_social_enabled' );
$show_footer_menu = fashion_brand_theme_is_setting_enabled( 'footer_menu_enabled' );
$social_links     = fashion_brand_theme_get_social_links();
$social_target    = fashion_brand_theme_get_social_link_target();
$social_rel       = fashion_brand_theme_get_social_link_rel();
?>
<footer id="colophon" class="site-footer">
	<div class="site-footer__inner container">
		<?php
		$monogram_uri = fashion_brand_theme_get_monogram_uri( 'primary' );
		if ( $monogram_uri ) :
			?>
			<p class="site-footer__brand">
				<a class="site-footer__brand-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<img
						class="site-footer__monogram"
						src="<?php echo esc_url( $monogram_uri ); ?>"
						alt=""
						width="40"
						height="40"
						decoding="async"
						loading="lazy"
					/>
					<span class="screen-reader-text"><?php echo esc_html( fashion_brand_theme_get_display_label() ); ?></span>
				</a>
			</p>
		<?php endif; ?>

		<?php if ( $show_footer_menu && has_nav_menu( 'footer' ) ) : ?>
			<nav class="site-footer__menu" aria-label="<?php esc_attr_e( 'Footer Navigation', 'fashion-brand-theme' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'menu_class'     => 'site-footer__menu-list',
						'depth'          => 1,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		<?php endif; ?>

		<?php if ( $show_copyright ) : ?>
			<p class="site-footer__copyright">
				<?php if ( is_string( $copyright_text ) && '' !== trim( $copyright_text ) ) : ?>
					<?php echo esc_html( $copyright_text ); ?>
				<?php else : ?>
					&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( fashion_brand_theme_get_display_label() ); ?></a>
				<?php endif; ?>
			</p>
		<?php endif; ?>

		<?php if ( $show_social && ! empty( $social_links ) ) : ?>
			<nav class="site-footer__social" aria-label="<?php esc_attr_e( 'Social links', 'fashion-brand-theme' ); ?>">
				<ul class="site-footer__social-list">
					<?php foreach ( $social_links as $platform => $url ) : ?>
						<li>
							<a
								href="<?php echo esc_url( $url ); ?>"
								<?php if ( '_blank' === $social_target ) : ?>
									target="_blank" rel="<?php echo esc_attr( $social_rel ); ?>"
								<?php endif; ?>
							>
								<?php echo esc_html( ucfirst( $platform ) ); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
		<?php endif; ?>
	</div>
</footer>
