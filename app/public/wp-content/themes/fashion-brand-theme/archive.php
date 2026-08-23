<?php
/**
 * Archive template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
		</header>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<?php get_template_part( 'template-parts/components/content', get_post_type() ); ?>
		<?php endwhile; ?>

		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<?php get_template_part( 'template-parts/components/content', 'none' ); ?>
	<?php endif; ?>
</main>

<?php
get_footer();
