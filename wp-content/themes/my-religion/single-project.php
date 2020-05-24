<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.7
 * 
 * Single Project Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = my_religion_get_global_options();


$project_tags = get_the_terms(get_the_ID(), 'pj-tags');


$cmsmasters_project_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_project_sharing_box', true);

$cmsmasters_project_author_box = get_post_meta(get_the_ID(), 'cmsmasters_project_author_box', true);

$cmsmasters_project_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_project_more_posts', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry" role="main">' . "\n\t";


if (have_posts()) : the_post();
	echo '<div class="portfolio opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/post-type/portfolio/post/' . get_post_format());
	} else {
		get_template_part('framework/post-type/portfolio/post/standard');
	}
	
	
	if ($cmsmasters_project_sharing_box == 'true') {
		my_religion_sharing_box();
	}
	
	
	if ($cmsmasters_option['my-religion' . '_portfolio_project_nav_box']) {
		my_religion_prev_next_posts(esc_html__('Project', 'my-religion'));
	}
	
	
	if ($cmsmasters_project_author_box == 'true') {
		my_religion_author_box(esc_html__('About author', 'my-religion'), 'h3', 'h5');
	}
	
	
	if ($project_tags) {
		$tgsarray = array();
		
		
		foreach ($project_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_project_more_posts != 'hide') {
		my_religion_related( 
			'h3', 
			esc_html__('More projects', 'my-religion'),
			esc_html__('No projects found', 'my-religion'),
			$cmsmasters_project_more_posts, 
			$tgsarray, 
			$cmsmasters_option['my-religion' . '_portfolio_more_projects_count'], 
			$cmsmasters_option['my-religion' . '_portfolio_more_projects_pause'], 
			'project', 
			'pj-tags'
		);
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

