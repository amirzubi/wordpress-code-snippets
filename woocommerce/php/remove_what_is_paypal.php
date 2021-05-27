// WC - Remove "What is PayPal?"
add_filter( 'woocommerce_gateway_icon', 'bbloomer_remove_what_is_paypal', 10, 2 );
 
function bbloomer_remove_what_is_paypal( $icon_html, $gateway_id ) {
if( 'paypal' == $gateway_id ) {
   $icon_html = '<img src="/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png" alt="PayPal Acceptance Mark">';
}
return $icon_html;
}
