<?php
/**
 * Shop catalog helpers: filters, badges, quick view, product meta.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Color slug => swatch hex for pa_color terms.
 *
 * @return array<string, string>
 */
function fashion_brand_theme_color_swatch_map() {
	return array(
		'ecru'       => '#E8E0D4',
		'oatmeal'    => '#D4C4A8',
		'sage'       => '#8A9A7B',
		'ivory'      => '#F2EDE4',
		'olive'      => '#5C6B4A',
		'clay-taupe' => '#A8907A',
		'ink'        => '#15181A',
		'stone'      => '#B8B3A9',
	);
}

/**
 * Ensure global Color and Size attributes exist.
 *
 * @return void
 */
function fashion_brand_theme_ensure_product_attributes() {
	if ( ! function_exists( 'wc_create_attribute' ) || ! function_exists( 'wc_get_attribute_taxonomies' ) ) {
		return;
	}

	$existing = wp_list_pluck( wc_get_attribute_taxonomies(), 'attribute_name' );

	$needed = array(
		'color' => __( 'Color', 'fashion-brand-theme' ),
		'size'  => __( 'Size', 'fashion-brand-theme' ),
	);

	foreach ( $needed as $slug => $label ) {
		if ( in_array( $slug, $existing, true ) ) {
			continue;
		}

		wc_create_attribute(
			array(
				'name'         => $label,
				'slug'         => $slug,
				'type'         => 'select',
				'order_by'     => 'menu_order',
				'has_archives' => false,
			)
		);
	}

	// Register taxonomies for this request if just created.
	foreach ( array_keys( $needed ) as $slug ) {
		$taxonomy = 'pa_' . $slug;
		if ( ! taxonomy_exists( $taxonomy ) ) {
			register_taxonomy(
				$taxonomy,
				apply_filters( 'woocommerce_taxonomy_objects_' . $taxonomy, array( 'product' ) ),
				apply_filters(
					'woocommerce_taxonomy_args_' . $taxonomy,
					array(
						'labels'       => array(
							'name' => $needed[ $slug ],
						),
						'hierarchical' => false,
						'show_ui'      => false,
						'query_var'    => true,
						'rewrite'      => false,
						'public'       => false,
					)
				)
			);
		}
	}

	delete_transient( 'wc_attribute_taxonomies' );
}

/**
 * Hex for a color term slug.
 *
 * @param string $slug Term slug.
 * @return string
 */
function fashion_brand_theme_get_color_hex( $slug ) {
	$map = fashion_brand_theme_color_swatch_map();
	$slug = sanitize_title( $slug );

	return $map[ $slug ] ?? '#D6D2CB';
}

/**
 * Product number badge (No. 0X) — stable per product ID within category order.
 *
 * @param WC_Product $product Product.
 * @return string
 */
function fashion_brand_theme_get_product_number_label( $product ) {
	$cats = wc_get_product_term_ids( $product->get_id(), 'product_cat' );
	$cat  = ! empty( $cats[0] ) ? (int) $cats[0] : 0;

	$ids = get_posts(
		array(
			'post_type'              => 'product',
			'post_status'            => 'publish',
			'posts_per_page'         => -1,
			'fields'                 => 'ids',
			'orderby'                => 'menu_order title',
			'order'                  => 'ASC',
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'tax_query'              => $cat ? array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => array( $cat ),
				),
			) : array(),
		)
	);

	$index = array_search( (int) $product->get_id(), array_map( 'intval', $ids ), true );
	$num   = false === $index ? 1 : ( $index + 1 );

	return sprintf(
		/* translators: %02d: product number within category */
		__( 'No. %02d', 'fashion-brand-theme' ),
		$num
	);
}

/**
 * Status badges for a product card (Sale / Low Stock / New).
 *
 * @param WC_Product $product Product.
 * @return array<int, array{key:string,label:string}>
 */
function fashion_brand_theme_get_product_badges( $product ) {
	$badges = array();

	if ( $product->is_on_sale() ) {
		$badges[] = array(
			'key'   => 'sale',
			'label' => __( 'Sale', 'fashion-brand-theme' ),
		);
	}

	$low_stock = false;
	if ( $product->is_type( 'variable' ) ) {
		foreach ( $product->get_children() as $child_id ) {
			$child = wc_get_product( $child_id );
			if ( ! $child || ! $child->managing_stock() ) {
				continue;
			}
			$qty = $child->get_stock_quantity();
			if ( null !== $qty && $qty > 0 && $qty <= 3 ) {
				$low_stock = true;
				break;
			}
		}
	} elseif ( $product->managing_stock() ) {
		$qty = $product->get_stock_quantity();
		if ( null !== $qty && $qty > 0 && $qty <= 3 ) {
			$low_stock = true;
		}
	}

	if ( $low_stock ) {
		$badges[] = array(
			'key'   => 'low-stock',
			'label' => __( 'Low Stock', 'fashion-brand-theme' ),
		);
	}

	if ( has_term( 'new', 'product_tag', $product->get_id() ) ) {
		$badges[] = array(
			'key'   => 'new',
			'label' => __( 'New', 'fashion-brand-theme' ),
		);
	}

	return $badges;
}

/**
 * Color terms for a product (attribute or parent).
 *
 * @param WC_Product $product Product.
 * @return WP_Term[]
 */
function fashion_brand_theme_get_product_color_terms( $product ) {
	if ( ! taxonomy_exists( 'pa_color' ) ) {
		return array();
	}

	$terms = wc_get_product_terms( $product->get_id(), 'pa_color', array( 'fields' => 'all' ) );

	return is_array( $terms ) ? $terms : array();
}

/**
 * Size terms for a product.
 *
 * @param WC_Product $product Product.
 * @return WP_Term[]
 */
function fashion_brand_theme_get_product_size_terms( $product ) {
	if ( ! taxonomy_exists( 'pa_size' ) ) {
		return array();
	}

	$terms = wc_get_product_terms( $product->get_id(), 'pa_size', array( 'fields' => 'all' ) );

	return is_array( $terms ) ? $terms : array();
}

/**
 * Editable shipping / returns copy (theme settings).
 *
 * @return array{shipping:string,returns:string}
 */
function fashion_brand_theme_get_shipping_returns_copy() {
	$shipping = fashion_brand_theme_get_setting( 'shop_shipping_info' );
	$returns  = fashion_brand_theme_get_setting( 'shop_returns_info' );

	if ( ! is_string( $shipping ) || '' === trim( $shipping ) ) {
		$shipping = __( 'Free shipping on orders over €150.', 'fashion-brand-theme' );
	}

	if ( ! is_string( $returns ) || '' === trim( $returns ) ) {
		$returns = __( 'Returns within 14 days.', 'fashion-brand-theme' );
	}

	return array(
		'shipping' => $shipping,
		'returns'  => $returns,
	);
}

/**
 * Product detail meta (composition / care / origin).
 *
 * @param int $product_id Product ID.
 * @return array{composition:string,care:string,origin:string}
 */
function fashion_brand_theme_get_product_detail_meta( $product_id ) {
	return array(
		'composition' => (string) get_post_meta( $product_id, '_fashion_brand_composition', true ),
		'care'        => (string) get_post_meta( $product_id, '_fashion_brand_care', true ),
		'origin'      => (string) get_post_meta( $product_id, '_fashion_brand_origin', true ),
	);
}

/**
 * Stock message for PDP.
 *
 * @param WC_Product $product Product.
 * @return string
 */
function fashion_brand_theme_get_stock_message( $product ) {
	if ( ! $product->is_in_stock() ) {
		return __( 'Out of stock', 'fashion-brand-theme' );
	}

	if ( $product->managing_stock() ) {
		$qty = (int) $product->get_stock_quantity();
		if ( $qty <= 3 && $qty > 0 ) {
			return sprintf(
				/* translators: %d: stock quantity */
				__( 'Only %d left', 'fashion-brand-theme' ),
				$qty
			);
		}
		if ( $qty > 0 ) {
			return sprintf(
				/* translators: %d: stock quantity */
				__( 'In stock — %d available', 'fashion-brand-theme' ),
				$qty
			);
		}
	}

	return __( 'In stock', 'fashion-brand-theme' );
}

/**
 * Min/max prices across published products (for filter slider).
 *
 * @return array{min:float,max:float}
 */
function fashion_brand_theme_get_catalog_price_range() {
	global $wpdb;

	$row = $wpdb->get_row( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		"
		SELECT MIN(CAST(meta_value AS DECIMAL(10,2))) AS min_price,
		       MAX(CAST(meta_value AS DECIMAL(10,2))) AS max_price
		FROM {$wpdb->postmeta} pm
		INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id
		WHERE pm.meta_key = '_price'
		  AND pm.meta_value != ''
		  AND p.post_type IN ('product','product_variation')
		  AND p.post_status = 'publish'
		"
	);

	$min = $row && null !== $row->min_price ? (float) $row->min_price : 0;
	$max = $row && null !== $row->max_price ? (float) $row->max_price : 200;

	if ( $max <= $min ) {
		$max = $min + 1;
	}

	return array(
		'min' => floor( $min ),
		'max' => ceil( $max ),
	);
}

/**
 * Active filter GET values.
 *
 * @return array{cats:string[],colors:string[],sizes:string[],min_price:?float,max_price:?float}
 */
function fashion_brand_theme_get_active_filters() {
	$cats = isset( $_GET['filter_cat'] ) ? (array) wp_unslash( $_GET['filter_cat'] ) : array(); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$cats = array_values( array_filter( array_map( 'sanitize_title', $cats ) ) );

	$colors = isset( $_GET['filter_color'] ) ? (array) wp_unslash( $_GET['filter_color'] ) : array(); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$colors = array_values( array_filter( array_map( 'sanitize_title', $colors ) ) );

	$sizes = isset( $_GET['filter_size'] ) ? (array) wp_unslash( $_GET['filter_size'] ) : array(); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$sizes = array_values( array_filter( array_map( 'sanitize_title', $sizes ) ) );

	$min = isset( $_GET['min_price'] ) ? (float) wp_unslash( $_GET['min_price'] ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	$max = isset( $_GET['max_price'] ) ? (float) wp_unslash( $_GET['max_price'] ) : null; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

	return array(
		'cats'      => $cats,
		'colors'    => $colors,
		'sizes'     => $sizes,
		'min_price' => $min,
		'max_price' => $max,
	);
}

/**
 * Apply sidebar filters to the main product query.
 *
 * @param WP_Query $q Query.
 * @return void
 */
function fashion_brand_theme_apply_catalog_filters( $q ) {
	if ( is_admin() || ! $q->is_main_query() ) {
		return;
	}

	if ( ! ( is_shop() || is_product_taxonomy() ) ) {
		return;
	}

	$filters  = fashion_brand_theme_get_active_filters();
	$tax_query = (array) $q->get( 'tax_query' );

	if ( ! empty( $filters['cats'] ) ) {
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => $filters['cats'],
			'operator' => 'IN',
		);
	}

	if ( ! empty( $filters['colors'] ) && taxonomy_exists( 'pa_color' ) ) {
		$tax_query[] = array(
			'taxonomy' => 'pa_color',
			'field'    => 'slug',
			'terms'    => $filters['colors'],
			'operator' => 'IN',
		);
	}

	if ( ! empty( $filters['sizes'] ) && taxonomy_exists( 'pa_size' ) ) {
		$tax_query[] = array(
			'taxonomy' => 'pa_size',
			'field'    => 'slug',
			'terms'    => $filters['sizes'],
			'operator' => 'IN',
		);
	}

	if ( count( $tax_query ) > 1 ) {
		$tax_query['relation'] = 'AND';
	}

	if ( ! empty( $tax_query ) ) {
		$q->set( 'tax_query', $tax_query );
	}

	$meta_query = (array) $q->get( 'meta_query' );

	if ( null !== $filters['min_price'] || null !== $filters['max_price'] ) {
		$price = array(
			'key'     => '_price',
			'type'    => 'NUMERIC',
			'compare' => 'BETWEEN',
			'value'   => array(
				null !== $filters['min_price'] ? $filters['min_price'] : 0,
				null !== $filters['max_price'] ? $filters['max_price'] : PHP_FLOAT_MAX,
			),
		);
		$meta_query[] = $price;
	}

	if ( ! empty( $meta_query ) ) {
		$q->set( 'meta_query', $meta_query );
	}
}
add_action( 'woocommerce_product_query', 'fashion_brand_theme_apply_catalog_filters' );

/**
 * AJAX: quick view HTML.
 *
 * @return void
 */
function fashion_brand_theme_ajax_quick_view() {
	check_ajax_referer( 'fashion_brand_theme_shop', 'nonce' );

	$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
	$product    = $product_id ? wc_get_product( $product_id ) : null;

	if ( ! $product ) {
		wp_send_json_error( array( 'message' => __( 'Product not found.', 'fashion-brand-theme' ) ), 404 );
	}

	$images = fashion_brand_theme_get_product_card_image_ids( $product );
	ob_start();
	?>
	<div class="quick-view" data-product-id="<?php echo esc_attr( (string) $product_id ); ?>">
		<div class="quick-view__media">
			<?php
			fashion_brand_theme_render_product_img(
				$images['primary'],
				'woocommerce_single',
				'quick-view__img',
				$product->get_name()
			);
			?>
		</div>
		<div class="quick-view__body">
			<p class="quick-view__eyebrow"><?php echo esc_html( fashion_brand_theme_get_product_number_label( $product ) ); ?></p>
			<h2 class="quick-view__title"><?php echo esc_html( $product->get_name() ); ?></h2>
			<p class="quick-view__price"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>
			<?php if ( $product->get_short_description() ) : ?>
				<div class="quick-view__excerpt"><?php echo wp_kses_post( wpautop( $product->get_short_description() ) ); ?></div>
			<?php endif; ?>
			<div class="quick-view__actions">
				<?php
				woocommerce_template_single_add_to_cart();
				?>
				<a class="quick-view__details" href="<?php echo esc_url( get_permalink( $product_id ) ); ?>">
					<?php esc_html_e( 'View full details', 'fashion-brand-theme' ); ?>
				</a>
			</div>
		</div>
	</div>
	<?php
	wp_send_json_success( array( 'html' => ob_get_clean() ) );
}
add_action( 'wp_ajax_fashion_brand_quick_view', 'fashion_brand_theme_ajax_quick_view' );
add_action( 'wp_ajax_nopriv_fashion_brand_quick_view', 'fashion_brand_theme_ajax_quick_view' );

/**
 * Header cart count fragment (non-cinematic).
 *
 * @param array $fragments Fragments.
 * @return array
 */
function fashion_brand_theme_cart_count_fragment( $fragments ) {
	ob_start();
	fashion_brand_theme_render_header_cart_count();
	$fragments['span.header-cart-count'] = ob_get_clean();

	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'fashion_brand_theme_cart_count_fragment' );

/**
 * Render header cart count badge.
 *
 * @param int|null $count Optional count.
 * @return void
 */
function fashion_brand_theme_render_header_cart_count( $count = null ) {
	if ( null === $count ) {
		$count = function_exists( 'fashion_brand_theme_get_cart_count' )
			? fashion_brand_theme_get_cart_count()
			: 0;
	}

	$count = (int) $count;
	printf(
		'<span class="header-cart-count"%s>%s</span>',
		$count > 0 ? '' : ' hidden',
		esc_html( (string) $count )
	);
}

/**
 * Clear-filters URL (shop or current taxonomy without filter query args).
 *
 * @return string
 */
function fashion_brand_theme_get_clear_filters_url() {
	if ( is_product_taxonomy() ) {
		$term = get_queried_object();
		if ( $term && ! is_wp_error( $term ) ) {
			$link = get_term_link( $term );
			if ( ! is_wp_error( $link ) ) {
				return $link;
			}
		}
	}

	return fashion_brand_theme_get_shop_url();
}

/**
 * Append composition / care / origin to Additional Information table.
 *
 * @param array      $attributes Attribute rows.
 * @param WC_Product $product    Product.
 * @return array
 */
function fashion_brand_theme_product_attributes( $attributes, $product ) {
	$meta = fashion_brand_theme_get_product_detail_meta( $product->get_id() );

	$map = array(
		'composition' => __( 'Composition', 'fashion-brand-theme' ),
		'care'        => __( 'Care', 'fashion-brand-theme' ),
		'origin'      => __( 'Origin', 'fashion-brand-theme' ),
	);

	foreach ( $map as $key => $label ) {
		if ( '' === trim( $meta[ $key ] ) ) {
			continue;
		}
		$attributes[ 'fashion_brand_' . $key ] = array(
			'label' => $label,
			'value' => wp_kses_post( $meta[ $key ] ),
		);
	}

	return $attributes;
}
add_filter( 'woocommerce_display_product_attributes', 'fashion_brand_theme_product_attributes', 10, 2 );

/**
 * Add size-guide control next to the Size attribute label.
 *
 * @param string $label Attribute label.
 * @param string $name  Attribute name.
 * @return string
 */
function fashion_brand_theme_attribute_label_size_guide( $label, $name ) {
	if ( 'pa_size' !== $name && 'size' !== $name ) {
		return $label;
	}

	$label .= ' <button type="button" class="size-guide-link" data-size-guide-open>' . esc_html__( 'Size guide', 'fashion-brand-theme' ) . '</button>';

	return $label;
}
add_filter( 'woocommerce_attribute_label', 'fashion_brand_theme_attribute_label_size_guide', 10, 2 );
