<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.2.2
 * 
 * Gutenberg Functions
 * Created by CMSMasters
 * 
 */


/* Load Parts */
require_once(get_template_directory() . '/gutenberg/function/module-colors.php');
require_once(get_template_directory() . '/gutenberg/function/module-fonts.php');


/* Register CSS Styles and Scripts */
function my_religion_gutenberg_support() {
	$color_palettes = my_religion_gutenberg_editor_color_palettes_styles();

	add_theme_support('editor-color-palette', $color_palettes);
}

add_action('after_setup_theme', 'my_religion_gutenberg_support');


/* Block Editor Color Palettes and Styles */
function my_religion_gutenberg_editor_color_palettes_styles( $get_styles = false ) {
	$colors = cmsmasters_color_picker_palettes();

	$color_palettes = array();
	$styles_out = '';

	$index = 1;

	foreach ($colors as $color) {
		$color_palettes[] = array(
            'slug' => 'color-' . $index,
			'color' => $color,
		);

		if ( $get_styles ) {
			$styles_out .= "
			.has-color-{$index}-color {
				color: {$color};
			}

			.has-color-{$index}-background-color {
				background-color: {$color};
			}
			";
		}

		$index += 1;
	}

	if ( $get_styles && '' !== $styles_out ) {
		return $styles_out;
	}

	return $color_palettes;
}


/* Enqueue Block Editor Styles */
function my_religion_gutenberg_editor_styles() {
	wp_deregister_style('wp-block-library-theme');
	wp_register_style('wp-block-library-theme', '');
	
    wp_enqueue_style('my-religion-gutenberg-editor-style', get_theme_file_uri( '/gutenberg/css/editor-style.css' ), false, '1.0', 'all');
	
	
	if (is_rtl()) {
		wp_enqueue_style('my-religion-gutenberg-editor-style-rtl', get_template_directory_uri() . '/gutenberg/css/module-rtl.css', array(), '1.0.0', 'screen');
	}
	
	
	// Scripts
	wp_enqueue_script('my-religion-gutenberg-editor-options-script', get_template_directory_uri() . '/gutenberg/js/editor-options.js', array('jquery'), '1.0.0', true);
	
	
	$gutenberg_module_styles = my_religion_gutenberg_module_colors('', true);
	$gutenberg_module_styles .= my_religion_gutenberg_module_fonts('', true);
	
	wp_add_inline_style('my-religion-gutenberg-editor-style', $gutenberg_module_styles);
}

add_action('enqueue_block_editor_assets', 'my_religion_gutenberg_editor_styles');


/* Enqueue Frontend Styles */
function my_religion_gutenberg_frontend_styles() {
	wp_enqueue_style('my-religion-gutenberg-frontend-style', get_template_directory_uri() . '/gutenberg/css/frontend-style.css', array(), '1.0.0', 'screen');
	
	
	if (is_rtl()) {
		wp_enqueue_style('my-religion-gutenberg-frontend-rtl', get_template_directory_uri() . '/gutenberg/css/module-rtl.css', array(), '1.0.0', 'screen');
	}
}

add_action('wp_enqueue_scripts', 'my_religion_gutenberg_frontend_styles');


/* Get Gutenberg Editor Container Custom Classes */
function my_religion_gutenberg_editor_custom_class( $classes ) {
	$cmsmasters_option = my_religion_get_global_options();
	$cmsmasters_layout = get_post_meta(get_the_ID(), 'cmsmasters_layout', true);
	$sidebar_id = get_post_meta(get_the_ID(), 'cmsmasters_sidebar_id', true);
	
	
	if (
		(!isset($_GET['action']) && !isset($_GET['post_type'])) ||
		(isset($_POST['post_type']) && $_POST['post_type'] == 'post') ||
		(isset($_GET['post']) && get_post_type($_GET['post']) == 'post')
	) {
		$cmsmasters_layout = ( get_post_meta( get_the_ID(), 'cmsmasters_layout', true ) == '' ) ? $cmsmasters_option['my-religion' . '_blog_post_layout'] : get_post_meta( get_the_ID(), 'cmsmasters_layout', true );
	}

	if (CMSMASTERS_WOOCOMMERCE && is_shop()) {
		$sidebar_id = get_post_meta(wc_get_page_id('shop'), 'cmsmasters_sidebar_id', true);
	}
	
	
	if ($sidebar_id != '' && $sidebar_id != false) {
		$sidebar_id = $sidebar_id;
	} else {
		$sidebar_id = 'sidebar_default';
	}
	
	
	if (
		$cmsmasters_layout != 'fullwidth' && 
		(is_active_sidebar($sidebar_id) || is_active_sidebar('sidebar_default'))
	) {
		$classes = 'enable_sidebar';
	}
	
	
    return $classes;
}

add_filter('admin_body_class', 'my_religion_gutenberg_editor_custom_class');
