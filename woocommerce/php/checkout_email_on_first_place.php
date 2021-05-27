<?php
// WC - Checkout - Email on first place
add_filter( 'woocommerce_checkout_fields', 'misha_email_first' );
 
function misha_email_first( $checkout_fields ) {
	$checkout_fields['billing']['billing_email']['priority'] = 4;
	$checkout_fields['shipping']['shipping_email']['priority'] = 4;
	return $checkout_fields;
}
?>