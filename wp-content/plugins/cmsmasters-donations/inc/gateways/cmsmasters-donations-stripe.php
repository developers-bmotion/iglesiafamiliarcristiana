<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Donations
 * @version		1.1.0
 * 
 * CMSMasters Donations Stripe Payment Gateway
 * Created by CMSMasters
 * 
 */


if (!defined('ABSPATH')) exit; // Exit if accessed directly


class Cmsmasters_Donations_Stripe extends Cmsmasters_Donations_Gateway {
	private $stripe_url = 'https://api.stripe.com/';
	
	
	public function __construct() {
		$this->gateway_id = 'stripe';
		
		$this->gateway_name = esc_attr__('Stripe Checkout', 'cmsmasters_donations');
		
		
		$this->settings = array( 
			array( 
				'name' => 		'cmsmasters_donations_stripe_testmode', 
				'std' => 		'no', 
				'label' => 		__('Test Mode', 'cmsmasters_donations'), 
				'desc' => 		__('Enable Test Mode', 'cmsmasters_donations'), 
				'options' => array( 
					'yes' => 	__('Yes', 'cmsmasters_donations'), 
					'no' => 	__('No', 'cmsmasters_donations') 
				), 
				'type' => 		'radio', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			), 
			array( 
				'name' => 		'cmsmasters_donations_stripe_secret_key', 
				'std' => 		'', 
				'label' => 		__('Secret Key', 'cmsmasters_donations'), 
				'desc' => 		__('Get your API keys from your stripe account.', 'cmsmasters_donations'), 
				'type' => 		'input', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			), 
			array( 
				'name' => 		'cmsmasters_donations_stripe_publishable_key', 
				'std' => 		'', 
				'label' => 		__('Publishable Key', 'cmsmasters_donations'), 
				'desc' => 		__('Get your API keys from your stripe account.', 'cmsmasters_donations'), 
				'type' => 		'input', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			), 
			array( 
				'name' => 		'cmsmasters_donations_stripe_name', 
				'std' => 		'', 
				'label' => 		__('Company Name', 'cmsmasters_donations'), 
				'desc' => 		__('Custom company name for stripe payment form.', 'cmsmasters_donations'), 
				'type' => 		'input', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			), 
			array( 
				'name' => 		'cmsmasters_donations_stripe_description', 
				'std' => 		'', 
				'label' => 		__('Description', 'cmsmasters_donations'), 
				'desc' => 		__('Enter default description for stripe payment form.', 'cmsmasters_donations'), 
				'type' => 		'input', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			), 
			array( 
				'name' => 		'cmsmasters_donations_stripe_image', 
				'std' => 		'', 
				'label' => 		__('Logo Image', 'cmsmasters_donations'), 
				'desc' => 		__('Choose a square image of your organization or logo for stripe payment form. <br />The recommended minimum size is 128x128px.', 'cmsmasters_donations'), 
				'type' => 		'upload', 
				'class' => 		'gateway-settings gateway-settings-stripe' 
			) 
		);
		
		
		parent::__construct();
		
		
		add_action('wp_enqueue_scripts', array($this, 'frontend_scripts'));
	}
	
	
	public function pay_for_donation($donation_id) {
		try { 
			$stripe_token = isset($_POST['stripe_token']) ? sanitize_text_field($_POST['stripe_token']) : '';
			
			
			if (empty($stripe_token)) {
				throw new Exception(__('Please make sure your card details have been entered correctly and your browser supports JavaScript.', 'cmsmasters_donations'));
			}
			
			
			$response = wp_remote_post($this->stripe_url . 'v1/charges', array( 
				'method' => 			'POST', 
				'headers' => array( 
					'Authorization' => 	'Basic ' . base64_encode(get_option('cmsmasters_donations_stripe_secret_key') . ':') 
				), 
				'body' => array( 
					'amount' => 		get_the_donation_amount($donation_id) * 100, 
					'currency' => 		strtolower(get_option('cmsmasters_donations_currency')), 
					'description' => 	__('New Donation', 'cmsmasters_donations') . ' \u0026quot;' . get_the_title($donation_id) . '\u0026quot;', 
					'capture' => 		'true', 
					'card' => 			$stripe_token 
				), 
				'timeout' => 			60, 
				'sslverify' => 			false, 
				'user-agent' => 		'cmsmasters_donations' 
			) );
			
			
			if (is_wp_error($response)) {
				throw new Exception(__( 'There was a problem connecting to the gateway.', 'cmsmasters_donations'));
			}
			
			
			if (empty($response['body'])) {
				throw new Exception(__('Empty response.', 'cmsmasters_donations'));
			}
			
			
			$parsed_response = json_decode($response['body']);
			
			
			if (!empty($parsed_response->error)) {
				throw new Exception($parsed_response->error->message);
			} elseif (empty($parsed_response->id)) {
				throw new Exception(__('Invalid response.', 'cmsmasters_donations'));
			} else {
				update_post_meta($donation_id, 'cmsmasters_charge_id', $parsed_response->id);
				
				update_post_meta($donation_id, 'cmsmasters_payment_id', $parsed_response->id);
				
				
				if (isset($parsed_response->fee)) {
					update_post_meta($donation_id, 'cmsmasters_stripe_fee', cmsmasters_number_format($parsed_response->fee));
				}
				
				
				$this->send_admin_email($donation_id, sprintf(__('Payment has been received in full for donation #%d - this donation has been published.', 'cmsmasters_donations'), $donation_id));
				
				
				$this->payment_complete($donation_id);
				
				
				return true;
			}
		} catch (Exception $e) {
			Cmsmasters_Donations_Form_Submit_Donation::add_error($e->getMessage());
			
			
			return false;
		}
	}
	
	
	public function frontend_scripts() {
		$posted = stripslashes_deep($_POST);
		
		
		if (isset($posted['donation_amount'])) {
			$donation_amount = absint($posted['donation_amount']);
		}
		
		
		if (isset($posted['donation_campaign'])) {
			$donation_campaign = absint($posted['donation_campaign']);
		}
		
		
		if (get_option('cmsmasters_donations_stripe_image')) {
			$stripe_image_id = explode('|', get_option('cmsmasters_donations_stripe_image'));
			
			$stripe_image_array = wp_get_attachment_image_src($stripe_image_id[0]);
		}
		
		
		wp_register_script('stripe', 'https://checkout.stripe.com/v2/checkout.js', array(), '2.0', true);
		
		wp_enqueue_script('stripe');
		
		
		wp_register_script('cmsmasters-donations-stripe', CMSMASTERS_DONATIONS_URL . 'js/jquery.cmsmastersDonations-stripe.js', array('jquery', 'stripe', 'cmsmastersValidation', 'cmsmastersValidationLang'), CMSMASTERS_DONATIONS_VERSION, true);
		
		wp_localize_script('cmsmasters-donations-stripe', 'cmsmasters_donations_stripe_params', array( 
			'confirm' => 		(get_option('cmsmasters_confirm_donation') == 1) ? 'donation_preview_submit_button' : 'donation_submit_button', 
			'key' => 			get_option('cmsmasters_donations_stripe_publishable_key'), 
			'name' => 			get_option('cmsmasters_donations_stripe_name') ? get_option('cmsmasters_donations_stripe_name') : get_bloginfo('name'), 
			'description' => 	get_option('cmsmasters_donations_stripe_description'), 
			'amount' => 		(!isset($donation_amount)) ? 0 : $donation_amount * 100, 
			'campaign' => 		(!isset($donation_campaign)) ? '' : $donation_campaign, 
			'image' => 			get_option('cmsmasters_donations_stripe_image') ? $stripe_image_array[0] : '', 
			'currency' => 		strtolower(get_option('cmsmasters_donations_currency')), 
			'label' => 			__('Donate', 'cmsmasters_donations') 
		) );
		
		wp_enqueue_script('cmsmasters-donations-stripe');
	}
}

return new Cmsmasters_Donations_Stripe();

