<?php
/**
 * Homepage featured collection section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$collection_items = fashion_brand_theme_get_featured_collection_items();
$collections_url  = fashion_brand_theme_get_page_url( 'collections' );
?>
<section class="homepage-section homepage-collection" aria-labelledby="homepage-collection-heading">
	<div class="container">
		<header class="homepage-section__header homepage-section__header--split">
			<div class="homepage-section__header-content">
				<p class="homepage-section__eyebrow"><?php esc_html_e( 'Featured Collection', 'fashion-brand-theme' ); ?></p>
				<h2 id="homepage-collection-heading" class="homepage-section__title">
					<?php esc_html_e( 'The Seasonal Edit', 'fashion-brand-theme' ); ?>
				</h2>
				<p class="homepage-section__intro">
					<?php esc_html_e( 'A curated selection of versatile pieces — composed for work, everyday and evening.', 'fashion-brand-theme' ); ?>
				</p>
			</div>
			<p class="homepage-section__aside">
				<a class="homepage-text-link" href="<?php echo esc_url( $collections_url ); ?>">
					<?php esc_html_e( 'View all collections', 'fashion-brand-theme' ); ?>
				</a>
			</p>
		</header>

		<ul class="homepage-collection__grid">
			<?php foreach ( $collection_items as $item ) : ?>
				<li class="homepage-collection__item">
					<article class="collection-card">
						<div
							class="collection-card__media homepage-media-placeholder"
							role="img"
							aria-label="<?php echo esc_attr( $item['note'] ); ?>"
						></div>
						<div class="collection-card__body">
							<h3 class="collection-card__title"><?php echo esc_html( $item['title'] ); ?></h3>
							<p class="collection-card__meta text-small">
								<?php esc_html_e( 'Price available soon', 'fashion-brand-theme' ); ?>
							</p>
						</div>
					</article>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
