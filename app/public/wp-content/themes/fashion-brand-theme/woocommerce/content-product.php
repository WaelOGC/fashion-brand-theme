<?php
/**
 * Product card in the shop loop — image + name + price.
 *
 * @package Fashion_Brand_Theme
 * @version 9.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

$images = fashion_brand_theme_get_product_card_image_ids( $product );
$name   = $product->get_name();
?>
<li <?php wc_product_class( 'product-card-item', $product ); ?>>
	<a class="product-card" href="<?php echo esc_url( get_permalink( $product->get_id() ) ); ?>">
		<div class="product-card-img-wrap">
			<?php
			fashion_brand_theme_render_product_img(
				$images['primary'],
				'woocommerce_thumbnail',
				'product-card-img',
				$name
			);
			fashion_brand_theme_render_product_img(
				$images['hover'],
				'woocommerce_thumbnail',
				'product-card-img hover-img',
				$name
			);
			?>
		</div>
		<div class="product-card-info">
			<span class="product-card-name"><?php echo esc_html( $name ); ?></span>
			<?php if ( fashion_brand_theme_is_setting_enabled( 'shop_show_price' ) ) : ?>
				<span class="product-card-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
			<?php endif; ?>
		</div>
	</a>
</li>
