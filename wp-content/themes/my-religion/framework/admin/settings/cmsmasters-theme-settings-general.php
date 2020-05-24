<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.2.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function my_religion_options_general_tabs() {
	$cmsmasters_option = my_religion_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'my-religion');
	
	if ($cmsmasters_option['my-religion' . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'my-religion');
	}
	
	$tabs['header'] = esc_attr__('Header', 'my-religion');
	$tabs['content'] = esc_attr__('Content', 'my-religion');
	$tabs['footer'] = esc_attr__('Footer', 'my-religion');
	
	return $tabs;
}


function my_religion_options_general_sections() {
	$tab = my_religion_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'my-religion');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'my-religion');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'my-religion');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'my-religion');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'my-religion');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;
} 


function my_religion_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = my_religion_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'my-religion') . '|liquid', 
				esc_html__('Boxed', 'my-religion') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_type', 
			'title' => esc_html__('Logo Type', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'my-religion') . '|image', 
				esc_html__('Text', 'my-religion') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_url', 
			'title' => esc_html__('Logo Image', 'my-religion'), 
			'desc' => esc_html__('Choose your website logo image.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'my-religion'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_title', 
			'title' => esc_html__('Logo Title', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : 'My Religion'), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'my-religion'), 
			'desc' => esc_html__('enable', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'my-religion'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => 'my-religion' . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'my-religion'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_col', 
			'title' => esc_html__('Background Color', 'my-religion'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_img', 
			'title' => esc_html__('Background Image', 'my-religion'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'my-religion') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'my-religion') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'my-religion') . '|repeat-y', 
				esc_html__('Repeat', 'my-religion') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_pos', 
			'title' => esc_html__('Background Position', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'my-religion') . '|top left', 
				esc_html__('Top Center', 'my-religion') . '|top center', 
				esc_html__('Top Right', 'my-religion') . '|top right', 
				esc_html__('Center Left', 'my-religion') . '|center left', 
				esc_html__('Center Center', 'my-religion') . '|center center', 
				esc_html__('Center Right', 'my-religion') . '|center right', 
				esc_html__('Bottom Left', 'my-religion') . '|bottom left', 
				esc_html__('Bottom Center', 'my-religion') . '|bottom center', 
				esc_html__('Bottom Right', 'my-religion') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'my-religion') . '|scroll', 
				esc_html__('Fixed', 'my-religion') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => 'my-religion' . '_bg_size', 
			'title' => esc_html__('Background Size', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'my-religion') . '|auto', 
				esc_html__('Cover', 'my-religion') . '|cover', 
				esc_html__('Contain', 'my-religion') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'my-religion'), 
			'desc' => esc_html__('enable', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'my-religion'), 
			'desc' => esc_html__('enable', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_top_line', 
			'title' => esc_html__('Top Line', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_top_height', 
			'title' => esc_html__('Top Height', 'my-religion'), 
			'desc' => esc_html__('pixels', 'my-religion'), 
			'type' => 'number', 
			'std' => '32', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'my-religion'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'my-religion') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'my-religion') . '|none', 
				esc_html__('Top Line Social Icons', 'my-religion') . '|social', 
				esc_html__('Top Line Navigation', 'my-religion') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_styles', 
			'title' => esc_html__('Header Styles', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Fullwidth Header Style', 'my-religion') . '|fullwidth', 
				esc_html__('Middle Header Style', 'my-religion') . '|default', 
				esc_html__('Compact Style Left Navigation', 'my-religion') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'my-religion') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'my-religion') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'my-religion'), 
			'desc' => esc_html__('pixels', 'my-religion'), 
			'type' => 'number', 
			'std' => '100', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'my-religion'), 
			'desc' => esc_html__('pixels', 'my-religion'), 
			'type' => 'number', 
			'std' => '60', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_search', 
			'title' => esc_html__('Header Search', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate', 'my-religion'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'none', 
			'choices' => array( 
				esc_html__('None', 'my-religion') . '|none', 
				esc_html__('Header Social Icons', 'my-religion') . '|social', 
				esc_html__('Header Custom HTML', 'my-religion') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => 'my-religion' . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'my-religion'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'my-religion') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'my-religion'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'my-religion') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Left', 'my-religion') . '|left', 
				esc_html__('Right', 'my-religion') . '|right', 
				esc_html__('Center', 'my-religion') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'first', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'my-religion'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'my-religion') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'my-religion') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'my-religion') . '|repeat-y', 
				esc_html__('Repeat', 'my-religion') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'my-religion') . '|scroll', 
				esc_html__('Fixed', 'my-religion') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'my-religion') . '|auto', 
				esc_html__('Cover', 'my-religion') . '|cover', 
				esc_html__('Contain', 'my-religion') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'my-religion'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '#31333b' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'my-religion'), 
			'desc' => esc_html__('pixels', 'my-religion'), 
			'type' => 'number', 
			'std' => '250', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'my-religion'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => 'my-religion' . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '131313', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'my-religion'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_type', 
			'title' => esc_html__('Footer Type', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('With logo', 'my-religion') . '|default', 
				esc_html__('Small', 'my-religion') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'my-religion'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'my-religion') . '|none', 
				esc_html__('Footer Navigation', 'my-religion') . '|nav', 
				esc_html__('Social Icons', 'my-religion') . '|social', 
				esc_html__('Custom HTML', 'my-religion') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'my-religion'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'my-religion'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'my-religion'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'my-religion') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => 'my-religion' . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '&copy; ' . date('Y') . ' ' . 'My Religion', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

