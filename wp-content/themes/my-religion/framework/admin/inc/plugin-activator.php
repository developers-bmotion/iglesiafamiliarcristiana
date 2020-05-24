<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.2.2
 * 
 * TGM-Plugin-Activation 2.6.1
 * Created by CMSMasters
 * 
 */


my_religion_locate_template('framework/class/class-tgm-plugin-activation.php', true);


if (!function_exists('my_religion_register_theme_plugins')) {

function my_religion_register_theme_plugins() { 
	$plugins = array( 
		array( 
			'name'					=> esc_html__('CMSMasters Contact Form Builder', 'my-religion'), 
			'slug'					=> 'cmsmasters-contact-form-builder', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-contact-form-builder.zip', 
			'required'				=> false, 
			'version'				=> '1.4.5', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Content Composer', 'my-religion'),
			'slug'					=> 'cmsmasters-content-composer', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-content-composer.zip', 
			'required'				=> true, 
			'version'				=> '1.8.1', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Mega Menu', 'my-religion'), 
			'slug'					=> 'cmsmasters-mega-menu', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-mega-menu.zip', 
			'required'				=> true, 
			'version'				=> '1.2.7', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Sermons', 'my-religion'), 
			'slug'					=> 'cmsmasters-sermons', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-sermons.zip', 
			'required'				=> false, 
			'version'				=> '1.0.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Donations', 'my-religion'), 
			'slug'					=> 'cmsmasters-donations', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-donations.zip', 
			'required'				=> false, 
			'version'				=> '1.1.6', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('CMSMasters Importer', 'my-religion'), 
			'slug'					=> 'cmsmasters-importer', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/cmsmasters-importer.zip', 
			'required'				=> true, 
			'version'				=> '1.0.6', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name' 					=> esc_html__('LayerSlider WP', 'my-religion'), 
			'slug' 					=> 'LayerSlider', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/LayerSlider.zip', 
			'required'				=> false, 
			'version'				=> '6.11.1', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Revolution Slider', 'my-religion'), 
			'slug' 					=> 'revslider', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/revslider.zip', 
			'required'				=> false, 
			'version'				=> '6.2.2', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> false 
		), 
		array( 
			'name' 					=> esc_html__('Timetable', 'my-religion'), 
			'slug'					=> 'timetable', 
			'source'				=> get_template_directory() . '/framework/admin/inc/plugins/timetable.zip', 
			'required'				=> false, 
			'version'				=> '6.0', 
			'force_activation'		=> false, 
			'force_deactivation' 	=> true 
		), 
		array( 
			'name'					=> esc_html__('Envato Market', 'my-religion'), 
			'slug'					=> 'envato-market', 
			'source'				=> 'https://envato.github.io/wp-envato-market/dist/envato-market.zip', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('Contact Form 7', 'my-religion'), 
			'slug' 					=> 'contact-form-7', 
			'required' 				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WordPress SEO by Yoast', 'my-religion'), 
			'slug' 					=> 'wordpress-seo', 
			'required' 				=> false 
		), 
		array( 
			'name'					=> esc_html__('GDPR Cookie Consent', 'my-religion'), 
			'slug'					=> 'cookie-law-info', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('WooCommerce', 'my-religion'), 
			'slug' 					=> 'woocommerce', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('PayPal Donations', 'my-religion'), 
			'slug' 					=> 'paypal-donations', 
			'required'				=> false 
		), 
		array( 
			'name' 					=> esc_html__('The Events Calendar', 'my-religion'), 
			'slug' 					=> 'the-events-calendar', 
			'required'				=> false 
		), 
		array( 
			'name'					=> esc_html__('MailPoet 3', 'my-religion'), 
			'slug'					=> 'mailpoet', 
			'required'				=> false 
		) 
	);
	
	
	$config = array( 
		'id' => 			'my-religion', 
		'menu' => 			'theme-required-plugins', 
		'strings' => array( 
			'page_title' => 	esc_html__('Theme Required & Recommended Plugins', 'my-religion'), 
			'menu_title' => 	esc_html__('Theme Plugins', 'my-religion'), 
			'return' => 		esc_html__('Return to Theme Required & Recommended Plugins', 'my-religion') 
		) 
	);
	
	
	tgmpa($plugins, $config);
}

}

add_action('tgmpa_register', 'my_religion_register_theme_plugins');

