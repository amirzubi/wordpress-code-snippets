<?php
add_action( 'woocommerce_before_shop_loop_item_title', 'display_sold_out__badge_loop_woocommerce' );
 
function display_sold_out__badge_loop_woocommerce() {
    global $product;
    if ( ! $product->is_in_stock() ) {
        echo '<span class="soldout">Sold out</span>';
    }
}
?>