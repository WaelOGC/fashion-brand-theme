<?php
/**
 * Search results template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<header class="page-header">
		<h1 class="page-title">
			<?php
			printf(
				/* translators: %s: search query. */
				esc_html__( 'Search Results for: %s', 'fashion-brand-theme' ),
				esc_html( get_search_query() )
			);
			?>
		</h1>
	</header>

	<?php get_search_form(); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/components/content', 'search' ); ?>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/components/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
