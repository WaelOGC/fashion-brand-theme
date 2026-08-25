<?php
/**
 * Product loop start — shop grid.
 *
 * @package Fashion_Brand_Theme
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?> shop-grid">
