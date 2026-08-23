<?php
/**
 * Homepage philosophy — editorial pause between opening and commerce.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section
	id="homepage-chapter-philosophy"
	class="homepage-chapter homepage-chapter--pause homepage-philosophy"
	aria-labelledby="homepage-philosophy-heading"
	data-homepage-chapter="philosophy"
>
	<div class="homepage-philosophy__inner container container--narrow" data-homepage-reveal="content">
		<p class="homepage-philosophy__index text-chapter" aria-hidden="true">02</p>
		<p class="homepage-philosophy__eyebrow text-label"><?php esc_html_e( 'Our Philosophy', 'fashion-brand-theme' ); ?></p>
		<h2 id="homepage-philosophy-heading" class="homepage-philosophy__title text-statement">
			<?php esc_html_e( 'Quality over quantity.', 'fashion-brand-theme' ); ?>
		</h2>
		<div class="homepage-philosophy__body">
			<p>
				<?php esc_html_e( 'We believe in a wardrobe built with care — fewer pieces, chosen thoughtfully, made to work across the rhythms of a modern European life.', 'fashion-brand-theme' ); ?>
			</p>
			<p class="homepage-philosophy__support">
				<?php esc_html_e( 'Every selection reflects an editorial point of view: calm design, practical elegance, and clothing that earns its place year after year.', 'fashion-brand-theme' ); ?>
			</p>
		</div>
	</div>
</section>
