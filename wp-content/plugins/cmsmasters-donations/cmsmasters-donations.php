<?php 
/*
Plugin Name: CMSMasters Donations
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Donations created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. This plugin creates custom post type that allows you to collect donations using paypal in new <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.1.6
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2014 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsmasters-donations/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Cmsmasters_Donations {
	public function __construct() {
		define('CMSMASTERS_DONATIONS_VERSION', '1.1.6');
		
		define('CMSMASTERS_DONATIONS_FILE', __FILE__);
		
		define('CMSMASTERS_DONATIONS_PATH', plugin_dir_path(CMSMASTERS_DONATIONS_FILE));
		
		define('CMSMASTERS_DONATIONS_URL', plugin_dir_url(CMSMASTERS_DONATIONS_FILE));
		
		define('CMSMASTERS_DONATIONS_THEME_SHORTCODES_DIR', 'cmsmasters-donations/shortcodes');
		
		define('CMSMASTERS_DONATIONS_THEME_TEMPLATES_DIR', 'cmsmasters-donations/templates');
		
		
		define('CMSMASTERS_DONATIONS_FRAMEWORK', CMSMASTERS_DONATIONS_PATH . 'framework/');
		
		define('CMSMASTERS_DONATIONS_ADMIN', CMSMASTERS_DONATIONS_FRAMEWORK . 'admin/');
		
		define('CMSMASTERS_DONATIONS_FUNCTION', CMSMASTERS_DONATIONS_FRAMEWORK . 'function/');
		
		define('CMSMASTERS_DONATIONS_POSTTYPE', CMSMASTERS_DONATIONS_FRAMEWORK . 'post-type/');
		
		define('CMSMASTERS_DONATIONS_TEMPLATE', CMSMASTERS_DONATIONS_FRAMEWORK . 'template/');
		
		
		define('CMSMASTERS_DONATIONS_INC', CMSMASTERS_DONATIONS_PATH . 'inc/');
		
		define('CMSMASTERS_DONATIONS_FORMS', CMSMASTERS_DONATIONS_INC . 'forms/');
		
		define('CMSMASTERS_DONATIONS_GATEWAYS', CMSMASTERS_DONATIONS_INC . 'gateways/');
		
		
		if (is_admin()) {
			require_once(CMSMASTERS_DONATIONS_ADMIN . 'cmsmasters-donations-settings.php');
		}
		
		
		require_once(CMSMASTERS_DONATIONS_POSTTYPE . 'cmsmasters-campaigns-post-type.php');
		
		require_once(CMSMASTERS_DONATIONS_POSTTYPE . 'cmsmasters-donations-post-type.php');
		
		
		require_once(CMSMASTERS_DONATIONS_FUNCTION . 'cmsmasters-donations-template-function.php');
		
		require_once(CMSMASTERS_DONATIONS_FUNCTION . 'cmsmasters-donations-shortcode-function.php');
		
		require_once(CMSMASTERS_DONATIONS_FUNCTION . 'cmsmasters-donations-form-function.php');
		
		
		require_once(CMSMASTERS_DONATIONS_INC . 'cmsmasters-donations-forms.php');
		
		require_once(CMSMASTERS_DONATIONS_INC . 'cmsmasters-donations-emails.php');
		
		
		require_once(CMSMASTERS_DONATIONS_INC . 'cmsmasters-donations-api.php');
		
		require_once(CMSMASTERS_DONATIONS_INC . 'cmsmasters-donations-payments.php');
		
		
		add_action('wp_enqueue_scripts', array($this, 'cmsmasters_donations_frontend_scripts'));
		
		
		register_activation_hook(CMSMASTERS_DONATIONS_FILE, array($this, 'cmsmasters_donations_activate_deactivate'));
		
		register_deactivation_hook(CMSMASTERS_DONATIONS_FILE, array($this, 'cmsmasters_donations_activate_deactivate'));
		
		
		add_filter('plugin_action_links_' . plugin_basename(CMSMASTERS_DONATIONS_FILE), array($this, 'cmsmasters_donations_action_links'));
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsmasters_donations', false, dirname(plugin_basename(CMSMASTERS_DONATIONS_FILE)) . '/framework/languages/');
	}
	
	
	public function cmsmasters_donations_frontend_scripts() {
		wp_register_style('cmsmasters-donations-form', CMSMASTERS_DONATIONS_URL . 'css/cmsmasters-donations-form.css', array(), CMSMASTERS_DONATIONS_VERSION, 'screen');
		
		wp_register_style('cmsmasters-donations-form-rtl', CMSMASTERS_DONATIONS_URL . 'css/cmsmasters-donations-form-rtl.css', array(), CMSMASTERS_DONATIONS_VERSION, 'screen');
		
		
		wp_register_script('cmsmastersValidation', CMSMASTERS_DONATIONS_URL . 'js/jquery.validationEngine.min.js', array('jquery'), '2.6.2', true);
		
		wp_register_script('cmsmastersValidationLang', CMSMASTERS_DONATIONS_URL . 'js/jquery.validationEngine-lang.js', array('jquery', 'cmsmastersValidation'), CMSMASTERS_DONATIONS_VERSION, true);
		
		wp_localize_script('cmsmastersValidationLang', 'cmsmasters_ve_lang', array( 
			'required' => 			__('* This field is required', 'cmsmasters_donations'), 
			'select_option' => 		__('* Please select an option', 'cmsmasters_donations'), 
			'required_checkbox' => 	__('* This checkbox is required', 'cmsmasters_donations'), 
			'min' => 				__('* Minimum', 'cmsmasters_donations'), 
			'max' => 				__('* Maximum', 'cmsmasters_donations'), 
			'allowed' => 			__(' characters allowed', 'cmsmasters_donations'), 
			'invalid_email' => 		__('* Invalid email address', 'cmsmasters_donations'), 
			'invalid_number' => 	__('* Invalid number', 'cmsmasters_donations'), 
			'invalid_url' => 		__('* Invalid URL', 'cmsmasters_donations'), 
			'numbers_spaces' => 	__('* Numbers and spaces only', 'cmsmasters_donations'), 
			'letters_spaces' => 	__('* Letters and spaces only', 'cmsmasters_donations') 
		));
		
		
		wp_register_script('cmsmasters-donations-form-script', CMSMASTERS_DONATIONS_URL . 'js/jquery.cmsmastersDonations-form.js', array('jquery', 'cmsmastersValidation', 'cmsmastersValidationLang'), CMSMASTERS_DONATIONS_VERSION, true);
		
		wp_localize_script('cmsmasters-donations-form-script', 'cmsmasters_donations_form_script_params', array( 
			'gateway' => 	(get_option('cmsmasters_donations_gateway') == 'stripe') ? 'stripe' : 'paypal', 
			'confirm' => 	(get_option('cmsmasters_confirm_donation') == 1) ? true : false 
		) );
	}
	
	
	public function cmsmasters_donations_action_links($links) {
		$settings_link = '<a href="' . get_admin_url(null, 'options-general.php?page=cmsmasters-donations-settings') . '" title="' . __('Donations Settings', 'cmsmasters_donations') . '">' . __('Settings', 'cmsmasters_donations') . '</a>';
		
		
		array_unshift($links, $settings_link);
		
		
		return $links;
	}
	
	
	function cmsmasters_donations_activate_deactivate() {
		flush_rewrite_rules();
	}
}

$GLOBALS['cmsmasters_donations'] = new Cmsmasters_Donations();

