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
			<p class="homepage-section__eyebrow"><?php esc_html_e( 'Curated European Fashion', 'fashion-brand-theme' ); ?></p>
			<h1 id="homepage-hero-heading" class="homepage-hero__title text-display">
				<?php esc_html_e( 'Clothing with intention.', 'fashion-brand-theme' ); ?>
			</h1>
			<p class="homepage-hero__statement">
				<?php esc_html_e( 'Considered pieces for modern life — designed for quality, longevity and quiet confidence.', 'fashion-brand-theme' ); ?>
			</p>
			<div class="homepage-hero__actions">
				<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_shop_url() ); ?>">
					<?php esc_html_e( 'Explore the Shop', 'fashion-brand-theme' ); ?>
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
