<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version 	1.1.9
 * 
 * Website Events Functions
 * Created by CMSMasters
 * 
 */


/* Replace Styles */
function my_religion_replace_tribe_events_calendar_stylesheet() {
	wp_deregister_style('tribe-events-calendar-style');
	wp_deregister_style('tribe-events-full-calendar-style');
	wp_deregister_style('tribe-events-admin-menu');
	
	wp_enqueue_style('tribe-events-bootstrap-datepicker-css');
}

add_action('wp_enqueue_scripts', 'my_religion_replace_tribe_events_calendar_stylesheet', 100);


/* Replace Pro Styles */
function my_religion_replace_tribe_events_calendar_pro_stylesheet() {
	wp_deregister_style('tribe-events-calendar-pro-style');
	wp_deregister_style('tribe-events-full-pro-calendar-style' );
	wp_deregister_style('widget-calendar-pro-style');
}

add_action('wp_enqueue_scripts', 'my_religion_replace_tribe_events_calendar_pro_stylesheet', 100);


/* Replace Widget Styles */
function my_religion_replace_tribe_events_calendar_widget_stylesheet() {
	$styleUrl = '';
	
	
	return $styleUrl;
}

add_filter('tribe_events_pro_widget_calendar_stylesheet_url', 'my_religion_replace_tribe_events_calendar_widget_stylesheet');


/* Replace Responsive Styles */
function my_religion_customize_tribe_events_breakpoint() {
    return 749;
}

add_filter('tribe_events_mobile_breakpoint', 'my_religion_customize_tribe_events_breakpoint');


/* Add class to next button in single event navigation */
function my_religion_tribe_link_next_class($format){
	$format = str_replace('href=', 'class="cmsmasters_next_post" href=', $format);
	
	return $format;
}

add_filter('tribe_the_next_event_link', 'my_religion_tribe_link_next_class');


/* Add class to previous button in single event navigation */
function my_religion_tribe_link_prev_class($format) {
	$format = str_replace("href=", 'class="cmsmasters_prev_post" href=', $format);
	
	return $format;
}

add_filter('tribe_the_prev_event_link', 'my_religion_tribe_link_prev_class');
