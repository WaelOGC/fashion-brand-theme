<?php
/**
 * Homepage closing CTA — full-bleed departure field.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$closing_image = fashion_brand_theme_homepage_image_uri( 'closing-cta/closing-cta-departure-01.jpg' );
?>
<section
	class="homepage-closing"
	aria-labelledby="homepage-cta-heading"
>
	<img
		class="homepage-closing__img"
		src="<?php echo esc_url( $closing_image ); ?>"
		alt=""
		width="1920"
		height="1280"
		loading="lazy"
		decoding="async"
	>

	<div class="homepage-closing__scrim" aria-hidden="true"></div>

	<div class="homepage-closing__copy reveal">
		<h2 id="homepage-cta-heading" class="homepage-closing__headline">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_heading' ) ); ?>
		</h2>
		<p class="homepage-closing__sub">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_text' ) ); ?>
		</p>
		<div class="homepage-closing__ctas">
			<a
				class="cta-link cta-link--light"
				href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_primary_url', fashion_brand_theme_get_shop_url() ) ); ?>"
			>
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_primary_label' ) ); ?>
			</a>
			<a
				class="cta-link cta-link--light"
				href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_secondary_url', fashion_brand_theme_get_page_url( 'collections' ) ) ); ?>"
			>
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_secondary_label' ) ); ?>
			</a>
		</div>
	</div>
</section>
