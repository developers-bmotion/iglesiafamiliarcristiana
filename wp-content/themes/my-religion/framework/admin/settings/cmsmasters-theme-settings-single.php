<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile & Donations Campaign Settings
 * Created by CMSMasters
 * 
 */


function my_religion_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'my-religion');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'my-religion');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'my-religion');
	}
	
	if (CMSMASTERS_TIMETABLE) {
		$tabs['tt_event'] = esc_attr__('Timetable Event', 'my-religion');
	}
	
	if (CMSMASTERS_DONATIONS) {
		$tabs['campaign'] = esc_attr__('Campaign', 'my-religion');
	}
	
	if (CMSMASTERS_SERMONS) {
		$tabs['sermon'] = esc_attr__('Sermon', 'my-religion');
	}
	
	
	return $tabs;
}


function my_religion_options_single_sections() {
	$tab = my_religion_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'my-religion');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'my-religion');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'my-religion');
		
		
		break;
	case 'tt_event':
		$sections = array();
		
		$sections['tt_event_section'] = esc_attr__('Timetable Event Options', 'my-religion');
		
		
		break;
	case 'campaign':
		$sections = array();
		
		$sections['campaign_section'] = esc_attr__('Donations Campaign Options', 'my-religion');
		
		
		break;
	case 'sermon':
		$sections = array();
		
		$sections['sermon_section'] = esc_attr__('Sermons Options', 'my-religion');
		
		
		break;
	default:
		$sections = array();
		
		
		break;
	}
	
	
	return $sections;
} 


function my_religion_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = my_religion_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'my-religion'), 
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
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'my-religion') . '|related', 
				esc_html__('Show Popular Posts', 'my-religion') . '|popular', 
				esc_html__('Show Recent Posts', 'my-religion') . '|recent', 
				esc_html__('Hide More Posts Box', 'my-religion') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'my-religion'), 
			'desc' => esc_html__('posts', 'my-religion'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => 'my-religion' . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'my-religion'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'my-religion'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'my-religion'), 
			'desc' => esc_html__('Enter a project details block title', 'my-religion'), 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'my-religion') . '|related', 
				esc_html__('Show Popular Projects', 'my-religion') . '|popular', 
				esc_html__('Show Recent Projects', 'my-religion') . '|recent', 
				esc_html__('Hide More Projects Box', 'my-religion') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'my-religion'), 
			'desc' => esc_html__('projects', 'my-religion'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'my-religion'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'my-religion'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'my-religion'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'my-religion'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_pj_categs_slug', 
			'title' => esc_html__('Project Categories Slug', 'my-religion'), 
			'desc' => esc_html__('Enter page slug that should be used on projects categories archive page', 'my-religion'), 
			'type' => 'text', 
			'std' => 'pj-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => 'my-religion' . '_portfolio_pj_tags_slug', 
			'title' => esc_html__('Project Tags Slug', 'my-religion'), 
			'desc' => esc_html__('Enter page slug that should be used on projects tags archive page', 'my-religion'), 
			'type' => 'text', 
			'std' => 'pj-tags', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'my-religion'), 
			'desc' => esc_html__('Enter a profile details block title', 'my-religion'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'my-religion'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'my-religion'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => 'my-religion' . '_profile_pl_categs_slug', 
			'title' => esc_html__('Profile Categories Slug', 'my-religion'), 
			'desc' => esc_html__('Enter page slug that should be used on profiles categories archive page', 'my-religion'), 
			'type' => 'text', 
			'std' => 'pl-categs', 
			'class' => '' 
		);
		
		
		break;
	case 'tt_event':
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'my-religion' . '_tt_event_hours', 
			'title' => esc_html__('Event Hours', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'my-religion' . '_tt_event_hours_title', 
			'title' => esc_html__('Event Hours Title', 'my-religion'), 
			'desc' => esc_html__('Enter a event hours block title', 'my-religion'), 
			'type' => 'text', 
			'std' => 'Event Hours', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'my-religion' . '_tt_event_details_title', 
			'title' => esc_html__('Event Details Title', 'my-religion'), 
			'desc' => esc_html__('Enter a event details block title', 'my-religion'), 
			'type' => 'text', 
			'std' => 'Event Details', 
			'class' => ''
		);
		
		$options[] = array( 
			'section' => 'tt_event_section', 
			'id' => 'my-religion' . '_tt_event_cat', 
			'title' => esc_html__('Event Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		
		break;
	case 'campaign':
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_layout', 
			'title' => esc_html__('Layout Type', 'my-religion'), 
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
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_title', 
			'title' => esc_html__('Campaign Title', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_date', 
			'title' => esc_html__('Campaign Date', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_cat', 
			'title' => esc_html__('Campaign Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_author', 
			'title' => esc_html__('Campaign Author', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_comment', 
			'title' => esc_html__('Campaign Comments', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_tag', 
			'title' => esc_html__('Campaign Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_like', 
			'title' => esc_html__('Campaign Likes', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_nav_box', 
			'title' => esc_html__('Campaign Navigation Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_share_box', 
			'title' => esc_html__('Sharing Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_author_box', 
			'title' => esc_html__('About Author Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_more_campaigns_box', 
			'title' => esc_html__('More Campaigns Box', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Campaigns', 'my-religion') . '|related', 
				esc_html__('Show Popular Campaigns', 'my-religion') . '|popular', 
				esc_html__('Show Recent Campaigns', 'my-religion') . '|recent', 
				esc_html__('Hide More Campaigns Box', 'my-religion') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_more_campaigns_count', 
			'title' => esc_html__('More Campaigns Box Items Number', 'my-religion'), 
			'desc' => esc_html__('campaigns', 'my-religion'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_more_campaigns_pause', 
			'title' => esc_html__('More Campaigns Slider Pause Time', 'my-religion'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'my-religion'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => 'my-religion' . '_donations_campaign_slug', 
			'title' => esc_html__('Campaign Slug', 'my-religion'), 
			'desc' => esc_html__('Enter a page slug that should be used for your donations campaign single item', 'my-religion'), 
			'type' => 'text', 
			'std' => 'campaign', 
			'class' => '' 
		);
		
		
		break;
	case 'sermon':
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_layout', 
			'title' => esc_html__('Sermon Layout Type', 'my-religion'), 
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
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_title', 
			'title' => esc_html__('Sermon Title', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_date', 
			'title' => esc_html__('Sermon Date', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_cat', 
			'title' => esc_html__('Sermon Categories', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_tag', 
			'title' => esc_html__('Sermon Tags', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_author', 
			'title' => esc_html__('Sermon Author', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_comment', 
			'title' => esc_html__('Sermon Comments', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_like', 
			'title' => esc_html__('Sermon Likes', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_nav_box', 
			'title' => esc_html__('Sermon Navigation Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_share_box', 
			'title' => esc_html__('Sharing Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_author_box', 
			'title' => esc_html__('About Author Box', 'my-religion'), 
			'desc' => esc_html__('show', 'my-religion'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_more_posts_box', 
			'title' => esc_html__('More Sermons Box', 'my-religion'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Sermons', 'my-religion') . '|related', 
				esc_html__('Show Popular Sermons', 'my-religion') . '|popular', 
				esc_html__('Show Recent Sermons', 'my-religion') . '|recent', 
				esc_html__('Hide More Sermons Box', 'my-religion') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_more_posts_count', 
			'title' => esc_html__('More Sermons Box Items Number', 'my-religion'), 
			'desc' => esc_html__('sermons', 'my-religion'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_more_posts_pause', 
			'title' => esc_html__('More Sermons Slider Pause Time', 'my-religion'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'my-religion'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_post_slug', 
			'title' => esc_html__('Sermon Slug', 'my-religion'), 
			'desc' => esc_html__('Enter a page slug that should be used for your sermons single item', 'my-religion'), 
			'type' => 'text', 
			'std' => 'sermon', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_srm_categs_slug', 
			'title' => esc_html__('Sermon Categories Slug', 'my-religion'), 
			'desc' => esc_html__('Enter page slug that should be used on sermons categories archive page', 'my-religion'), 
			'type' => 'text', 
			'std' => 'srm-categs', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'sermon_section', 
			'id' => 'my-religion' . '_sermon_srm_tags_slug', 
			'title' => esc_html__('Sermon Tags Slug', 'my-religion'), 
			'desc' => esc_html__('Enter page slug that should be used on sermons tags archive page', 'my-religion'), 
			'type' => 'text', 
			'std' => 'srm-tags', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;
}

