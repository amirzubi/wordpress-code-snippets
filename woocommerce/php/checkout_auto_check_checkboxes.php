// WC - Checkout - Auto Check Checkboxes
add_filter('woocommerce_create_account_default_checked' , function ($checked){
    return true;
});
