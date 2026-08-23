<?php
/**
 * WordPress Customizer integration.
 *
 * Presentation-level controls only. Operational settings remain in Theme Settings.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer setting keys exposed in the admin preview panel.
 *
 * @return string[]
 */
function fashion_brand_theme_get_customizer_setting_keys() {
	return array(
		'display_label',
		'announcement_enabled',
		'announcement_text',
	);
}

/**
 * Register Customizer settings and controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function fashion_brand_theme_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'fashion_brand_theme_presentation',
		array(
			'title'       => __( 'Fashion Brand Theme', 'fashion-brand-theme' ),
			'description' => __( 'Lightweight presentation controls. Full theme settings are managed under Fashion Brand → Theme Settings.', 'fashion-brand-theme' ),
			'priority'    => 30,
		)
	);

	$controls = array(
		'display_label'        => array(
			'label' => __( 'Display Label Fallback', 'fashion-brand-theme' ),
			'type'  => 'text',
		),
		'announcement_enabled' => array(
			'label' => __( 'Enable Announcement Bar', 'fashion-brand-theme' ),
			'type'  => 'checkbox',
		),
		'announcement_text'    => array(
			'label' => __( 'Announcement Text', 'fashion-brand-theme' ),
			'type'  => 'textarea',
		),
	);

	foreach ( $controls as $key => $control ) {
		$setting_id = fashion_brand_theme_get_customizer_setting_id( $key );

		$wp_customize->add_setting(
			$setting_id,
			array(
				'capability'        => 'edit_theme_options',
				'default'           => fashion_brand_theme_get_default_settings()[ $key ],
				'transport'         => 'refresh',
				'sanitize_callback' => static function ( $value ) use ( $key ) {
					return fashion_brand_theme_persist_setting( $key, $value );
				},
			)
		);

		add_filter(
			'customize_value_' . $setting_id,
			static function () use ( $key ) {
				return fashion_brand_theme_get_setting( $key );
			}
		);

		$wp_customize->add_control(
			$setting_id,
			array(
				'label'   => $control['label'],
				'section' => 'fashion_brand_theme_presentation',
				'type'    => $control['type'],
			)
		);
	}
}
add_action( 'customize_register', 'fashion_brand_theme_customize_register' );

/**
 * Build a Customizer setting ID for a theme setting key.
 *
 * @param string $key Setting key.
 * @return string
 */
function fashion_brand_theme_get_customizer_setting_id( $key ) {
	return 'fashion_brand_theme_' . $key;
}

/**
 * Ensure unchecked Customizer checkboxes persist as disabled values.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 * @return void
 */
function fashion_brand_theme_customize_save_presentation_settings( $wp_customize ) {
	$checkbox_setting = $wp_customize->get_setting(
		fashion_brand_theme_get_customizer_setting_id( 'announcement_enabled' )
	);

	if ( $checkbox_setting && false === $checkbox_setting->post_value( false ) ) {
		fashion_brand_theme_persist_setting( 'announcement_enabled', false );
	}

	foreach ( fashion_brand_theme_get_customizer_setting_keys() as $key ) {
		remove_theme_mod( fashion_brand_theme_get_customizer_setting_id( $key ) );
	}
}
add_action( 'customize_save_after', 'fashion_brand_theme_customize_save_presentation_settings' );
