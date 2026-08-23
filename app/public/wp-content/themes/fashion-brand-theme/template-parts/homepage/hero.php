<?php
/**
 * Homepage hero section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="homepage-section homepage-hero" aria-labelledby="homepage-hero-heading">
	<div class="homepage-hero__inner container">
		<div class="homepage-hero__content">
			<p class="homepage-section__eyebrow"><?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_eyebrow' ) ); ?></p>
			<h1 id="homepage-hero-heading" class="homepage-hero__title text-display">
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

		<div class="homepage-hero__media">
			<div
				class="homepage-media-placeholder homepage-media-placeholder--hero"
				role="img"
				aria-label="<?php esc_attr_e( 'Placeholder hero image: editorial fashion photography', 'fashion-brand-theme' ); ?>"
			></div>
		</div>
	</div>
</section>
