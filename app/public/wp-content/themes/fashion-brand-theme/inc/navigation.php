<?php
/**
 * Navigation helpers and fallbacks.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Approved shop categories for nested navigation.
 *
 * @return array<string, string> Category slug => label.
 */
function fashion_brand_theme_get_shop_categories() {
	return array(
		'all-products'          => __( 'All Products', 'fashion-brand-theme' ),
		't-shirts'              => __( 'T-Shirts', 'fashion-brand-theme' ),
		'hoodies'               => __( 'Hoodies', 'fashion-brand-theme' ),
		'tops'                  => __( 'Tops', 'fashion-brand-theme' ),
		'dresses'               => __( 'Dresses', 'fashion-brand-theme' ),
		'pants'                 => __( 'Pants', 'fashion-brand-theme' ),
		'everyday-essentials'   => __( 'Everyday Essentials', 'fashion-brand-theme' ),
		'occasion-evening-wear' => __( 'Occasion / Evening Wear', 'fashion-brand-theme' ),
	);
}

/**
 * Resolve a WooCommerce or placeholder shop URL.
 *
 * @return string
 */
function fashion_brand_theme_get_shop_url() {
	if ( function_exists( 'wc_get_page_permalink' ) ) {
		$shop_url = wc_get_page_permalink( 'shop' );

		if ( $shop_url ) {
			return $shop_url;
		}
	}

	return home_url( '/shop/' );
}

/**
 * Resolve a product category URL.
 *
 * @param string $slug Category slug.
 * @return string
 */
function fashion_brand_theme_get_product_category_url( $slug ) {
	if ( 'all-products' === $slug ) {
		return fashion_brand_theme_get_shop_url();
	}

	if ( taxonomy_exists( 'product_cat' ) ) {
		$term = get_term_by( 'slug', $slug, 'product_cat' );

		if ( $term && ! is_wp_error( $term ) ) {
			$term_link = get_term_link( $term );

			if ( ! is_wp_error( $term_link ) ) {
				return $term_link;
			}
		}
	}

	return home_url( '/product-category/' . $slug . '/' );
}

/**
 * Resolve a theme page URL by slug.
 *
 * @param string $slug Page slug.
 * @return string
 */
function fashion_brand_theme_get_page_url( $slug ) {
	$page = get_page_by_path( $slug );

	if ( $page ) {
		return get_permalink( $page );
	}

	return home_url( '/' . trim( $slug, '/' ) . '/' );
}

/**
 * Resolve the account URL.
 *
 * @return string
 */
function fashion_brand_theme_get_account_url() {
	if ( function_exists( 'wc_get_page_permalink' ) ) {
		$account_url = wc_get_page_permalink( 'myaccount' );

		if ( $account_url ) {
			return $account_url;
		}
	}

	return fashion_brand_theme_get_page_url( 'my-account' );
}

/**
 * Resolve the cart URL.
 *
 * @return string
 */
function fashion_brand_theme_get_cart_url() {
	if ( function_exists( 'wc_get_page_permalink' ) ) {
		$cart_url = wc_get_page_permalink( 'cart' );

		if ( $cart_url ) {
			return $cart_url;
		}
	}

	return fashion_brand_theme_get_page_url( 'cart' );
}

/**
 * Primary navigation fallback markup.
 *
 * @param array<string, mixed> $args Menu arguments.
 * @return void
 */
function fashion_brand_theme_primary_nav_fallback( $args ) {
	$menu_id    = ! empty( $args['menu_id'] ) ? $args['menu_id'] : 'primary-menu';
	$menu_class = ! empty( $args['menu_class'] ) ? $args['menu_class'] : 'primary-menu';

	$primary_items = array(
		array(
			'label'    => __( 'Shop', 'fashion-brand-theme' ),
			'url'      => fashion_brand_theme_get_shop_url(),
			'children' => fashion_brand_theme_get_shop_categories(),
		),
		array(
			'label' => __( 'Collections', 'fashion-brand-theme' ),
			'url'   => fashion_brand_theme_get_page_url( 'collections' ),
		),
		array(
			'label' => __( 'Guides', 'fashion-brand-theme' ),
			'url'   => fashion_brand_theme_get_page_url( 'guides' ),
		),
		array(
			'label' => __( 'About', 'fashion-brand-theme' ),
			'url'   => fashion_brand_theme_get_page_url( 'about' ),
		),
		array(
			'label' => __( 'Contact', 'fashion-brand-theme' ),
			'url'   => fashion_brand_theme_get_page_url( 'contact' ),
		),
	);

	echo '<ul id="' . esc_attr( $menu_id ) . '" class="' . esc_attr( $menu_class ) . '">';

	foreach ( $primary_items as $index => $item ) {
		$has_children = ! empty( $item['children'] );
		$item_classes = array( 'menu-item' );

		if ( $has_children ) {
			$item_classes[] = 'menu-item-has-children';
		}

		$submenu_id = $has_children ? 'shop-submenu' : '';

		echo '<li class="' . esc_attr( implode( ' ', $item_classes ) ) . '">';
		echo '<a href="' . esc_url( $item['url'] ) . '">' . esc_html( $item['label'] ) . '</a>';

		if ( $has_children ) {
			fashion_brand_theme_render_submenu_toggle( $submenu_id, $item['label'] );
			echo '<ul id="' . esc_attr( $submenu_id ) . '" class="sub-menu">';

			foreach ( $item['children'] as $slug => $label ) {
				echo '<li class="menu-item">';
				echo '<a href="' . esc_url( fashion_brand_theme_get_product_category_url( $slug ) ) . '">' . esc_html( $label ) . '</a>';
				echo '</li>';
			}

			echo '</ul>';
		}

		echo '</li>';
	}

	echo '</ul>';
}

/**
 * Output an accessible submenu toggle button.
 *
 * @param string $submenu_id Submenu element ID.
 * @param string $label      Parent item label.
 * @return void
 */
function fashion_brand_theme_render_submenu_toggle( $submenu_id, $label ) {
	printf(
		'<button type="button" class="submenu-toggle" aria-expanded="false" aria-controls="%1$s" aria-label="%2$s">',
		esc_attr( $submenu_id ),
		esc_attr(
			sprintf(
				/* translators: %s: parent navigation item label. */
				__( 'Toggle %s submenu', 'fashion-brand-theme' ),
				$label
			)
		)
	);
	echo '<span class="submenu-toggle__icon" aria-hidden="true"></span>';
	echo '</button>';
}

/**
 * Utility navigation fallback markup.
 *
 * @param array<string, mixed> $args Menu arguments.
 * @return void
 */
function fashion_brand_theme_utility_nav_fallback( $args ) {
	$menu_id    = ! empty( $args['menu_id'] ) ? $args['menu_id'] : 'utility-menu';
	$menu_class = ! empty( $args['menu_class'] ) ? $args['menu_class'] : 'utility-menu';

	echo '<ul id="' . esc_attr( $menu_id ) . '" class="' . esc_attr( $menu_class ) . '">';
	echo '<li class="menu-item">';
	echo '<a href="' . esc_url( fashion_brand_theme_get_account_url() ) . '">' . esc_html__( 'Account', 'fashion-brand-theme' ) . '</a>';
	echo '</li>';
	echo '<li class="menu-item">';
	echo '<a href="' . esc_url( fashion_brand_theme_get_cart_url() ) . '">' . esc_html__( 'Cart', 'fashion-brand-theme' ) . '</a>';
	echo '</li>';
	echo '</ul>';
}
