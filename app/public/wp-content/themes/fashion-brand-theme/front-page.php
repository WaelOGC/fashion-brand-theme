<?php
/**
 * Front page template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main site-main--front-page">
	<?php
	get_template_part( 'template-parts/homepage/hero' );
	get_template_part( 'template-parts/homepage/philosophy' );
	get_template_part( 'template-parts/homepage/categories' );
	get_template_part( 'template-parts/homepage/featured-collection' );
	get_template_part( 'template-parts/homepage/guides' );
	get_template_part( 'template-parts/homepage/closing-cta' );
	?>
</main>

<?php
get_footer();
