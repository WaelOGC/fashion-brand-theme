<?php
/**
 * Size guide modal — placeholder measurements (editable later).
 *
 * @package Fashion_Brand_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="size-guide-modal" data-size-guide-modal hidden>
	<div class="size-guide-modal__backdrop" data-size-guide-close tabindex="-1"></div>
	<div class="size-guide-modal__dialog" role="dialog" aria-modal="true" aria-labelledby="size-guide-title">
		<button type="button" class="size-guide-modal__close" data-size-guide-close aria-label="<?php esc_attr_e( 'Close', 'fashion-brand-theme' ); ?>">&times;</button>
		<h2 id="size-guide-title"><?php esc_html_e( 'Size guide', 'fashion-brand-theme' ); ?></h2>
		<p class="size-guide-modal__note"><?php esc_html_e( 'Placeholder measurements (cm) — confirm final size chart with the client before launch.', 'fashion-brand-theme' ); ?></p>
		<table class="size-guide-table">
			<thead>
				<tr>
					<th><?php esc_html_e( 'Size', 'fashion-brand-theme' ); ?></th>
					<th><?php esc_html_e( 'Chest', 'fashion-brand-theme' ); ?></th>
					<th><?php esc_html_e( 'Waist', 'fashion-brand-theme' ); ?></th>
					<th><?php esc_html_e( 'Length', 'fashion-brand-theme' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr><td>XS</td><td>84</td><td>66</td><td>66</td></tr>
				<tr><td>S</td><td>88</td><td>70</td><td>68</td></tr>
				<tr><td>M</td><td>96</td><td>78</td><td>70</td></tr>
				<tr><td>L</td><td>104</td><td>86</td><td>72</td></tr>
				<tr><td>XL</td><td>112</td><td>94</td><td>74</td></tr>
			</tbody>
		</table>
	</div>
</div>
