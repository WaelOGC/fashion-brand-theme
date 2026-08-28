<?php
/**
 * Product tag fields for the Collections landing page.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue media uploader on product tag admin screens.
 *
 * @param string $hook_suffix Current admin page hook.
 * @return void
 */
function fashion_brand_theme_collections_admin_assets( $hook_suffix ) {
	if ( 'edit-tags.php' !== $hook_suffix && 'term.php' !== $hook_suffix ) {
		return;
	}

	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if ( ! $screen || 'product_tag' !== $screen->taxonomy ) {
		return;
	}

	wp_enqueue_media();

	wp_add_inline_script(
		'jquery',
		"(function ($) {
			function bindCollectionImagePicker() {
				$('.fbt-collection-image-field').each(function () {
					var \$field = $(this);
					if (\$field.data('fbt-bound')) {
						return;
					}
					\$field.data('fbt-bound', true);

					var \$input = \$field.find('.fbt-collection-image-id');
					var \$preview = \$field.find('.fbt-collection-image-preview');
					var \$remove = \$field.find('.fbt-collection-image-remove');

					\$field.on('click', '.fbt-collection-image-select', function (event) {
						event.preventDefault();

						var frame = wp.media({
							title: '" . esc_js( __( 'Select collection image', 'fashion-brand-theme' ) ) . "',
							button: { text: '" . esc_js( __( 'Use image', 'fashion-brand-theme' ) ) . "' },
							library: { type: 'image' },
							multiple: false
						});

						frame.on('select', function () {
							var attachment = frame.state().get('selection').first().toJSON();
							\$input.val(attachment.id);
							\$preview.html('<img src=\"' + attachment.url + '\" alt=\"\" style=\"max-width:240px;height:auto;display:block;\" />');
							\$remove.show();
						});

						frame.open();
					});

					\$remove.on('click', function (event) {
						event.preventDefault();
						\$input.val('');
						\$preview.empty();
						\$remove.hide();
					});
				});
			}

			$(bindCollectionImagePicker);
		})(jQuery);"
	);
}
add_action( 'admin_enqueue_scripts', 'fashion_brand_theme_collections_admin_assets' );

/**
 * Render collection fields on the add tag form.
 *
 * @return void
 */
function fashion_brand_theme_collection_tag_add_fields() {
	wp_nonce_field( 'fashion_brand_theme_save_collection_tag', 'fashion_brand_theme_collection_tag_nonce' );
	fashion_brand_theme_render_collection_tag_fields( 0 );
}
add_action( 'product_tag_add_form_fields', 'fashion_brand_theme_collection_tag_add_fields' );

/**
 * Render collection fields on the edit tag form.
 *
 * @param WP_Term $term Current term.
 * @return void
 */
function fashion_brand_theme_collection_tag_edit_fields( $term ) {
	wp_nonce_field( 'fashion_brand_theme_save_collection_tag', 'fashion_brand_theme_collection_tag_nonce' );
	fashion_brand_theme_render_collection_tag_fields( (int) $term->term_id, true );
}
add_action( 'product_tag_edit_form_fields', 'fashion_brand_theme_collection_tag_edit_fields' );

/**
 * Output shared collection term fields.
 *
 * @param int  $term_id Term ID (0 on add form).
 * @param bool $is_edit Whether this is the edit form.
 * @return void
 */
function fashion_brand_theme_render_collection_tag_fields( $term_id, $is_edit = false ) {
	$show_in_collections = 'yes' === get_term_meta( $term_id, '_fbt_show_in_collections', true );
	$image_id          = (int) get_term_meta( $term_id, '_fbt_collection_image_id', true );
	$image_url         = $image_id ? wp_get_attachment_image_url( $image_id, 'medium' ) : '';

	if ( $is_edit ) {
		?>
		<tr class="form-field">
			<th scope="row"><?php esc_html_e( 'Collections page', 'fashion-brand-theme' ); ?></th>
			<td>
				<label for="fbt_show_in_collections">
					<input type="checkbox" name="fbt_show_in_collections" id="fbt_show_in_collections" value="yes" <?php checked( $show_in_collections ); ?> />
					<?php esc_html_e( 'Show in Collections page', 'fashion-brand-theme' ); ?>
				</label>
				<p class="description"><?php esc_html_e( 'When enabled, this tag appears on the Collections page and in the Collections navigation menu (if it has at least one product).', 'fashion-brand-theme' ); ?></p>
			</td>
		</tr>
		<tr class="form-field fbt-collection-image-field">
			<th scope="row"><label for="fbt_collection_image_id"><?php esc_html_e( 'Collection image', 'fashion-brand-theme' ); ?></label></th>
			<td>
				<input type="hidden" class="fbt-collection-image-id" name="fbt_collection_image_id" id="fbt_collection_image_id" value="<?php echo esc_attr( $image_id ); ?>" />
				<div class="fbt-collection-image-preview">
					<?php if ( $image_url ) : ?>
						<img src="<?php echo esc_url( $image_url ); ?>" alt="" style="max-width:240px;height:auto;display:block;" />
					<?php endif; ?>
				</div>
				<p>
					<button type="button" class="button fbt-collection-image-select"><?php esc_html_e( 'Select image', 'fashion-brand-theme' ); ?></button>
					<button type="button" class="button fbt-collection-image-remove" <?php echo $image_id ? '' : 'style="display:none;"'; ?>><?php esc_html_e( 'Remove image', 'fashion-brand-theme' ); ?></button>
				</p>
				<p class="description"><?php esc_html_e( 'Shown on the Collections landing page card. Recommended portrait crop.', 'fashion-brand-theme' ); ?></p>
			</td>
		</tr>
		<?php
		return;
	}

	?>
	<div class="form-field">
		<label for="fbt_show_in_collections">
			<input type="checkbox" name="fbt_show_in_collections" id="fbt_show_in_collections" value="yes" />
			<?php esc_html_e( 'Show in Collections page', 'fashion-brand-theme' ); ?>
		</label>
		<p><?php esc_html_e( 'When enabled, this tag appears on the Collections page and in the Collections navigation menu (if it has at least one product).', 'fashion-brand-theme' ); ?></p>
	</div>
	<div class="form-field fbt-collection-image-field">
		<label for="fbt_collection_image_id"><?php esc_html_e( 'Collection image', 'fashion-brand-theme' ); ?></label>
		<input type="hidden" class="fbt-collection-image-id" name="fbt_collection_image_id" id="fbt_collection_image_id" value="" />
		<div class="fbt-collection-image-preview"></div>
		<p>
			<button type="button" class="button fbt-collection-image-select"><?php esc_html_e( 'Select image', 'fashion-brand-theme' ); ?></button>
			<button type="button" class="button fbt-collection-image-remove" style="display:none;"><?php esc_html_e( 'Remove image', 'fashion-brand-theme' ); ?></button>
		</p>
		<p><?php esc_html_e( 'Shown on the Collections landing page card. Recommended portrait crop.', 'fashion-brand-theme' ); ?></p>
	</div>
	<?php
}

/**
 * Save collection term meta.
 *
 * @param int $term_id Term ID.
 * @return void
 */
function fashion_brand_theme_save_collection_tag_fields( $term_id ) {
	if ( ! isset( $_POST['fashion_brand_theme_collection_tag_nonce'] ) ) {
		return;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['fashion_brand_theme_collection_tag_nonce'] ) ), 'fashion_brand_theme_save_collection_tag' ) ) {
		return;
	}

	if ( ! current_user_can( 'manage_product_terms' ) && ! current_user_can( 'manage_categories' ) ) {
		return;
	}

	$show_in_collections = isset( $_POST['fbt_show_in_collections'] ) && 'yes' === sanitize_text_field( wp_unslash( $_POST['fbt_show_in_collections'] ) ) ? 'yes' : 'no';
	update_term_meta( $term_id, '_fbt_show_in_collections', $show_in_collections );

	$image_id = isset( $_POST['fbt_collection_image_id'] ) ? absint( wp_unslash( $_POST['fbt_collection_image_id'] ) ) : 0;

	if ( $image_id && 'attachment' !== get_post_type( $image_id ) ) {
		$image_id = 0;
	}

	if ( $image_id ) {
		update_term_meta( $term_id, '_fbt_collection_image_id', $image_id );
	} else {
		delete_term_meta( $term_id, '_fbt_collection_image_id' );
	}
}
add_action( 'created_product_tag', 'fashion_brand_theme_save_collection_tag_fields' );
add_action( 'edited_product_tag', 'fashion_brand_theme_save_collection_tag_fields' );
