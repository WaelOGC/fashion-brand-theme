<?php
/**
 * Homepage guides — asymmetric list + flat-lay.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$guide_teasers = fashion_brand_theme_get_homepage_guide_teasers();
$guides_url    = fashion_brand_theme_get_page_url( 'guides' );
$guides_image  = fashion_brand_theme_homepage_image_uri( 'guides/guides-flatlay-01.jpg' );
?>
<section
	class="homepage-guides"
	aria-labelledby="homepage-guides-heading"
>
	<div class="homepage-guides__copy reveal">
		<h2 id="homepage-guides-heading" class="homepage-guides__headline">
			<?php esc_html_e( 'Make better clothing decisions', 'fashion-brand-theme' ); ?>
		</h2>
		<p class="homepage-guides__sub">
			<?php esc_html_e( 'Editorial resources on wardrobe planning, fabric knowledge and thoughtful style.', 'fashion-brand-theme' ); ?>
		</p>

		<?php foreach ( $guide_teasers as $guide ) : ?>
			<a class="homepage-guides__entry" href="<?php echo esc_url( $guides_url ); ?>">
				<span class="homepage-guides__title"><?php echo esc_html( $guide['title'] ); ?></span>
				<span class="homepage-guides__desc"><?php echo esc_html( $guide['excerpt'] ); ?></span>
			</a>
		<?php endforeach; ?>
	</div>

	<div class="homepage-guides__media reveal-img">
		<img
			src="<?php echo esc_url( $guides_image ); ?>"
			alt=""
			width="1400"
			height="1050"
			loading="lazy"
			decoding="async"
		>
	</div>
</section>
