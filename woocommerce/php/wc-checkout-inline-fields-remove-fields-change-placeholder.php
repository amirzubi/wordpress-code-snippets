<?php
// WC - Checkout - Inline Fields / Remove Fields / Change Placeholder

add_filter('woocommerce_checkout_fields', 'custom_checkout_billing_fields', 20, 1);
 function custom_checkout_billing_fields($fields)
 {
$domain = 'woocommerce';
// Remove billing/shipping address 2
unset($fields['billing']['billing_address_2']);
unset($fields['shipping']['shipping_address_2']);

// BILLING - Change class
$fields['billing']['billing_phone']['class'] = array('form-row-wide'); //  100%
$fields['billing']['billing_email']['class'] = array('form-row-wide'); //  100%
$fields['billing']['billing_address_1']['class'] = array('form-row-wide'); //  100%
$fields['billing']['billing_postcode']['class'] = array('form-row-first'); //  50%
$fields['billing']['billing_city']['class'] = array('form-row-last'); // 50%
$fields['billing']['billing_company']['class'] = array('form-row-wide'); // 100%
	 
// SHIPPING - Change class
$fields['shipping']['shipping_phone']['class'] = array('form-row-wide'); //  100%
$fields['shipping']['shipping_email']['class'] = array('form-row-wide'); //  100%
$fields['shipping']['shipping_address_1']['class'] = array('form-row-wide'); //  100%
$fields['shipping']['shipping_postcode']['class'] = array('form-row-first'); //  50%
$fields['shipping']['shipping_city']['class'] = array('form-row-last'); // 50%
$fields['shipping']['shipping_company']['class'] = array('form-row-wide'); // 100%

// BILLING - Change placeholder
$fields['billing']['billing_email']['placeholder'] = __('E-Mail', $domain);
$fields['billing']['billing_first_name']['placeholder'] = __('Vorname', $domain);
$fields['billing']['billing_last_name']['placeholder'] = __('Nachname', $domain);
$fields['billing']['billing_company']['placeholder'] = __('Firmenname', $domain);
$fields['billing']['billing_address_1']['placeholder'] = __('Straße und Hausnummer', $domain);
$fields['billing']['billing_postcode']['placeholder'] = __('PLZ', $domain);
$fields['billing']['billing_city']['placeholder'] = __('Ort', $domain);
$fields['billing']['billing_phone']['placeholder'] = __('Telefonnummer (optional)', $domain);
	 
// SHIPPING - Change placeholder
$fields['shipping']['shipping_email']['placeholder'] = __('E-Mail', $domain);
$fields['shipping']['shipping_first_name']['placeholder'] = __('Vorname', $domain);
$fields['shipping']['shipping_last_name']['placeholder'] = __('Nachname', $domain);
$fields['shipping']['shipping_company']['placeholder'] = __('Firmenname', $domain);
$fields['shipping']['shipping_address_1']['placeholder'] = __('Straße und Hausnummer', $domain);
$fields['shipping']['shipping_postcode']['placeholder'] = __('PLZ', $domain);
$fields['shipping']['shipping_city']['placeholder'] = __('Ort', $domain);
$fields['shipping']['shipping_phone']['placeholder'] = __('Telefonnummer (optional)', $domain);
	 

return $fields;
}
?>