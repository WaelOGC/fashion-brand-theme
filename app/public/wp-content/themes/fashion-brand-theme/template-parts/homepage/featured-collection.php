<?php
/**
 * Homepage featured collection — full-bleed image field.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$collection_image = fashion_brand_theme_homepage_image_uri( 'featured-collection/featured-collection-golden-hour-01.jpg' );
$collections_url  = fashion_brand_theme_get_page_url( 'collections' );
?>
<section
	class="homepage-featured"
	aria-labelledby="homepage-collection-heading"
>
	<img
		class="homepage-featured__img"
		src="<?php echo esc_url( $collection_image ); ?>"
		alt=""
		width="1920"
		height="1280"
		loading="lazy"
		decoding="async"
	>

	<div class="homepage-featured__scrim" aria-hidden="true"></div>

	<div class="homepage-featured__copy reveal">
		<h2 id="homepage-collection-heading" class="homepage-featured__headline">
			<?php esc_html_e( 'The Seasonal Edit', 'fashion-brand-theme' ); ?>
		</h2>
		<p class="homepage-featured__sub">
			<?php esc_html_e( 'A curated selection of versatile pieces — composed for work, everyday and evening.', 'fashion-brand-theme' ); ?>
		</p>
		<a class="cta-link cta-link--light" href="<?php echo esc_url( $collections_url ); ?>">
			<?php esc_html_e( 'View all collections', 'fashion-brand-theme' ); ?>
		</a>
	</div>
</section>
