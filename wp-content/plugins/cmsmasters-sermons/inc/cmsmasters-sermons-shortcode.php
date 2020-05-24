<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.2
 * 
 * CMSMasters Sermons Shortcodes Functions
 * Created by CMSMasters
 * 
 */


class Cmsmasters_Sermons_Shortcode {

public function __construct() {
	add_shortcode('cmsmasters_sermons', array($this, 'cmsmasters_sermons'));
}


/**
 * Sermons
 */
public $sermons_atts;

public function cmsmasters_sermons($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_sermons_atts_filter', array( 
		'orderby' => 			'', 
		'order' => 				'', 
		'count' => 				'', 
		'categories' => 		'', 
		'columns' => 			'', 
		'metadata' => 			'', 
		'media' => 				'', 
		'pagination' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'sermons';
	
	$shortcode_path = CMSMASTERS_SERMONS_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		ob_start();
		
		
		include(locate_template($shortcode_path));
		
		
		$template_out = ob_get_contents();
		
		
		ob_end_clean();
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$this->sermons_atts = array(
		'cmsmasters_srm_media' => 		$media, 
		'cmsmasters_srm_columns' => 	$columns, 
		'cmsmasters_srm_metadata' => 	$metadata 
	);
	
	
	$out = '';
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args = array( 
		'post_type' => 				'sermon', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	if ($pagination == 'pagination') {
		if (get_query_var('paged')) { 
			$paged = get_query_var('paged'); 
		} elseif (get_query_var('page')) { 
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		
		
		$args['paged'] = $paged;
	}
	
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => 	'srm-categs', 
				'field' => 		'slug', 
				'terms' => 		$cat_array 
			)
		);
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsmasters_likes';
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($query->have_posts()) :
		
		$out = '<div id="cmsmasters_sermons_' . $unique_id . '" class="cmsmasters_sermons' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
		
        while ($query->have_posts()) : $query->the_post();
			
			
			$out .= cmsmasters_sermons_ob_load_template('cmsmasters-sermons/post-type/standard.php', $this->sermons_atts);
			
		
		endwhile;
		
		if ($pagination == 'pagination') {
			$out .= '<div class="cmsmasters_wrap_more_posts cmsmasters_wrap_more_items">';
			
				if ($pagination == 'pagination' && $query->max_num_pages > 1) {
					$out .= cmsmasters_pagination($query->max_num_pages);
				}
			
			$out .= '</div>';
		}
		
		
		$out .= '</div>' . "\n";
		
    endif;
	
	
	wp_reset_query();
	
	
	return $out;
}

}

new Cmsmasters_Sermons_Shortcode();