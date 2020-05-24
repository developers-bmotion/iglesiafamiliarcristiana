<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.8.0
 * 
 * @cmsmasters_package 	My Religion
 * @cmsmasters_version 	1.2.2
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>

	<div class="cmsmasters_tabs tabs_mode_tab cmsmasters_woo_tabs">
		<ul class="cmsmasters_tabs_list">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab cmsmasters_tabs_list_item">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<span><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $product_tab['title'] ), $key ) ); ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="cmsmasters_tabs_wrap">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<div class="entry-content cmsmasters_tab" id="tab-<?php echo esc_attr( $key ); ?>">
					<div class="cmsmasters_tab_inner">
						<?php
						if ( isset( $product_tab['callback'] ) ) {
							call_user_func( $product_tab['callback'], $key, $product_tab );
						}
						?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>

<?php endif; ?>