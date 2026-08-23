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
 * Featured homepage categories (excluding All Products).
 *
 * @return array<string, string> Category slug => label.
 */
function fashion_brand_theme_get_homepage_categories() {
	$categories = fashion_brand_theme_get_shop_categories();
	unset( $categories['all-products'] );

	return $categories;
}

/**
 * Layout modifier for editorial category tiles.
 *
 * @param int $index Zero-based position in the category list.
 * @return string BEM modifier suffix.
 */
function fashion_brand_theme_get_homepage_category_layout_modifier( $index ) {
	$modifiers = array(
		'tall',
		'offset',
		'compact',
		'wide',
		'standard',
		'offset',
		'feature',
	);

	return $modifiers[ $index ] ?? 'standard';
}

/**
 * Placeholder featured collection items.
 *
 * @return array<int, array<string, string>>
 */
function fashion_brand_theme_get_featured_collection_items() {
	return array(
		array(
			'title'       => __( 'Structured Wool Coat', 'fashion-brand-theme' ),
			'note'        => __( 'Placeholder product photography', 'fashion-brand-theme' ),
			'price'       => '€289',
			'is_featured' => true,
		),
		array(
			'title'       => __( 'Silk Blend Blouse', 'fashion-brand-theme' ),
			'note'        => __( 'Placeholder product photography', 'fashion-brand-theme' ),
			'price'       => '€119',
			'is_featured' => false,
		),
		array(
			'title'       => __( 'Tailored Wide-Leg Trouser', 'fashion-brand-theme' ),
			'note'        => __( 'Placeholder product photography', 'fashion-brand-theme' ),
			'price'       => '€149',
			'is_featured' => false,
		),
		array(
			'title'       => __( 'Compact Merino Knit', 'fashion-brand-theme' ),
			'note'        => __( 'Placeholder product photography', 'fashion-brand-theme' ),
			'price'       => '€99',
			'is_featured' => false,
		),
	);
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
	);
}
