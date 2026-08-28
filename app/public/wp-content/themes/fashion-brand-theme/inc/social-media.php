<?php
/**
 * Social media links — Customizer-backed helpers and icon output.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Supported social platforms and display labels.
 *
 * @return array<string, string> Platform key => label.
 */
function fashion_brand_theme_get_social_platforms() {
	return array(
		'instagram' => __( 'Instagram', 'fashion-brand-theme' ),
		'tiktok'    => __( 'TikTok', 'fashion-brand-theme' ),
		'facebook'  => __( 'Facebook', 'fashion-brand-theme' ),
		'pinterest' => __( 'Pinterest', 'fashion-brand-theme' ),
		'youtube'   => __( 'YouTube', 'fashion-brand-theme' ),
		'x'         => __( 'X (Twitter)', 'fashion-brand-theme' ),
		'snapchat'  => __( 'Snapchat', 'fashion-brand-theme' ),
		'linkedin'  => __( 'LinkedIn', 'fashion-brand-theme' ),
	);
}

/**
 * Customizer setting ID for a social platform URL.
 *
 * @param string $platform Platform key.
 * @return string
 */
function fashion_brand_theme_get_social_setting_id( $platform ) {
	return 'fashion_brand_theme_social_' . sanitize_key( $platform );
}

/**
 * Customizer setting ID for a social platform enabled toggle.
 *
 * @param string $platform Platform key.
 * @return string
 */
function fashion_brand_theme_get_social_enabled_setting_id( $platform ) {
	return fashion_brand_theme_get_social_setting_id( $platform ) . '_enabled';
}

/**
 * Whether a social platform is enabled in the Customizer.
 *
 * @param string $platform Platform key.
 * @return bool
 */
function fashion_brand_theme_is_social_platform_enabled( $platform ) {
	return (bool) wp_validate_boolean(
		get_theme_mod( fashion_brand_theme_get_social_enabled_setting_id( $platform ), true )
	);
}

/**
 * Retrieve configured social profile URLs from the Customizer.
 *
 * @return array<string, string> Platform key => URL.
 */
function fashion_brand_theme_get_social_links() {
	$links = array();

	foreach ( array_keys( fashion_brand_theme_get_social_platforms() ) as $platform ) {
		if ( ! fashion_brand_theme_is_social_platform_enabled( $platform ) ) {
			continue;
		}

		$url = get_theme_mod( fashion_brand_theme_get_social_setting_id( $platform ), '' );

		if ( is_string( $url ) && '' !== trim( $url ) ) {
			$links[ $platform ] = $url;
		}
	}

	return $links;
}

/**
 * Inline SVG icon markup for a social platform.
 *
 * @param string $platform Platform key.
 * @return string
 */
function fashion_brand_theme_get_social_icon_svg( $platform ) {
	$attrs = 'xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true" focusable="false"';

	switch ( $platform ) {
		case 'instagram':
			return '<svg ' . $attrs . '><rect x="3" y="3" width="18" height="18" rx="5" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="4" fill="none" stroke="currentColor" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>';
		case 'tiktok':
			return '<svg ' . $attrs . '><path d="M15 4c.6 2.2 2.1 3.8 4 4.2v3.1c-1.6 0-3-.5-4.2-1.3v5.8a5.2 5.2 0 1 1-5.2-5.2c.3 0 .6 0 .9.1v3.3a2 2 0 1 0 1.4 1.9V4h2.1Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
		case 'facebook':
			return '<svg ' . $attrs . '><path d="M14 8h2.5V4H14c-2.8 0-4.5 1.7-4.5 4.5V10H7v4h2.5v8H14v-8h2.7l.3-4H14V8Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
		case 'pinterest':
			return '<svg ' . $attrs . '><circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M12 8.5c-1.8 0-3 1.2-3 2.8 0 1.1.6 1.8 1.4 2.1-.2.8-.6 2-.7 2.3-.1.3.2.3.3.2.1-.1 1.6-1.1 2.2-1.6.4.1.8.2 1.2.2 1.8 0 3-1.2 3-2.9S13.8 8.5 12 8.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
		case 'youtube':
			return '<svg ' . $attrs . '><rect x="3" y="6.5" width="18" height="11" rx="2.5" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M11 10.5v5l4.5-2.5L11 10.5Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
		case 'x':
			return '<svg ' . $attrs . '><path d="m6 6 12 12M18 6 6 18" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>';
		case 'snapchat':
			return '<svg ' . $attrs . '><path d="M12 4c3.2 0 5.5 2.1 5.5 5.1 0 1.4-.5 2.6-1.3 3.5.8.3 1.6.7 2.2 1.1.4.3.3.8-.2.9-.7.1-1.3.2-2 .2.1.6.2 1.2.1 1.7-.1.5-.8.6-1.2.4-.9-.5-1.8-.8-2.8-.8s-1.9.3-2.8.8c-.4.2-1.1.1-1.2-.4-.1-.5 0-1.1.1-1.7-.7 0-1.3-.1-2-.2-.5-.1-.6-.6-.2-.9.6-.4 1.4-.8 2.2-1.1-.8-.9-1.3-2.1-1.3-3.5C6.5 6.1 8.8 4 12 4Z" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/></svg>';
		case 'linkedin':
			return '<svg ' . $attrs . '><rect x="4" y="4" width="16" height="16" rx="2" fill="none" stroke="currentColor" stroke-width="1.5"/><path d="M8 11v6M8 8v.01M12 17v-4.2c0-1 .8-1.8 1.8-1.8s1.8.8 1.8 1.8V17" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		default:
			return '';
	}
}

/**
 * Render social icon list markup.
 *
 * @param array<string, mixed> $args {
 *     Optional arguments.
 *
 *     @type string $class Wrapper `<ul>` class list.
 * }
 * @return void
 */
function fashion_brand_theme_render_social_icons( $args = array() ) {
	$links = fashion_brand_theme_get_social_links();

	if ( empty( $links ) ) {
		return;
	}

	$args = wp_parse_args(
		$args,
		array(
			'class' => 'social-icons',
		)
	);

	$labels = fashion_brand_theme_get_social_platforms();

	echo '<ul class="' . esc_attr( $args['class'] ) . '">';

	foreach ( $links as $platform => $url ) {
		$label = isset( $labels[ $platform ] ) ? $labels[ $platform ] : ucfirst( $platform );
		$icon  = fashion_brand_theme_get_social_icon_svg( $platform );

		if ( '' === $icon ) {
			continue;
		}

		echo '<li>';
		printf(
			'<a href="%1$s" target="_blank" rel="noopener noreferrer" aria-label="%2$s">%3$s</a>',
			esc_url( $url ),
			esc_attr( $label ),
			$icon // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static SVG markup.
		);
		echo '</li>';
	}

	echo '</ul>';
}
