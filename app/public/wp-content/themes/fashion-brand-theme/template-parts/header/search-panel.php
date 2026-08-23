<?php
/**
 * Header search panel.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div
	id="header-search-panel"
	class="header-search-panel"
	data-header-search-panel
	hidden
>
	<div class="header-search-panel__inner container">
		<form
			role="search"
			method="get"
			class="header-search-form"
			action="<?php echo esc_url( home_url( '/' ) ); ?>"
		>
			<label class="header-search-form__label" for="header-search-field">
				<?php esc_html_e( 'Search', 'fashion-brand-theme' ); ?>
			</label>
			<input
				id="header-search-field"
				class="header-search-form__field"
				type="search"
				name="s"
				value="<?php echo esc_attr( get_search_query() ); ?>"
				placeholder="<?php esc_attr_e( 'Search products and guides', 'fashion-brand-theme' ); ?>"
				autocomplete="off"
			/>
			<button type="submit" class="header-search-form__submit button">
				<?php esc_html_e( 'Search', 'fashion-brand-theme' ); ?>
			</button>
		</form>
	</div>
</div>
