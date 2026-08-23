<?php
/**
 * Homepage editorial threshold — hero opening.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="homepage-chapter homepage-chapter--field homepage-hero"
	aria-labelledby="homepage-hero-heading"
	data-homepage-chapter="editorial"
>
	<div class="homepage-hero__field" data-homepage-reveal="field">
		<div
			class="homepage-hero__atmosphere homepage-media-placeholder homepage-media-placeholder--atmosphere"
			role="img"
			aria-label="<?php esc_attr_e( 'Placeholder: editorial fashion photography — atmospheric environment', 'fashion-brand-theme' ); ?>"
		></div>

		<div class="homepage-hero__content">
			<div class="homepage-hero__content-inner container">
				<p class="homepage-hero__eyebrow text-label"><?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_eyebrow' ) ); ?></p>
				<h1 id="homepage-hero-heading" class="homepage-hero__title text-display-xl">
					<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_heading' ) ); ?>
				</h1>
				<p class="homepage-hero__statement">
					<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_text' ) ); ?>
				</p>
				<div class="homepage-hero__actions">
					<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_hero_cta_url', fashion_brand_theme_get_shop_url() ) ); ?>">
						<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_cta_label' ) ); ?>
					</a>
				</div>
			</div>
		</div>
	</div>

	<a class="homepage-hero__scroll" href="#homepage-chapter-philosophy">
		<span class="homepage-hero__scroll-label text-label"><?php esc_html_e( 'Scroll', 'fashion-brand-theme' ); ?></span>
		<span class="homepage-hero__scroll-line" aria-hidden="true"></span>
		<span class="screen-reader-text"><?php esc_html_e( 'Continue to brand philosophy', 'fashion-brand-theme' ); ?></span>
	</a>
</section>
