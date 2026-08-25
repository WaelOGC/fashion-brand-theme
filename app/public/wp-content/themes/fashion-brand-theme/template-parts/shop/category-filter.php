<?php
/**
 * Shop category filter row.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = fashion_brand_theme_get_product_category_slugs();

if ( empty( $categories ) ) {
	return;
}

$current = '';
if ( is_product_category() ) {
	$term = get_queried_object();
	if ( $term && ! is_wp_error( $term ) ) {
		$current = $term->slug;
	}
}
?>
<nav class="shop-category-filter" aria-label="<?php esc_attr_e( 'Product categories', 'fashion-brand-theme' ); ?>">
	<a
		class="shop-category-filter__link<?php echo '' === $current ? ' is-active' : ''; ?>"
		href="<?php echo esc_url( fashion_brand_theme_get_shop_url() ); ?>"
	>
		<?php esc_html_e( 'All', 'fashion-brand-theme' ); ?>
	</a>
	<?php foreach ( $categories as $slug => $label ) : ?>
		<a
			class="shop-category-filter__link<?php echo $current === $slug ? ' is-active' : ''; ?>"
			href="<?php echo esc_url( fashion_brand_theme_get_product_category_url( $slug ) ); ?>"
		>
			<?php echo esc_html( $label ); ?>
		</a>
	<?php endforeach; ?>
</nav>
