<?php
/**
 * Site header.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$header_classes = array_merge( array( 'site-header' ), fashion_brand_theme_get_header_modifier_classes() );
?>
<header id="masthead" class="<?php echo esc_attr( implode( ' ', $header_classes ) ); ?>">
	<div class="site-header__inner container">
		<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>

		<div class="site-header__controls">
			<?php get_template_part( 'template-parts/header/utility', 'navigation' ); ?>
			<?php if ( fashion_brand_theme_is_setting_enabled( 'header_mobile_menu_enabled' ) ) : ?>
				<?php get_template_part( 'template-parts/header/menu', 'toggle' ); ?>
			<?php endif; ?>
		</div>

		<div
			id="site-navigation"
			class="site-header__navigation"
			data-header-navigation
		>
			<?php get_template_part( 'template-parts/header/primary', 'navigation' ); ?>
		</div>
	</div>

	<?php if ( fashion_brand_theme_is_setting_enabled( 'header_search_enabled' ) && fashion_brand_theme_is_setting_enabled( 'header_search_panel_enabled' ) ) : ?>
		<?php get_template_part( 'template-parts/header/search', 'panel' ); ?>
	<?php endif; ?>
</header>
