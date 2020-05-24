<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.2.0
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('my_religion_system_fonts_list')) {
	function my_religion_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('my_religion_get_google_fonts_list')) {
	function my_religion_get_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'my-religion'), 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Crimson+Text:400,400italic,700,700italic' => 'Crimson Text', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
		);
		
		
		return $fonts;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('my_religion_text_transform_list')) {
	function my_religion_text_transform_list() {
		$list = array( 
			'none' => esc_html__('none', 'my-religion'), 
			'uppercase' => esc_html__('uppercase', 'my-religion'), 
			'lowercase' => esc_html__('lowercase', 'my-religion'), 
			'capitalize' => esc_html__('capitalize', 'my-religion'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('my_religion_text_decoration_list')) {
	function my_religion_text_decoration_list() {
		$list = array( 
			'none' => esc_html__('none', 'my-religion'), 
			'underline' => esc_html__('underline', 'my-religion'), 
			'overline' => esc_html__('overline', 'my-religion'), 
			'line-through' => esc_html__('line-through', 'my-religion'), 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('my_religion_custom_color_schemes_list')) {
	function my_religion_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'my-religion'), 
			'second' => esc_html__('Custom 2', 'my-religion'), 
			'third' => esc_html__('Custom 3', 'my-religion') 
		);
		
		
		return $list;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Require Files Function
if (!function_exists('my_religion_locate_template')) {
	function my_religion_locate_template($template_names, $require_once = true, $load = true) {
		$located = '';
		
		
		foreach ((array) $template_names as $template_name) {
			if (!$template_name) {
				continue;
			}
			
			
			if (file_exists(get_stylesheet_directory() . '/' . $template_name)) {
				$located = get_stylesheet_directory() . '/' . $template_name;
				
				
				break;
			} elseif (file_exists(get_template_directory() . '/' . $template_name)) {
				$located = get_template_directory() . '/' . $template_name;
				
				
				break;
			}
		}
		
		
		if ($load && $located != '') {
			if ($require_once) {
				require_once($located);
			} else {
				require($located);
			}
		}
		
		
		return $located;
	}
}



// Theme Plugin Support Constants
if (class_exists('Cmsmasters_Content_Composer')) {
	define('CMSMASTERS_CONTENT_COMPOSER', true);
} else {
	define('CMSMASTERS_CONTENT_COMPOSER', false);
}

if (class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', true);
} else {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} else {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} else {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', true);
} else {
	define('CMSMASTERS_DONATIONS', false);
}

if (function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', true);
} else {
	define('CMSMASTERS_TIMETABLE', false);
}

if (class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', false);
} else {
	define('CMSMASTERS_TC_EVENTS', false);
}

if (class_exists('Cmsmasters_Sermons')) {
	define('CMSMASTERS_SERMONS', true);
} else {
	define('CMSMASTERS_SERMONS', false);
}

if (class_exists('Cmsmasters_Events_Schedule')) {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
} else {
	define('CMSMASTERS_EVENTS_SCHEDULE', false);
}


// CMSMasters Importer Compatibility
define('CMSMASTERS_IMPORTER', true);

// Theme Colored Categories Constant
define('CMSMASTERS_COLORED_CATEGORIES', true);

// Theme Projects Compatible
define('CMSMASTERS_PROJECT_COMPATIBLE', true);

// Theme Profiles Compatible
define('CMSMASTERS_PROFILE_COMPATIBLE', true);

// Developer Mode Constant
define('CMSMASTERS_DEVELOPER_MODE', false);

// Change FS Method
if (!defined('FS_METHOD')) {
	define('FS_METHOD', 'direct');
}



// Theme Image Thumbnails Size
if (!function_exists('my_religion_get_image_thumbnail_list')) {
	function my_religion_get_image_thumbnail_list() {
		$list = array( 
			'cmsmasters-small-thumb' => array( 
				'width' => 		70, 
				'height' => 	70, 
				'crop' => 		true 
			), 
			'cmsmasters-square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'my-religion') 
			), 
			'cmsmasters-blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	420, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'my-religion') 
			), 
			'cmsmasters-project-grid-thumb' => array( 
				'width' => 		360, 
				'height' => 	360, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Grid', 'my-religion') 
			), 
			'cmsmasters-project-thumb' => array( 
				'width' => 		580, 
				'height' => 	580, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'my-religion') 
			), 
			'cmsmasters-project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'my-religion') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	500, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'my-religion') 
			), 
			'cmsmasters-masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'my-religion') 
			), 
			'cmsmasters-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	650, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'my-religion') 
			), 
			'cmsmasters-project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	700, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'my-religion') 
			), 
			'cmsmasters-full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'my-religion') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['cmsmasters-event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	420, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'my-religion') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('my_religion_all_color_schemes_list')) {
	function my_religion_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'my-religion'), 
			'header' => 		esc_html__('Header', 'my-religion'), 
			'navigation' => 	esc_html__('Navigation', 'my-religion'), 
			'header_top' => 	esc_html__('Header Top', 'my-religion'), 
			'footer' => 		esc_html__('Footer', 'my-religion') 
		);
		
		
		$out = array_merge($list, my_religion_custom_color_schemes_list());
		
		
		return apply_filters('cmsmasters_all_color_schemes_list_filter', $out);
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('my_religion_color_schemes_defaults')) {
	function my_religion_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#8b8b8b', 
				'link' => 		'#d14f42', 
				'hover' => 		'#a8a9ab', 
				'heading' => 	'#31333b', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#fcfcfc', 
				'border' => 	'#eaeaea' 
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#ffffff', 
				'mid_link' => 		'#ffffff', 
				'mid_hover' => 		'rgba(255,255,255,0.5)', 
				'mid_bg' => 		'rgba(49,51,59,0.15)', 
				'mid_bg_scroll' => 	'#31333b', 
				'mid_border' => 	'rgba(255,255,255,0.2)', 
				'bot_color' => 		'#ffffff', 
				'bot_link' => 		'#ffffff', 
				'bot_hover' => 		'#ffffff', 
				'bot_bg' => 		'rgba(49,51,59,0.15)', 
				'bot_bg_scroll' => 	'#31333b', 
				'bot_border' => 	'rgba(255,255,255,0.2)' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#ffffff', 
				'title_link_hover' => 		'rgba(255,255,255,0.5)', 
				'title_link_current' => 	'#ffffff', 
				'title_link_subtitle' => 	'rgba(255,255,255,0.3)', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0.4)', 
				'dropdown_text' => 			'#717275', 
				'dropdown_bg' => 			'#31333b', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#8a8a8e', 
				'dropdown_link_hover' => 	'#ffffff', 
				'dropdown_link_subtitle' => '#717275', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0.07)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#ffffff', 
				'link' => 					'#ffffff', 
				'hover' => 					'rgba(255,255,255,0.5)', 
				'bg' => 					'rgba(49,51,59,0.15)', 
				'border' => 				'rgba(255,255,255,0.2)', 
				'title_link' => 			'#ffffff', 
				'title_link_hover' => 		'rgba(255,255,255,0.5)', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#31333b', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#8a8a8e', 
				'dropdown_link_hover' => 	'#ffffff', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'rgba(255,255,255,0.2)', 
				'link' => 		'#71727f', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#3b3d4a', 
				'alternate' => 	'rgba(255,255,255,0.5)', 
				'border' => 	'rgba(255,255,255,0.1)' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'#ffffff', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#98433a', 
				'alternate' => 	'#ffffff', 
				'border' => 	'rgba(255,255,255,0.2)' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#ffffff', 
				'link' => 		'#ffffff', 
				'hover' => 		'rgba(255,255,255,0.4)', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#d14f42', 
				'alternate' => 	'rgba(255,255,255,0)', 
				'border' => 	'#e4e4e4' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'rgba(255,255,255,0.4)', 
				'link' => 		'#ffffff', 
				'hover' => 		'#e96b61', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#d14f42', 
				'alternate' => 	'#d14f42', 
				'border' => 	'#e4e4e4' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
define('CMSMASTERS_FRAMEWORK', 'framework');
define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
define('CMSMASTERS_COMPOSER', 'cmsmasters-c-c');
define('CMSMASTERS_DEMO_FILES_PATH', get_template_directory() . '/framework/admin/inc/demo-content/');



// Load Framework Parts
my_religion_locate_template(CMSMASTERS_CLASS . '/Browser.php', true);

if (class_exists('Cmsmasters_Theme_Importer')) {
	require_once(CMSMASTERS_ADMIN_INC . '/demo-content-importer.php');
}

my_religion_locate_template(CMSMASTERS_ADMIN_INC . '/config-functions.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/theme-functions.php', true);

my_religion_locate_template(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php', true);

my_religion_locate_template(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php', true);

my_religion_locate_template(CMSMASTERS_ADMIN_INC . '/admin-scripts.php', true);

my_religion_locate_template(CMSMASTERS_ADMIN_INC . '/plugin-activator.php', true);

my_religion_locate_template(CMSMASTERS_CLASS . '/widgets.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/breadcrumbs.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/likes.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/pagination.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/single-comment.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/theme-fonts.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-primary.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions-post.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions-project.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions-profile.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php', true);

my_religion_locate_template(CMSMASTERS_FUNCTION . '/template-functions-widgets.php', true);


$cmsmasters_wp_version = get_bloginfo('version');

if (version_compare($cmsmasters_wp_version, '5', '>=') || function_exists('is_gutenberg_page')) {
	require_once(get_template_directory() . '/gutenberg/cmsmasters-module-functions.php');
}


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	my_religion_locate_template(CMSMASTERS_FUNCTION . '/theme-colored-categories.php', true);
}


if (class_exists('Cmsmasters_Content_Composer')) {
	my_religion_locate_template(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php', true);
}


// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS) {
	my_religion_locate_template('cmsmasters-donations/function/template-functions-donation.php', true);
}

// WooCommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	my_religion_locate_template('woocommerce/cmsmasters-woo-functions.php', true);
}

// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	my_religion_locate_template('tribe-events/cmsmasters-events-functions.php', true);
}

// CMSMasters Events Schedule functions
if (CMSMASTERS_EVENTS_SCHEDULE) {
	my_religion_locate_template('cmsmasters-events-schedule/cmsmasters-events-schedule-functions.php', true);
}



// Load Theme Local File
if (!function_exists('my_religion_load_theme_textdomain')) {
	function my_religion_load_theme_textdomain() {
		load_theme_textdomain('my-religion', get_template_directory() . '/' . CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'my_religion_load_theme_textdomain')) {
	add_action('after_setup_theme', 'my_religion_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('my_religion_theme_activation')) {
	function my_religion_theme_activation() {
		if (get_option('cmsmasters_active_theme') != 'my-religion') {
			add_option('cmsmasters_active_theme', 'my-religion', '', 'yes');
			
			
			my_religion_add_global_options();
			
			
			my_religion_add_global_icons();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'my_religion_theme_activation');



// Framework Deactivation
if (!function_exists('my_religion_theme_deactivation')) {
	function my_religion_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'my_religion_theme_deactivation')) {
	add_action('switch_theme', 'my_religion_theme_deactivation');
}



// Plugin Activation Regenerate Styles
if (!function_exists('my_religion_plugin_activation')) {
	function my_religion_plugin_activation($plugin, $network_activation) {
		update_option('cmsmasters_plugin_activation', 'true');
	
		
		if ($plugin == 'classic-editor/classic-editor.php') {
			update_option('classic-editor-replace', 'no-replace');
		}
	}
}

add_action('activated_plugin', 'my_religion_plugin_activation', 10, 2);


if (!function_exists('my_religion_plugin_activation_regenerate')) {
	function my_religion_plugin_activation_regenerate() {
		if (!get_option('cmsmasters_plugin_activation')) {
			add_option('cmsmasters_plugin_activation', 'false');
		}
		
		if (get_option('cmsmasters_plugin_activation') != 'false') {
			my_religion_regenerate_styles();
			
			my_religion_add_global_options();
			
			my_religion_add_global_icons();
			
			
			update_option('cmsmasters_plugin_activation', 'false');
		}
	}
}

add_action('init', 'my_religion_plugin_activation_regenerate');


function my_religion_run_reinit_import_options($post_id, $key, $value) {
	if (!get_post_meta($post_id, 'cmsmasters_heading', true)) {
		$custom_post_meta_fields = my_religion_get_custom_all_meta_fields();
		
		foreach ($custom_post_meta_fields as $field) {
			if ( 
				$field['type'] != 'tabs' && 
				$field['type'] != 'tab_start' && 
				$field['type'] != 'tab_finish' && 
				$field['type'] != 'content_start' && 
				$field['type'] != 'content_finish' 
			) {
				update_post_meta($post_id, $field['id'], $field['std']);
			}
		}
	}
	
	
	if ($key === 'cmsmasters_composer_show' && $value === 'true') {
		update_post_meta($post_id, 'cmsmasters_gutenberg_show', 'true');
	}
}

add_action('import_post_meta', 'my_religion_run_reinit_import_options', 10, 3);
