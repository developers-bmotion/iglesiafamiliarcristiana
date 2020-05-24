<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.1.9
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */


/* Register Admin Panel JS Scripts */
function my_religion_register_admin_js_scripts() {
	global $pagenow;
	
	$cmsmasters_option = my_religion_get_global_options();
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'blog_field_layout_mode_puzzle' => 			esc_attr__('Puzzle', 'my-religion'), 
			'quotes_field_slider_type_title' => 		esc_attr__('Slider Type', 'my-religion'), 
			'quotes_field_slider_type_descr' => 		esc_attr__('Choose your quotes slider style type', 'my-religion'), 
			'quotes_field_type_choice_box' => 			esc_attr__('Boxed', 'my-religion'), 
			'quotes_field_type_choice_center' => 		esc_attr__('Centered', 'my-religion'),
			'quotes_field_item_color_title' => 			esc_attr__('Color', 'my-religion'),
			'quotes_field_item_color_descr' => 			esc_attr__('Enter this quote custom color', 'my-religion'),
			'timetable_field_box_bd_color_title' => 	esc_attr__('Timetable box border color', 'my-religion'),
			'featured_campaign_color_title' => 			esc_attr__('Campaign progress color', 'my-religion'),
			'heading_tablet_check' => 					esc_attr__('Font size for small tablet', 'my-religion'),
			'heading_tablet_font_size' => 				esc_attr__('Tablet font size', 'my-religion'),
			'heading_tablet_line_height' => 			esc_attr__('Tablet line height', 'my-religion'),
			'featured_campaign_color' => 				$cmsmasters_option['my-religion' . '_default' . '_link'],
			
			/* Timetable Default Colors */
			'box_bg_color' => 				($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'box_bd_color' => 				($cmsmasters_option['my-religion' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_link']), 
			'box_hover_bg_color' => 		($cmsmasters_option['my-religion' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_link']), 
			'box_txt_color' => 				($cmsmasters_option['my-religion' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_color']), 
			'box_hover_txt_color' => 		($cmsmasters_option['my-religion' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_alternate']), 
			'box_hours_txt_color' => 		($cmsmasters_option['my-religion' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_link']), 
			'box_hours_hover_txt_color' => 	($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'row1_bg_color' => 				($cmsmasters_option['my-religion' . '_default' . '_alternate'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_alternate']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_alternate']), 
			'row1_txt_color' => 			($cmsmasters_option['my-religion' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_color']), 
			'row2_bg_color' => 				($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'row2_txt_color' => 			($cmsmasters_option['my-religion' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_color']), 
			'booking_text_color' => 		($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'booking_bg_color' => 			($cmsmasters_option['my-religion' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_heading']), 
			'booking_hover_text_color' => 	($cmsmasters_option['my-religion' . '_default' . '_link'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_link']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_link']), 
			'booking_hover_bg_color' => 	($cmsmasters_option['my-religion' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_heading']), 
			'booked_text_color' => 			($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'booked_bg_color' => 			($cmsmasters_option['my-religion' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_heading']), 
			'unavailable_text_color' => 	($cmsmasters_option['my-religion' . '_default' . '_bg'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_bg']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_bg']), 
			'unavailable_bg_color' => 		($cmsmasters_option['my-religion' . '_default' . '_heading'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_heading']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_heading']), 
			'available_slots_color' => 		($cmsmasters_option['my-religion' . '_default' . '_color'] == '#ffffff' ? 'rgba(' . cmsmasters_color2rgb($cmsmasters_option['my-religion' . '_default' . '_color']) . ', 0.99)' : $cmsmasters_option['my-religion' . '_default' . '_color']) 
		));
	}
}

add_action('admin_enqueue_scripts', 'my_religion_register_admin_js_scripts');



// Quotes Shortcode Attributes Filter
add_filter('cmsmasters_quotes_atts_filter', 'cmsmasters_quotes_atts');

function cmsmasters_quotes_atts() {
	return array( 
		'mode' => 				'grid', 
		'type' => 				'boxed', 
		'columns' => 			'3', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Timetable Shortcode Attributes Filter
add_filter('cmsmasters_timetable_atts_filter', 'cmsmasters_timetable_atts');

function cmsmasters_timetable_atts() {
	return array( 
		'event' => 						'', 
		'event_category' => 			'', 
		'hour_category' => 				'', 
		'columns' => 					'', 
		'measure' => 					'1', 
		'filter_style' => 				'dropdown_list', 
		'filter_kind' => 				'event', 
		'filter_label' => 				esc_attr__('All Events', 'my-religion'),
		'filter_label_2' => 			esc_attr__('All Events Categories', 'my-religion'),
		'time_format' => 				'H.i', 
		'time_format_custom' => 		'', 
		'hide_all_events_view' => 		'0', 
		'hide_hours_column' => 			'0', 
		'show_end_hour' => 				'0', 
		'event_layout' => 				'1', 
		'hide_empty' => 				'0', 
		'disable_event_url' => 			'0', 
		'text_align' => 				'center', 
		'id' => 						'', 
		'row_height' => 				'31', 
		'desktop_list_view' => 			'0', 
		'event_description_responsive' => 'none', 
		'collapse_event_hours_responsive' => '0', 
		'colors_responsive_mode' => 	'0', 
		'export_to_pdf_button' => 		'0', 
		'generate_pdf_label' => 		esc_attr__('Generate PDF', 'my-religion'),
		'show_booking_button' => 		'no', 
		'show_available_slots' => 		'no', 
		'available_slots_singular_label' => 	'{number_available}/{number_total} slot available', 
		'available_slots_plural_label' => 		'{number_available}/{number_total} slots available', 
		'default_booking_view' => 				'user', 
		'allow_user_booking' => 				'yes', 
		'allow_guest_booking' => 				'no', 
		'show_guest_name_field' => 				'yes', 
		'guest_name_field_required' => 			'yes', 
		'show_guest_phone_field' => 			'no', 
		'guest_phone_field_required' => 		'no', 
		'show_guest_message_field' => 			'no', 
		'guest_message_field_required' => 		'no', 
		'booking_label' => 				esc_attr__('Book now', 'my-religion'),
		'booked_label' => 				esc_attr__('Booked', 'my-religion'),
		'unavailable_label' => 			esc_attr__('Unavailable', 'my-religion'),
		'booking_popup_label' => 		esc_attr__('Book now', 'my-religion'),
		'login_popup_label' => 			esc_attr__('Log in', 'my-religion'),
		'cancel_popup_label' => 		esc_attr__('Cancel', 'my-religion'),
		'continue_popup_label' => 		esc_attr__('Continue', 'my-religion'),
		'terms_checkbox' => 			'no', 
		'terms_message' => 				esc_attr__('Please accept terms and conditions', 'my-religion'),
		'booking_popup_message' => 		'', 
		'booking_popup_thank_you_message' => '', 
		'box_bg_color' => 				'', 
		'box_bd_color' => 				'', 
		'box_hover_bg_color' => 		'', 
		'box_txt_color' => 				'', 
		'box_hover_txt_color' => 		'', 
		'box_hours_txt_color' => 		'', 
		'box_hours_hover_txt_color' => 	'', 
		'row1_bg_color' => 				'', 
		'row1_txt_color' => 			'', 
		'row2_bg_color' => 				'', 
		'row2_txt_color' => 			'', 
		'booking_text_color' => 		'', 
		'booking_bg_color' => 			'', 
		'booking_hover_text_color' => 	'', 
		'booking_hover_bg_color' => 	'', 
		'booked_text_color' => 			'', 
		'booked_bg_color' => 			'', 
		'unavailable_text_color' => 	'', 
		'unavailable_bg_color' => 		'', 
		'available_slots_color' => 		'', 
		'classes' => 					''
	);
}


// Featured Campaign Shortcode Attributes Filter
add_filter('cmsmasters_featured_campaign_atts_filter', 'cmsmasters_featured_campaign_atts');

function cmsmasters_featured_campaign_atts() {
	return array( 
		'campaign' => 			'', 
		'campaign_metadata' => 	'', 
		'campaign_color' => 	'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	);
}


// Special Heading Shortcode Attributes Filter
add_filter('cmsmasters_custom_heading_atts_filter', 'cmsmasters_custom_heading_atts');

function cmsmasters_custom_heading_atts() {
	return array( 
		'type' => 					'h1', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'tablet_check' =>  			'', 
		'tablet_font_size' => 		'', 
		'tablet_line_height' => 	'', 
		'font_weight' => 			'400', 
		'font_style' => 			'normal', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				''
	);
}