<?php
/**
 * Homepage closing CTA section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="homepage-section homepage-cta" aria-labelledby="homepage-cta-heading">
	<div class="container container--narrow">
		<h2 id="homepage-cta-heading" class="homepage-cta__title">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_heading' ) ); ?>
		</h2>
		<p class="homepage-cta__statement">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_text' ) ); ?>
		</p>
		<div class="homepage-cta__actions">
			<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_primary_url', fashion_brand_theme_get_shop_url() ) ); ?>">
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_primary_label' ) ); ?>
			</a>
			<a class="button" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_secondary_url', fashion_brand_theme_get_page_url( 'collections' ) ) ); ?>">
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_secondary_label' ) ); ?>
			</a>
		</div>
	</div>
</section>
