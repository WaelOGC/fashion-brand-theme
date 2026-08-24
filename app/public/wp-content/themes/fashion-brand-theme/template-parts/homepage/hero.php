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
		<div class="homepage-hero__compose">
			<div class="homepage-hero__content">
				<div class="homepage-hero__content-inner">
					<p class="homepage-hero__eyebrow text-label"><?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_eyebrow' ) ); ?></p>
					<h1 id="homepage-hero-heading" class="homepage-hero__title text-display-xl">
						<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_heading' ) ); ?>
					</h1>
					<p class="homepage-hero__statement text-body-lg">
						<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_text' ) ); ?>
					</p>
					<div class="homepage-hero__actions">
						<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_hero_cta_url', fashion_brand_theme_get_shop_url() ) ); ?>">
							<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_hero_cta_label' ) ); ?>
						</a>
					</div>
				</div>
			</div>

			<figure class="homepage-hero__media">
				<div
					class="homepage-media homepage-media--hero homepage-media--slot"
					role="img"
					aria-label="<?php esc_attr_e( 'Editorial photography slot — production image forthcoming', 'fashion-brand-theme' ); ?>"
				>
					<span class="homepage-media__ready" aria-hidden="true"></span>
				</div>
				<figcaption class="homepage-media__caption text-caption">
					<?php esc_html_e( 'Photography forthcoming', 'fashion-brand-theme' ); ?>
				</figcaption>
			</figure>
		</div>
	</div>

	<a class="homepage-hero__scroll" href="#homepage-chapter-philosophy">
		<span class="homepage-hero__scroll-label text-label"><?php esc_html_e( 'Continue', 'fashion-brand-theme' ); ?></span>
		<span class="homepage-hero__scroll-line" aria-hidden="true"></span>
		<span class="screen-reader-text"><?php esc_html_e( 'Continue to brand philosophy', 'fashion-brand-theme' ); ?></span>
	</a>
</section>
