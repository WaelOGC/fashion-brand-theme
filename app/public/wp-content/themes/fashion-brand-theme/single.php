<?php
/**
 * Single post template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main">
	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/components/content', get_post_type() ); ?>
	<?php endwhile; ?>
</main>

<?php
get_footer();
