<?php
/**
 * Utility navigation.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$show_search  = fashion_brand_theme_is_setting_enabled( 'header_search_enabled' );
$show_account = fashion_brand_theme_is_setting_enabled( 'header_account_enabled' );
$show_cart    = fashion_brand_theme_is_setting_enabled( 'header_cart_enabled' );
$use_panel    = fashion_brand_theme_is_setting_enabled( 'header_search_panel_enabled' );

if ( ! $show_search && ! $show_account && ! $show_cart ) {
	return;
}
?>
<nav class="utility-navigation" aria-label="<?php esc_attr_e( 'Utility Navigation', 'fashion-brand-theme' ); ?>">
	<ul id="utility-menu" class="utility-menu">
		<?php if ( $show_search ) : ?>
			<li class="menu-item menu-item-search">
				<?php if ( $use_panel ) : ?>
					<button
						type="button"
						class="utility-menu__search-toggle"
						aria-expanded="false"
						aria-controls="header-search-panel"
						data-search-toggle
					>
						<?php esc_html_e( 'Search', 'fashion-brand-theme' ); ?>
					</button>
				<?php else : ?>
					<a href="<?php echo esc_url( fashion_brand_theme_get_search_url() ); ?>">
						<?php esc_html_e( 'Search', 'fashion-brand-theme' ); ?>
					</a>
				<?php endif; ?>
			</li>
		<?php endif; ?>

		<?php if ( $show_account ) : ?>
			<li class="menu-item">
				<a href="<?php echo esc_url( fashion_brand_theme_get_account_url() ); ?>">
					<?php esc_html_e( 'Account', 'fashion-brand-theme' ); ?>
				</a>
			</li>
		<?php endif; ?>

		<?php if ( $show_cart ) : ?>
			<li class="menu-item menu-item-cart">
				<a class="utility-menu__cart" href="<?php echo esc_url( fashion_brand_theme_get_cart_url() ); ?>">
					<?php esc_html_e( 'Cart', 'fashion-brand-theme' ); ?>
					<?php fashion_brand_theme_render_header_cart_count(); ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>
</nav>
