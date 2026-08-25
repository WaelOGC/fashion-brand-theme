<?php
/**
 * One-off seeder: 6 demo WooCommerce products with photography.
 *
 * DEMO / TEST CONTENT — replace with real products before launch.
 * Run via Local PHP with site php.ini (mysqli), then delete this file if desired.
 *
 * @package Fashion_Brand_Theme
 */

// Bootstrap WordPress from this theme file location.
$wp_load = dirname( __DIR__, 4 ) . '/wp-load.php';
if ( ! file_exists( $wp_load ) ) {
	fwrite( STDERR, "wp-load.php not found at {$wp_load}\n" );
	exit( 1 );
}

require $wp_load;

if ( ! class_exists( 'WooCommerce' ) ) {
	fwrite( STDERR, "WooCommerce is not active.\n" );
	exit( 1 );
}

require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

$theme_dir = get_template_directory();
$photo_root = $theme_dir . '/assets/images/product-photography';

/**
 * Products to seed. Round placeholder prices mark DEMO content.
 *
 * @var array<int, array<string, mixed>>
 */
$products = array(
	array(
		'name'        => 'Essential Crew Tee',
		'slug'        => 'essential-crew-tee',
		'category'    => 't-shirts',
		'folder'      => 'tshirts',
		'color'       => 'ecru',
		'price'       => '48', // DEMO placeholder price
		'description' => 'Soft cotton crew in ecru. Demo product for theme photography — replace before launch.',
	),
	array(
		'name'        => 'Relaxed Zip Hoodie',
		'slug'        => 'relaxed-zip-hoodie',
		'category'    => 'hoodies',
		'folder'      => 'hoodies',
		'color'       => 'oatmeal',
		'price'       => '98', // DEMO placeholder price
		'description' => 'Relaxed zip hoodie in oatmeal. Demo product for theme photography — replace before launch.',
	),
	array(
		'name'        => 'Ribbed Knit Sweater',
		'slug'        => 'ribbed-knit-sweater',
		'category'    => 'knitwear',
		'folder'      => 'knitwear',
		'color'       => 'sage',
		'price'       => '128', // DEMO placeholder price
		'description' => 'Ribbed knit sweater in sage. Demo product for theme photography — replace before launch.',
	),
	array(
		'name'        => 'Linen Button Shirt',
		'slug'        => 'linen-button-shirt',
		'category'    => 'shirts',
		'folder'      => 'shirts',
		'color'       => 'ivory',
		'price'       => '88', // DEMO placeholder price
		'description' => 'Linen button shirt in ivory. Demo product for theme photography — replace before launch.',
	),
	array(
		'name'        => 'Wide-Leg Trouser',
		'slug'        => 'wide-leg-trouser',
		'category'    => 'pants',
		'folder'      => 'pants',
		'color'       => 'olive',
		'price'       => '118', // DEMO placeholder price
		'description' => 'Wide-leg trouser in olive. Demo product for theme photography — replace before launch.',
	),
	array(
		'name'        => 'Slip Midi Dress',
		'slug'        => 'slip-midi-dress',
		'category'    => 'dresses',
		'folder'      => 'dresses',
		'color'       => 'clay-taupe',
		'price'       => '148', // DEMO placeholder price
		'description' => 'Slip midi dress in clay-taupe. Demo product for theme photography — replace before launch.',
	),
);

$category_labels = array(
	't-shirts' => 'T-Shirts',
	'hoodies'  => 'Hoodies',
	'knitwear' => 'Knitwear',
	'shirts'   => 'Shirts',
	'pants'    => 'Pants',
	'dresses'  => 'Dresses',
);

/**
 * Ensure a product category term exists.
 *
 * @param string $slug  Term slug.
 * @param string $label Term name.
 * @return int Term taxonomy ID.
 */
function fashion_brand_seed_ensure_category( $slug, $label ) {
	$term = get_term_by( 'slug', $slug, 'product_cat' );
	if ( $term && ! is_wp_error( $term ) ) {
		return (int) $term->term_id;
	}

	$result = wp_insert_term(
		$label,
		'product_cat',
		array(
			'slug' => $slug,
		)
	);

	if ( is_wp_error( $result ) ) {
		fwrite( STDERR, "Category error ({$slug}): " . $result->get_error_message() . "\n" );
		exit( 1 );
	}

	return (int) $result['term_id'];
}

/**
 * Sideload a local image file into the media library.
 *
 * @param string $path Absolute file path.
 * @param string $title Attachment title.
 * @param int    $parent_id Parent post ID.
 * @return int Attachment ID.
 */
function fashion_brand_seed_sideload_image( $path, $title, $parent_id = 0 ) {
	if ( ! file_exists( $path ) ) {
		fwrite( STDERR, "Missing image: {$path}\n" );
		exit( 1 );
	}

	$filename = basename( $path );
	$upload   = wp_upload_bits( $filename, null, file_get_contents( $path ) ); // phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents

	if ( ! empty( $upload['error'] ) ) {
		fwrite( STDERR, "Upload error ({$filename}): {$upload['error']}\n" );
		exit( 1 );
	}

	$filetype = wp_check_filetype( $filename, null );
	$attach_id = wp_insert_attachment(
		array(
			'post_mime_type' => $filetype['type'],
			'post_title'     => $title,
			'post_content'   => '',
			'post_status'    => 'inherit',
			'post_parent'    => $parent_id,
		),
		$upload['file'],
		$parent_id
	);

	if ( is_wp_error( $attach_id ) || ! $attach_id ) {
		fwrite( STDERR, "Attachment insert failed for {$filename}\n" );
		exit( 1 );
	}

	$meta = wp_generate_attachment_metadata( $attach_id, $upload['file'] );
	wp_update_attachment_metadata( $attach_id, $meta );

	return (int) $attach_id;
}

foreach ( $category_labels as $slug => $label ) {
	fashion_brand_seed_ensure_category( $slug, $label );
	echo "Category OK: {$slug}\n";
}

foreach ( $products as $item ) {
	$existing = get_page_by_path( $item['slug'], OBJECT, 'product' );
	if ( $existing ) {
		echo "Skip existing: {$item['name']} (ID {$existing->ID})\n";
		continue;
	}

	$product = new WC_Product_Simple();
	$product->set_name( $item['name'] );
	$product->set_slug( $item['slug'] );
	$product->set_status( 'publish' );
	$product->set_catalog_visibility( 'visible' );
	$product->set_description(
		'<!-- DEMO / TEST PRODUCT — photography placeholders; replace with real merch before launch. -->' . "\n" .
		$item['description']
	);
	$product->set_short_description( $item['description'] );
	$product->set_regular_price( $item['price'] );
	$product->set_price( $item['price'] );
	$product->set_manage_stock( false );
	$product->set_stock_status( 'instock' );
	$product->set_sku( 'DEMO-' . strtoupper( str_replace( '-', '', $item['slug'] ) ) );

	$cat_id = fashion_brand_seed_ensure_category( $item['category'], $category_labels[ $item['category'] ] );
	$product->set_category_ids( array( $cat_id ) );

	$product_id = $product->save();
	if ( ! $product_id ) {
		fwrite( STDERR, "Failed to save {$item['name']}\n" );
		exit( 1 );
	}

	$folder = $photo_root . '/' . $item['folder'];
	$primary_id = fashion_brand_seed_sideload_image(
		$folder . '/primary.jpg',
		$item['name'] . ' — primary (DEMO)',
		$product_id
	);
	$hover_id = fashion_brand_seed_sideload_image(
		$folder . '/hover.jpg',
		$item['name'] . ' — hover (DEMO)',
		$product_id
	);
	$worn_id = fashion_brand_seed_sideload_image(
		$folder . '/worn.jpg',
		$item['name'] . ' — worn (DEMO)',
		$product_id
	);

	$product = wc_get_product( $product_id );
	$product->set_image_id( $primary_id );
	// Gallery: [0]=hover (card swap), [1]=worn (PDP hero when reordered).
	$product->set_gallery_image_ids( array( $hover_id, $worn_id ) );
	$product->save();

	update_post_meta( $product_id, '_fashion_brand_demo_product', '1' );
	update_post_meta( $product_id, '_fashion_brand_demo_color', $item['color'] );

	echo "Created: {$item['name']} (#{$product_id}) cat={$item['category']} color={$item['color']} primary={$primary_id} hover={$hover_id} worn={$worn_id}\n";
}

echo "Done. DEMO products seeded.\n";
