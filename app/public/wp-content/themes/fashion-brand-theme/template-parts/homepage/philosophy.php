<?php
/**
 * Homepage brand philosophy section.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="homepage-section homepage-philosophy" aria-labelledby="homepage-philosophy-heading">
	<div class="container container--narrow">
		<header class="homepage-section__header">
			<p class="homepage-section__eyebrow"><?php esc_html_e( 'Our Philosophy', 'fashion-brand-theme' ); ?></p>
			<h2 id="homepage-philosophy-heading" class="homepage-section__title">
				<?php esc_html_e( 'Quality over quantity.', 'fashion-brand-theme' ); ?>
			</h2>
		</header>

		<div class="homepage-philosophy__body">
			<p>
				<?php esc_html_e( 'We believe in a wardrobe built with care — fewer pieces, chosen thoughtfully, made to work across the rhythms of a modern European life.', 'fashion-brand-theme' ); ?>
			</p>
			<p>
				<?php esc_html_e( 'Every selection reflects an editorial point of view: calm design, practical elegance, and clothing that earns its place year after year.', 'fashion-brand-theme' ); ?>
			</p>
		</div>
	</div>
</section>
