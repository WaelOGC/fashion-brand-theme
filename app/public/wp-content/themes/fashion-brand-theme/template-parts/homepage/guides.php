<?php
/**
 * Homepage guide interlude — editorial knowledge chapter.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$guide_teasers = fashion_brand_theme_get_homepage_guide_teasers();
$guides_url    = fashion_brand_theme_get_page_url( 'guides' );
?>
<section
	class="homepage-chapter homepage-chapter--editorial homepage-guides"
	aria-labelledby="homepage-guides-heading"
	data-homepage-chapter="guides"
>
	<?php
	get_template_part(
		'template-parts/homepage/threshold',
		'strip',
		array(
			'number' => '05',
			'label'  => __( 'Guide Interlude', 'fashion-brand-theme' ),
			'text'   => __( 'Editorial knowledge to support how you shop.', 'fashion-brand-theme' ),
		)
	);
	?>

	<div class="homepage-guides__inner container container--wide">
		<div class="homepage-guides__layout">
			<div class="homepage-guides__visual" data-homepage-reveal="visual">
				<figure class="homepage-guides__figure">
					<div
						class="homepage-guides__media homepage-media homepage-media--editorial homepage-media--slot"
						role="img"
						aria-label="<?php esc_attr_e( 'Guide photography slot — production image forthcoming', 'fashion-brand-theme' ); ?>"
					>
						<span class="homepage-media__ready" aria-hidden="true"></span>
					</div>
					<figcaption class="homepage-media__caption text-caption">
						<?php esc_html_e( 'Photography forthcoming', 'fashion-brand-theme' ); ?>
					</figcaption>
				</figure>
			</div>

			<div class="homepage-guides__content">
				<header class="homepage-guides__header" data-homepage-reveal="content">
					<h2 id="homepage-guides-heading" class="homepage-guides__title">
						<?php esc_html_e( 'Make better clothing decisions', 'fashion-brand-theme' ); ?>
					</h2>
					<p class="homepage-guides__intro">
						<?php esc_html_e( 'Editorial resources on wardrobe planning, fabric knowledge and thoughtful style.', 'fashion-brand-theme' ); ?>
					</p>
				</header>

				<ul class="homepage-guides__list">
					<?php foreach ( $guide_teasers as $guide ) : ?>
						<li class="homepage-guides__item" data-homepage-reveal="guide">
							<article class="guide-preview">
								<h3 class="guide-preview__title">
									<a href="<?php echo esc_url( $guides_url ); ?>">
										<?php echo esc_html( $guide['title'] ); ?>
									</a>
								</h3>
								<p class="guide-preview__excerpt"><?php echo esc_html( $guide['excerpt'] ); ?></p>
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
		</div>
	</div>
</section>
