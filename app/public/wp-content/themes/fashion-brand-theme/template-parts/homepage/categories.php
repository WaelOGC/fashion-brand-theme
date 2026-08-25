<?php
/**
 * Homepage categories — editorial index list.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories      = fashion_brand_theme_get_homepage_categories();
$category_image  = fashion_brand_theme_homepage_image_uri( 'categories/categories-motion-01.jpg' );
?>
<section
	class="homepage-categories"
	aria-labelledby="homepage-categories-heading"
>
	<div class="homepage-categories__media reveal-img">
		<img
			src="<?php echo esc_url( $category_image ); ?>"
			alt=""
			width="1200"
			height="1600"
			loading="lazy"
			decoding="async"
		>
	</div>

	<div class="homepage-categories__index reveal">
		<h2 id="homepage-categories-heading" class="screen-reader-text">
			<?php esc_html_e( 'Shop by category', 'fashion-brand-theme' ); ?>
		</h2>

		<div class="homepage-categories__list">
			<?php foreach ( $categories as $slug => $label ) : ?>
				<a
					class="homepage-categories__item"
					href="<?php echo esc_url( fashion_brand_theme_get_product_category_url( $slug ) ); ?>"
				>
					<span class="homepage-categories__name"><?php echo esc_html( $label ); ?></span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
