<?php
/**
 * Display single product reviews with avatars + review form.
 *
 * @package Fashion_Brand_Theme
 * @version 4.3.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! comments_open() ) {
	return;
}
?>
<div id="reviews" class="woocommerce-Reviews">
	<div id="comments">
		<h2 class="woocommerce-Reviews-title">
			<?php
			$count = $product->get_review_count();
			if ( $count && wc_review_ratings_enabled() ) {
				printf(
					/* translators: 1: reviews count 2: product name */
					esc_html( _n( '%1$s review for %2$s', '%1$s reviews for %2$s', $count, 'fashion-brand-theme' ) ),
					esc_html( (string) $count ),
					esc_html( $product->get_name() )
				);
			} else {
				esc_html_e( 'Reviews', 'fashion-brand-theme' );
			}
			?>
		</h2>

		<?php if ( have_comments() ) : ?>
			<ol class="commentlist">
				<?php wp_list_comments( apply_filters( 'woocommerce_product_review_list_args', array( 'callback' => 'woocommerce_comments' ) ) ); ?>
			</ol>
			<?php
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) {
				echo '<nav class="woocommerce-pagination">';
				paginate_comments_links(
					apply_filters(
						'woocommerce_comment_pagination_args',
						array(
							'prev_text' => '&larr;',
							'next_text' => '&rarr;',
							'type'      => 'list',
						)
					)
				);
				echo '</nav>';
			}
			?>
		<?php else : ?>
			<p class="woocommerce-noreviews"><?php esc_html_e( 'No reviews yet — be the first to review this product.', 'fashion-brand-theme' ); ?></p>
		<?php endif; ?>
	</div>

	<?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) : ?>
		<div id="review_form_wrapper">
			<div id="review_form">
				<?php
				$commenter    = wp_get_current_commenter();
				$comment_form = array(
					'title_reply'         => have_comments() ? __( 'Add a review', 'fashion-brand-theme' ) : sprintf( __( 'Be the first to review &ldquo;%s&rdquo;', 'fashion-brand-theme' ), get_the_title() ),
					'title_reply_to'      => __( 'Leave a Reply to %s', 'fashion-brand-theme' ),
					'title_reply_before'  => '<span id="reply-title" class="comment-reply-title">',
					'title_reply_after'   => '</span>',
					'comment_notes_after' => '',
					'label_submit'        => __( 'Submit', 'fashion-brand-theme' ),
					'logged_in_as'        => '',
					'comment_field'       => '',
				);

				$name_email_required = (bool) get_option( 'require_name_email', 1 );
				$fields              = array(
					'author' => array(
						'label'    => __( 'Name', 'fashion-brand-theme' ),
						'type'     => 'text',
						'value'    => $commenter['comment_author'],
						'required' => $name_email_required,
					),
					'email'  => array(
						'label'    => __( 'Email', 'fashion-brand-theme' ),
						'type'     => 'email',
						'value'    => $commenter['comment_author_email'],
						'required' => $name_email_required,
					),
				);

				$comment_form['fields'] = array();

				foreach ( $fields as $key => $field ) {
					$field_html  = '<p class="comment-form-' . esc_attr( $key ) . '">';
					$field_html .= '<label for="' . esc_attr( $key ) . '">' . esc_html( $field['label'] );
					if ( $field['required'] ) {
						$field_html .= '&nbsp;<span class="required">*</span>';
					}
					$field_html .= '</label><input id="' . esc_attr( $key ) . '" name="' . esc_attr( $key ) . '" type="' . esc_attr( $field['type'] ) . '" value="' . esc_attr( $field['value'] ) . '" size="30" ' . ( $field['required'] ? 'required' : '' ) . ' /></p>';
					$comment_form['fields'][ $key ] = $field_html;
				}

				$account_page_url = wc_get_page_permalink( 'myaccount' );
				if ( $account_page_url ) {
					$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'fashion-brand-theme' ), esc_url( $account_page_url ) ) . '</p>';
				}

				if ( wc_review_ratings_enabled() ) {
					$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'fashion-brand-theme' ) . ( wc_review_ratings_required() ? '&nbsp;<span class="required">*</span>' : '' ) . '</label><select name="rating" id="rating" required>
						<option value="">' . esc_html__( 'Rate&hellip;', 'fashion-brand-theme' ) . '</option>
						<option value="5">' . esc_html__( 'Perfect', 'fashion-brand-theme' ) . '</option>
						<option value="4">' . esc_html__( 'Good', 'fashion-brand-theme' ) . '</option>
						<option value="3">' . esc_html__( 'Average', 'fashion-brand-theme' ) . '</option>
						<option value="2">' . esc_html__( 'Not that bad', 'fashion-brand-theme' ) . '</option>
						<option value="1">' . esc_html__( 'Very poor', 'fashion-brand-theme' ) . '</option>
					</select></div>';
				}

				$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'fashion-brand-theme' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>';

				comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
				?>
			</div>
		</div>
	<?php else : ?>
		<p class="woocommerce-verification-required"><?php esc_html_e( 'Only logged in customers who have purchased this product may leave a review.', 'fashion-brand-theme' ); ?></p>
	<?php endif; ?>

	<div class="clear"></div>
</div>
