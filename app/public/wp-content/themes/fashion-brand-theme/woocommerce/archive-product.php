<?php
/**
 * The Template for displaying product archives (Shop / Category).
 *
 * @package Fashion_Brand_Theme
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 */
do_action( 'woocommerce_before_main_content' );
?>

<section id="shop-view" class="shop-view">
	<header class="shop-intro">
		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
			<h1 class="shop-intro__title"><?php woocommerce_page_title(); ?></h1>
		<?php endif; ?>
		<?php do_action( 'woocommerce_archive_description' ); ?>
	</header>

	<?php get_template_part( 'template-parts/shop/toolbar' ); ?>

	<div class="shop-layout">
		<?php get_template_part( 'template-parts/shop/sidebar', 'filters' ); ?>

		<div class="shop-main">
			<?php if ( woocommerce_product_loop() ) : ?>
				<?php do_action( 'woocommerce_before_shop_loop' ); ?>

				<?php woocommerce_product_loop_start(); ?>

				<?php
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( have_posts() ) {
						the_post();
						do_action( 'woocommerce_shop_loop' );
						wc_get_template_part( 'content', 'product' );
					}
				}
				?>

				<?php woocommerce_product_loop_end(); ?>

				<?php do_action( 'woocommerce_after_shop_loop' ); ?>
			<?php else : ?>
				<?php do_action( 'woocommerce_no_products_found' ); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/shop/quick-view', 'modal' ); ?>

<?php
do_action( 'woocommerce_after_main_content' );
get_footer( 'shop' );
