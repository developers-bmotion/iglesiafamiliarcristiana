<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.1.0
 * 
 * Single Sermon Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = my_religion_get_global_options();

list($cmsmasters_layout) = my_religion_theme_page_layout_scheme();


$sermon_tags = get_the_terms(get_the_ID(), 'srm-tags');

$cmsmasters_sermon_video_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_video_link', true);

$cmsmasters_sermon_audio_links = get_post_meta(get_the_ID(), 'cmsmasters_sermon_audio_links', true);

$cmsmasters_sermon_download_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_download_link', true);

$cmsmasters_sermon_pdf_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_pdf_link', true);

$cmsmasters_sermon_speaker_name = get_post_meta(get_the_ID(), 'cmsmasters_sermon_speaker_name', true);

$cmsmasters_sermon_speaker_link = get_post_meta(get_the_ID(), 'cmsmasters_sermon_speaker_link', true);

$cmsmasters_sermon_title = get_post_meta(get_the_ID(), 'cmsmasters_sermon_title', true);

$cmsmasters_sermon_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_sermon_sharing_box', true);

$cmsmasters_sermon_author_box = get_post_meta(get_the_ID(), 'cmsmasters_sermon_author_box', true);

$cmsmasters_sermon_more_posts = get_post_meta(get_the_ID(), 'cmsmasters_sermon_more_posts', true);

echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry" role="main">' . "\n\t";
}


if (have_posts()) : the_post();

	echo '<div class="sermons opened-article">';
	?>
	
	<article id="post-<?php the_ID();?>" <?php post_class('cmsmasters_open_sermon'); ?>>
		<?php
			
			if ($cmsmasters_option['my-religion' . '_sermon_date']) {
				echo '<abbr class="published cmsmasters_sermon_date" title="' . esc_attr(get_the_date()) . '">' . 
					esc_html(get_the_date()) . 
				'</abbr>';
			}
			
			
			if ($cmsmasters_sermon_title) {
				echo '<h2 class="cmsmasters_sermon_title entry-title">' . get_the_title(get_the_ID()) . '</h2>' . "\n";
			}
			
			
			if ($cmsmasters_option['my-religion' . '_sermon_author'] || $cmsmasters_option['my-religion' . '_sermon_cat'] || $cmsmasters_option['my-religion' . '_sermon_tag'] || $cmsmasters_option['my-religion' . '_sermon_comment'] || $cmsmasters_option['my-religion' . '_sermon_like']) {
				echo '<div class="cmsmasters_sermon_cont_info entry-meta">';
				
				
				if ($cmsmasters_option['my-religion' . '_sermon_author']) {
					$cmsmasters_sermon_speaker_name = (!isset($cmsmasters_sermon_speaker_name) || $cmsmasters_sermon_speaker_name == '' ? get_the_author_meta('display_name') : $cmsmasters_sermon_speaker_name);
			
					$cmsmasters_sermon_speaker_link = (!isset($cmsmasters_sermon_speaker_link) || $cmsmasters_sermon_speaker_link == '' ? get_author_posts_url(get_the_author_meta('ID')) : $cmsmasters_sermon_speaker_link);
		
					echo '<div class="cmsmasters_sermon_author">' . 
						esc_html__('Speaker', 'my-religion') . ': ' . 
						'<a href="' . esc_url($cmsmasters_sermon_speaker_link) . '" title="' . esc_attr__('Speaker', 'my-religion') . ' ' . esc_attr($cmsmasters_sermon_speaker_name) . '" class="vcard author">' . 
							'<span class="fn" rel="author">' . esc_html($cmsmasters_sermon_speaker_name) . '</span>' . 
						'</a>' . 
					'</div>' . "\n";
				}
				
				
				if ($cmsmasters_option['my-religion' . '_sermon_cat']) {
					echo '<div class="cmsmasters_sermon_cat">' . esc_html__('In', 'my-religion') . ' ' . my_religion_get_the_category_list(get_the_ID(), 'srm-categs', ', ') . '</div>';
				}
				
				
				if ($cmsmasters_option['my-religion' . '_sermon_tag'] && get_the_terms(get_the_ID(), 'srm-tags')) {
					echo '<div class="cmsmasters_sermon_author">' . 
						esc_html__('Tags', 'my-religion') . ' ' . 
						get_the_term_list(get_the_ID(), 'srm-tags', '', ', ', '') . 
					'</div>';
				}
				
				
				if ($cmsmasters_option['my-religion' . '_sermon_comment'] || $cmsmasters_option['my-religion' . '_sermon_like']) {
					echo '<div class="cmsmasters_sermon_info">';
					
					if ($cmsmasters_option['my-religion' . '_sermon_comment']) {
						my_religion_get_comments('cmsmasters_sermon_comments', true);
					}
					
					if ($cmsmasters_option['my-religion' . '_sermon_comment']) {
						cmsmastersLike('cmsmasters_sermon_likes', true);
					}
					
					echo '</div>';
				}
				
				echo '</div>';
			}
			
			if (has_post_thumbnail()) {
				my_religion_thumb(get_the_ID(), 'post-thumbnail', false, true);
			}
			
			
			if (!post_password_required()) {
				if ($cmsmasters_sermon_pdf_link != '' || $cmsmasters_sermon_download_link != '' || $cmsmasters_sermon_audio_links != '' || $cmsmasters_sermon_video_link != '') {
					echo '<div class="cmsmasters_sermon_media">';
						
						if ($cmsmasters_sermon_video_link != '') {
							$unique_img_id = uniqid();
							
							echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_video" href="' . esc_url($cmsmasters_sermon_video_link) . '" rel="ilightbox[' . esc_attr($unique_img_id) . ']">' . 
							'<span class="cmsmasters_sermon_media_title">' . esc_html__('Watch', 'my-religion') . '</span>' . 
							'</a>';
						}
						
						
						$empty_test_array = array_filter($cmsmasters_sermon_audio_links);
						
						
						if (!empty($empty_test_array)) {
							
							echo '<a href="#" class="cmsmasters_sermon_media_item cmsmasters_sermon_audio cmsmasters_theme_icon_sermon_audio">' . 
							'<span class="cmsmasters_sermon_media_title">' . esc_html__('Listen', 'my-religion') . '</span>' . 
							'</a>';
								
								$attrs = array(
									'preload' => 'none'
								);
								
								
								foreach ($cmsmasters_sermon_audio_links as $cmsmasters_sermon_audio_link_url) {
									$attrs[substr(strrchr($cmsmasters_sermon_audio_link_url, '.'), 1)] = $cmsmasters_sermon_audio_link_url;
								}
								
								
								echo '<div class="cmsmasters_sermon_audio_content">' . 
									wp_audio_shortcode($attrs) . 
								'</div>';
						}
						
						
						if ($cmsmasters_sermon_download_link != '') {
							echo '<a class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_download" href="' . $cmsmasters_sermon_download_link . '" download>' . 
							'<span class="cmsmasters_sermon_media_title">' . esc_html__('Download', 'my-religion') . '</span>' . 
							'</a>';
						}
						
						
						if ($cmsmasters_sermon_pdf_link != '') {
							echo '<a target="_blank" class="cmsmasters_sermon_media_item cmsmasters_theme_icon_sermon_pdf" href="' . $cmsmasters_sermon_pdf_link . '">' . 
							'<span class="cmsmasters_sermon_media_title">' . esc_html__('PDF', 'my-religion') . '</span>' . 
							'</a>';
						}
						
					echo '</div>';
				}
			}
			
			
			if (get_the_content() != '') {
				echo '<div class="cmsmasters_sermon_content entry-content">' . "\n";
					
					the_content();
					
					
					wp_link_pages(array( 
						'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'my-religion') . ':</strong>', 
						'after' => '</div>', 
						'link_before' => ' [ ', 
						'link_after' => ' ] ' 
					));
					
				echo '</div>';
			}
		?>
	</article>
	
	<?php
	
	if ($cmsmasters_sermon_sharing_box == 'true') {
		my_religion_sharing_box();
	}
	
	
	if ($cmsmasters_option['my-religion' . '_sermon_nav_box']) {
		my_religion_prev_next_posts(esc_html__('Sermon', 'my-religion'));
	}
	
	
	if ($cmsmasters_sermon_author_box == 'true') {
		my_religion_author_box(esc_html__('About author', 'my-religion'), 'h3', 'h5');
	}
	
	
	if ($sermon_tags) {
		$tgsarray = array();
		
		
		foreach ($sermon_tags as $tagone) {
			$tgsarray[] = $tagone->term_id;
		}  
	} else {
		$tgsarray = '';
	}
	
	
	if ($cmsmasters_sermon_more_posts != 'hide') {
		my_religion_related( 
			'h3', 
			esc_html__('More sermons', 'my-religion'),
			esc_html__('No sermons found', 'my-religion'),
			$cmsmasters_sermon_more_posts, 
			$tgsarray, 
			$cmsmasters_option['my-religion' . '_sermon_more_posts_count'], 
			$cmsmasters_option['my-religion' . '_sermon_more_posts_pause'], 
			'sermon' 
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

