<?php
/**
 * Homepage hero — asymmetric editorial opening.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$hero_image = fashion_brand_theme_homepage_image_uri( 'hero/hero-editorial-01.jpg' );
?>
<section
	class="homepage-hero"
	aria-labelledby="homepage-hero-heading"
>
	<img
		class="homepage-hero__img"
		src="<?php echo esc_url( $hero_image ); ?>"
		alt=""
		width="1600"
		height="2000"
		decoding="async"
		fetchpriority="high"
	>

	<div class="homepage-hero__scrim" aria-hidden="true"></div>

	<div class="homepage-hero__copy">
		<p class="homepage-hero__kicker">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_eyebrow' ) ); ?>
		</p>
		<h1 id="homepage-hero-heading" class="homepage-hero__headline">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_heading' ) ); ?>
		</h1>
		<p class="homepage-hero__sub">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_text' ) ); ?>
		</p>
		<a
			class="cta-link"
			href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_hero_cta_url', fashion_brand_theme_get_shop_url() ) ); ?>"
		>
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_cta_label' ) ); ?>
		</a>
	</div>
</section>
