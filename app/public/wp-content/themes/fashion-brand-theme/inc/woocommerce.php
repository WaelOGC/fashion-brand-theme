<?php
/**
 * WooCommerce theme integration.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register WooCommerce theme support when the plugin is active.
 */
function fashion_brand_theme_woocommerce_setup() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 800,
			'single_image_width'    => 1200,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 4,
			),
		)
	);

	// Custom gallery — default WC zoom / lightbox / slider not enabled.
}
add_action( 'after_setup_theme', 'fashion_brand_theme_woocommerce_setup' );

/**
 * Theme content wrappers for WooCommerce pages.
 */
function fashion_brand_theme_wc_wrapper_start() {
	echo '<main id="primary" class="site-main site-main--shop">';
}

/**
 * Close theme content wrappers for WooCommerce pages.
 */
function fashion_brand_theme_wc_wrapper_end() {
	echo '</main>';
}

/**
 * Replace default WooCommerce wrappers and trim the product loop.
 */
function fashion_brand_theme_woocommerce_hooks() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_before_main_content', 'fashion_brand_theme_wc_wrapper_start', 10 );
	add_action( 'woocommerce_after_main_content', 'fashion_brand_theme_wc_wrapper_end', 10 );

	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
	remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
}
add_action( 'wp', 'fashion_brand_theme_woocommerce_hooks' );

/**
 * Force four-column shop grid to match the approved layout.
 *
 * @return int
 */
function fashion_brand_theme_loop_shop_columns() {
	return 4;
}
add_filter( 'loop_shop_columns', 'fashion_brand_theme_loop_shop_columns', 30 );

/**
 * Body class for shop/product templates.
 *
 * @param string[] $classes Body classes.
 * @return string[]
 */
function fashion_brand_theme_woocommerce_body_class( $classes ) {
	if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
		$classes[] = 'woocommerce-brand';
	}

	return $classes;
}
add_filter( 'body_class', 'fashion_brand_theme_woocommerce_body_class' );

/**
 * Related products args — keep using shop-grid card styling.
 *
 * With one demo product per category, widen the pool so the section still renders.
 *
 * @param array $args Related products args.
 * @return array
 */
function fashion_brand_theme_related_products_args( $args ) {
	$args['posts_per_page'] = 4;
	$args['columns']        = 4;

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'fashion_brand_theme_related_products_args' );

/**
 * Prefer same-category related IDs; fall back to other published products for demos.
 *
 * @param int[]        $related_ids Related product IDs.
 * @param int          $product_id  Current product ID.
 * @param array        $args        Query args.
 * @param WC_Product   $product     Product object.
 * @return int[]
 */
function fashion_brand_theme_related_products( $related_ids, $product_id, $args, $product ) { // phpcs:ignore Generic.CodeAnalysis.UnusedFunctionParameter
	$limit = isset( $args['limit'] ) ? (int) $args['limit'] : 4;

	if ( count( $related_ids ) >= $limit ) {
		return $related_ids;
	}

	$fallback = wc_get_products(
		array(
			'status'  => 'publish',
			'limit'   => $limit + 1,
			'exclude' => array( $product_id ),
			'return'  => 'ids',
			'orderby' => 'rand',
		)
	);

	$merged = array_values( array_unique( array_merge( $related_ids, $fallback ) ) );

	return array_slice( $merged, 0, $limit );
}
add_filter( 'woocommerce_related_products', 'fashion_brand_theme_related_products', 10, 4 );

/**
 * Primary + hover image IDs for a product card.
 *
 * Featured = primary flat-lay. First gallery image = hover crop.
 *
 * @param WC_Product $product Product.
 * @return array{primary:int,hover:int}
 */
function fashion_brand_theme_get_product_card_image_ids( $product ) {
	$primary = (int) $product->get_image_id();
	$gallery = $product->get_gallery_image_ids();
	$hover   = ! empty( $gallery[0] ) ? (int) $gallery[0] : $primary;

	return array(
		'primary' => $primary,
		'hover'   => $hover,
	);
}

/**
 * Ordered gallery IDs for the single product page: worn → primary → hover.
 *
 * Seeded gallery order is [hover, worn]; featured is primary.
 *
 * @param WC_Product $product Product.
 * @return int[]
 */
function fashion_brand_theme_get_product_page_gallery_ids( $product ) {
	$primary = (int) $product->get_image_id();
	$gallery = array_map( 'intval', $product->get_gallery_image_ids() );
	$hover   = $gallery[0] ?? 0;
	$worn    = $gallery[1] ?? 0;

	$ordered = array_filter( array( $worn, $primary, $hover ) );

	return array_values( array_unique( $ordered ) );
}

/**
 * Render a product image by attachment ID.
 *
 * @param int    $attachment_id Attachment ID.
 * @param string $size          Image size.
 * @param string $class         CSS class.
 * @param string $alt           Alt text.
 * @return void
 */
function fashion_brand_theme_render_product_img( $attachment_id, $size, $class, $alt = '' ) {
	if ( ! $attachment_id ) {
		return;
	}

	echo wp_get_attachment_image(
		$attachment_id,
		$size,
		false,
		array(
			'class'   => $class,
			'alt'     => $alt,
			'loading' => 'lazy',
		)
	);
}
