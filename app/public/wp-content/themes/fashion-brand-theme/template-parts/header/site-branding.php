<?php
/**
 * Site branding — production WREN WOLD logo.
 *
 * Customizer custom logo still wins when set.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$home_url = home_url( '/' );
?>
<div class="site-branding">
	<?php if ( has_custom_logo() ) : ?>
		<?php the_custom_logo(); ?>
	<?php else : ?>
		<p class="site-branding__logo">
			<a class="site-branding__link" href="<?php echo esc_url( $home_url ); ?>" rel="home">
				<?php fashion_brand_theme_render_logo( array( 'variant' => 'primary', 'mode' => 'responsive' ) ); ?>
				<span class="screen-reader-text"><?php echo esc_html( fashion_brand_theme_get_display_label() ); ?></span>
			</a>
		</p>
	<?php endif; ?>
</div>
