<?php 
/*
Plugin Name: CMSMasters Sermons
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Sermons created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. Sermons plugin create custom post type that allow you to create sermons for new <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.0.3
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2016 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsmasters-sermons/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


class Cmsmasters_Sermons { 
	function __construct() { 
		define('CMSMASTERS_SERMONS_VERSION', '1.0.3');
		
		define('CMSMASTERS_SERMONS_FILE', __FILE__);
		
		define('CMSMASTERS_SERMONS_PATH', plugin_dir_path(CMSMASTERS_SERMONS_FILE));
		
		define('CMSMASTERS_SERMONS_URL', plugin_dir_url(CMSMASTERS_SERMONS_FILE));
		
		define('CMSMASTERS_SERMONS_TEMPLATE_DIR', 'cmsmasters-c-c/shortcodes');
		
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-functions.php');
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/cmsmasters-sermons-shortcode.php');
		
		require_once(CMSMASTERS_SERMONS_PATH . 'inc/sermons-post-type.php');
		
		
		register_activation_hook(CMSMASTERS_SERMONS_FILE, array($this, 'cmsmasters_sermons_activate_deactivate'));
		
		register_deactivation_hook(CMSMASTERS_SERMONS_FILE, array($this, 'cmsmasters_sermons_activate_deactivate'));
		
		
		if (is_admin()) {
			add_action('admin_enqueue_scripts', array($this, 'cmsmasters_sermons_enqueue_scripts'));
		}
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsmasters_sermons', false, dirname(plugin_basename(CMSMASTERS_SERMONS_FILE)) . '/languages/');
		
		add_action('wp_enqueue_scripts', array($this, 'cmsmasters_sermons_frontend_scripts'));
	}
	
	
	function cmsmasters_sermons_frontend_scripts() {
		wp_enqueue_script('theme-cmsmasters-sermons-script', get_template_directory_uri() . '/cmsmasters-sermons/js/jquery.sermons-script.js', array('jquery'), '1.0.0', true);
		
		wp_enqueue_style('theme-cmsmasters-sermons-style', get_template_directory_uri() . '/cmsmasters-sermons/css/cmsmasters-sermons-style.css', array(), '1.0.0', 'screen');
		
		wp_enqueue_style('theme-cmsmasters-sermons-adaptive', get_template_directory_uri() . '/cmsmasters-sermons/css/cmsmasters-sermons-adaptive.css', array(), '1.0.0', 'screen');
		
		if (is_rtl()) {
			wp_enqueue_style('theme-cmsmasters-sermons-rtl', get_template_directory_uri() . '/cmsmasters-sermons/css/cmsmasters-sermons-rtl.css', array(), '1.0.0', 'screen');
		}
	}
	
	
	function cmsmasters_sermons_enqueue_scripts($hook) {
		
		wp_register_script('cmsmasters_sermons_shortcodes_js', CMSMASTERS_SERMONS_URL . 'js/cmsmastersSermons-shortcodes.js', array(), CMSMASTERS_SERMONS_VERSION, true);
		
		wp_localize_script('cmsmasters_sermons_shortcodes_js', 'cmsmasters_sermons_shortcode', array( 
		
		/* Start Sermons Translation */
			'title' =>											__('Sermons', 'cmsmasters-sermons'), 
			'orderby_descr' =>									__('Choose what parameter your sermons will be ordered by', 'cmsmasters-sermons'), 
			'number_title' =>									__('Sermons Number', 'cmsmasters-sermons'), 
			'number_subtitle' =>								__('Enter the number of sermons to be shown per page', 'cmsmasters-sermons'), 
			'number_descr_note' =>								__('number, if empty - show all sermons', 'cmsmasters-sermons'), 
			'metadata_descr' =>									__('Choose sermons metadata you want to be shown', 'cmsmasters-sermons'), 
			'media_title' =>									__('Media', 'cmsmasters-sermons'), 
			'media_descr' =>									__('Video, Audio, PDF and Download Links', 'cmsmasters-sermons'), 
			'choice_hide' =>									__('Hide', 'cmsmasters-sermons'), 
			'categories_descr' =>								__('Show sermons associated with certain categories', 'cmsmasters-sermons'), 
			'categories_descr_note' =>							__('If you don\'t choose any sermon categories, all your sermons will be shown', 'cmsmasters-sermons'), 
			'col_count_descr' =>								__('Choose number of sermons per row', 'cmsmasters-sermons'), 
			'pagination_descr' =>								__('Choose your method of viewing additional sermons', 'cmsmasters-sermons'), 
			'pagination_choice_disabled' =>						__('Disable additional sermons', 'cmsmasters-sermons'), 
		/* Finish Sermons Translation */
		
		));
		
		
		if ( 
			$hook == 'post-new.php' || 
			($hook == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
		) {
			wp_enqueue_script('cmsmasters_sermons_shortcodes_js');
		}
	}
	
	
	function cmsmasters_sermons_activate_deactivate() {
		flush_rewrite_rules();
	}
}


new Cmsmasters_Sermons();

