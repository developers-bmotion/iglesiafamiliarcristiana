/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Donations
 * @version 	1.1.4
 * 
 * CMSMasters Donations Stripe Checkout Script
 * Created by CMSMasters
 * 
 */


(function ($) { 
	if (cmsmasters_donations_stripe_params.confirm === 'donation_submit_button') {
		var cmsmastersForm = $('#submit-donation-form');
		
		
		cmsmastersForm.validationEngine('attach', { 
			promptPosition : 		'topRight', 
			scroll : 				false, 
			autoPositionUpdate : 	true, 
			showArrow : 			false 
		} );
	} else {
		var cmsmastersForm = $('#donation_preview');
	}
	
	
	$(document).on('click', '#' + cmsmasters_donations_stripe_params.confirm, function () { 
		var cmsmastersButton = $(this), 
			cmsmastersToken = cmsmastersForm.find('input.stripe_token'), 
			cmsmastersDonationAmountValue = cmsmastersForm.find('input#donation_amount').val(), 
			cmsmastersDonationAmount = Number(cmsmastersDonationAmountValue).toFixed(2) * 100, 
			cmsmastersStripeAmount = (cmsmasters_donations_stripe_params.amount.toString() !== '0') ? cmsmasters_donations_stripe_params.amount : cmsmastersDonationAmount, 
			cmsmastersDonationCampaignSelect = cmsmastersForm.find('select#donation_campaign option:selected'), 
			cmsmastersDonationCampaign = (cmsmastersDonationCampaignSelect.val() !== '') ? cmsmastersDonationCampaignSelect.text().split(' - (') : cmsmastersDonationCampaignSelect.val().split('-'), 
			cmsmastersStripeCampaign = (cmsmasters_donations_stripe_params.campaign !== '') ? cmsmasters_donations_stripe_params.campaign : cmsmastersDonationCampaign[0], 
			cmsmastersDonationPaymentMethod = cmsmastersForm.find('input[name=donation_payment_method]:checked').val();
		
		
		if (cmsmastersToken.val()) {
			return true;
		}
		
		
		if ( 
			(cmsmasters_donations_stripe_params.confirm === 'donation_preview_submit_button' &&
			cmsmastersForm.data('method') === 'online' ) ||
			( 
				cmsmasters_donations_stripe_params.confirm === 'donation_submit_button' && 
				cmsmastersForm.validationEngine('validate') && 
				(!cmsmastersDonationPaymentMethod || cmsmastersDonationPaymentMethod !== 'offline') 
			) 
		) {
			var cmsmasters_token_action = function (res) { 
				cmsmastersForm.find('input.stripe_token').remove();
				
				cmsmastersForm.append('<input type="hidden" class="stripe_token" name="stripe_token" value="' + res.id + '" />');
				
				
				cmsmastersButton.trigger('click');
			};
			
			
			StripeCheckout.open( { 
				key : 				cmsmasters_donations_stripe_params.key, 
				name : 				cmsmasters_donations_stripe_params.name, 
				description : 		(cmsmastersStripeCampaign !== '') ? cmsmastersStripeCampaign : cmsmasters_donations_stripe_params.description, 
				image : 			cmsmasters_donations_stripe_params.image, 
				amount : 			cmsmastersStripeAmount, 
				currency : 			cmsmasters_donations_stripe_params.currency, 
				panelLabel : 		cmsmasters_donations_stripe_params.label + ' {{amount}}', 
				allowRememberMe : 	true, 
				token : 			cmsmasters_token_action 
			} );
			
			
			return false;
		}
    } );
} )(jQuery);

