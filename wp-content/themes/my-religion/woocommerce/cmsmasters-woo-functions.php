<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.1.9
 * 
 * Website WooCommerce Functions
 * Created by CMSMasters
 * 
 */


/* Dynamic Cart */
function my_religion_woocommerce_cart_dropdown() {
	global $woocommerce;
	
	
	$cart_link = wc_get_cart_url();
	
	
	$cart_count = $woocommerce->cart->get_cart_contents_count();
	
	$cart_subtotal = $woocommerce->cart->get_cart_subtotal();
	
	
	$cart_currency_symbol = get_woocommerce_currency_symbol();
	
	$cart_currency_symbol_pos = get_option('woocommerce_currency_pos');
	
	$cart_currency = $cart_currency_symbol;
	
	
	if ($cart_currency_symbol_pos == 'left_space') {
		$cart_currency = $cart_currency_symbol . ' ';
	} elseif ($cart_currency_symbol_pos == 'right_space') {
		$cart_currency = ' ' . $cart_currency_symbol;
	}
	
	
	$cart_price = str_replace($cart_currency, '', $cart_subtotal);
	
	
	$cart_subtotal_html = '';
	
	
	if ($cart_currency_symbol_pos == 'left') {
		$cart_subtotal_html .= '<span class="currency">' . esc_html($cart_currency_symbol) . '</span>' . esc_html($cart_price);
	} elseif ($cart_currency_symbol_pos == 'right') {
		$cart_subtotal_html .= esc_html($cart_price) . '<span class="currency">' . esc_html($cart_currency_symbol) . '</span>';
	} elseif ($cart_currency_symbol_pos == 'left_space') {
		$cart_subtotal_html .= '<span class="currency">' . esc_html($cart_currency_symbol) . '</span> ' . esc_html($cart_price);
	} elseif ($cart_currency_symbol_pos == 'right_space') {
		$cart_subtotal_html .= esc_html($cart_price) . ' <span class="currency">' . esc_html($cart_currency_symbol) . '</span>';
	}
	
	
	echo '<div class="cmsmasters_dynamic_cart">' .  
		'<a href="' . esc_url($cart_link) . '" class="cmsmasters_dynamic_cart_button"><span class="cmsmasters_theme_icon_basket">' . esc_html($cart_count) . '</span></a>' . 
		'<div class="cmsmasters_dynamic_cart_button_hide"></div>' . 
		'<div class="widget_shopping_cart_content"></div>' . 
	'</div>';
}


/* Add to Cart Button */
function my_religion_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;
	
	
	if ( 
		$product->is_purchasable() && 
		$product->is_type( 'simple' ) && 
		$product->is_in_stock() 
	) {
		echo '<div class="button_to_cart_wrap">' . 
			'<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->get_id()) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button_to_cart add_to_cart_button cmsmasters_add_to_cart_button ajax_add_to_cart product_type_simple" title="' . esc_attr__('Add to Cart', 'my-religion') . '">' . 
				'<span>' . esc_html__('Add to Cart', 'my-religion') . '</span>' . 
			'</a>' . 
			'<a href="' . esc_url(wc_get_cart_url()) . '" class="button_to_cart added_to_cart wc-forward" title="' . esc_attr__('View Cart', 'my-religion') . '">' . 
				'<span>' . esc_html__('View Cart', 'my-religion') . '</span>' . 
			'</a>' . 
		'</div>';
	}
}


/* Rating */
function my_religion_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemprop = $in_review ? 'reviewRating' : 'aggregateRating';
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'my-religion'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" style=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'my-religion') . "</span>
</div>
";
	
	
	if ($show) {
		echo my_religion_return_content($out);
	} else {
		return $out;
	}
}


/* Price Format */
function my_religion_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'my_religion_woocommerce_price_format', 1, 2);


function my_religion_woocommerce_demo_store($html, $notice) {
	return '<div class="woocommerce-store-notice demo_store">' . 
		'<a href="#" class="cmsmasters_theme_icon_cancel woocommerce-store-notice__dismiss-link"></a>' . 
		'<p>' . wp_kses_post($notice) . '</p>' . 
	'</div>';
}

add_filter('woocommerce_demo_store', 'my_religion_woocommerce_demo_store', 10, 2);


function my_religion_woocommerce_support() {
    add_theme_support('woocommerce', array( 
		'thumbnail_image_width' => 540, 
		'single_image_width' => 600 
	));
}

add_action('after_setup_theme', 'my_religion_woocommerce_support');


add_filter('woocommerce_enqueue_styles', '__return_false');


/* WooCommerce Onsale Filter */
add_filter( 'woocommerce_sale_flash', 'my_religion_change_on_sale' );

function my_religion_change_on_sale() {
	return '<span class="onsale"><span>' . esc_html__('Sale!', 'my-religion') . '</span></span>';
}


/* WooCommerce Dynamic cart count update after ajax */
function woocommerce_header_add_to_cart_count( $dynamic_count ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<span class="cmsmasters_theme_icon_basket"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
	<?php
	
	$dynamic_count['.cmsmasters_dynamic_cart_button span'] = ob_get_clean();
	
	return $dynamic_count;
}

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_count');
