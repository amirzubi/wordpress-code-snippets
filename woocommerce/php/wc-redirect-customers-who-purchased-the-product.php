<?php
add_action( 'template_redirect', 'single_product_redirect_logged_in_purchased' );

function single_product_redirect_logged_in_purchased() { 
    if ( ! is_product() && ! is_user_logged_in() ) return;  
    $current_user = wp_get_current_user();
    $product_id = get_queried_object_id();
    if ( wc_customer_bought_product( $current_user->user_email, $current_user->ID, $product_id ) && $product_id == 12514 ) {
        wp_safe_redirect('/kurs/intervallfasten');
        exit;
    }
}
?>