<?php
/**
 * Homepage data helpers.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * URI for a homepage photography demo asset.
 *
 * @param string $relative Path under homepage-photography/, e.g. 'hero/hero-editorial-01.jpg'.
 * @return string
 */
function fashion_brand_theme_homepage_image_uri( $relative ) {
	$relative = ltrim( (string) $relative, '/' );

	return get_template_directory_uri() . '/assets/images/homepage-photography/' . $relative;
}

/**
 * Featured homepage categories (canonical capsule set).
 *
 * @return array<string, string> Category slug => label.
 */
function fashion_brand_theme_get_homepage_categories() {
	return fashion_brand_theme_get_product_category_slugs();
}

/**
 * Placeholder guide teasers.
 *
 * @return array<int, array<string, string>>
 */
function fashion_brand_theme_get_homepage_guide_teasers() {
	return array(
		array(
			'title'   => __( 'Building a Capsule Wardrobe', 'fashion-brand-theme' ),
			'excerpt' => __( 'A practical approach to fewer, better pieces that work across your week.', 'fashion-brand-theme' ),
		),
		array(
			'title'   => __( 'Fabric Choices That Last', 'fashion-brand-theme' ),
			'excerpt' => __( 'Understanding materials, drape and care before you buy.', 'fashion-brand-theme' ),
		),
		array(
			'title'   => __( 'Dressing for the Week', 'fashion-brand-theme' ),
			'excerpt' => __( 'How to move from desk to dinner without rebuilding your wardrobe.', 'fashion-brand-theme' ),
		),
	);
}

/**
 * Live WooCommerce cart item count.
 *
 * @return int
 */
function fashion_brand_theme_get_cart_count() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return 0;
	}

	return (int) WC()->cart->get_cart_contents_count();
}

/**
 * Render cinematic cart count badge markup (fragment target).
 *
 * @param int|null $count Optional count override.
 * @return void
 */
function fashion_brand_theme_render_cinematic_cart_count( $count = null ) {
	if ( null === $count ) {
		$count = fashion_brand_theme_get_cart_count();
	}

	$count = (int) $count;
	?>
	<span
		class="cinematic-cart-count<?php echo $count > 0 ? '' : ' is-empty'; ?>"
		data-cart-count="<?php echo esc_attr( (string) $count ); ?>"
		<?php echo $count > 0 ? '' : ' hidden'; ?>
	><?php echo esc_html( (string) $count ); ?></span>
	<?php
}

/**
 * Refresh cinematic cart badge via WooCommerce cart fragments.
 *
 * @param array<string, string> $fragments Fragments HTML.
 * @return array<string, string>
 */
function fashion_brand_theme_cinematic_cart_fragments( $fragments ) {
	ob_start();
	fashion_brand_theme_render_cinematic_cart_count();
	$fragments['span.cinematic-cart-count'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'fashion_brand_theme_cinematic_cart_fragments' );
