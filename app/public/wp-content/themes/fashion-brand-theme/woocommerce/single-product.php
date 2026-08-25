<?php
/**
 * The Template for displaying a single product.
 *
 * @package Fashion_Brand_Theme
 * @version 1.6.4
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>

<?php
/**
 * Hook: woocommerce_before_main_content.
 */
do_action( 'woocommerce_before_main_content' );
?>

<?php
while ( have_posts() ) {
	the_post();
	wc_get_template_part( 'content', 'single-product' );
}
?>

<?php
/**
 * Hook: woocommerce_after_main_content.
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
