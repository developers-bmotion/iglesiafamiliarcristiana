/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Sermons
 * @version		1.0.2
 * 
 * CMSMasters Sermons Content Composer Schortcodes Extend
 * Created by CMSMasters
 * 
 */


/**
 * Sermons
 */
if (cmsmasters_composer_compatible() === 'true') {
	cmsmastersShortcodes.cmsmasters_sermons = {
		title : 	cmsmasters_sermons_shortcode.title, 
		icon : 		'admin-icon-sermons', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_sermons_shortcode.orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id, 
							'menu_order' : 	cmsmasters_shortcodes.choice_menu, 
							'rand' : 		cmsmasters_shortcodes.choice_rand, 
							'popular' : 	cmsmasters_shortcodes.choice_popular 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// Sermons Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_sermons_shortcode.number_title, 
				descr : 	cmsmasters_sermons_shortcode.number_subtitle + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_sermons_shortcode.number_descr_note + "</span>", 
				def : 		'12', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.categories, 
				descr : 	cmsmasters_sermons_shortcode.categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_sermons_shortcode.categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_sermons_srm_categories() 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_sermons_shortcode.col_count_descr, 
				def : 		'3', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}
			}, 
			// Metadata
			metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.metadata, 
				descr : 	cmsmasters_sermons_shortcode.metadata_descr, 
				def : 		'title,author,categories,date,excerpt', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'author' : 		cmsmasters_shortcodes.choice_author, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
				} 
			}, 
			// Media
			media : { 
				type : 		'checkbox', 
				title : 	cmsmasters_sermons_shortcode.media_title, 
				descr : 	cmsmasters_sermons_shortcode.media_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'hide' : 	cmsmasters_sermons_shortcode.choice_hide 
				} 
			}, 
			// Pagination
			pagination : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.pagination_title, 
				descr : 	cmsmasters_sermons_shortcode.pagination_descr, 
				def : 		'pagination', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'pagination' : 	cmsmasters_shortcodes.pagination_choice_pagination, 
							'disabled' : 	cmsmasters_sermons_shortcode.pagination_choice_disabled 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}

