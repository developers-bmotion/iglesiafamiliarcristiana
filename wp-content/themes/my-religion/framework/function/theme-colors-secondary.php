<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.2.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function my_religion_theme_colors_secondary() {
	$cmsmasters_option = my_religion_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.2.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		if (CMSMASTERS_TIMETABLE) {
			$custom_css .= "
/***************** Start {$title} Timetable Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container * {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover,
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a:hover,
	{$rule}.tt_booking a.tt_btn {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover,
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a:hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.hover_color {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Heading Color */
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a,
	{$rule}.tt_tabs_navigation li a.selected,
	{$rule}.tt_tabs_navigation li.ui-tabs-active a,
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:before, 
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container, 
	{$rule}.cmsmasters_tt_event .cmsmasters_tt_event_hours .cmsmasters_tt_event_hours_item .cmsmasters_tt_event_hours_item_title, 
	{$rule}.cmsmasters_tt_event .cmsmasters_tt_event_details .cmsmasters_tt_event_details_item .cmsmasters_tt_event_details_item_title {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.tt_booking a.tt_btn:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Alternate Background Color */
	{$rule}ul.tt_items_list li:nth-child(2n+1) {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	/* Start Alternate Background Color */
	
	
	/* Start Main Background Color */
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a:hover,
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover:before,
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover *,
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover,
	{$rule}.tt_booking a.tt_btn, 
	{$rule}.tt_booking a.tt_btn:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container,
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a,
	{$rule}.tt_booking .tt_booking_message_wrapper {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Borders Color */
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_tt_event .cmsmasters_tt_event_hours .cmsmasters_tt_event_hours_item, 
	{$rule}.cmsmasters_tt_event .cmsmasters_tt_event_details .cmsmasters_tt_event_details_item, 
	{$rule}ul.tt_upcoming_events li .tt_upcoming_events_event_container, 
	{$rule}.tt_upcoming_events_wrapper .tt_upcoming_event_controls > a {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} Timetable Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_DONATIONS) {
			$custom_css .= "
/***************** Start {$title} CMSMASTERS Donations Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a,
	{$rule}.campaign_meta_wrap .cmsmasters_campaign_donations_count_number,
	{$rule}.cmsmasters_post_comments span,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.cmsmasters_donation_details_item a:hover,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_amount_currency,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a:hover,
	{$rule}.campaign_meta_wrap .cmsmasters_campaign_target_number,
	{$rule}.cmsmasters_campaign_user_name a:hover,
	{$rule}.cmsmasters_campaign_category a:hover,
	{$rule}.cmsmasters_campaign_tags a:hover,
	{$rule}.cmsmasters_post_comments:hover:before,
	{$rule}.opened-article > .campaign .cmsmasters_campaign_title,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_currency,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a:hover,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_title a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_post_comments:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.donation_confirm .donation_confirm_info_title,
	{$rule}.cmsmasters_donation_details_item_title,
	{$rule}.cmsmasters_donation_details_item a,
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover,
	{$rule}.cmsmasters_campaign_user_name a,
	{$rule}.cmsmasters_campaign_category a,
	{$rule}.cmsmasters_campaign_tags a,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_stat_title,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_title a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_img_rollover_wrap:hover .cmsmasters_img_rollover,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:after,
	{$rule}.cmsmasters_donations .donation .cmsmasters_img_rollover_wrap:hover .cmsmasters_img_rollover {
		background-color:rgba(" . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . ", 0.8);
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button,
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_img_rollover_wrap .cmsmasters_open_post_link:before,
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:before,
	{$rule}.cmsmasters_donations .donation .cmsmasters_img_rollover_wrap .cmsmasters_open_post_link {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.donation_confirm .donation_confirm_info_title,
	{$rule}.campaign_meta_wrap .cmsmasters_campaign_donate_button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.donation_confirm .donation_confirm_info_title,
	{$rule}.donation_confirm .donation_confirm_info,
	{$rule}.cmsmasters_donation_details_item,
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donate_button .button:hover,
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div,
	{$rule}.opened-article > .campaign .cmsmasters_campaign_cont_info,
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_footer {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} CMSMASTERS Donations Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_WOOCOMMERCE) {
			$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.cmsmasters_product .price del, 
	{$rule}.widget > .product_list_widget del .amount, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}body .select2-container .select2-selection--single .select2-selection__rendered {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title:hover,
	{$rule}.cmsmasters_products .product.product-category .woocommerce-loop-category__title .count, 
	{$rule}.widget_price_filter .price_slider_amount .price_label .to, 
	{$rule}.widget_price_filter .price_slider_amount .price_label .from, 
	{$rule}.widget_shopping_cart .total .amount, 
	{$rule}.cart_totals td strong > .amount, 
	{$rule}.cart_totals table .cart-subtotal .amount, 
	{$rule}.shop_table td.product-subtotal .amount, 
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .total .amount, 
	{$rule}.cmsmasters_single_product .product_meta a:hover, 
	{$rule}.cmsmasters_product_cat a:hover, 
	{$rule}.cmsmasters_product .cmsmasters_product_title a:hover, 
	{$rule}.required, 
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap, 
	{$rule}.comment-form-rating .stars > span a:hover, 
	{$rule}.comment-form-rating .stars > span a.active, 
	{$rule}#page .remove:hover, 
	{$rule}.cmsmasters_product .price ins, 
	{$rule}.cmsmasters_single_product .price ins, 
	{$rule}.shop_table .product-name a:hover, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.shop_table.order_details .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:first-child th, 
	{$rule}.shop_table.order_details tfoot tr:first-child td, 
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a, 
	{$rule}.widget > .product_list_widget a:hover, 
	{$rule}.widget > .product_list_widget ins .amount, 
	{$rule}.widget_shopping_cart .cart_list a:hover, 
	{$rule}.widget_shopping_cart .cart_list .quantity,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.woocommerce-store-notice,
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button:hover, 
	{$rule}.input-checkbox + label:after, 
	{$rule}.input-radio + label:after, 
	{$rule}input.shipping_method + label:after, 
	{$rule}.onsale span, 
	{$rule}ul.order_details li, 
	{$rule}.widget_price_filter .ui-slider-range {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button:hover, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active,
	{$rule}body .select2-container.select2-container--open .select2-selection--single,
	{$rule}body .select2-container.select2-container--focus .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.widget_product_categories ul li:before,
	{$rule}.cmsmasters_product .button_to_cart {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.link_hover_color {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.woocommerce-MyAccount-navigation li.is-active a,
	{$rule}.widget_shopping_cart .total,
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal td, 
	{$rule}.cart_totals table .cart-subtotal th, 
	{$rule}.cart_totals table .order-total th, 
	{$rule}.shop_table thead th, 
	{$rule}.cmsmasters_single_product .product_meta a, 
	{$rule}.cmsmasters_product .cmsmasters_product_title a, 
	{$rule}.cmsmasters_product_cat a, 
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error li, 
	{$rule}#page .remove, 
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat, 
	{$rule}.cmsmasters_product .price, 
	{$rule}.shop_attributes th, 
	{$rule}.shop_table .product-name a, 
	{$rule}ul.order_details strong, 
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li, 
	{$rule}.widget_product_categories ul li a, 
	{$rule}.widget > .product_list_widget a, 
	{$rule}.widget > .product_list_widget .amount, 
	{$rule}.widget_shopping_cart .cart_list a, 
	{$rule}.widget_shopping_cart .cart_list .quantity .amount, 
	{$rule}.widget_price_filter .price_slider_amount .price_label {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.out-of-stock span, 
	{$rule}.stock span, 
	{$rule}.widget_price_filter .ui-slider-handle {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.woocommerce-store-notice, 
	{$rule}.woocommerce-store-notice p a, 
	{$rule}.woocommerce-store-notice p a:hover,
	{$rule}.onsale, 
	{$rule}.out-of-stock, 
	{$rule}.stock {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.select2-container .select2-choice,
	{$rule}body .select2-container .select2-selection--single,
	{$rule}.woocommerce-store-notice .woocommerce-store-notice__dismiss-link {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}ul.order_details {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal,
	{$rule}.cart_totals table .cart-subtotal, 
	{$rule}.cart_totals table .order-total, 
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}.shop_table thead th, 
	{$rule}.shop_table .actions, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}ul.order_details strong {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.related.products, 
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_product_categories ul li,
	{$rule}.woocommerce-checkout-payment, 
	{$rule}.shop_table td, 
	{$rule}.shop_table th, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-error, 
	{$rule}.shop_attributes tr, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}.cart_totals table th, 
	{$rule}.cart_totals table td, 
	{$rule}.widget_price_filter .price_slider, 
	{$rule}.shop_table .cart_item,
	{$rule}.shop_table.cart tr, 
	{$rule}body .select2-dropdown,
	{$rule}body .select2-container .select2-selection--single {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.widget_price_filter .price_slider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$custom_css .= "
/***************** Start {$title} Events Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time .tribe-countdown-under, 
	{$rule}.tribe-mini-calendar tbody, 
	{$rule}.tribe-mini-calendar tbody a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.cmsmasters_sidebar.sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title a, 
	{$rule}.cmsmasters_sidebar.sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .entry-title a, 
	{$rule}.cmsmasters_sidebar.sidebar_layout_11 .tribe-events-countdown-widget .tribe-countdown-time, 
	{$rule}.tribe-events-widget-link a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-events-viewmore a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .entry-title a:hover, 
	{$rule}.widget .vcalendar .entry-title a:hover, 
	{$rule}.tribe-mini-calendar-list-wrapper .entry-title a:hover, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_left .entry-title, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_left .entry-title, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a:hover, 
	{$rule}.tribe-events-single-event-title, 
	{$rule}#tribe-events-content > .tribe-events-button:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active a, 
	{$rule}.tribe-events-sub-nav li a:hover, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a:hover, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:hover, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:hover,  
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:hover, 
	{$rule}.tribe-mini-calendar tbody a:hover, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present a, 
	{$rule}.widget .vcalendar [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-mini-calendar-list-wrapper [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .duration:before, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue:before {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}#tribe-bar-views .tribe-bar-views-list li:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active, 
	{$rule}.tribe-events-notices:before, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title:hover a,
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a,
	{$rule}.tribe-events-grid .tribe-grid-header, 
	{$rule}table.tribe-events-calendar tbody td .type-tribe_events:hover .tribe-events-month-event-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a:hover, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button,
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav, 
	{$rule}.tribe-mini-calendar tbody a:before, 
	{$rule}.cmsmasters_event_date, 
	{$rule}.tribe-events-venue-widget .vcalendar .tribe-event-featured .entry-title a, 
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .type-tribe_events.tribe-event-featured .entry-title a, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events:before, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.datepicker table tr td span.active,
	{$rule}.datepicker table tr td.active {
		background:" . $cmsmasters_option['my-religion' . '_' . $scheme . '_link'] . " !important;
	}
	
	{$rule}#tribe-bar-views .tribe-bar-views-list li:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth a,
	{$rule}.cmsmasters_event_day, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-past .tribe-events-month-event-title a,
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:before,
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:before, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:before, 
	{$rule}.event_hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}.tribe-mini-calendar tbody .tribe-events-past a:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */ 
	{$rule}.datepicker table thead th,
	{$rule}.datepicker table thead td,
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}.cmsmasters_sidebar.sidebar_layout_11 .tribe-events-adv-list-widget .tribe-events-list-widget-content-wrap .entry-title a:hover, 
	{$rule}.cmsmasters_sidebar.sidebar_layout_11 .tribe-events-list-widget .tribe-events-list-widget-content-wrap .entry-title a:hover, 
	{$rule}.tribe-events-widget-link a, 
	{$rule}.tribe-this-week-events-widget .tribe-events-viewmore a, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .entry-title a, 
	{$rule}.widget .vcalendar .entry-title a, 
	{$rule}.tribe-mini-calendar-list-wrapper .entry-title a, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item a, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	{$rule}.cmsmasters_event_big_week, 
	{$rule}.tribe-bar-filters-inner > div label, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a, 
	{$rule}.tribe-events-sub-nav li a, 
	{$rule}.tribe-events-notices, 
	{$rule}#tribe-events-content > .tribe-events-button, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_title, 
	{$rule}.cmsmasters_single_event_meta dt, 
	{$rule}.tribe-events-month table.tribe-events-calendar .type-tribe_events.tribe-event-featured, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	{$rule}.tribe-mini-calendar thead a:hover,  
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a, 
	{$rule}.tribe-mobile-day .tribe-events-event-schedule-details, 
	{$rule}.tribe-mobile-day .tribe-event-schedule-details, 
	{$rule}.tribe-this-week-events-widget .tribe-events-page-title {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-grid-header .tribe-week-today, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-events-list .cmsmasters_event_big_date_ovh .cmsmasters_featured_event, 
	{$rule}.tribe-events-venue-widget .vcalendar .tribe-event-featured .entry-title a:hover, 
	{$rule}.tribe-events-photo .tribe-events-photo-event.tribe-event-featured .cmsmasters_featured_event,
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .type-tribe_events.tribe-event-featured .entry-title a:hover, 
	{$rule}.tribe-mini-calendar tbody .tribe-mini-calendar-today a:before, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events.mobile-active:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}#tribe-bar-views .tribe-bar-views-list li:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a:hover, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name:before, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title:hover a,
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a,
	{$rule}table.tribe-events-calendar tbody td .type-tribe_events:hover .tribe-events-month-event-title a, 
	{$rule}table.tribe-events-calendar tbody td .tribe-events-month-event-title a:hover, 
	{$rule}.cmsmasters_event_month, 
	{$rule}.tribe-events-list .cmsmasters_event_big_date_ovh .cmsmasters_featured_event, 
	{$rule}.tribe-events-photo .tribe-events-photo-event.tribe-event-featured .cmsmasters_featured_event, 
	{$rule}.tribe-events-venue-widget .vcalendar .tribe-event-featured .entry-title a, 
	{$rule}.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .type-tribe_events.tribe-event-featured .entry-title a, 
	{$rule}#tribe-bar-views.tribe-bar-views-open .button,
	{$rule}.event_bg {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.recurringinfo .recurring-info-tooltip:after {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-events-day-column-0 .tribe-events-tooltip:after, 
	{$rule}.tribe-events-grid .tribe-events-day-column-6 .tribe-events-tooltip:after, 
	{$rule}.tribe-events-grid .tribe-events-day-column-5 .tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .tribe-events-tooltip:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.datepicker table thead th,
	{$rule}.datepicker table thead td,
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a,
	{$rule}.tribe-mini-calendar, 
	{$rule}.cmsmasters_event_day, 
	{$rule}table.tribe-events-calendar, 
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-] a, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover span, 
	{$rule}.tribe-events-grid .tribe-grid-header span, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-mini-calendar thead a, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-mini-calendar .tribe-events-othermonth, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-day-time-slot > h5,
	{$rule}.tribe-events-sub-nav li span:not([class]), 
	{$rule}.tribe-events-notices, 
	{$rule}.tribe-events-grid .tribe-grid-allday {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_event_big_day,
	{$rule}table.tribe-events-calendar tbody td.tribe-events-othermonth div[id*=tribe-events-daynum-] {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}.tribe-events-notices,
	{$rule}.tribe-mini-calendar tbody td,
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title,
	{$rule}.cmsmasters_event_day, 
	{$rule}.tribe-events-photo .tribe-events-list-photo-description, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}.tribe-events-related-events-title, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item, 
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-sub-nav li span:not([class]), 
	{$rule}table.tribe-events-calendar tbody td, 
	{$rule}table.tribe-events-calendar tbody td .tribe_events, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-list .type-tribe_events, 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-block div, 
	{$rule}.tribe-events-grid .tribe-grid-allday, 
	{$rule}.tribe-events-grid .tribe-grid-content-wrap .column, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours div, 
	{$rule}.widget .vcalendar .type-tribe_events, 
	{$rule}.tribe-mini-calendar-list-wrapper .type-tribe_events, 
	{$rule}.tribe-mobile-day .tribe-events-mobile, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-widget-day {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-top-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-events-day-column-0 .tribe-events-tooltip:before, 
	{$rule}.tribe-events-grid .tribe-events-day-column-6 .tribe-events-tooltip:before, 
	{$rule}.tribe-events-grid .tribe-events-day-column-5 .tribe-events-tooltip:before {
		" . cmsmasters_color_css('border-left-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.recurringinfo .recurring-info-tooltip:before {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
	#page .tribe-events-venue-widget .tribe-event-featured, 
	#page .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single, 
	#page .tribe-mini-calendar-list-wrapper .tribe-event-featured, 
	#page .tribe-events-month table.tribe-events-calendar .type-tribe_events.tribe-event-featured, 
	#page .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap, 
	#page .type-tribe_events.tribe-events-photo-event.tribe-event-featured .tribe-events-photo-event-wrap:hover, 
	#page .tribe-events-list #tribe-events-day.tribe-events-loop .tribe-event-featured, 
	#page .tribe-events-list .tribe-events-loop .tribe-event-featured {
		background-color:transparent;
	}
	
	#page .tribe-grid-body .tribe-event-featured.tribe-events-week-hourly-single {
		border-color:transparent;
	}

/***************** Finish {$title} Events Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_SERMONS) {
		$custom_css .= "
/***************** Start {$title} Sermons Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Font Color */
	{$rule}.cmsmasters_open_sermon .cmsmasters_sermon_media .cmsmasters_sermon_media_item:hover:before,
	{$rule}.cmsmasters_sermon_cat a:hover,
	{$rule}.cmsmasters_open_sermon .cmsmasters_sermon_title,
	{$rule}.cmsmasters_sermon .cmsmasters_sermon_media_item:hover,
	{$rule}.cmsmasters_sermon .current_audio .cmsmasters_sermon_audio,
	{$rule}.current_audio .cmsmasters_sermon_audio:before,
	{$rule}.cmsmasters_sermon_author a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Font Color */
	
	
	/* Start Heading Font Color */
	{$rule}.cmsmasters_sermon_cat a,
	{$rule}.cmsmasters_open_sermon .cmsmasters_sermon_media .cmsmasters_sermon_media_item,
	{$rule}.cmsmasters_sermon .cmsmasters_sermon_media_item,
	{$rule}.cmsmasters_sermon_author a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_' . $scheme . '_heading']) . "
	}
	/* Finish Heading Font Color */
	
	
	/* Start Border Color */
	{$rule}.cmsmasters_open_sermon .cmsmasters_sermon_cont_info,
	{$rule}.cmsmasters_open_sermon .cmsmasters_sermon_media .cmsmasters_sermon_media_item,
	{$rule}.cmsmasters_sermon .cmsmasters_sermon_media,
	{$rule}.cmsmasters_sermon .cmsmasters_sermon_content {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_' . $scheme . '_border']) . "
	}
	/* Finish Border Color */
	
/***************** Finish {$title} Sermons Color Scheme Rules ******************/

";
	}
	}
	
	
	$custom_css .= "
/***************** Start Header Middle Color Scheme Rules ******************/

	/* Start Header Middle Content Color */
	.header_mid,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_color']) . "
	}
	/* Finish Header Middle Content Color */
	
	
	/* Start Header Middle Primary Color */
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button,
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button, 
	.header_mid .search_wrap .search_bar_wrap .search_button button:before,
	.header_mid a, 
	.header_mid .cmsmasters_button:hover, 
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover, 
	.header_mid button:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_link']) . "
	}
	
	.header_mid .resp_mid_nav_wrap .responsive_nav:before,
	.header_mid .resp_mid_nav_wrap .responsive_nav:after,
	.header_mid .resp_mid_nav_wrap .responsive_nav span,
	.header_mid .cmsmasters_button, 
	.header_mid .button, 
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_mid_link']) . "
	}
	
	.header_mid .cmsmasters_button, 
	.header_mid .button, 
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_mid_link']) . "
	}
	/* Finish Header Middle Primary Color */
	
	
	/* Start Header Middle Rollover Color */
	.header_mid .search_wrap .search_bar_wrap .search_button button:hover:before, 
	.header_mid a:hover, 
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button:hover, 
	.cmsmasters_dynamic_cart:hover .cmsmasters_dynamic_cart_button {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_hover']) . "
	}
	
	.header_mid .cmsmasters_button:hover, 
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover,   
	.header_mid button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_mid_hover']) . "
	}
	
	.header_mid .cmsmasters_button:hover, 
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover,   
	.header_mid button:hover, 
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_mid textarea:focus,
	.header_mid select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_mid_hover']) . "
	}
	/* Finish Header Middle Rollover Color */
	
	
	/* Start Header Middle Background Color */
	.header_mid,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_mid_bg']) . "
	}
	/* Finish Header Middle Background Color */
	
	
	/* Start Header Middle Background Color on Scroll */
	.header_mid .cmsmasters_button, 
	.header_mid .button, 
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_bg_scroll']) . "
	}
	
	.header_mid.header_mid_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_mid_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		#header .header_top,
		.header_mid {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_mid_bg_scroll']) . "
		}
	}
	/* Finish Header Middle Background Color on Scroll */
	
	
	/* Start Header Middle Borders Color */
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .buttons .button,
	.header_mid_outer,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_mid_border']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		#header nav li {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_mid_border']) . "
		}
	}
	/* Finish Header Middle Borders Color */
	
	
	/* Start Header Middle Custom Rules */
	.header_mid ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_bg']) . "
	}
	
	.header_mid ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_mid_bg']) . "
	}
	/* Finish Header Middle Custom Rules */

/***************** Finish Header Middle Color Scheme Rules ******************/



/***************** Start Header Bottom Color Scheme Rules ******************/

	/* Start Header Bottom Content Color */
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_color']) . "
	}
	/* Finish Header Bottom Content Color */
	
	
	/* Start Header Bottom Primary Color */
	.header_bot a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_link']) . "
	}
	
	.header_bot .button:hover, 
	.header_bot input[type=submit]:hover, 
	.header_bot input[type=button]:hover, 
	.header_bot button:hover, 
	.header_bot .search_wrap .search_bar_wrap .search_button button:hover, 
	.header_bot .search_wrap.search_opened .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_bot_link']) . "
	}
	/* Finish Header Bottom Primary Color */
	
	
	/* Start Header Bottom Rollover Color */
	.header_bot a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_hover']) . "
	}
	
	.header_bot .button, 
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button,
	.header_bot .search_wrap .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_bot_hover']) . "
	}
	
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_bot textarea:focus,
	.header_bot select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_bot_hover']) . "
	}
	/* Finish Header Bottom Rollover Color */
	
	
	/* Start Header Bottom Background Color */
	.header_bot .button, 
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button, 
	.header_bot .search_wrap .search_bar_wrap .search_button button {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_bg']) . "
	}
	
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_bot_bg']) . "
	}
	/* Finish Header Bottom Background Color */
	
	
	/* Start Header Bottom Background Color on Scroll */
	.header_bot.header_bot_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_bot_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		.header_bot {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_bot_bg_scroll']) . "
		}
	}
	/* Finish Header Bottom Background Color on Scroll */
	
	
	/* Start Header Bottom Borders Color */
	.header_bot .header_bot_outer,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_bot_border']) . "
	}
	/* Finish Header Bottom Borders Color */
	
	
	/* Start Header Bottom Custom Rules */
	.header_bot ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_bg']) . "
	}
	
	.header_bot ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_bot_bg']) . "
	}
	/* Finish Header Bottom Custom Rules */

/***************** Finish Header Bottom Color Scheme Rules ******************/



/***************** Start Navigation Color Scheme Rules ******************/

	/* Start Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_title_link']) . "
		}
	}
	/* Finish Navigation Title Link Color */
	
	
	/* Start Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-ancestor:hover > a,
		ul.navigation > li.menu-item.current-menu-item > a:hover, 
		ul.navigation > li > a:hover,
		ul.navigation > li > a:hover .nav_subtitle,
		ul.navigation > li:hover > a,
		ul.navigation > li:hover > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_title_link_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Color */
	
	
	/* Start Navigation Title Link Current Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-item > a .nav_subtitle, 
		ul.navigation > li.menu-item.current-menu-ancestor > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a .nav_subtitle, 
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_title_link_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Color */
	
	
	/* Start Navigation Title Link Subtitle Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_title_link_subtitle']) . "
		}
		
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_title_link_subtitle']) . "
		}
		
		ul.navigation > li > a .nav_tag:before {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_navigation_title_link_subtitle']) . "
		}
	}
	/* Finish Navigation Title Link Subtitle Color */
	
	
	/* Start Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_title_link_bg']) . "
		}
	}
	/* Finish Navigation Title Link Background Color */
	
	
	/* Start Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a:hover,
		ul.navigation > li:hover > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_title_link_bg_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Background Color */
	
	
	/* Start Navigation Title Link Current Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_title_link_bg_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Background Color */
	
	
	/* Start Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_title_link_border']) . "
		}
	}
	/* Finish Navigation Title Link Border Color */
	
	
	/* Start Navigation Dropdown Text Color */
	.navigation li .menu-item-mega-description-container, 
	.navigation li .menu-item-mega-description-container * {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_text']) . "
	}
	/* Finish Navigation Dropdown Tex Color */
	
	
	/* Start Navigation Dropdown Background Color */
	@media only screen and (max-width: 1024px) {
		ul.navigation {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_bg']) . "
		}
	}
	
	.cmsmasters_added_product_info,
	.cmsmasters_dynamic_cart .widget_shopping_cart_content {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_bg']) . "
	}
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content:before {
		" . cmsmasters_color_css('border-bottom-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_bg']) . "
	}
	/* Finish Navigation Dropdown Background Color */
	
	
	/* Start Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_border']) . "
		}
	}
	/* Finish Navigation Dropdown Border Color */
	
	
	/* Start Navigation Dropdown Link Color */
	#page .cmsmasters_dynamic_cart .remove:hover,
	.navigation li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		#header .navigation .menu-item-mega-container > ul > li > a .nav_title {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link']) . "
		}
	}
	/* Finish Navigation Dropdown Link Color */
	
	
	/* Start Navigation Dropdown Link Hover Color */
	#page .cmsmasters_dynamic_cart .remove,
	.navigation li > a:hover,
	.navigation li > a:hover .nav_subtitle,
	.navigation li.current-menu-item > a, 
	.navigation li.current-menu-item > a .nav_subtitle, 
	.navigation li.current_page_item > a, 
	.navigation li.current_page_item > a .nav_subtitle, 
	.navigation li.current-menu-ancestor > a, 
	.navigation li.current-menu-ancestor > a .nav_subtitle, 
	.navigation .menu-item-mega-container > ul > li > a .nav_title,
	.navigation li a .nav_tag {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover > a, 
		ul.navigation li > ul li:hover > a .nav_subtitle, 
		ul.navigation li > ul li.current-menu-ancestor > a, 
		ul.navigation li > ul li.current-menu-ancestor > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_hover']) . "
		}
	}
	
	@media only screen and (max-width: 1024px) {
		#header .navigation .menu-item-mega-container > ul > li.current-menu-ancestor > a .nav_title,
		.navigation li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_hover']) . "
		}
	}
	/* Finish Navigation Dropdown Link Hover Color */
	
	
	/* Start Navigation Dropdown Link Subtitle Color */
	.navigation li a .nav_subtitle {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_subtitle']) . "
	}
	
	.navigation li a .nav_tag {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_subtitle']) . "
	}
	/* Finish Navigation Dropdown Link Subtitle Color */
	
	
	/* Start Navigation Dropdown Link Hover Highlight Color */
	.navigation li > a:hover,
	.navigation li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover > a, 
		ul.navigation li > ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_highlight']) . "
		}
	}
	/* Finish Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Navigation Dropdown Link Border Color */
	.navigation li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_navigation_dropdown_link_border']) . "
	}
	/* Finish Navigation Dropdown Link Border Color */

/***************** Finish Navigation Color Scheme Rules ******************/



/***************** Start Header Top Color Scheme Rules ******************/

	/* Start Header Top Content Color */
	.header_top {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_color']) . "
	}
	/* Finish Header Top Content Color */
	
	
	/* Start Header Top Primary Color */
	.header_top a, 
	.header_top .cmsmasters_social_icon,
	.header_top .header_top_but:hover, 
	.header_top .header_top_but.opened {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_link']) . "
	}
	
	.header_top .responsive_top_nav:before, 
	.header_top .responsive_top_nav:after, 
	.header_top .responsive_top_nav span {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_link']) . "
	}
	/* Finish Header Top Primary Color */
	
	
	/* Start Header Top Rollover Color */
	.header_top a:hover,
	.header_top .cmsmasters_social_icon:hover,
	.header_top .header_top_but {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_hover']) . "
	}
	/* Finish Header Top Rollover Color */
	
	
	/* Start Header Top Background Color */
	.header_top {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_bg']) . "
	}
	/* Finish Header Top Background Color */
	
	
	/* Start Header Top Borders Color */
	.header_top_outer,
	.header_top .header_top_but {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_top_border']) . "
	}
	/* Finish Header Top Borders Color */
	
	
	/* Start Header Top Custom Rules */
	.header_top ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_bg']) . "
	}
	
	.header_top ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option['my-religion' . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_bg']) . "
	}
	/* Finish Header Top Custom Rules */

/***************** Finish Header Top Color Scheme Rules ******************/



/***************** Start Header Top Navigation Color Scheme Rules ******************/

	/* Start Header Top Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_title_link']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Color */
	
	
	/* Start Header Top Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_title_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Color */
	
	
	/* Start Header Top Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_title_link_bg']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Background Color */
	
	
	/* Start Header Top Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_title_link_bg_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Background Color */
	
	
	/* Start Header Top Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_top_title_link_border']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Border Color */
	
	
	/* Start Header Top Navigation Dropdown Background Color */
	@media only screen and (max-width: 1024px) {
		ul.top_line_nav {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_bg']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Background Color */
	
	
	/* Start Header Top Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_border']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Border Color */
	
	
	/* Start Header Top Navigation Dropdown Link Color */
	.top_line_nav li a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a, 
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Highlight Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a,
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link_highlight']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Header Top Navigation Dropdown Link Border Color */
	.top_line_nav li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option['my-religion' . '_header_top_dropdown_link_border']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Border Color */

/***************** Finish Header Top Navigation Color Scheme Rules ******************/

";
	
	
	return apply_filters('my_religion_theme_colors_secondary_filter', $custom_css);
}

