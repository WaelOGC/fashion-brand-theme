<?php
/**
 * Homepage philosophy — overlapping image continuity into the page.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$philosophy_image = fashion_brand_theme_homepage_image_uri( 'philosophy/philosophy-detail-01.jpg' );
$about_url        = fashion_brand_theme_get_page_url( 'about' );
?>
<section
	id="homepage-chapter-philosophy"
	class="homepage-philosophy"
	aria-labelledby="homepage-philosophy-heading"
>
	<div class="homepage-philosophy__media reveal-img">
		<img
			src="<?php echo esc_url( $philosophy_image ); ?>"
			alt=""
			width="960"
			height="1200"
			loading="lazy"
			decoding="async"
		>
	</div>

	<div class="homepage-philosophy__copy reveal">
		<h2 id="homepage-philosophy-heading" class="homepage-philosophy__headline">
			<?php esc_html_e( 'Quality over quantity.', 'fashion-brand-theme' ); ?>
		</h2>
		<p class="homepage-philosophy__body">
			<?php esc_html_e( 'A wardrobe built with care — fewer pieces, chosen thoughtfully, made to work across the rhythms of a modern European life. Quiet Character guides every selection: calm design, practical elegance, and clothing that earns its place year after year.', 'fashion-brand-theme' ); ?>
		</p>
		<a class="cta-link" href="<?php echo esc_url( $about_url ); ?>">
			<?php esc_html_e( 'Our approach', 'fashion-brand-theme' ); ?>
		</a>
	</div>
</section>
