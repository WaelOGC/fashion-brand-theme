<?php
/**
 * Shop sidebar filters — category, color, size, price.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = fashion_brand_theme_get_product_category_slugs();
$active     = fashion_brand_theme_get_active_filters();
$range      = fashion_brand_theme_get_catalog_price_range();
$min_val    = null !== $active['min_price'] ? $active['min_price'] : $range['min'];
$max_val    = null !== $active['max_price'] ? $active['max_price'] : $range['max'];

$color_terms = taxonomy_exists( 'pa_color' )
	? get_terms( array( 'taxonomy' => 'pa_color', 'hide_empty' => true ) )
	: array();
$size_terms = taxonomy_exists( 'pa_size' )
	? get_terms( array( 'taxonomy' => 'pa_size', 'hide_empty' => true ) )
	: array();

$action = fashion_brand_theme_get_clear_filters_url();
?>
<aside id="shop-sidebar-filters" class="shop-sidebar" aria-label="<?php esc_attr_e( 'Product filters', 'fashion-brand-theme' ); ?>" data-shop-sidebar>
	<div class="shop-sidebar__panel">
		<div class="shop-sidebar__head">
			<h2 class="shop-sidebar__title"><?php esc_html_e( 'Filters', 'fashion-brand-theme' ); ?></h2>
			<button type="button" class="shop-sidebar__close" data-shop-filters-close aria-label="<?php esc_attr_e( 'Close filters', 'fashion-brand-theme' ); ?>">&times;</button>
		</div>
	<form class="shop-filters" method="get" action="<?php echo esc_url( $action ); ?>" data-shop-filters>
		<?php if ( ! empty( $_GET['orderby'] ) ) : // phpcs:ignore WordPress.Security.NonceVerification.Recommended ?>
			<input type="hidden" name="orderby" value="<?php echo esc_attr( sanitize_text_field( wp_unslash( $_GET['orderby'] ) ) ); ?>" />
		<?php endif; ?>

		<div class="shop-filters__group">
			<h2 class="shop-filters__title"><?php esc_html_e( 'Category', 'fashion-brand-theme' ); ?></h2>
			<ul class="shop-filters__list">
				<?php foreach ( $categories as $slug => $label ) : ?>
					<li>
						<label class="shop-filters__check">
							<input type="checkbox" name="filter_cat[]" value="<?php echo esc_attr( $slug ); ?>" <?php checked( in_array( $slug, $active['cats'], true ) ); ?> />
							<span><?php echo esc_html( $label ); ?></span>
						</label>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>

		<?php if ( ! empty( $color_terms ) && ! is_wp_error( $color_terms ) ) : ?>
			<div class="shop-filters__group">
				<h2 class="shop-filters__title"><?php esc_html_e( 'Color', 'fashion-brand-theme' ); ?></h2>
				<ul class="shop-filters__list">
					<?php foreach ( $color_terms as $term ) : ?>
						<li>
							<label class="shop-filters__check shop-filters__check--swatch">
								<input type="checkbox" name="filter_color[]" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( in_array( $term->slug, $active['colors'], true ) ); ?> />
								<span class="shop-filters__swatch" style="--swatch:<?php echo esc_attr( fashion_brand_theme_get_color_hex( $term->slug ) ); ?>"></span>
								<span><?php echo esc_html( $term->name ); ?></span>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<?php if ( ! empty( $size_terms ) && ! is_wp_error( $size_terms ) ) : ?>
			<div class="shop-filters__group">
				<h2 class="shop-filters__title"><?php esc_html_e( 'Size', 'fashion-brand-theme' ); ?></h2>
				<ul class="shop-filters__list shop-filters__list--sizes">
					<?php foreach ( $size_terms as $term ) : ?>
						<li>
							<label class="shop-filters__check">
								<input type="checkbox" name="filter_size[]" value="<?php echo esc_attr( $term->slug ); ?>" <?php checked( in_array( $term->slug, $active['sizes'], true ) ); ?> />
								<span><?php echo esc_html( $term->name ); ?></span>
							</label>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		<?php endif; ?>

		<div class="shop-filters__group">
			<h2 class="shop-filters__title"><?php esc_html_e( 'Price', 'fashion-brand-theme' ); ?></h2>
			<div class="shop-filters__price" data-price-filter data-min="<?php echo esc_attr( (string) $range['min'] ); ?>" data-max="<?php echo esc_attr( (string) $range['max'] ); ?>">
				<input type="range" name="min_price" class="shop-filters__range" min="<?php echo esc_attr( (string) $range['min'] ); ?>" max="<?php echo esc_attr( (string) $range['max'] ); ?>" value="<?php echo esc_attr( (string) $min_val ); ?>" data-price-min />
				<input type="range" name="max_price" class="shop-filters__range" min="<?php echo esc_attr( (string) $range['min'] ); ?>" max="<?php echo esc_attr( (string) $range['max'] ); ?>" value="<?php echo esc_attr( (string) $max_val ); ?>" data-price-max />
				<p class="shop-filters__price-labels">
					<span data-price-min-label><?php echo wp_kses_post( wc_price( $min_val ) ); ?></span>
					<span aria-hidden="true">–</span>
					<span data-price-max-label><?php echo wp_kses_post( wc_price( $max_val ) ); ?></span>
				</p>
			</div>
		</div>

		<div class="shop-filters__actions">
			<button type="submit" class="shop-filters__submit"><?php esc_html_e( 'Apply filters', 'fashion-brand-theme' ); ?></button>
			<a class="shop-filters__clear" href="<?php echo esc_url( fashion_brand_theme_get_clear_filters_url() ); ?>"><?php esc_html_e( 'Clear all filters', 'fashion-brand-theme' ); ?></a>
		</div>
	</form>
	</div>
</aside>
