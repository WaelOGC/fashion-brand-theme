<?php
/**
 * Homepage collection — Progressive Commit prototype.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$collection_items = fashion_brand_theme_get_featured_collection_items();
$collections_url  = fashion_brand_theme_get_page_url( 'collections' );
$shop_url         = fashion_brand_theme_get_shop_url();
?>
<section
	class="homepage-chapter homepage-chapter--collection homepage-collection"
	aria-labelledby="homepage-collection-heading"
	data-homepage-chapter="collection"
	data-progressive-commit
	id="progressive-commit-prototype"
>
	<div
		class="progressive-commit__region"
		data-progressive-commit-region
		data-mode="editorial"
	>
		<div class="homepage-collection__environment" data-homepage-reveal="environment">
			<figure class="homepage-collection__scene-wrap">
				<div
					class="homepage-collection__scene homepage-media homepage-media--scene homepage-media--slot homepage-media--inverse"
					role="img"
					aria-label="<?php esc_attr_e( 'Collection environment photography slot — production image forthcoming', 'fashion-brand-theme' ); ?>"
				>
					<span class="homepage-media__ready" aria-hidden="true"></span>
				</div>
			</figure>

			<div class="homepage-collection__intro container">
				<p class="homepage-collection__index text-label" aria-hidden="true">04</p>
				<p class="homepage-collection__eyebrow text-label"><?php esc_html_e( 'Featured Collection', 'fashion-brand-theme' ); ?></p>
				<h2 id="homepage-collection-heading" class="homepage-collection__title text-display">
					<?php esc_html_e( 'The Seasonal Edit', 'fashion-brand-theme' ); ?>
				</h2>
				<p class="homepage-collection__lead">
					<?php esc_html_e( 'A curated selection of versatile pieces — composed for work, everyday and evening.', 'fashion-brand-theme' ); ?>
				</p>
				<p class="homepage-collection__link-wrap progressive-commit__collections-link">
					<a class="homepage-text-link homepage-text-link--inverse" href="<?php echo esc_url( $collections_url ); ?>">
						<?php esc_html_e( 'View all collections', 'fashion-brand-theme' ); ?>
					</a>
				</p>
			</div>
		</div>

		<div class="progressive-commit__controls container container--wide">
			<button
				type="button"
				class="button button--primary progressive-commit__toggle"
				data-progressive-commit-toggle
				aria-pressed="false"
				aria-controls="progressive-commit-product-grid"
				aria-describedby="progressive-commit-status"
			>
				<span class="progressive-commit__toggle-label progressive-commit__toggle-label--editorial">
					<?php esc_html_e( 'Shop this edit', 'fashion-brand-theme' ); ?>
				</span>
				<span class="progressive-commit__toggle-label progressive-commit__toggle-label--commerce" hidden>
					<?php esc_html_e( 'Continue browsing', 'fashion-brand-theme' ); ?>
				</span>
			</button>
			<p id="progressive-commit-status" class="screen-reader-text" role="status" aria-live="polite" data-progressive-commit-status></p>
		</div>

		<div class="homepage-collection__products container container--wide">
			<ul
				id="progressive-commit-product-grid"
				class="homepage-collection__composition progressive-commit__grid"
			>
				<?php foreach ( $collection_items as $index => $item ) : ?>
					<?php
					$item_class   = ! empty( $item['is_featured'] ) ? 'homepage-collection__item--featured' : '';
					$piece_number = str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
					?>
					<li class="homepage-collection__item <?php echo esc_attr( $item_class ); ?>">
						<article class="collection-piece">
							<div
								class="collection-piece__media homepage-media homepage-media--product homepage-media--slot homepage-media--inverse"
								role="img"
								aria-label="<?php echo esc_attr( $item['note'] ); ?>"
							>
								<span class="homepage-media__ready" aria-hidden="true"></span>
							</div>

							<div class="collection-piece__editorial" data-progressive-commit-editorial aria-hidden="false">
								<p class="collection-piece__look text-label">
									<?php
									printf(
										/* translators: %s: look number. */
										esc_html__( 'Look %s', 'fashion-brand-theme' ),
										esc_html( $piece_number )
									);
									?>
								</p>
							</div>

							<div class="collection-piece__commerce" data-progressive-commit-commerce aria-hidden="true">
								<h3 class="collection-piece__title"><?php echo esc_html( $item['title'] ); ?></h3>
								<p class="collection-piece__price text-price">
									<?php echo esc_html( $item['price'] ); ?>
									<span class="collection-piece__price-note text-small">
										<?php esc_html_e( 'placeholder price', 'fashion-brand-theme' ); ?>
									</span>
								</p>
								<a class="button button--primary collection-piece__cta" href="<?php echo esc_url( $shop_url ); ?>">
									<?php esc_html_e( 'View piece', 'fashion-brand-theme' ); ?>
								</a>
							</div>
						</article>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
