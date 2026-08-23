<?php
/**
 * Theme Settings admin page.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register admin menu pages.
 *
 * @return void
 */
function fashion_brand_theme_register_admin_menu() {
	add_menu_page(
		__( 'Fashion Brand', 'fashion-brand-theme' ),
		__( 'Fashion Brand', 'fashion-brand-theme' ),
		'manage_options',
		'fashion-brand-theme',
		'fashion_brand_theme_render_settings_page',
		'dashicons-art',
		59
	);

	add_submenu_page(
		'fashion-brand-theme',
		__( 'Theme Settings', 'fashion-brand-theme' ),
		__( 'Theme Settings', 'fashion-brand-theme' ),
		'manage_options',
		'fashion-brand-theme',
		'fashion_brand_theme_render_settings_page'
	);
}
add_action( 'admin_menu', 'fashion_brand_theme_register_admin_menu' );

/**
 * Register theme settings.
 *
 * @return void
 */
function fashion_brand_theme_register_settings() {
	register_setting(
		'fashion_brand_theme_settings_group',
		FASHION_BRAND_THEME_SETTINGS_OPTION,
		array(
			'type'              => 'array',
			'sanitize_callback' => 'fashion_brand_theme_sanitize_settings',
			'default'           => fashion_brand_theme_get_default_settings(),
		)
	);

	add_settings_section(
		'fashion_brand_theme_general',
		__( 'General', 'fashion-brand-theme' ),
		'fashion_brand_theme_render_general_section',
		'fashion-brand-theme'
	);

	add_settings_section(
		'fashion_brand_theme_header',
		__( 'Header', 'fashion-brand-theme' ),
		'fashion_brand_theme_render_header_section',
		'fashion-brand-theme'
	);

	add_settings_section(
		'fashion_brand_theme_footer',
		__( 'Footer', 'fashion-brand-theme' ),
		'fashion_brand_theme_render_footer_section',
		'fashion-brand-theme'
	);

	add_settings_section(
		'fashion_brand_theme_social',
		__( 'Social / External Links', 'fashion-brand-theme' ),
		'fashion_brand_theme_render_social_section',
		'fashion-brand-theme'
	);

	fashion_brand_theme_add_settings_fields();
}
add_action( 'admin_init', 'fashion_brand_theme_register_settings' );

/**
 * Register individual settings fields.
 *
 * @return void
 */
function fashion_brand_theme_add_settings_fields() {
	$fields = array(
		array(
			'id'       => 'display_label',
			'title'    => __( 'Display Label Fallback', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_general',
			'callback' => 'fashion_brand_theme_render_text_field',
			'args'     => array(
				'key'         => 'display_label',
				'description' => __( 'Used when no custom logo is set. Does not replace the WordPress site title setting.', 'fashion-brand-theme' ),
			),
		),
		array(
			'id'       => 'announcement_enabled',
			'title'    => __( 'Enable Announcement Bar', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_general',
			'callback' => 'fashion_brand_theme_render_checkbox_field',
			'args'     => array(
				'key'         => 'announcement_enabled',
				'description' => __( 'Shows a simple announcement bar above the site header.', 'fashion-brand-theme' ),
			),
		),
		array(
			'id'       => 'announcement_text',
			'title'    => __( 'Announcement Text', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_general',
			'callback' => 'fashion_brand_theme_render_textarea_field',
			'args'     => array(
				'key'         => 'announcement_text',
				'description' => __( 'Short message displayed in the announcement bar.', 'fashion-brand-theme' ),
			),
		),
		array(
			'id'       => 'header_search_enabled',
			'title'    => __( 'Show Search', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_header',
			'callback' => 'fashion_brand_theme_render_checkbox_field',
			'args'     => array( 'key' => 'header_search_enabled' ),
		),
		array(
			'id'       => 'header_account_enabled',
			'title'    => __( 'Show Account Link', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_header',
			'callback' => 'fashion_brand_theme_render_checkbox_field',
			'args'     => array( 'key' => 'header_account_enabled' ),
		),
		array(
			'id'       => 'header_cart_enabled',
			'title'    => __( 'Show Cart Link', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_header',
			'callback' => 'fashion_brand_theme_render_checkbox_field',
			'args'     => array( 'key' => 'header_cart_enabled' ),
		),
		array(
			'id'       => 'footer_copyright_text',
			'title'    => __( 'Footer Copyright Text', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_footer',
			'callback' => 'fashion_brand_theme_render_text_field',
			'args'     => array(
				'key'         => 'footer_copyright_text',
				'description' => __( 'Optional override. Leave empty to use the default copyright line.', 'fashion-brand-theme' ),
			),
		),
		array(
			'id'       => 'footer_visible',
			'title'    => __( 'Show Footer', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_footer',
			'callback' => 'fashion_brand_theme_render_checkbox_field',
			'args'     => array( 'key' => 'footer_visible' ),
		),
		array(
			'id'       => 'social_instagram',
			'title'    => __( 'Instagram URL', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_social',
			'callback' => 'fashion_brand_theme_render_url_field',
			'args'     => array( 'key' => 'social_instagram' ),
		),
		array(
			'id'       => 'social_facebook',
			'title'    => __( 'Facebook URL', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_social',
			'callback' => 'fashion_brand_theme_render_url_field',
			'args'     => array( 'key' => 'social_facebook' ),
		),
		array(
			'id'       => 'social_pinterest',
			'title'    => __( 'Pinterest URL', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_social',
			'callback' => 'fashion_brand_theme_render_url_field',
			'args'     => array( 'key' => 'social_pinterest' ),
		),
		array(
			'id'       => 'social_tiktok',
			'title'    => __( 'TikTok URL', 'fashion-brand-theme' ),
			'section'  => 'fashion_brand_theme_social',
			'callback' => 'fashion_brand_theme_render_url_field',
			'args'     => array( 'key' => 'social_tiktok' ),
		),
	);

	foreach ( $fields as $field ) {
		add_settings_field(
			$field['id'],
			$field['title'],
			$field['callback'],
			'fashion-brand-theme',
			$field['section'],
			$field['args']
		);
	}
}

/**
 * Render the Theme Settings page.
 *
 * @return void
 */
function fashion_brand_theme_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Theme Settings', 'fashion-brand-theme' ); ?></h1>
		<p><?php esc_html_e( 'Operational theme settings for content and front-end behavior. Design, layout, and architecture changes remain code-controlled.', 'fashion-brand-theme' ); ?></p>

		<form action="options.php" method="post">
			<?php
			settings_fields( 'fashion_brand_theme_settings_group' );
			do_settings_sections( 'fashion-brand-theme' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * General section description.
 *
 * @return void
 */
function fashion_brand_theme_render_general_section() {
	echo '<p>' . esc_html__( 'General theme presentation and optional announcement messaging.', 'fashion-brand-theme' ) . '</p>';
}

/**
 * Header section description.
 *
 * @return void
 */
function fashion_brand_theme_render_header_section() {
	echo '<p>' . esc_html__( 'Utility header controls. Navigation structure remains defined by the theme.', 'fashion-brand-theme' ) . '</p>';
}

/**
 * Footer section description.
 *
 * @return void
 */
function fashion_brand_theme_render_footer_section() {
	echo '<p>' . esc_html__( 'Basic footer visibility and copyright text.', 'fashion-brand-theme' ) . '</p>';
}

/**
 * Social section description.
 *
 * @return void
 */
function fashion_brand_theme_render_social_section() {
	echo '<p>' . esc_html__( 'External profile links stored for theme use. URLs are sanitized on save.', 'fashion-brand-theme' ) . '</p>';
}

/**
 * Retrieve the current value for a settings field.
 *
 * @param string $key Setting key.
 * @return mixed
 */
function fashion_brand_theme_get_settings_field_value( $key ) {
	return fashion_brand_theme_get_setting( $key );
}

/**
 * Build the field name for the settings form.
 *
 * @param string $key Setting key.
 * @return string
 */
function fashion_brand_theme_settings_field_name( $key ) {
	return FASHION_BRAND_THEME_SETTINGS_OPTION . '[' . $key . ']';
}

/**
 * Render a text field.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_text_field( $args ) {
	$key   = $args['key'];
	$value = fashion_brand_theme_get_settings_field_value( $key );
	?>
	<input
		type="text"
		id="<?php echo esc_attr( $key ); ?>"
		name="<?php echo esc_attr( fashion_brand_theme_settings_field_name( $key ) ); ?>"
		value="<?php echo esc_attr( is_string( $value ) ? $value : '' ); ?>"
		class="regular-text"
	/>
	<?php fashion_brand_theme_render_field_description( $args ); ?>
	<?php
}

/**
 * Render a textarea field.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_textarea_field( $args ) {
	$key   = $args['key'];
	$value = fashion_brand_theme_get_settings_field_value( $key );
	?>
	<textarea
		id="<?php echo esc_attr( $key ); ?>"
		name="<?php echo esc_attr( fashion_brand_theme_settings_field_name( $key ) ); ?>"
		rows="3"
		class="large-text"
	><?php echo esc_textarea( is_string( $value ) ? $value : '' ); ?></textarea>
	<?php fashion_brand_theme_render_field_description( $args ); ?>
	<?php
}

/**
 * Render a URL field.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_url_field( $args ) {
	$key   = $args['key'];
	$value = fashion_brand_theme_get_settings_field_value( $key );
	?>
	<input
		type="url"
		id="<?php echo esc_attr( $key ); ?>"
		name="<?php echo esc_attr( fashion_brand_theme_settings_field_name( $key ) ); ?>"
		value="<?php echo esc_url( is_string( $value ) ? $value : '' ); ?>"
		class="regular-text code"
		placeholder="https://"
	/>
	<?php fashion_brand_theme_render_field_description( $args ); ?>
	<?php
}

/**
 * Render a checkbox field.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_checkbox_field( $args ) {
	$key     = $args['key'];
	$checked = fashion_brand_theme_is_setting_enabled( $key );
	$name    = fashion_brand_theme_settings_field_name( $key );
	?>
	<input type="hidden" name="<?php echo esc_attr( $name ); ?>" value="0" />
	<label for="<?php echo esc_attr( $key ); ?>">
		<input
			type="checkbox"
			id="<?php echo esc_attr( $key ); ?>"
			name="<?php echo esc_attr( $name ); ?>"
			value="1"
			<?php checked( $checked ); ?>
		/>
		<?php esc_html_e( 'Enabled', 'fashion-brand-theme' ); ?>
	</label>
	<?php fashion_brand_theme_render_field_description( $args ); ?>
	<?php
}

/**
 * Render an optional field description.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_field_description( $args ) {
	if ( empty( $args['description'] ) ) {
		return;
	}

	echo '<p class="description">' . esc_html( $args['description'] ) . '</p>';
}
