<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion Child
 * @version		1.1.2
 * 
 * Child Theme Functions File
 * Created by CMSMasters
 * 
 */


function my_religion_child_enqueue_styles() {
    wp_enqueue_style('my-religion-child-style', get_stylesheet_uri(), array('theme-style'), '1.0.0', 'screen, print');
}

add_action('wp_enqueue_scripts', 'my_religion_child_enqueue_styles', 11);
?>