<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.5
 * 
 * Single Profile Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = my_religion_get_global_options();


$cmsmasters_profile_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_profile_sharing_box', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry" role="main">' . "\n\t";


if (have_posts()) : the_post();
	echo '<div class="profiles opened-article">' . "\n";
	
	
	get_template_part('framework/post-type/profile/post/standard');
	
	
	if ($cmsmasters_profile_sharing_box == 'true') {
		my_religion_sharing_box();
	}
	
	
	if ($cmsmasters_option['my-religion' . '_profile_post_nav_box']) {
		my_religion_prev_next_posts(esc_html__('Profile', 'my-religion'));
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

