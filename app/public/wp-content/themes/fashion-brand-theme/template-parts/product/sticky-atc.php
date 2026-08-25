<?php
/**
 * Mobile sticky add-to-cart bar.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product ) {
	return;
}
?>
<div class="sticky-atc" data-sticky-atc hidden>
	<div class="sticky-atc__info">
		<span class="sticky-atc__name"><?php echo esc_html( $product->get_name() ); ?></span>
		<span class="sticky-atc__price"><?php echo wp_kses_post( $product->get_price_html() ); ?></span>
	</div>
	<button type="button" class="sticky-atc__btn" data-sticky-atc-trigger>
		<?php echo esc_html( $product->single_add_to_cart_text() ); ?>
	</button>
</div>
