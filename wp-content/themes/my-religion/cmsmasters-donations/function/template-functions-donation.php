<?php 
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.1.9
 * 
 * Template Functions for Campaign & Donation
 * Created by CMSMasters
 * 
 */


/********** Template Functions for Campaign **********/

/* Get Campaigns Heading Function */
function cmsmasters_campaign_heading($cmsmasters_id, $tag = 'h1', $link = true, $show = true) { 
	$out = '<header class="cmsmasters_campaign_header entry-header">' . 
		'<' . $tag . ' class="cmsmasters_campaign_title entry-title">' . 
			($link ? '<a href="' . esc_url(get_permalink($cmsmasters_id)) . '">' : '') . 
				cmsmasters_title($cmsmasters_id, false) . 
			($link ? '</a>' : '') . 
		'</' . $tag . '>' . 
	'</header>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaigns Date Function */
function cmsmasters_campaign_date($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_campaign_date">' . 
			esc_html__('On', 'my-religion') . ' ' . 
			'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
				get_the_date() . 
			'</abbr>' . 
			'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
				get_the_modified_date() . 
			'</abbr>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = my_religion_get_global_options();
		
		$out = '';
		
		
		if ($cmsmasters_option['my-religion' . '_donations_campaign_date']) {
			$out .= '<span class="cmsmasters_campaign_date">' . 
				'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
					get_the_date() . 
				'</abbr>' . 
				'<abbr class="dn date updated" title="' . esc_attr(get_the_modified_date()) . '">' . 
					get_the_modified_date() . 
				'</abbr>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaigns Author Function */
function cmsmasters_campaign_author($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = '<span class="cmsmasters_campaign_user_name">' . 
			esc_html__('By', 'my-religion') . ' ' . 
			'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'my-religion') . ' ' . get_the_author_meta('display_name') . '" class="vcard author"><span class="fn" rel="author">' . get_the_author_meta('display_name') . '</span></a>' . 
		'</span>';
	} elseif ($template_type == 'post') {
		$cmsmasters_option = my_religion_get_global_options();
		
		$out = '';
		
		
		if ($cmsmasters_option['my-religion' . '_donations_campaign_author']) {
			$out .= '<span class="cmsmasters_campaign_user_name">' . 
				esc_html__('by', 'my-religion') . ' ' . 
				'<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" title="' . esc_attr__('Posts by', 'my-religion') . ' ' . get_the_author_meta('display_name') . '" class="vcard author"><span class="fn" rel="author">' . get_the_author_meta('display_name') . '</span></a>' . 
			'</span>';
		}
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaigns Category Function */
function cmsmasters_campaign_category($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_campaign_category">' . 
				get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
			'</span>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = my_religion_get_global_options();
			
			$out = '';
			
			
			if ($cmsmasters_option['my-religion' . '_donations_campaign_cat']) {
				$out .= '<span class="cmsmasters_campaign_category">' . 
					get_the_term_list($cmsmasters_id, $taxonomy, esc_html__('in', 'my-religion') . ' ', ', ', '') . 
				'</span>';
			}
		}
		
		
		if ($show) {
			wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Campaigns Tags Function */
function cmsmasters_campaign_tags($cmsmasters_id, $taxonomy, $template_type = 'page', $show = true) {
	if (get_the_terms($cmsmasters_id, $taxonomy)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_campaign_tags">' . 
				get_the_term_list($cmsmasters_id, $taxonomy, '', ', ', '') . 
			'</span>';
		} else if ($template_type == 'post') {
			$cmsmasters_option = my_religion_get_global_options();
			
			$out = '';
			
			
			if ($cmsmasters_option['my-religion' . '_donations_campaign_tag']) {
				$out .= '<span class="cmsmasters_campaign_tags">' . 
					get_the_term_list($cmsmasters_id, $taxonomy, esc_html__('tags', 'my-religion') . ' ', ', ', '') . 
				'</span>';
			}
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Campaigns Content/Excerpt Function */
function cmsmasters_campaign_exc_cont($content = '', $word_count = 55, $show = true) {
	if ($content != '') {
		$content = preg_replace('~\[[^\]]+\]~', '', $content);
		
		$words = explode(' ', $content);
		
		if (count($words) > $word_count) {
			array_splice($words, $word_count);
			
			$content = implode(' ', $words);
		}
		
		
		$out = cmsmasters_divpdel('<div class="cmsmasters_campaign_content entry-content">' . "\n" . 
			'<p>' . $content . '</p>' . 
		'</div>' . "\n");
		
		
		if ($show) {
			echo my_religion_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Campaigns Like Function */
function cmsmasters_campaign_like($template_type = 'page', $show = true) {
	if ($template_type == 'page') {
		$out = cmsmastersLike(false);
	} elseif ($template_type == 'post') {
		$cmsmasters_option = my_religion_get_global_options();
		
		$out = '';
		
		
		if ($cmsmasters_option['my-religion' . '_donations_campaign_like']) {
			$out = cmsmastersLike(false);
		}
	}
	
	
	if ($show) {
		echo my_religion_return_content($out);
	} else {
		return $out;
	}
}



/* Get Campaigns Comments Function */
function cmsmasters_campaign_comments($template_type = 'page', $show = true) {
	if (comments_open()) {
		if ($template_type == 'page') {
			$out = '<a class="cmsmasters_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'my-religion') . ' ' . get_the_title() . '">' . 
				'<span>' . get_comments_number() . '</span>' . 
			'</a>';
		} elseif ($template_type == 'post') {
			$cmsmasters_option = my_religion_get_global_options();
			
			$out = '';
			
			
			if ($cmsmasters_option['my-religion' . '_donations_campaign_comment']) {
				$out = '<a class="cmsmasters_post_comments cmsmasters_theme_icon_comment" href="' . esc_url(get_comments_link()) . '" title="' . esc_attr__('Comment on', 'my-religion') . ' ' . get_the_title() . '">' . 
					'<span>' . get_comments_number() . '</span>' . 
				'</a>';
			}
		}
		
		
		if ($show) {
			echo my_religion_return_content($out);
		} else {
			return $out;
		}
	}
}



/* Get Campaign Rest Amount Function */
function cmsmasters_campaign_rest_amount($cmsmasters_id, $show = true) {
	$target = get_the_campaign_target($cmsmasters_id);
	
	$funds = get_the_funds($cmsmasters_id);
	
	$togo_number = $target - ($funds > $target ? $target : $funds);
	
	
	$out = '<span class="cmsmasters_campaign_rest_amount">' . 
		sprintf(esc_attr__('%s To Go', 'my-religion'), cmsmasters_donations_currency($togo_number)) . 
	'</span>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaign Target Function */
function cmsmasters_campaign_target($cmsmasters_id, $show = true) {
	$target = get_the_campaign_target($cmsmasters_id, true);
	
	
	$out = '<div class="cmsmasters_campaign_target">' . 
		'<div class="cmsmasters_campaign_target_inner">' . 
			'<h2 class="cmsmasters_campaign_target_number">' . cmsmasters_donations_currency($target) . '</h2>' . 
			'<h5 class="cmsmasters_campaign_target_title">' . esc_html__('Campaign Target', 'my-religion') . '</h5>' . 
		'</div>' . 
	'</div>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaign Donations Count Function */
function cmsmasters_campaign_donations_count($cmsmasters_id, $show = true) {
	$funds_number = get_the_funds($cmsmasters_id, true);
	
	
	$out = '<div class="cmsmasters_campaign_donations_count">' . 
		'<div class="cmsmasters_campaign_donations_count_inner">' . 
			'<h2 class="cmsmasters_campaign_donations_count_number">' . $funds_number . '</h2>' . 
			'<h5 class="cmsmasters_campaign_donations_count_title">' . esc_html__('Donations', 'my-religion') . '</h5>' . 
		'</div>' . 
	'</div>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Campaign Donated Function */
function cmsmasters_campaign_donated($cmsmasters_id, $template_type = 'page', $layout_type = 'horizontal', $togo = true, $show = true, $color = '') {
	$target = get_the_campaign_target($cmsmasters_id);
	
	$funds = get_the_funds($cmsmasters_id);
	
	
	$progress = ($target != 0 ? floor((100 / $target) * $funds) : 0);
	
	$progress = ($progress > 100 ? 100 : $progress);
	
	$togo_number = $target - ($funds > $target ? $target : $funds);
	
	
	if ($template_type == 'page') {
		if ($layout_type == 'horizontal') {
			$unique_id = uniqid('', true);
			$unique_id = strtr($unique_id, '.', '_');
			
			$out = '<div class="cmsmasters_campaign_donated_percent">' . 
				'<style type="text/css">' . 
					'.cmsmasters_stats.shortcode_animated #cmsmasters_stat_' . $unique_id . '.cmsmasters_stat { ' . 
						'width:' . $progress . '%; ' . 
					'} ' . 
				'</style>' . 
				'<div class="cmsmasters_stats stats_mode_bars stats_type_horizontal">' . 
					'<div class="cmsmasters_stat_wrap">' . 
						'<div class="cmsmasters_stat_title_wrap">' . 
							'<span class="cmsmasters_stat_counter_wrap">' . 
								'<span class="cmsmasters_stat_counter">' . $progress . '</span>' . 
								'<span class="cmsmasters_stat_units">%</span>' . 
							'</span>' . 
							'<span class="cmsmasters_stat_title">' . esc_html__('Donated', 'my-religion') . '</span>' . 
						'</div>' . 
						'<div id="cmsmasters_stat_' . $unique_id . '" class="cmsmasters_stat" data-percent="' . $progress . '">' . 
							'<div class="cmsmasters_stat_inner"></div>' . 
						'</div>' . 
						'<span class="cmsmasters_stat_subtitle">' . sprintf(esc_attr__('%s to go', 'my-religion'), cmsmasters_donations_currency($togo_number)) . '</span>' . 
					'</div>' . 
				'</div>' . 
			'</div>';
		} elseif ($layout_type == 'vertical') {
			$out = '<div class="cmsmasters_campaign_donated_percent">' . 
				do_shortcode('[cmsmasters_stats mode="circles" count="1"][cmsmasters_stat progress="' . $progress . '"' . (($color != '') ? ' color="' . $color . '"' : '') . ']' . esc_html__('Donated', 'my-religion') . '[/cmsmasters_stat][/cmsmasters_stats]') . 
			'</div>';
		}
	} elseif ($template_type == 'post') {
		$out = '<div class="cmsmasters_campaign_donated">' . 
			'<div class="cmsmasters_campaign_donated_inner">' . 
				do_shortcode('[cmsmasters_stats count="1"][cmsmasters_stat progress="' . $progress . '"' . (($togo) ? ' subtitle="' . sprintf(esc_attr__('%s to go', 'my-religion'), cmsmasters_donations_currency($togo_number)) . '"' : '') . ']' . esc_html__('Donated', 'my-religion') . '[/cmsmasters_stat][/cmsmasters_stats]') . 
			'</div>' . 
		'</div>';
	}
	
	
	if ($show) {
		echo my_religion_return_content($out);
	} else {
		return $out;
	}
}



/* Get Campaign Donate Button Function */
function cmsmasters_campaign_donate_button($cmsmasters_id, $show = true) {
	$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
	
	$cmsmasters_campaign_read_more = get_post_meta($cmsmasters_id, 'cmsmasters_campaign_read_more', true);
	
	if ($cmsmasters_campaign_read_more == '') {
		$cmsmasters_campaign_read_more = esc_html__('Donate Now', 'my-religion');
	}
	
	
	$out = '<div class="cmsmasters_campaign_donate_button">' . 
		'<div class="cmsmasters_campaign_donate_button_inner">' . 
			'<a class="button" href="' . add_query_arg('campaign_id', urlencode($cmsmasters_id), get_permalink($cmsmasters_donations_form_page)) . '">' . esc_html($cmsmasters_campaign_read_more) . '</a>' . 
		'</div>' . 
	'</div>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/********** Template Functions for Donation **********/

/* Get Donations Heading Function */
function cmsmasters_donation_heading($cmsmasters_id, $tag = 'h1', $link = true, $show = true) { 
	$out = '<header class="cmsmasters_donation_header entry-header">' . 
		'<' . $tag . ' class="cmsmasters_donation_title entry-title">' . 
			($link ? '<a href="' . esc_url(get_permalink()) . '">' : '');
			
				if (
					!is_anonymous_donation($cmsmasters_id) && 
					(
						get_the_donator_meta('firstname', $cmsmasters_id) || 
						get_the_donator_meta('lastname', $cmsmasters_id)
					)
				) {
					$out .= get_the_donator_meta('firstname', $cmsmasters_id) . ' ' . get_the_donator_meta('lastname', $cmsmasters_id);
				} else {
					$out .= esc_html__('Anonym', 'my-religion');
				}
				
			$out .= ($link ? '</a>' : '') . 
		'</' . $tag . '>' . 
	'</header>';
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}



/* Get Donation Amount Currency Function */
function cmsmasters_donation_amount_currency($cmsmasters_id, $template_type = 'page', $show = true) { 
	if (get_the_donation_amount_currency($cmsmasters_id)) {
		if ($template_type == 'page') {
			$cmsmasters_donation_amount = get_the_donation_amount_currency($cmsmasters_id);
			
			$out = '<span class="cmsmasters_donation_amount_currency">' . 
				substr($cmsmasters_donation_amount, 0, -3) . 
			'</span>' . 
			'<span class="cmsmasters_donation_amount_title">' . esc_html__('Donated', 'my-religion') . '</span>';
		} elseif ($template_type == 'post') {
			$out = '<span class="cmsmasters_donation_amount_currency">' . 
				get_the_donation_amount_currency($cmsmasters_id) . 
				((is_recurring_donation($cmsmasters_id)) ? ' ' . get_the_recurrence_period($cmsmasters_id) : ' ' . esc_html__('One-time', 'my-religion')) . 
			'</span>';
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Donation Amount Currency Function */
function cmsmasters_donation_campaign($cmsmasters_id, $template_type = 'page', $show = true) { 
	if (get_the_donation_campaign($cmsmasters_id)) {
		if ($template_type == 'page') {
			$out = '<span class="cmsmasters_donation_campaign">' . 
				get_the_donation_campaign($cmsmasters_id, true) . 
			'</span>';
		} elseif ($template_type == 'post') {
			$out = '<span class="cmsmasters_donation_campaign">' . 
				get_the_donation_campaign($cmsmasters_id, true) . 
			'</span>';
		}
		
		
		if ($show) {
			echo wp_kses_post($out);
		} else {
			return wp_kses_post($out);
		}
	}
}



/* Get Donation Details Info Function */
function cmsmasters_donation_details($cmsmasters_id, $show = true) {
	$out = '';
	
	
	if (!is_anonymous_donation($cmsmasters_id)) {
		$out .= '<div class="cmsmasters_donation_details entry-meta">';
		
			if (get_the_donator_meta('details_title', get_the_ID()) != '') {
				$out .= '<h5>' . get_the_donator_meta('details_title', get_the_ID()) . '</h5>';
			}
			
			$out .= '<div class="cmsmasters_row">' . 
				'<div class="cmsmasters_row_margin">' . 
					'<div class="cmsmasters_column one_half">';
					
						if (get_the_donator_meta('firstname', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('First Name:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('firstname', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('lastname', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Last Name:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('lastname', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('email', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Email:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . '<a href="mailto:' . esc_html(get_the_donator_meta('email', $cmsmasters_id)) . '">' . esc_html(get_the_donator_meta('email', $cmsmasters_id)) . '</a></span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('company', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Company:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('company', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('phone', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Phone:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('phone', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('website', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Website:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value"><a href="' . esc_url(get_the_donator_meta('website', $cmsmasters_id)) . '">' . esc_url(get_the_donator_meta('website', $cmsmasters_id)) . '</a></span>' . 
							'</div>';
						}
						
					$out .= '</div>' . 
					'<div class="cmsmasters_column one_half">';
					
						if (get_the_donator_meta('address', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Address:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('address', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('city', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('City:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('city', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('state', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('State / Province:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('state', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('zip', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Postal / Zip Code:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('zip', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
						if (get_the_donator_meta('country', $cmsmasters_id)) {
							$out .= '<div class="cmsmasters_donation_details_item">' . 
								'<span class="cmsmasters_donation_details_item_title">' . esc_html__('Country:', 'my-religion') . ' </span>' . 
								'<span class="cmsmasters_donation_details_item_value">' . esc_html(get_the_donator_meta('country', $cmsmasters_id)) . '</span>' . 
							'</div>';
						}
						
					$out .= '</div>' . 
				'</div>' . 
			'</div>' . 
		'</div>';
	}
	
	
	if ($show) {
		echo wp_kses_post($out);
	} else {
		return wp_kses_post($out);
	}
}

