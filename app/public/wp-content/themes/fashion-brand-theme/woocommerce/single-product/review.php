<?php
/**
 * Review display — ensure Gravatar avatar is rendered.
 *
 * @see woocommerce/templates/single-product/review.php
 * @package Fashion_Brand_Theme
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container product-review">
		<?php
		/**
		 * Avatar — circular ~40px via CSS.
		 */
		echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '40' ), '', '', array( 'class' => 'product-review__avatar avatar' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>

		<div class="comment-text product-review__body">
			<?php
			/**
			 * The woocommerce_review_before_comment_meta hook.
			 */
			do_action( 'woocommerce_review_before_comment_meta', $comment );

			/**
			 * The woocommerce_review_meta hook.
			 */
			do_action( 'woocommerce_review_meta', $comment );

			do_action( 'woocommerce_review_before_comment_text', $comment );
			do_action( 'woocommerce_review_comment_text', $comment );
			do_action( 'woocommerce_review_after_comment_text', $comment );
			?>
		</div>
	</div>
</li>
