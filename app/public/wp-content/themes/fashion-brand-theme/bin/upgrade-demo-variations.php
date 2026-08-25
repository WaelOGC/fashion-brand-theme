<?php
/**
 * Upgrade demo products: attributes, variations, meta, tags.
 *
 * DEMO / TEST — run once after seed-demo-products.php.
 *
 * @package Fashion_Brand_Theme
 */

$wp_load = dirname( __DIR__, 4 ) . '/wp-load.php';
if ( ! file_exists( $wp_load ) ) {
	fwrite( STDERR, "wp-load.php not found\n" );
	exit( 1 );
}

require $wp_load;

if ( ! class_exists( 'WooCommerce' ) ) {
	fwrite( STDERR, "WooCommerce inactive\n" );
	exit( 1 );
}

fashion_brand_theme_ensure_product_attributes();

// Flush rewrite / attribute cache.
delete_transient( 'wc_attribute_taxonomies' );
WC_Cache_Helper::invalidate_cache_group( 'attribute' );

$sizes = array( 'xs', 's', 'm', 'l', 'xl' );
$size_labels = array(
	'xs' => 'XS',
	's'  => 'S',
	'm'  => 'M',
	'l'  => 'L',
	'xl' => 'XL',
);

foreach ( $size_labels as $slug => $label ) {
	if ( ! term_exists( $slug, 'pa_size' ) ) {
		wp_insert_term( $label, 'pa_size', array( 'slug' => $slug ) );
	}
}

$products = array(
	'essential-crew-tee'  => array(
		'color'       => 'ecru',
		'color_label' => 'Ecru',
		'price'       => '48',
		'composition' => '100% organic cotton',
		'care'        => 'Machine wash cold, hang dry',
		'origin'      => 'Portugal',
		'new'         => true,
		'stock'       => null,
	),
	'relaxed-zip-hoodie'  => array(
		'color'       => 'oatmeal',
		'color_label' => 'Oatmeal',
		'price'       => '98',
		'composition' => '80% cotton, 20% recycled polyester',
		'care'        => 'Machine wash cold',
		'origin'      => 'Portugal',
		'new'         => false,
		'stock'       => 3, // Low stock demo
	),
	'ribbed-knit-sweater' => array(
		'color'       => 'sage',
		'color_label' => 'Sage',
		'price'       => '128',
		'composition' => '70% merino wool, 30% recycled nylon',
		'care'        => 'Hand wash or dry clean',
		'origin'      => 'Italy',
		'new'         => true,
		'stock'       => null,
	),
	'linen-button-shirt'  => array(
		'color'       => 'ivory',
		'color_label' => 'Ivory',
		'price'       => '88',
		'composition' => '100% European linen',
		'care'        => 'Machine wash cold, line dry',
		'origin'      => 'Lithuania',
		'new'         => false,
		'stock'       => null,
	),
	'wide-leg-trouser'    => array(
		'color'       => 'olive',
		'color_label' => 'Olive',
		'price'       => '118',
		'composition' => '98% cotton, 2% elastane',
		'care'        => 'Machine wash cold',
		'origin'      => 'Tunisia',
		'new'         => false,
		'stock'       => null,
	),
	'slip-midi-dress'     => array(
		'color'       => 'clay-taupe',
		'color_label' => 'Clay Taupe',
		'price'       => '148',
		'composition' => '100% Tencel™ lyocell',
		'care'        => 'Hand wash cold',
		'origin'      => 'Portugal',
		'new'         => true,
		'stock'       => null,
	),
);

foreach ( $products as $slug => $cfg ) {
	$post = get_page_by_path( $slug, OBJECT, 'product' );
	if ( ! $post ) {
		echo "Skip missing: {$slug}\n";
		continue;
	}

	$product_id = (int) $post->ID;

	if ( ! term_exists( $cfg['color'], 'pa_color' ) ) {
		wp_insert_term( $cfg['color_label'], 'pa_color', array( 'slug' => $cfg['color'] ) );
	}

	update_post_meta( $product_id, '_fashion_brand_composition', $cfg['composition'] );
	update_post_meta( $product_id, '_fashion_brand_care', $cfg['care'] );
	update_post_meta( $product_id, '_fashion_brand_origin', $cfg['origin'] );

	if ( $cfg['new'] ) {
		wp_set_object_terms( $product_id, array( 'new' ), 'product_tag', true );
	}

	// Build attribute objects.
	$color_attr = new WC_Product_Attribute();
	$color_attr->set_id( wc_attribute_taxonomy_id_by_name( 'pa_color' ) );
	$color_attr->set_name( 'pa_color' );
	$color_attr->set_options( array( $cfg['color'] ) );
	$color_attr->set_visible( true );
	$color_attr->set_variation( true );

	$size_attr = new WC_Product_Attribute();
	$size_attr->set_id( wc_attribute_taxonomy_id_by_name( 'pa_size' ) );
	$size_attr->set_name( 'pa_size' );
	$size_attr->set_options( $sizes );
	$size_attr->set_visible( true );
	$size_attr->set_variation( true );

	$existing = wc_get_product( $product_id );
	$image_id = $existing ? $existing->get_image_id() : 0;
	$gallery  = $existing ? $existing->get_gallery_image_ids() : array();
	$cats     = $existing ? $existing->get_category_ids() : array();
	$name     = $existing ? $existing->get_name() : $post->post_title;
	$desc     = $existing ? $existing->get_description() : '';
	$short    = $existing ? $existing->get_short_description() : '';
	$sku      = $existing ? $existing->get_sku() : '';

	// Delete old variations if re-running.
	$children = $existing ? $existing->get_children() : array();
	foreach ( $children as $child_id ) {
		wp_delete_post( $child_id, true );
	}

	wp_set_object_terms( $product_id, 'variable', 'product_type' );

	$variable = new WC_Product_Variable( $product_id );
	$variable->set_name( $name );
	$variable->set_status( 'publish' );
	$variable->set_catalog_visibility( 'visible' );
	$variable->set_description( $desc );
	$variable->set_short_description( $short );
	$variable->set_sku( $sku );
	$variable->set_category_ids( $cats );
	$variable->set_image_id( $image_id );
	$variable->set_gallery_image_ids( $gallery );
	$variable->set_attributes( array( $color_attr, $size_attr ) );
	$variable->save();

	wp_set_object_terms( $product_id, array( $cfg['color'] ), 'pa_color' );
	wp_set_object_terms( $product_id, $sizes, 'pa_size' );

	foreach ( $sizes as $i => $size_slug ) {
		$variation = new WC_Product_Variation();
		$variation->set_parent_id( $product_id );
		$variation->set_attributes(
			array(
				'pa_color' => $cfg['color'],
				'pa_size'  => $size_slug,
			)
		);
		$variation->set_regular_price( $cfg['price'] );
		$variation->set_price( $cfg['price'] );
		$variation->set_status( 'publish' );

		if ( null !== $cfg['stock'] && 'm' === $size_slug ) {
			$variation->set_manage_stock( true );
			$variation->set_stock_quantity( $cfg['stock'] );
			$variation->set_stock_status( 'instock' );
		} elseif ( null !== $cfg['stock'] && 'xs' === $size_slug ) {
			$variation->set_manage_stock( true );
			$variation->set_stock_quantity( 0 );
			$variation->set_stock_status( 'outofstock' );
		} else {
			$variation->set_manage_stock( false );
			$variation->set_stock_status( 'instock' );
		}

		$variation->save();
	}

	WC_Product_Variable::sync( $product_id );
	wc_delete_product_transients( $product_id );

	echo "Upgraded variable: {$name} (#{$product_id}) color={$cfg['color']}\n";
}

// Mark one simple sale for badge demo — put tee M on sale via variation update.
$tee = get_page_by_path( 'essential-crew-tee', OBJECT, 'product' );
if ( $tee ) {
	$tee_product = wc_get_product( $tee->ID );
	if ( $tee_product && $tee_product->is_type( 'variable' ) ) {
		foreach ( $tee_product->get_children() as $vid ) {
			$v = wc_get_product( $vid );
			if ( $v && 'm' === $v->get_attribute( 'pa_size' ) ) {
				$v->set_sale_price( '38' );
				$v->set_price( '38' );
				$v->save();
			}
		}
		WC_Product_Variable::sync( $tee->ID );
		echo "Sale price set on Essential Crew Tee / M\n";
	}
}

echo "Done.\n";
