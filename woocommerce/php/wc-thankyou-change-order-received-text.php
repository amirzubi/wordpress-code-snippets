<?php
function woo_change_order_received_text( $str, $order ) {
    // Get items
    $items = $order->get_items();

    foreach ( $items as $item ) {
        // Get product
        $product = wc_get_product( $item['product_id'] );

        // Get product id
        $product_id = $product->get_id();

        // Equal to
        if ( $product_id == 114 ) {
            $str = '<a href="#"><button class="button">Jetzt starten</button></a>';
        }
		else {
			$str = 'Deine Bestellung ist bei uns eingegangen.<br>Bitte prüfe Deine Angaben. Falls etwas nicht stimmt, melde Dich bei: <a href="mailto:info@youremail.com?subject=Please%20change%20my%20details">info@youremail.com</a>';
		}	
    }

    return $str;
}
add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
?>