<?php
function wc_amount_left_for_free_shipping_notice() {

if ( ! is_cart() ) { // Remove partial if you don't want to show it on cart/checkout
    return;
}

$packages = WC()->cart->get_shipping_packages();
$package = reset( $packages );
$zone = wc_get_shipping_zone( $package );

$cart_total = WC()->cart->get_displayed_subtotal();
if ( WC()->cart->display_prices_including_tax() ) {
    $cart_total = round( $cart_total - ( WC()->cart->get_discount_total() + WC()->cart->get_discount_tax() ), wc_get_price_decimals() );
} else {
    $cart_total = round( $cart_total - WC()->cart->get_discount_total(), wc_get_price_decimals() );
}
foreach ( $zone->get_shipping_methods( true ) as $k => $method ) {
    $min_amount = $method->get_option( 'min_amount' );


    if ( $method->id == 'free_shipping' && ! empty( $min_amount ) && $cart_total < $min_amount ) {
        $remaining = $min_amount - $cart_total;
        wc_add_notice( sprintf( 'Füge jetzt noch <strong>%s</strong> zu Deinem Warenkorb hinzu für kostenlosen Versand! <br><a href="/shop/">← Zurück zum Shop</a> ', wc_price( $remaining ) ) );
    }
}

}
add_action( 'wp', 'wc_amount_left_for_free_shipping_notice' );
?>