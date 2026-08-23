<?php
/**
 * 404 template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<section class="error-404 not-found">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Page not found', 'fashion-brand-theme' ); ?></h1>
		</header>

		<div class="page-content">
			<p><?php esc_html_e( 'The page you requested could not be found.', 'fashion-brand-theme' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
