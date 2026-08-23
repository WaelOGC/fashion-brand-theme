<?php
/**
 * Theme Settings admin page and field renderers.
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
 * Enqueue minimal admin styles for settings tabs.
 *
 * @param string $hook_suffix Current admin page hook.
 * @return void
 */
function fashion_brand_theme_admin_assets( $hook_suffix ) {
	if ( 'toplevel_page_fashion-brand-theme' !== $hook_suffix ) {
		return;
	}

	wp_enqueue_style(
		'fashion-brand-theme-admin-settings',
		FASHION_BRAND_THEME_URI . '/assets/css/admin/theme-settings.css',
		array(),
		FASHION_BRAND_THEME_VERSION
	);
}
add_action( 'admin_enqueue_scripts', 'fashion_brand_theme_admin_assets' );

/**
 * Render the Theme Settings page.
 *
 * @return void
 */
function fashion_brand_theme_render_settings_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$tabs       = fashion_brand_theme_get_settings_tabs();
	$active_tab = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : 'general';

	if ( ! array_key_exists( $active_tab, $tabs ) ) {
		$active_tab = 'general';
	}
	?>
	<div class="wrap fashion-brand-theme-settings">
		<h1><?php esc_html_e( 'Theme Settings', 'fashion-brand-theme' ); ?></h1>
		<p class="description">
			<?php esc_html_e( 'Operational controls for site owners. Design system, layout architecture, responsive behavior, and major visual changes remain code-controlled.', 'fashion-brand-theme' ); ?>
		</p>

		<h2 class="nav-tab-wrapper">
			<?php foreach ( $tabs as $tab_id => $label ) : ?>
				<a
					href="<?php echo esc_url( admin_url( 'admin.php?page=fashion-brand-theme&tab=' . $tab_id ) ); ?>"
					class="nav-tab <?php echo $active_tab === $tab_id ? 'nav-tab-active' : ''; ?>"
				>
					<?php echo esc_html( $label ); ?>
				</a>
			<?php endforeach; ?>
		</h2>

		<form action="options.php" method="post">
			<?php settings_fields( 'fashion_brand_theme_settings_group' ); ?>

			<div class="fashion-brand-theme-settings__panels">
				<?php foreach ( $tabs as $tab_id => $label ) : ?>
					<div
						class="fashion-brand-theme-settings__panel <?php echo $active_tab === $tab_id ? 'is-active' : ''; ?>"
						data-tab-panel="<?php echo esc_attr( $tab_id ); ?>"
						<?php echo $active_tab === $tab_id ? '' : 'hidden'; ?>
					>
						<?php fashion_brand_theme_render_settings_tab_sections( $tab_id ); ?>
					</div>
				<?php endforeach; ?>
			</div>

			<?php submit_button(); ?>
		</form>
	</div>
	<?php
}

/**
 * Render settings sections for a tab.
 *
 * @param string $tab_id Tab identifier.
 * @return void
 */
function fashion_brand_theme_render_settings_tab_sections( $tab_id ) {
	$tab_sections = fashion_brand_theme_get_settings_tab_sections();
	$sections     = $tab_sections[ $tab_id ] ?? array();

	foreach ( $sections as $section_id ) {
		echo '<div class="fashion-brand-theme-settings__section">';
		global $wp_settings_sections;

		if ( isset( $wp_settings_sections['fashion-brand-theme'][ $section_id ] ) ) {
			$section = $wp_settings_sections['fashion-brand-theme'][ $section_id ];
			if ( $section['title'] ) {
				echo '<h2>' . esc_html( $section['title'] ) . '</h2>';
			}
			if ( $section['callback'] ) {
				call_user_func( $section['callback'], $section );
			}
		}

		echo '<table class="form-table" role="presentation">';
		do_settings_fields( 'fashion-brand-theme', $section_id );
		echo '</table></div>';
	}
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
 * Render a number field.
 *
 * @param array<string, string> $args Field arguments.
 * @return void
 */
function fashion_brand_theme_render_number_field( $args ) {
	$key   = $args['key'];
	$value = fashion_brand_theme_get_settings_field_value( $key );
	?>
	<input
		type="number"
		id="<?php echo esc_attr( $key ); ?>"
		name="<?php echo esc_attr( fashion_brand_theme_settings_field_name( $key ) ); ?>"
		value="<?php echo esc_attr( (string) $value ); ?>"
		class="small-text"
		min="1"
		step="1"
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
