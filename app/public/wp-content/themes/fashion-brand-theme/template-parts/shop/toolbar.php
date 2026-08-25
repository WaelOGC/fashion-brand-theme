<?php
/**
 * Shop toolbar: result count, sorting, grid/list toggle.
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total    = (int) wc_get_loop_prop( 'total', 0 );
$per_page = (int) wc_get_loop_prop( 'per_page', get_option( 'posts_per_page' ) );
$current  = max( 1, (int) wc_get_loop_prop( 'current_page', 1 ) );
$from     = $total ? ( ( $current - 1 ) * $per_page ) + 1 : 0;
$to       = min( $total, $current * $per_page );
?>
<div class="shop-toolbar">
	<p class="shop-toolbar__count" role="status">
		<?php
		if ( $total ) {
			printf(
				/* translators: 1: first result, 2: last result, 3: total */
				esc_html__( 'Showing %1$d–%2$d of %3$d results', 'fashion-brand-theme' ),
				(int) $from,
				(int) $to,
				(int) $total
			);
		} else {
			esc_html_e( 'Showing 0 of 0 results', 'fashion-brand-theme' );
		}
		?>
	</p>

	<div class="shop-toolbar__controls">
		<button
			type="button"
			class="shop-filters-toggle"
			data-shop-filters-toggle
			aria-expanded="false"
			aria-controls="shop-sidebar-filters"
		>
			<?php esc_html_e( 'Filters', 'fashion-brand-theme' ); ?>
		</button>

		<div class="shop-toolbar__ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>

		<div class="shop-toolbar__views" role="group" aria-label="<?php esc_attr_e( 'Product layout', 'fashion-brand-theme' ); ?>">
			<button type="button" class="shop-view-toggle is-active" data-shop-view="grid" aria-pressed="true" aria-label="<?php esc_attr_e( 'Grid view', 'fashion-brand-theme' ); ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><rect x="1" y="1" width="6" height="6"/><rect x="9" y="1" width="6" height="6"/><rect x="1" y="9" width="6" height="6"/><rect x="9" y="9" width="6" height="6"/></svg>
			</button>
			<button type="button" class="shop-view-toggle" data-shop-view="list" aria-pressed="false" aria-label="<?php esc_attr_e( 'List view', 'fashion-brand-theme' ); ?>">
				<svg width="16" height="16" viewBox="0 0 16 16" aria-hidden="true" focusable="false"><rect x="1" y="2" width="14" height="3"/><rect x="1" y="6.5" width="14" height="3"/><rect x="1" y="11" width="14" height="3"/></svg>
			</button>
		</div>
	</div>
</div>
