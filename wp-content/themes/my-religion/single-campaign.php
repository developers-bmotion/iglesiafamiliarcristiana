<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.5
 * 
 * Single Campaign Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = my_religion_get_global_options();


list($cmsmasters_layout) = my_religion_theme_page_layout_scheme();


$campaign_tags = get_the_terms(get_the_ID(), 'cp-tags');


$cmsmasters_campaign_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_campaign_sharing_box', true);

$cmsmasters_campaign_author_box = get_post_meta(get_the_ID(), 'cmsmasters_campaign_author_box', true);

$cmsmasters_campaign_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_campaign_more_posts', true);

$cmsmasters_campaign_title = get_post_meta(get_the_ID(), 'cmsmasters_campaign_title', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry" role="main">' . "\n\t";
}


if (have_posts()) : the_post();
	echo '<div class="campaigns opened-article">' . "\n";


?>
<!--_________________________ Start Standard Campaign _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_campaign_cont">
	<?php
		if ($cmsmasters_option['my-religion' . '_donations_campaign_date']) {
			cmsmasters_campaign_date('post');
		}
		
		
		if ($cmsmasters_campaign_title == 'true') {
			cmsmasters_campaign_heading(get_the_ID(), 'h2', false);
		}
		
		
		if ( 
			$cmsmasters_option['my-religion' . '_donations_campaign_author'] || 
			$cmsmasters_option['my-religion' . '_donations_campaign_cat'] || 
			$cmsmasters_option['my-religion' . '_donations_campaign_tag'] || 
			$cmsmasters_option['my-religion' . '_donations_campaign_like'] || 
			$cmsmasters_option['my-religion' . '_donations_campaign_comment'] 
		) {
			echo '<div class="cmsmasters_campaign_cont_info entry-meta' . ((get_the_content() == '') ? ' no_bdb' : '') . '">';
				
				if ( 
					$cmsmasters_option['my-religion' . '_donations_campaign_like'] || 
					$cmsmasters_option['my-religion' . '_donations_campaign_comment'] 
				) {
					echo '<div class="cmsmasters_campaign_meta_info">';
						
						cmsmasters_campaign_like('post');
						
						cmsmasters_campaign_comments('post');
						
					echo '</div>';
				}
				
				
				cmsmasters_campaign_author('post');
				
				cmsmasters_campaign_category(get_the_ID(), 'cp-categs', 'post');
				
				cmsmasters_campaign_tags(get_the_ID(), 'cp-tags', 'post');
				
			echo '</div>';
		}
		
		
		if (!post_password_required() && has_post_thumbnail()) {
			my_religion_thumb(get_the_ID(), 'post-thumbnail', false, true, true, true, true, true, false);
		}
		
		
		echo '<div class="campaign_meta_wrap">';
		
			cmsmasters_campaign_target(get_the_ID(), true);
			
			cmsmasters_campaign_donations_count(get_the_ID(), true);
			
			cmsmasters_campaign_donated(get_the_ID(), 'post');
			
			cmsmasters_campaign_donate_button(get_the_ID(), true);
			
		echo '</div>';
		
		
		if (get_the_content() != '') {
			echo '<div class="cmsmasters_campaign_content entry-content">';
				
				the_content();
				
				
				wp_link_pages(array( 
					'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'my-religion') . ':</strong>', 
					'after' => '</div>', 
					'link_before' => ' [ ', 
					'link_after' => ' ] ' 
				));
				
			echo '<div class="cl"></div>' . 
			'</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Standard Campaign _________________________ -->
<?php
	
	
	if ($cmsmasters_campaign_sharing_box == 'true') {
		my_religion_sharing_box();
	}
	
	
	if ($cmsmasters_option['my-religion' . '_donations_campaign_nav_box']) {
		my_religion_prev_next_posts(esc_html__('Campaign', 'my-religion'));
	}
	
	
	if ($cmsmasters_campaign_author_box == 'true') {
		my_religion_author_box(esc_html__('About author', 'my-religion'), 'h3', 'h5');
	}
	
	
	if ($campaign_tags) {
		$tgsarray = array();
		
		foreach ($campaign_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_campaign_more_posts != 'hide') {
		my_religion_related( 
			'h3', 
			esc_html__('More campaigns', 'my-religion'),
			esc_html__('No campaigns found', 'my-religion'),
			$cmsmasters_campaign_more_posts, 
			$tgsarray, 
			$cmsmasters_option['my-religion' . '_donations_more_campaigns_count'], 
			$cmsmasters_option['my-religion' . '_donations_more_campaigns_pause'], 
			'campaign', 
			'cp-tags'  
		);
	}
	
	
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

