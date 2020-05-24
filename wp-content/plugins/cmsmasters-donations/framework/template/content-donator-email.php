<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Donations
 * @version		1.0.0
 * 
 * CMSMasters Donations Donator Email Template
 * Created by CMSMasters
 * 
 */


?>
<?php the_title(); ?>: <?php echo get_permalink(); ?>


** <?php _e( 'Campaign:', 'cmsmasters_donations' ); ?> <?php echo get_the_donation_campaign(); ?>

** <?php _e( 'Amount:', 'cmsmasters_donations' ); ?> <?php echo get_the_donation_amount_currency(); ?>

** <?php _e( 'Recurring donation:', 'cmsmasters_donations' ); ?> <?php is_recurring_donation(); ?>


----
