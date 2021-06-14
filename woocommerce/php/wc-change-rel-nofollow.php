<?php
add_filter( 'woocommerce_loop_add_to_cart_link', 'add_to_cart_dofollow', 10, 2 );
function add_to_cart_dofollow($html, $product){
	$html = sprintf( '<a rel="dofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $quantity ) ? $quantity : 1 ),
		esc_attr( $product->get_id() ),
		esc_attr( $product->get_sku() ),
		esc_attr( isset( $class ) ? $class : 'button' ),
		esc_html( $product->add_to_cart_text() )
	);
	return $html;
}
?>