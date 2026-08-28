<?php
/**
 * Collections landing page template.
 *
 * Used automatically for a Page with slug "collections".
 *
 * @package Fashion_Brand_Theme
 */

get_header();

$collection_images = array(
	'everyday-essentials'   => 'knitwear/primary.jpg',
	'occasion-evening-wear' => 'dresses/primary.jpg',
);
?>

<main id="primary" class="site-main collections-page">
	<header class="collections-header">
		<p class="collections-eyebrow"><?php esc_html_e( 'Collections', 'fashion-brand-theme' ); ?></p>
		<h1><?php esc_html_e( 'Shop by Occasion', 'fashion-brand-theme' ); ?></h1>
	</header>
	<div class="collections-grid">
		<?php foreach ( fashion_brand_theme_get_collection_slugs() as $slug => $label ) : ?>
			<?php
			$image_relative = isset( $collection_images[ $slug ] ) ? $collection_images[ $slug ] : 'knitwear/primary.jpg';
			$image_url      = FASHION_BRAND_THEME_URI . '/assets/images/product-photography/' . $image_relative;
			?>
			<a class="collection-card" href="<?php echo esc_url( fashion_brand_theme_get_collection_url( $slug ) ); ?>">
				<span class="collection-card__image" style="background-image:url('<?php echo esc_url( $image_url ); ?>')"></span>
				<span class="collection-card__label"><?php echo esc_html( $label ); ?></span>
				<span class="collection-card__arrow" aria-hidden="true">&rarr;</span>
			</a>
		<?php endforeach; ?>
	</div>
</main>

<?php
get_footer();
