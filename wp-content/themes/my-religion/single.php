<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.5
 * 
 * Single Post Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = my_religion_get_global_options();


list($cmsmasters_layout) = my_religion_theme_page_layout_scheme();


$cmsmasters_post_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_post_sharing_box', true);

$cmsmasters_post_author_box = get_post_meta(get_the_ID(), 'cmsmasters_post_author_box', true);

$cmsmasters_post_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_post_more_posts', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry" role="main">' . "\n\t";
}


if (have_posts()) : the_post();
	echo '<div class="blog opened-article">' . "\n";
	
	
	if (get_post_format() != '') {
		get_template_part('framework/post-type/blog/post/' . get_post_format());
	} else {
		get_template_part('framework/post-type/blog/post/standard');
	}
	
	
	if ($cmsmasters_post_sharing_box == 'true') {
		my_religion_sharing_box();
	}
	
	
	if ($cmsmasters_option['my-religion' . '_blog_post_nav_box']) {
		my_religion_prev_next_posts(esc_html__('Post', 'my-religion'));
	}
	
	
	if ($cmsmasters_post_author_box == 'true') {
		my_religion_author_box(esc_html__('About author', 'my-religion'), 'h3', 'h5');
	}
	
	
	if (get_the_tags()) {
		$tgsarray = array();
		
		foreach (get_the_tags() as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_post_more_posts != 'hide') {
		my_religion_related( 
			'h3', 
			esc_html__('More posts', 'my-religion'),
			esc_html__('No posts found', 'my-religion'),
			$cmsmasters_post_more_posts, 
			$tgsarray, 
			$cmsmasters_option['my-religion' . '_blog_more_posts_count'], 
			$cmsmasters_option['my-religion' . '_blog_more_posts_pause'], 
			'post' 
		);
	}
	
	
	echo my_religion_get_post_pings(get_the_ID(), 'h3');
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar" role="complementary">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar fl" role="complementary">' . "\n";
	
	
	get_sidebar();
	
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
}


get_footer();

