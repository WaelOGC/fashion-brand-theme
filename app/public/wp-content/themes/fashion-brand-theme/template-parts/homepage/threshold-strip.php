<?php
/**
 * Homepage threshold strip — mode transition marker.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$defaults = array(
	'number' => '',
	'label'  => '',
	'text'   => '',
);

$args = wp_parse_args( $args ?? array(), $defaults );

if ( empty( $args['label'] ) ) {
	return;
}
?>
<div class="homepage-threshold" data-homepage-reveal="threshold">
	<div class="homepage-threshold__inner container">
		<?php if ( ! empty( $args['number'] ) ) : ?>
			<p class="homepage-threshold__number text-label" aria-hidden="true">
				<?php echo esc_html( $args['number'] ); ?>
			</p>
		<?php endif; ?>
		<div class="homepage-threshold__content">
			<p class="homepage-threshold__label text-label"><?php echo esc_html( $args['label'] ); ?></p>
			<?php if ( ! empty( $args['text'] ) ) : ?>
				<p class="homepage-threshold__text"><?php echo esc_html( $args['text'] ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>
