<?php
/**
 * @package 	WordPress
 * @subpackage 	My Religion
 * @version		1.0.5
 * 
 * Single Donation Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_donation_nav_box = get_post_meta(get_the_ID(), 'cmsmasters_donation_nav_box', true) ? get_post_meta(get_the_ID(), 'cmsmasters_donation_nav_box', true) : 'true';


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry" role="main">' . "\n\t";


if (have_posts()) : the_post();
	echo '<div class="donations opened-article">' . "\n";


?>
<!--_________________________ Start Standard Donation _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cmsmasters_donation_info">
		<?php
		if (!post_password_required() && has_post_thumbnail()) {
			echo '<div class="cmsmasters_donation_info_img">';
				my_religion_thumb(get_the_ID(), 'cmsmasters-square-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
			echo '</div>';
		}
		?>
		<div class="cmsmasters_donation_info_cont">
			<?php 
			cmsmasters_donation_heading(get_the_ID(), 'h2', false);
			
			cmsmasters_donation_amount_currency(get_the_ID(), 'post');
			
			cmsmasters_donation_campaign(get_the_ID(), 'post');
			?>
		</div>
	</div>
	<?php
	if (!is_anonymous_donation(get_the_ID()) && get_the_excerpt() != '') {
		echo '<div class="cmsmasters_donation_content entry-content">';
			
			the_excerpt();
			
		echo '</div>';
	}
	
	cmsmasters_donation_details(get_the_ID(), true);
	?>
</article>
<!--_________________________ Finish Standard Donation _________________________ -->
<?php 
	
	
	if ($cmsmasters_donation_nav_box == 'true') {
		my_religion_prev_next_posts(esc_html__('Donation', 'my-religion'));
	}
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

