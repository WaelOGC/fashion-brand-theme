<?php
/**
 * Single product content — gallery + sticky info.
 *
 * @package Fashion_Brand_Theme
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	return;
}

$gallery_ids = fashion_brand_theme_get_product_page_gallery_ids( $product );
$main_id     = $gallery_ids[0] ?? (int) $product->get_image_id();
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-page', $product ); ?>>

	<div class="product-gallery" data-product-gallery>
		<div class="product-gallery-main">
			<?php
			if ( $main_id ) {
				echo wp_get_attachment_image(
					$main_id,
					'woocommerce_single',
					false,
					array(
						'class'            => 'product-gallery-main__img',
						'data-gallery-main'=> 'true',
						'alt'              => esc_attr( $product->get_name() ),
					)
				);
			}
			?>
		</div>

		<?php if ( count( $gallery_ids ) > 1 ) : ?>
			<div class="product-gallery-thumbs" role="tablist" aria-label="<?php esc_attr_e( 'Product images', 'fashion-brand-theme' ); ?>">
				<?php foreach ( $gallery_ids as $index => $attachment_id ) : ?>
					<button
						type="button"
						class="product-gallery-thumbs__btn<?php echo 0 === $index ? ' is-active' : ''; ?>"
						data-gallery-thumb
						data-image-src="<?php echo esc_url( wp_get_attachment_image_url( $attachment_id, 'woocommerce_single' ) ); ?>"
						data-image-srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( $attachment_id, 'woocommerce_single' ) ); ?>"
						aria-label="<?php echo esc_attr( sprintf( /* translators: %d: image number */ __( 'View image %d', 'fashion-brand-theme' ), $index + 1 ) ); ?>"
						aria-pressed="<?php echo 0 === $index ? 'true' : 'false'; ?>"
					>
						<?php
						echo wp_get_attachment_image(
							$attachment_id,
							'woocommerce_gallery_thumbnail',
							false,
							array(
								'alt' => '',
							)
						);
						?>
					</button>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>

	<div class="product-info summary entry-summary">
		<h1 class="product-title"><?php the_title(); ?></h1>
		<p class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>

		<?php if ( $product->get_short_description() ) : ?>
			<div class="product-desc">
				<?php echo wp_kses_post( wpautop( $product->get_short_description() ) ); ?>
			</div>
		<?php endif; ?>

		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 * Still includes add-to-cart (priority 30) after our custom title/price/excerpt.
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 * Includes related products.
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
