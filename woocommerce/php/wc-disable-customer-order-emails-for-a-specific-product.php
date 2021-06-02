<?php
function change_email_recipient_depending_of_product_id( $recipient, $order ) {
    global $woocommerce;
    $items = $order->get_items();
    foreach ( $items as $item ) {
        $product_id = $item['product_id'];
        if ( $product_id == 12514 ) {
            $recipient = '';
        }
        return $recipient;
    }
}
add_filter( 'woocommerce_email_recipient_customer_processing_order', 'change_email_recipient_depending_of_product_id', 10, 2 );
add_filter( 'woocommerce_email_recipient_customer_completed_order', 'change_email_recipient_depending_of_product_id', 10, 2 );
?>