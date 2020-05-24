<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.0
 * 
 * Posts Slider Standard Post Format Template
 * Created by CMSMasters
 * 
 */




$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && my_religion_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;

?>

<!--_________________________ Start Standard Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
	<div class="cmsmasters_slider_post_outer">
	<?php
		$date ? my_religion_get_slider_post_date('post') : '';
		
		$title ? my_religion_slider_post_heading(get_the_ID(), 'post', 'h3') : '';
		
		
		if ($author || $categories || $likes || $comments) {
			echo '<div class="cmsmasters_slider_post_inner">';
				
				if ($likes || $comments) {
					echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
						
						$likes ? my_religion_slider_post_like('post') : '';
						
						$comments ? my_religion_get_slider_post_comments('post') : '';
						
					echo '</footer>';
				}
				
				
				if ($author || $categories) {
					echo '<div class="cmsmasters_slider_post_cont_info entry-meta">';
						
						$author ? my_religion_get_slider_post_author('post') : '';
						
						$categories ? my_religion_get_slider_post_category(get_the_ID(), 'category', 'post') : '';
						
					echo '</div>';
				}
				
			echo '</div>';
		}
		
		
		my_religion_thumb_rollover(get_the_ID(), 'cmsmasters-blog-masonry-thumb', false, false, false, false, false, false, false, false, true, false, false);
		
		$excerpt ? my_religion_slider_post_exc_cont('post') : '';
		
		$more ? my_religion_slider_post_more(get_the_ID()) : '';
		
	?>
	</div>
</article>
<!--_________________________ Finish Standard Article _________________________ -->

