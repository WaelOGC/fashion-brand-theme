<?php
/**
 * Single product content.
 *
 * @package Fashion_Brand_Theme
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	return;
}

$gallery_ids = fashion_brand_theme_get_product_page_gallery_ids( $product );
$main_id     = $gallery_ids[0] ?? (int) $product->get_image_id();
$categories  = wc_get_product_category_list( $product->get_id(), ', ' );
$cat_terms   = get_the_terms( $product->get_id(), 'product_cat' );
$primary_cat = ( $cat_terms && ! is_wp_error( $cat_terms ) ) ? $cat_terms[0] : null;
$rating      = (float) $product->get_average_rating();
$review_count = (int) $product->get_review_count();
$shipping     = fashion_brand_theme_get_shipping_returns_copy();
$detail_meta  = fashion_brand_theme_get_product_detail_meta( $product->get_id() );
$product_tags = wc_get_product_tag_list( $product->get_id(), ', ' );
$trust_line   = array_filter(
	array_map(
		'trim',
		array(
			fashion_brand_theme_get_stock_message( $product ),
			$shipping['shipping'],
			$shipping['returns'],
		)
	)
);
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-page', $product ); ?>>

	<nav class="product-breadcrumb" aria-label="<?php esc_attr_e( 'Breadcrumb', 'fashion-brand-theme' ); ?>">
		<a href="<?php echo esc_url( fashion_brand_theme_get_shop_url() ); ?>"><?php esc_html_e( 'Shop', 'fashion-brand-theme' ); ?></a>
		<span aria-hidden="true">›</span>
		<?php if ( $primary_cat ) : ?>
			<a href="<?php echo esc_url( get_term_link( $primary_cat ) ); ?>"><?php echo esc_html( $primary_cat->name ); ?></a>
			<span aria-hidden="true">›</span>
		<?php endif; ?>
		<span><?php the_title(); ?></span>
	</nav>

	<p class="product-back">
		<a href="<?php echo esc_url( fashion_brand_theme_get_shop_url() ); ?>">&larr; <?php esc_html_e( 'Back to the field', 'fashion-brand-theme' ); ?></a>
	</p>

	<div class="product-split">
		<div class="product-gallery" data-product-gallery>
			<?php if ( count( $gallery_ids ) > 1 ) : ?>
				<div class="product-gallery-thumbs" role="tablist" aria-label="<?php esc_attr_e( 'Product images', 'fashion-brand-theme' ); ?>">
					<?php foreach ( $gallery_ids as $index => $attachment_id ) : ?>
						<button
							type="button"
							class="product-gallery-thumbs__btn<?php echo 0 === $index ? ' is-active' : ''; ?>"
							data-gallery-thumb
							data-image-src="<?php echo esc_url( wp_get_attachment_image_url( $attachment_id, 'woocommerce_single' ) ); ?>"
							data-image-srcset="<?php echo esc_attr( (string) wp_get_attachment_image_srcset( $attachment_id, 'woocommerce_single' ) ); ?>"
							aria-label="<?php echo esc_attr( sprintf( __( 'View image %d', 'fashion-brand-theme' ), $index + 1 ) ); ?>"
							aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>"
						>
							<?php echo wp_get_attachment_image( $attachment_id, 'woocommerce_gallery_thumbnail', false, array( 'alt' => '' ) ); ?>
						</button>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

			<div class="product-gallery-main" data-zoom-root>
				<?php
				if ( $main_id ) {
					echo wp_get_attachment_image(
						$main_id,
						'woocommerce_single',
						false,
						array(
							'class'             => 'product-gallery-main__img',
							'data-gallery-main' => 'true',
							'alt'               => esc_attr( $product->get_name() ),
						)
					);
				}
				?>
				<div class="product-gallery-zoom" data-zoom-lens hidden></div>
			</div>
		</div>

		<div class="product-info summary entry-summary">
			<p class="product-eyebrow">
				<?php if ( $primary_cat ) : ?>
					<span class="product-eyebrow__cat"><?php echo esc_html( $primary_cat->name ); ?></span>
					<span aria-hidden="true">·</span>
				<?php endif; ?>
				<span class="product-eyebrow__num"><?php echo esc_html( fashion_brand_theme_get_product_number_label( $product ) ); ?></span>
			</p>

			<h1 class="product-title"><?php the_title(); ?></h1>

			<?php if ( $review_count > 0 && $rating > 0 ) : ?>
				<p class="product-rating">
					<a href="#tab-title-reviews">
						<?php echo wp_kses_post( wc_get_rating_html( $rating, $review_count ) ); ?>
						<span>(<?php echo esc_html( (string) $review_count ); ?>)</span>
					</a>
				</p>
			<?php endif; ?>

			<p class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>

			<?php if ( $product->get_short_description() ) : ?>
				<div class="product-desc"><?php echo wp_kses_post( wpautop( $product->get_short_description() ) ); ?></div>
			<?php endif; ?>

			<div class="product-cart-wrap" data-main-atc>
				<div class="product-atc-row">
					<div class="product-atc-row__form">
						<?php
						if ( ! empty( $trust_line ) ) {
							add_action(
								'woocommerce_before_add_to_cart_quantity',
								static function () use ( $trust_line ) {
									static $rendered = false;
									if ( $rendered ) {
										return;
									}
									$rendered = true;
									$trust_markup = array();
									foreach ( $trust_line as $trust_item ) {
										$trust_markup[] = '<span class="product-trust-line__item">' . esc_html( $trust_item ) . '</span>';
									}
									echo '<p class="product-trust-line">';
									echo wp_kses_post( implode( '<span class="product-trust-line__sep" aria-hidden="true"> · </span>', $trust_markup ) );
									echo '</p>';
								},
								5
							);
						}

						/**
						 * Hook: woocommerce_single_product_summary — add to cart / variations.
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>
					</div>

					<div class="product-atc-row__actions" aria-label="<?php esc_attr_e( 'Product actions', 'fashion-brand-theme' ); ?>">
						<button type="button" class="product-icon-btn product-icon-btn--icon-only" data-wishlist-toggle data-product-id="<?php echo esc_attr( (string) $product->get_id() ); ?>" aria-pressed="false" aria-label="<?php esc_attr_e( 'Add to wishlist', 'fashion-brand-theme' ); ?>">
							<svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 21s-7.2-4.6-9.5-8.2C.6 9.7 2.1 6 5.5 6c1.9 0 3.2 1.1 3.9 2.2C10.1 7.1 11.4 6 13.3 6c3.4 0 4.9 3.7 3 6.8C19.2 16.4 12 21 12 21z" fill="none" stroke="currentColor" stroke-width="1.5"/></svg>
						</button>
						<button type="button" class="product-icon-btn product-icon-btn--icon-only" data-share-product aria-label="<?php esc_attr_e( 'Share', 'fashion-brand-theme' ); ?>">
							<svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path d="M15 8a3 3 0 1 0-2.8-4H12a3 3 0 0 0 .2 4L8.7 12.2a3 3 0 1 0 1.4 1.4L14 9.4A3 3 0 0 0 15 8zm-9 9a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z" fill="currentColor"/></svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	if ( $product->get_sku() || $categories || $product_tags ) {
		add_action(
			'woocommerce_product_additional_information',
			static function () use ( $product, $categories, $product_tags ) {
				?>
				<table class="woocommerce-product-attributes shop_attributes product-detail-meta">
					<?php if ( $product->get_sku() ) : ?>
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--sku">
							<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'SKU', 'fashion-brand-theme' ); ?></th>
							<td class="woocommerce-product-attributes-item__value"><?php echo esc_html( $product->get_sku() ); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ( $categories ) : ?>
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--category">
							<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Category', 'fashion-brand-theme' ); ?></th>
							<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $categories ); ?></td>
						</tr>
					<?php endif; ?>
					<?php if ( $product_tags ) : ?>
						<tr class="woocommerce-product-attributes-item woocommerce-product-attributes-item--tags">
							<th class="woocommerce-product-attributes-item__label"><?php esc_html_e( 'Tags', 'fashion-brand-theme' ); ?></th>
							<td class="woocommerce-product-attributes-item__value"><?php echo wp_kses_post( $product_tags ); ?></td>
						</tr>
					<?php endif; ?>
				</table>
				<?php
			},
			5
		);
	}
	?>

	<div class="product-tabs-wrap woocommerce-tabs wc-tabs-wrapper">
		<?php woocommerce_output_product_data_tabs(); ?>
	</div>

	<section class="product-related-wrap">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'fashion-brand-theme' ) );
		echo '<header class="product-related-wrap__header">';
		echo '<h2>' . esc_html( $heading ) . '</h2>';
		echo '<p>' . esc_html__( 'Other pieces from the same field.', 'fashion-brand-theme' ) . '</p>';
		echo '</header>';
		woocommerce_output_related_products();
		?>
	</section>
</div>

<?php get_template_part( 'template-parts/product/size-guide', 'modal' ); ?>
<?php get_template_part( 'template-parts/product/sticky', 'atc' ); ?>

<?php do_action( 'woocommerce_after_single_product' ); ?>
