<?php
/**
 * Homepage guides teaser section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$guide_teasers = fashion_brand_theme_get_homepage_guide_teasers();
$guides_url      = fashion_brand_theme_get_page_url( 'guides' );
?>
<section class="homepage-section homepage-guides" aria-labelledby="homepage-guides-heading">
	<div class="container">
		<header class="homepage-section__header">
			<p class="homepage-section__eyebrow"><?php esc_html_e( 'Guides', 'fashion-brand-theme' ); ?></p>
			<h2 id="homepage-guides-heading" class="homepage-section__title">
				<?php esc_html_e( 'Make better clothing decisions', 'fashion-brand-theme' ); ?>
			</h2>
			<p class="homepage-section__intro">
				<?php esc_html_e( 'Editorial resources on wardrobe planning, fabric knowledge and thoughtful style — written to support how you shop.', 'fashion-brand-theme' ); ?>
			</p>
		</header>

		<ul class="homepage-guides__list">
			<?php foreach ( $guide_teasers as $guide ) : ?>
				<li class="homepage-guides__item">
					<article class="guide-teaser">
						<h3 class="guide-teaser__title">
							<a href="<?php echo esc_url( $guides_url ); ?>">
								<?php echo esc_html( $guide['title'] ); ?>
							</a>
						</h3>
						<p class="guide-teaser__excerpt"><?php echo esc_html( $guide['excerpt'] ); ?></p>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>

		<p class="homepage-guides__action">
			<a class="homepage-text-link" href="<?php echo esc_url( $guides_url ); ?>">
				<?php esc_html_e( 'Explore all guides', 'fashion-brand-theme' ); ?>
			</a>
		</p>
	</div>
</section>
