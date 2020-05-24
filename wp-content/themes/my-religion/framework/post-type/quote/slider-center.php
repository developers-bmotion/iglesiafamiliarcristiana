<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.4
 * 
 * Quotes Boxed Slider Format Template
 * Created by CMSMasters
 * 
 */



?>

<!--_________________________ Start Quotes Boxed Slider Article _________________________ -->
<?php
echo '<article class="cmsmasters_quote_inner">';
 
	if ($quote_image != '') {
		echo '<figure class="cmsmasters_quote_image">' . 
			wp_get_attachment_image(strstr($quote_image, '|', true), 'cmsmasters-square-thumb') . 
		'</figure>';
	} else {
		echo '<div class="cmsmasters_quote_placeholder"></div>';
	}
	
	
	echo cmsmasters_divpdel('<div class="cmsmasters_quote_content">' . 
		do_shortcode(wpautop($quote_content)) . 
	'</div>');
	
	
	if ($quote_name != '' || $quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
		echo '<header class="cmsmasters_quote_header">' . 
			'<h4 class="cmsmasters_quote_title">' . esc_html($quote_name) . '</h4>';
			
			if ($quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
				echo '<div class="cmsmasters_quote_subtitle_wrap">' . 
					
					($quote_subtitle != '' ? '<h4 class="cmsmasters_quote_subtitle">' . esc_html($quote_subtitle) . '</h4>' : '');
					
					
					if ($quote_website != '' || $quote_link != '') {
						echo '<span class="cmsmasters_quote_site">' . 
							($quote_link != '' ? '<a href="' . esc_url($quote_link) . '" target="_blank">' : '') . 
							
							($quote_website != '' ? esc_html($quote_website) : esc_html($quote_link)) . 
							
							($quote_link != '' ? '</a>' : '') . 
						'</span>';
					}
					
				echo '</div>';
			}
			
		echo '</header>';
	}
?>
</article>
<!--_________________________ Finish Quotes Boxed Slider Article _________________________ -->

