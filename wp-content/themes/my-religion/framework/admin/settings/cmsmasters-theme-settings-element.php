<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function my_religion_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'my-religion');
	$tabs['icon'] = esc_attr__('Social Icons', 'my-religion');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'my-religion');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'my-religion');
	$tabs['error'] = esc_attr__('404', 'my-religion');
	$tabs['code'] = esc_attr__('Custom Codes', 'my-religion');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'my-religion');
	}
	
	return $tabs;
}


function my_religion_options_element_sections() {
	$tab = my_religion_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'my-religion');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'my-religion');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'my-religion');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'my-religion');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'my-religion');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'my-religion');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'my-religion');
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	return $sections;	
} 


function my_religion_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = my_religion_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => 'my-religion' . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'my-religion'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => 'my-religion' . '_social_icons', 
			'title' => esc_html__('Social Icons', 'my-religion'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-linkedin|#|' . esc_html__('Linkedin', 'my-religion') . '|true||', 
				'cmsmasters-icon-facebook|#|' . esc_html__('Facebook', 'my-religion') . '|true||', 
				'cmsmasters-icon-gplus|#|' . esc_html__('Google', 'my-religion') . '|true||', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'my-religion') . '|true||', 
				'cmsmasters-icon-skype|#|' . esc_html__('Skype', 'my-religion') . '|true||'  
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'my-religion') . '|dark', 
				esc_html__('Light', 'my-religion') . '|light', 
				esc_html__('Mac', 'my-religion') . '|mac', 
				esc_html__('Metro Black', 'my-religion') . '|metro-black', 
				esc_html__('Metro White', 'my-religion') . '|metro-white', 
				esc_html__('Parade', 'my-religion') . '|parade', 
				esc_html__('Smooth', 'my-religion') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_path', 
			'title' => esc_html__('Path', 'my-religion'), 
			'desc' => esc_html__('Sets path for switching windows', 'my-religion'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'my-religion') . '|vertical', 
				esc_html__('Horizontal', 'my-religion') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'my-religion'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'my-religion'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'my-religion'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'my-religion'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'my-religion'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'my-religion'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'my-religion'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'my-religion'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'my-religion'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'my-religion'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'my-religion'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'my-religion'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'my-religion') . '|center', 
				esc_html__('Fit', 'my-religion') . '|fit', 
				esc_html__('Fill', 'my-religion') . '|fill', 
				esc_html__('Stretch', 'my-religion') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'my-religion'), 
			'desc' => esc_html__('Sets buttons be available or not', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'my-religion'), 
			'desc' => esc_html__('Enable the arrow buttons', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'my-religion'), 
			'desc' => esc_html__('Sets the fullscreen button', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'my-religion'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'my-religion'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'my-religion'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'my-religion'), 
			'desc' => esc_html__('Sets the swipe navigation', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => 'my-religion' . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'my-religion'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => 'my-religion' . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_color', 
			'title' => esc_html__('Text Color', 'my-religion'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'my-religion'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fcfcfc' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'my-religion'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'my-religion'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_rep', 
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
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_pos', 
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
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_att', 
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
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_bg_size', 
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
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_search', 
			'title' => esc_html__('Search Line', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => 'my-religion' . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'my-religion'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'my-religion'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_gmap_api_key', 
			'title' => esc_html__('Google Maps API key', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_api_key', 
			'title' => esc_html__('Twitter API key', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => 'my-religion' . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'my-religion' . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => 'my-religion' . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'my-religion'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

