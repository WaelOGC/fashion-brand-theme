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
			<?php esc_html_e( 'Begin with pieces that feel considered — and stay relevant.', 'fashion-brand-theme' ); ?>
		</h2>
		<p class="homepage-cta__statement">
			<?php esc_html_e( 'Discover a calm, curated shop designed for modern European living.', 'fashion-brand-theme' ); ?>
		</p>
		<div class="homepage-cta__actions">
			<a class="button button--primary" href="<?php echo esc_url( fashion_brand_theme_get_shop_url() ); ?>">
				<?php esc_html_e( 'Shop the Edit', 'fashion-brand-theme' ); ?>
			</a>
			<a class="button" href="<?php echo esc_url( fashion_brand_theme_get_page_url( 'collections' ) ); ?>">
				<?php esc_html_e( 'View Collections', 'fashion-brand-theme' ); ?>
			</a>
		</div>
	</div>
</section>
