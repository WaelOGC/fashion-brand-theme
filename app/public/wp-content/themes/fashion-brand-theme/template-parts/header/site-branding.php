<?php
/**
 * Site branding placeholder.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$logo_placeholder = fashion_brand_theme_get_display_label();
?>
<div class="site-branding">
	<?php if ( has_custom_logo() ) : ?>
		<?php the_custom_logo(); ?>
	<?php elseif ( is_front_page() && is_home() ) : ?>
		<h1 class="site-branding__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( $logo_placeholder ); ?>
			</a>
		</h1>
	<?php else : ?>
		<p class="site-branding__logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php echo esc_html( $logo_placeholder ); ?>
			</a>
		</p>
	<?php endif; ?>
</div>
