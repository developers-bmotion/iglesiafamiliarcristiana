<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.0
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function my_religion_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'my-religion');
	$tabs['export'] = esc_attr__('Export', 'my-religion');
	
	
	return $tabs;
}


function my_religion_options_demo_sections() {
	$tab = my_religion_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'my-religion');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'my-religion');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function my_religion_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = my_religion_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => 'my-religion' . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'my-religion'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'my-religion'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => 'my-religion' . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'my-religion'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'my-religion'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'my-religion'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

