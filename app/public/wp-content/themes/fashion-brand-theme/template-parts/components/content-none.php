<?php
/**
 * No content partial.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing found', 'fashion-brand-theme' ); ?></h1>
	</header>

	<div class="page-content">
		<p><?php esc_html_e( 'No content matched your request.', 'fashion-brand-theme' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
