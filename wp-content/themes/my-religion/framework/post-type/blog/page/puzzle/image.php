<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.0
 * 
 * Blog Page Puzzle Image Post Format Template
 * Created by CMSMasters
 * 
 */





$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);

$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);


$post_sort_categs = get_the_terms(0, 'category');

if ($post_sort_categs != '') {
	$post_categs = '';
	
	foreach ($post_sort_categs as $post_sort_categ) {
		$post_categs .= ' ' . $post_sort_categ->slug;
	}
	
	$post_categs = ltrim($post_categs, ' ');
}

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_puzzle_type'); ?> data-category="<?php echo esc_attr($post_categs); ?>">
	<div class="cmsmasters_post_cont">
		<?php 
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				my_religion_thumb(get_the_ID(), 'cmsmasters-project-thumb', false, 'img_' . get_the_ID(), true, false, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				my_religion_thumb(get_the_ID(), 'cmsmasters-project-thumb', false, 'img_' . get_the_ID(), true, false, true, true, false);
			} else {
				my_religion_post_format_icon_placeholder(get_the_ID(), 'image');
			}
		} else {
			my_religion_post_format_icon_placeholder(get_the_ID(), 'image');
		}
		
		
		echo '<div class="puzzle_post_content_wrapper">' . 
			'<div class="puzzle_post_content_wrap">';
			
			$date ? my_religion_get_post_date('page', 'puzzle') : '';
			
			my_religion_post_heading(get_the_ID(), 'h5');
			
			my_religion_post_exc_cont();
			
			$more ? my_religion_post_more(get_the_ID()) : '';
			
			
			if ($author || $categories || $likes || $comments) {
				echo '<footer class="cmsmasters_post_footer entry-meta">' . 
					'<div class="cmsmasters_post_footer_info">';
						
						$comments ? my_religion_get_post_comments('page') : '';
						
						$likes ? my_religion_get_post_likes('page') : '';
						
					echo '</div>';
					
					
					$author ? my_religion_get_post_author('page') : '';
					
					$categories ? my_religion_get_post_category(get_the_ID(), 'category', 'page') : '';
					
				echo '</footer>';
			}
			
			
		echo '</div>' . 
		'</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

