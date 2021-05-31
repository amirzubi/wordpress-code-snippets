<?php
// WC - Add Shortcode - Display Product Price
function displayProductPrice( $atts ) {
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'product_price' );
 
	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	}
 
	$product = wc_get_product( $atts['id'] );
 
	if ( ! $product ) {
		return '';
	}
 
	return $product->get_price_html();
}
 
add_shortcode( 'product_price', 'displayProductPrice' );
?>