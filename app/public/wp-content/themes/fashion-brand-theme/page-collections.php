<?php
/**
 * Collections landing page template.
 *
 * Used automatically for a Page with slug "collections".
 *
 * @package Fashion_Brand_Theme
 */

get_header();

$collections = fashion_brand_theme_get_active_collections();
?>

<main id="primary" class="site-main collections-page">
	<header class="collections-header">
		<p class="collections-eyebrow"><?php esc_html_e( 'Collections', 'fashion-brand-theme' ); ?></p>
		<h1><?php esc_html_e( 'Shop by Occasion', 'fashion-brand-theme' ); ?></h1>
	</header>

	<?php if ( empty( $collections ) ) : ?>
		<p class="collections-empty"><?php esc_html_e( 'No collections to show yet. Edit a product tag under Products → Tags, enable “Show in Collections page”, and assign products to that tag.', 'fashion-brand-theme' ); ?></p>
	<?php else : ?>
		<div class="collections-grid">
			<?php foreach ( $collections as $collection ) : ?>
				<?php
				$image_classes = array( 'collection-card__image' );

				if ( empty( $collection['image_url'] ) ) {
					$image_classes[] = 'collection-card__image--empty';
				}
				?>
				<a class="collection-card" href="<?php echo esc_url( $collection['url'] ); ?>">
					<span class="<?php echo esc_attr( implode( ' ', $image_classes ) ); ?>"<?php echo ! empty( $collection['image_url'] ) ? ' style="background-image:url(' . esc_url( $collection['image_url'] ) . ')"' : ''; ?>></span>
					<span class="collection-card__label"><?php echo esc_html( $collection['name'] ); ?></span>
					<span class="collection-card__arrow" aria-hidden="true">&rarr;</span>
				</a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</main>

<?php
get_footer();
