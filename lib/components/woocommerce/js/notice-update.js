/**
 * Trigger AJAX request to save state when the WooCommerce notice is dismissed.
 *
 * @version 1.0.0
 *
 * @author 	Chuck Smith
 * @license GPL-2.0-or-later
 * @package ModulusPro
 */

jQuery( document ).on(
	'click', '.genesis-sample-woocommerce-notice .notice-dismiss', function() {

		jQuery.ajax(
			{
				url: ajaxurl,
				data: {
					action: 'genesis_sample_dismiss_woocommerce_notice'
				}
			}
		);

	}
);
