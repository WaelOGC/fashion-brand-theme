<?php
/**
 * Cinematic homepage chrome — mark, counter, hamburger, overlay nav.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$shop_url        = fashion_brand_theme_get_shop_url();
$collections_url = fashion_brand_theme_get_page_url( 'collections' );
$guides_url      = fashion_brand_theme_get_page_url( 'guides' );
$about_url       = fashion_brand_theme_get_page_url( 'about' );
$contact_url     = fashion_brand_theme_get_page_url( 'contact' );
?>
<div class="cinematic-mark" aria-hidden="true">W</div>

<button type="button" class="cinematic-menu-btn" aria-controls="cinematic-overlay-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open menu', 'fashion-brand-theme' ); ?>">
	<span></span>
	<span></span>
	<span></span>
</button>

<div class="cinematic-counter" aria-live="polite">
	<b>01</b> / 06 — Quiet Character
</div>

<nav id="cinematic-overlay-nav" class="cinematic-overlay-nav" aria-label="<?php esc_attr_e( 'Site', 'fashion-brand-theme' ); ?>" aria-hidden="true">
	<button type="button" class="cinematic-overlay-close" aria-label="<?php esc_attr_e( 'Close menu', 'fashion-brand-theme' ); ?>">
		<?php esc_html_e( 'Close', 'fashion-brand-theme' ); ?>
	</button>

	<a href="<?php echo esc_url( $shop_url ); ?>"><?php esc_html_e( 'Shop', 'fashion-brand-theme' ); ?></a>
	<a href="<?php echo esc_url( $collections_url ); ?>"><?php esc_html_e( 'Collections', 'fashion-brand-theme' ); ?></a>
	<a href="<?php echo esc_url( $guides_url ); ?>"><?php esc_html_e( 'Guides', 'fashion-brand-theme' ); ?></a>
	<a href="<?php echo esc_url( $about_url ); ?>"><?php esc_html_e( 'About', 'fashion-brand-theme' ); ?></a>
	<a href="<?php echo esc_url( $contact_url ); ?>"><?php esc_html_e( 'Contact', 'fashion-brand-theme' ); ?></a>

	<p class="cinematic-overlay-foot"><?php echo esc_html( fashion_brand_theme_get_display_label() ); ?></p>
</nav>
