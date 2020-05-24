/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.1.5
 * 
 * Visual Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */
 

/**
 * Blog Extend
 */

var blog_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_blog.fields) {
	if (id === 'layout_mode') {
		cmsmastersShortcodes.cmsmasters_blog.fields[id]['choises']['puzzle'] = composer_shortcodes_extend.blog_field_layout_mode_puzzle;
		
		
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else if (id === 'filter_text') { 
		delete cmsmastersShortcodes.cmsmasters_blog.fields[id];
	} else {
		blog_new_fields[id] = cmsmastersShortcodes.cmsmasters_blog.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_blog.fields = blog_new_fields;



/**
 * Portfolio Extend
 */

var portfolio_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_portfolio.fields) {
	if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = '3';
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_grid') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,excerpt,categories,rollover,more';
		
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['more'] = cmsmasters_shortcodes.choice_more;
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'metadata_puzzle') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['def'] = 'title,categories,comments,likes';
		
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['choises']['rollover'];
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'gap') {
		cmsmastersShortcodes.cmsmasters_portfolio.fields[id]['depend'] = 'layout:puzzle';
		
		
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else if (id === 'filter_text') { 
		delete cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	} else {
		portfolio_new_fields[id] = cmsmastersShortcodes.cmsmasters_portfolio.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_portfolio.fields = portfolio_new_fields;



/**
 * Quotes Extend
 */

var quotes_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_quotes.fields) {
	if (id === 'mode') {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
		
		
		quotes_new_fields['type'] = { 
			type : 		'radio', 
			title : 	composer_shortcodes_extend.quotes_field_slider_type_title, 
			descr : 	composer_shortcodes_extend.quotes_field_slider_type_descr, 
			def : 		'box', 
			required : 	true, 
			width : 	'half', 
			choises : { 
						'box' : 	composer_shortcodes_extend.quotes_field_type_choice_box, 
						'center' : 	composer_shortcodes_extend.quotes_field_type_choice_center 
			}, 
			depend : 	'mode:slider' 
		};
	} else {
		quotes_new_fields[id] = cmsmastersShortcodes.cmsmasters_quotes.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_quotes.fields = quotes_new_fields;



/**
 * Posts Slider Extend
 */

var cmsmasters_posts_slider_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_posts_slider.fields) {
	if (id === 'columns') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = '3';
		
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['depend'];  
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'amount') {
		delete cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'blog_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,excerpt,date,categories,author,comments,likes,more';
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else if (id === 'portfolio_metadata') {
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['def'] = 'title,excerpt,categories,more';
		
		cmsmastersShortcodes.cmsmasters_posts_slider.fields[id]['choises']['more'] = cmsmasters_shortcodes.choice_more;
		
		
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	} else {
		cmsmasters_posts_slider_new_fields[id] = cmsmastersShortcodes.cmsmasters_posts_slider.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_posts_slider.fields = cmsmasters_posts_slider_new_fields;



/**
 * Timetable Extend
 */

if (cmsmasters_composer_timetable() === 'true') {
	var timetable_new_fields = {};


	for (var id in cmsmastersShortcodes.cmsmasters_timetable.fields) {
		if (id === 'box_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hover_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hover_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_txt_color;
			
			timetable_new_fields['box_bd_color'] = { 
				type : 		'rgba', 
				title : 	composer_shortcodes_extend.timetable_field_box_bd_color_title, 
				descr : 	'', 
				def : 		composer_shortcodes_extend.box_bd_color, 
				required : 	false, 
				width : 	'half' 
			};
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hover_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hover_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hours_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hours_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'box_hours_hover_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.box_hours_hover_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row1_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row1_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row1_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row1_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row2_bg_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row2_bg_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else if (id === 'row2_txt_color') {
			cmsmastersShortcodes.cmsmasters_timetable.fields[id]['def'] = composer_shortcodes_extend.row2_txt_color;
			
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		} else {
			timetable_new_fields[id] = cmsmastersShortcodes.cmsmasters_timetable.fields[id];
		}
	}


	cmsmastersShortcodes.cmsmasters_timetable.fields = timetable_new_fields;
}



/**
 * Featured Campaign Extend
 */
if (cmsmasters_composer_donations() === 'true') {
	var cmsmasters_featured_campaign_new_fields = {};


	for (var id in cmsmastersShortcodes.cmsmasters_featured_campaign.fields) {
		if (id === 'campaign_metadata') {
			cmsmasters_featured_campaign_new_fields['campaign_color'] = { 
				type : 		'rgba', 
				title : 	composer_shortcodes_extend.featured_campaign_color_title, 
				descr : 	'', 
				def : 		composer_shortcodes_extend.featured_campaign_color, 
				required : 	false, 
				width : 	'half' 
			};
			
			cmsmasters_featured_campaign_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_campaign.fields[id];
		} else {
			cmsmasters_featured_campaign_new_fields[id] = cmsmastersShortcodes.cmsmasters_featured_campaign.fields[id];
		}
	}


	cmsmastersShortcodes.cmsmasters_featured_campaign.fields = cmsmasters_featured_campaign_new_fields;
}



/**
 * Heading Extend
 */

var cmsmasters_heading_new_fields = {};


for (var id in cmsmastersShortcodes.cmsmasters_heading.fields) {
	if (id === 'font_weight') {
		cmsmasters_heading_new_fields['tablet_check'] = { 
			type : 		'checkbox', 
			title : 	composer_shortcodes_extend.heading_tablet_check, 
			descr : 	'', 
			def : 		'false', 
			required : 	false, 
			width : 	'half',  
			choises : { 
				'true' : cmsmasters_shortcodes.choice_enable 
			} 
		};
		cmsmasters_heading_new_fields['tablet_font_size'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_tablet_font_size, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'tablet_check:true' 
		};
		cmsmasters_heading_new_fields['tablet_line_height'] = { 
			type : 		'input', 
			title : 	composer_shortcodes_extend.heading_tablet_line_height, 
			descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			depend : 	'tablet_check:true' 
		};
		
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	} else {
		cmsmasters_heading_new_fields[id] = cmsmastersShortcodes.cmsmasters_heading.fields[id];
	}
}


cmsmastersShortcodes.cmsmasters_heading.fields = cmsmasters_heading_new_fields;
