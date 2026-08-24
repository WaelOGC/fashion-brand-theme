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
 * Resolve a theme brand asset URI if the file exists.
 *
 * @param string $relative Path under assets/brand/.
 * @return string
 */
function fashion_brand_theme_get_brand_asset_uri( $relative ) {
	$relative = ltrim( (string) $relative, '/' );
	$path     = FASHION_BRAND_THEME_DIR . '/assets/brand/' . $relative;

	if ( ! is_readable( $path ) ) {
		return '';
	}

	return FASHION_BRAND_THEME_URI . '/assets/brand/' . $relative;
}

/**
 * Primary or reversed logo URI.
 *
 * @param string $variant primary|white.
 * @return string
 */
function fashion_brand_theme_get_logo_uri( $variant = 'primary' ) {
	if ( 'white' === $variant ) {
		return fashion_brand_theme_get_brand_asset_uri( 'logo/wren-wold-logo-white.svg' );
	}

	// Production identity lockup (PNG) for light headers.
	$identity = fashion_brand_theme_get_brand_asset_uri( 'identity/wren-wold-logo.png' );
	if ( '' !== $identity ) {
		return $identity;
	}

	return fashion_brand_theme_get_brand_asset_uri( 'logo/wren-wold-logo-primary.svg' );
}

/**
 * Monogram URI.
 *
 * @param string $variant primary|white.
 * @return string
 */
function fashion_brand_theme_get_monogram_uri( $variant = 'primary' ) {
	$file = ( 'white' === $variant )
		? 'monogram/wren-wold-monogram-white.svg'
		: 'monogram/wren-wold-monogram.svg';

	return fashion_brand_theme_get_brand_asset_uri( $file );
}

/**
 * Render the production WREN WOLD logo markup.
 *
 * @param array<string, mixed> $args {
 *     @type string $variant   primary|white.
 *     @type string $class     Extra class on the img.
 *     @type bool   $lazy      Whether to lazy-load (default false for header).
 *     @type string $mode      lockup|monogram|responsive (header default).
 * }
 * @return void
 */
function fashion_brand_theme_render_logo( $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'variant' => 'primary',
			'class'   => '',
			'lazy'    => false,
			'mode'    => 'lockup',
		)
	);

	$loading = ! empty( $args['lazy'] ) ? 'lazy' : 'eager';
	$variant = (string) $args['variant'];

	if ( 'responsive' === $args['mode'] ) {
		$lockup = fashion_brand_theme_get_logo_uri( $variant );
		$mono   = fashion_brand_theme_get_monogram_uri( $variant );

		if ( '' === $lockup && '' === $mono ) {
			echo esc_html( fashion_brand_theme_get_display_label() );
			return;
		}
		?>
		<span class="site-branding__marks" aria-hidden="true">
			<?php if ( $mono ) : ?>
				<img
					class="site-branding__mark site-branding__mark--monogram"
					src="<?php echo esc_url( $mono ); ?>"
					alt=""
					width="100"
					height="100"
					decoding="async"
					loading="<?php echo esc_attr( $loading ); ?>"
				/>
			<?php endif; ?>
			<?php if ( $lockup ) : ?>
				<img
					class="site-branding__mark site-branding__mark--lockup"
					src="<?php echo esc_url( $lockup ); ?>"
					alt=""
					width="600"
					height="150"
					decoding="async"
					loading="<?php echo esc_attr( $loading ); ?>"
				/>
			<?php endif; ?>
		</span>
		<?php
		return;
	}

	$uri = ( 'monogram' === $args['mode'] )
		? fashion_brand_theme_get_monogram_uri( $variant )
		: fashion_brand_theme_get_logo_uri( $variant );

	if ( '' === $uri ) {
		echo esc_html( fashion_brand_theme_get_display_label() );
		return;
	}

	$classes  = trim( 'site-branding__mark ' . (string) $args['class'] );
	$is_mono  = ( 'monogram' === $args['mode'] );
	$is_png   = (bool) preg_match( '/\.png(\?|$)/i', $uri );
	$width    = $is_mono ? '100' : ( $is_png ? '600' : '264' );
	$height   = $is_mono ? '100' : ( $is_png ? '150' : '100' );
	?>
	<img
		class="<?php echo esc_attr( $classes ); ?>"
		src="<?php echo esc_url( $uri ); ?>"
		alt="<?php echo esc_attr__( 'WREN WOLD', 'fashion-brand-theme' ); ?>"
		width="<?php echo esc_attr( $width ); ?>"
		height="<?php echo esc_attr( $height ); ?>"
		decoding="async"
		loading="<?php echo esc_attr( $loading ); ?>"
	/>
	<?php
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
