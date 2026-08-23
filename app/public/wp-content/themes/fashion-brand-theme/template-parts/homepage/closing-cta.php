<?php
/**
 * Homepage closing threshold — quiet final composition.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	class="homepage-chapter homepage-chapter--closing homepage-closing"
	aria-labelledby="homepage-cta-heading"
	data-homepage-chapter="closing"
>
	<div class="homepage-closing__inner container" data-homepage-reveal="closing">
		<p class="homepage-closing__index text-label" aria-hidden="true">06</p>
		<h2 id="homepage-cta-heading" class="homepage-closing__title text-display-xl">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_heading' ) ); ?>
		</h2>
		<p class="homepage-closing__statement">
			<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_text' ) ); ?>
		</p>
		<div class="homepage-closing__actions">
			<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_primary_url', fashion_brand_theme_get_shop_url() ) ); ?>">
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_primary_label' ) ); ?>
			</a>
			<a class="button" href="<?php echo esc_url( fashion_brand_theme_get_homepage_url( 'homepage_cta_secondary_url', fashion_brand_theme_get_page_url( 'collections' ) ) ); ?>">
				<?php echo esc_html( fashion_brand_theme_get_homepage_text( 'homepage_cta_secondary_label' ) ); ?>
			</a>
		</div>
	</div>
</section>
