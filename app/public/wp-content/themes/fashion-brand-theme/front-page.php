<?php
/**
 * Front page template.
 *
 * @package Fashion_Brand_Theme
 */

get_header();
?>

<main id="primary" class="site-main site-main--front-page">
	<?php fashion_brand_theme_render_homepage_sections(); ?>
</main>

<?php
get_footer();
