<?php
/**
 * Theme settings — defaults, getters, and sanitization.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Settings option name.
 */
define( 'FASHION_BRAND_THEME_SETTINGS_OPTION', 'fashion_brand_theme_settings' );

/**
 * Registered setting keys.
 *
 * @return string[]
 */
function fashion_brand_theme_get_setting_keys() {
	return array(
		'display_label',
		'announcement_enabled',
		'announcement_text',
		'header_search_enabled',
		'header_account_enabled',
		'header_cart_enabled',
		'footer_copyright_text',
		'footer_visible',
		'social_instagram',
		'social_facebook',
		'social_pinterest',
		'social_tiktok',
	);
}

/**
 * Default theme settings.
 *
 * @return array<string, mixed>
 */
function fashion_brand_theme_get_default_settings() {
	return array(
		'display_label'           => '',
		'announcement_enabled'    => false,
		'announcement_text'       => '',
		'header_search_enabled'   => true,
		'header_account_enabled'  => true,
		'header_cart_enabled'     => true,
		'footer_copyright_text'   => '',
		'footer_visible'          => true,
		'social_instagram'        => '',
		'social_facebook'         => '',
		'social_pinterest'        => '',
		'social_tiktok'           => '',
	);
}

/**
 * Retrieve all theme settings merged with defaults.
 *
 * @return array<string, mixed>
 */
function fashion_brand_theme_get_settings() {
	$stored = get_option( FASHION_BRAND_THEME_SETTINGS_OPTION, array() );

	if ( ! is_array( $stored ) ) {
		$stored = array();
	}

	return wp_parse_args( $stored, fashion_brand_theme_get_default_settings() );
}

/**
 * Retrieve a single theme setting.
 *
 * @param string $key Setting key.
 * @return mixed
 */
function fashion_brand_theme_get_setting( $key ) {
	$settings = fashion_brand_theme_get_settings();

	return $settings[ $key ] ?? null;
}

/**
 * Determine if a boolean theme setting is enabled.
 *
 * @param string $key Setting key.
 * @return bool
 */
function fashion_brand_theme_is_setting_enabled( $key ) {
	return (bool) fashion_brand_theme_get_setting( $key );
}

/**
 * Sanitize theme settings before saving.
 *
 * @param array<string, mixed>|mixed $input Submitted settings.
 * @return array<string, mixed>
 */
function fashion_brand_theme_sanitize_settings( $input ) {
	$defaults  = fashion_brand_theme_get_default_settings();
	$sanitized = $defaults;

	if ( ! is_array( $input ) ) {
		return $sanitized;
	}

	$sanitized['display_label']         = isset( $input['display_label'] ) ? sanitize_text_field( wp_unslash( $input['display_label'] ) ) : '';
	$sanitized['announcement_text']     = isset( $input['announcement_text'] ) ? sanitize_textarea_field( wp_unslash( $input['announcement_text'] ) ) : '';
	$sanitized['footer_copyright_text'] = isset( $input['footer_copyright_text'] ) ? sanitize_text_field( wp_unslash( $input['footer_copyright_text'] ) ) : '';

	$sanitized['social_instagram'] = isset( $input['social_instagram'] ) ? esc_url_raw( wp_unslash( $input['social_instagram'] ) ) : '';
	$sanitized['social_facebook']  = isset( $input['social_facebook'] ) ? esc_url_raw( wp_unslash( $input['social_facebook'] ) ) : '';
	$sanitized['social_pinterest'] = isset( $input['social_pinterest'] ) ? esc_url_raw( wp_unslash( $input['social_pinterest'] ) ) : '';
	$sanitized['social_tiktok']    = isset( $input['social_tiktok'] ) ? esc_url_raw( wp_unslash( $input['social_tiktok'] ) ) : '';

	$sanitized['announcement_enabled']   = fashion_brand_theme_sanitize_checkbox_value( $input['announcement_enabled'] ?? 0 );
	$sanitized['header_search_enabled']  = fashion_brand_theme_sanitize_checkbox_value( $input['header_search_enabled'] ?? 0 );
	$sanitized['header_account_enabled'] = fashion_brand_theme_sanitize_checkbox_value( $input['header_account_enabled'] ?? 0 );
	$sanitized['header_cart_enabled']    = fashion_brand_theme_sanitize_checkbox_value( $input['header_cart_enabled'] ?? 0 );
	$sanitized['footer_visible']         = fashion_brand_theme_sanitize_checkbox_value( $input['footer_visible'] ?? 0 );

	return $sanitized;
}

/**
 * Retrieve the front-end display label fallback.
 *
 * @return string
 */
function fashion_brand_theme_get_display_label() {
	$label = fashion_brand_theme_get_setting( 'display_label' );

	if ( is_string( $label ) && '' !== trim( $label ) ) {
		return $label;
	}

	return __( 'Logo', 'fashion-brand-theme' );
}

/**
 * Retrieve configured social profile URLs.
 *
 * @return array<string, string> Platform key => URL.
 */
function fashion_brand_theme_get_social_links() {
	$links = array(
		'instagram' => fashion_brand_theme_get_setting( 'social_instagram' ),
		'facebook'  => fashion_brand_theme_get_setting( 'social_facebook' ),
		'pinterest' => fashion_brand_theme_get_setting( 'social_pinterest' ),
		'tiktok'    => fashion_brand_theme_get_setting( 'social_tiktok' ),
	);

	return array_filter(
		$links,
		static function ( $url ) {
			return is_string( $url ) && '' !== $url;
		}
	);
}

/**
 * Persist a single setting into the shared option array.
 *
 * @param string $key   Setting key.
 * @param mixed  $value Raw value.
 * @return mixed Sanitized value.
 */
function fashion_brand_theme_persist_setting( $key, $value ) {
	$settings         = fashion_brand_theme_get_settings();
	$settings[ $key ] = fashion_brand_theme_sanitize_setting_value( $key, $value );
	$sanitized        = fashion_brand_theme_sanitize_settings( $settings );

	update_option( FASHION_BRAND_THEME_SETTINGS_OPTION, $sanitized );

	return $sanitized[ $key ];
}

/**
 * Sanitize a checkbox value.
 *
 * @param mixed $value Raw value.
 * @return bool
 */
function fashion_brand_theme_sanitize_checkbox_value( $value ) {
	return '1' === (string) $value || 1 === $value || true === $value;
}

/**
 * Sanitize an individual setting value by key.
 *
 * @param string $key   Setting key.
 * @param mixed  $value Raw value.
 * @return mixed
 */
function fashion_brand_theme_sanitize_setting_value( $key, $value ) {
	switch ( $key ) {
		case 'display_label':
		case 'footer_copyright_text':
			return sanitize_text_field( wp_unslash( (string) $value ) );

		case 'announcement_text':
			return sanitize_textarea_field( wp_unslash( (string) $value ) );

		case 'social_instagram':
		case 'social_facebook':
		case 'social_pinterest':
		case 'social_tiktok':
			return esc_url_raw( wp_unslash( (string) $value ) );

		case 'announcement_enabled':
		case 'header_search_enabled':
		case 'header_account_enabled':
		case 'header_cart_enabled':
		case 'footer_visible':
			return fashion_brand_theme_sanitize_checkbox_value( $value );

		default:
			return $value;
	}
}

/**
 * Output the announcement bar when enabled.
 *
 * @return void
 */
function fashion_brand_theme_render_announcement_bar() {
	if ( ! fashion_brand_theme_is_setting_enabled( 'announcement_enabled' ) ) {
		return;
	}

	$text = fashion_brand_theme_get_setting( 'announcement_text' );

	if ( ! is_string( $text ) || '' === trim( $text ) ) {
		return;
	}

	get_template_part( 'template-parts/global/announcement', 'bar' );
}
add_action( 'fashion_brand_theme_before_header', 'fashion_brand_theme_render_announcement_bar' );
