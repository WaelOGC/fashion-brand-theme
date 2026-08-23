<?php
/**
 * Homepage featured categories section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = fashion_brand_theme_get_homepage_categories();
?>
<section class="homepage-section homepage-categories" aria-labelledby="homepage-categories-heading">
	<div class="container">
		<header class="homepage-section__header">
			<p class="homepage-section__eyebrow"><?php esc_html_e( 'Shop by Category', 'fashion-brand-theme' ); ?></p>
			<h2 id="homepage-categories-heading" class="homepage-section__title">
				<?php esc_html_e( 'Curated categories', 'fashion-brand-theme' ); ?>
			</h2>
			<p class="homepage-section__intro">
				<?php esc_html_e( 'Explore a focused edit of essentials and occasion pieces — intentionally selected, never overcrowded.', 'fashion-brand-theme' ); ?>
			</p>
		</header>

		<ul class="homepage-categories__grid">
			<?php foreach ( $categories as $slug => $label ) : ?>
				<li class="homepage-categories__item">
					<a class="category-card" href="<?php echo esc_url( fashion_brand_theme_get_product_category_url( $slug ) ); ?>">
						<span
							class="category-card__media homepage-media-placeholder"
							role="img"
							aria-label="<?php echo esc_attr( sprintf( __( 'Placeholder image for %s', 'fashion-brand-theme' ), $label ) ); ?>"
						></span>
						<span class="category-card__title"><?php echo esc_html( $label ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
