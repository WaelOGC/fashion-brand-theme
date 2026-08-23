<?php
/**
 * Template helper functions.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the site title or custom logo.
 */
function fashion_brand_theme_site_branding() {
	if ( has_custom_logo() ) {
		the_custom_logo();
		return;
	}

	if ( is_front_page() && is_home() ) {
		?>
		<h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
		</h1>
		<?php
		return;
	}

	?>
	<p class="site-title">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
	</p>
	<?php
}
