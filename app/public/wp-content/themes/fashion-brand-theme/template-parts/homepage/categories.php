<?php
/**
 * Homepage curated categories — editorial commerce chapter.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$categories = fashion_brand_theme_get_homepage_categories();
?>
<section
	class="homepage-chapter homepage-chapter--commerce homepage-categories"
	aria-labelledby="homepage-categories-heading"
	data-homepage-chapter="categories"
>
	<?php
	get_template_part(
		'template-parts/homepage/threshold',
		'strip',
		array(
			'number' => '03',
			'label'  => __( 'Curated Categories', 'fashion-brand-theme' ),
			'text'   => __( 'A focused edit — intentionally selected, never overcrowded.', 'fashion-brand-theme' ),
		)
	);
	?>

	<div class="homepage-categories__inner container container--wide">
		<header class="homepage-categories__header" data-homepage-reveal="content">
			<h2 id="homepage-categories-heading" class="homepage-categories__title">
				<?php esc_html_e( 'Shop by category', 'fashion-brand-theme' ); ?>
			</h2>
		</header>

		<ul class="homepage-categories__mosaic">
			<?php
			$category_index = 0;
			foreach ( $categories as $slug => $label ) :
				$modifier = fashion_brand_theme_get_homepage_category_layout_modifier( $category_index );
				++$category_index;
				?>
				<li
					class="homepage-categories__item homepage-categories__item--<?php echo esc_attr( $modifier ); ?>"
					data-homepage-reveal="tile"
				>
					<a
						class="category-tile"
						href="<?php echo esc_url( fashion_brand_theme_get_product_category_url( $slug ) ); ?>"
					>
						<span
							class="category-tile__media homepage-media-placeholder homepage-media-placeholder--category"
							role="img"
							aria-label="<?php echo esc_attr( sprintf( __( 'Placeholder photography for %s', 'fashion-brand-theme' ), $label ) ); ?>"
						></span>
						<span class="category-tile__label text-label"><?php echo esc_html( $label ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
