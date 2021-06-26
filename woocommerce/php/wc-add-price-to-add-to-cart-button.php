<?php
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_shop_page_add_to_cart', 20, 2 ); // Shop and other archives pages
function custom_shop_page_add_to_cart( $button_text, $product ) {
    // Variable products
    if( $product->is_type('variable') ) {
        // shop and archives
        if( ! is_product() ){
            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return 'Ab ' .strip_tags( $product_price );
        } 
        // Single product pages
        else {
            return $button_text .' hinzufügen';
        }
    } 
    // All other product types
    else {
        $product_price = wc_price( wc_get_price_to_display( $product ) );
        return strip_tags( $product_price ) .' hinzufügen';
    }
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_price', 100, 2 ); // Single product pages
function custom_add_to_cart_price( $button_text, $product ) {
    // Variable products
    $curr = get_woocommerce_currency_symbol();
    if( $product->is_type('variable') ) {
        // shop and archives
        if( ! is_product() ){

 

            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return $curr . $product_price . ' hinzufügen';
        } 
        // Single product pages
        else {
            $variations_data =[]; // Initializing

 

        // Loop through variations data
        foreach($product->get_available_variations() as $variation ) {
            // Set for each variation ID the corresponding price in the data array (to be used in jQuery)
            $variations_data[$variation['variation_id']] = $variation['display_price'];
        }
?>
<script>
var globPrice = 0;
        jQuery(function($) {
        
            var jsonData = <?php echo json_encode($variations_data); ?>,
                inputVID = 'input.variation_id';
            
            $(document).ready(function () {
                $('input').change( function(){
                    if( '' != $(inputVID).val() ) {
                        var vid      = $(inputVID).val(),
                           vprice   = ''; 

 

                        $.each( jsonData, function( index, price ) {
                            if( index == $(inputVID).val() ) {
                                vprice = price.toFixed(2);
                            }
                        });
                        var xx = "<?php echo get_woocommerce_currency_symbol(); ?>";
                        globPrice = vprice;
                        $(".single_add_to_cart_button").html("<span>" + xx + vprice + " hinzufügen" + "</span>");
                    }
                });
                
                $(document).on('change', "#regular_delivery_option_select", function () {
                    var attribute_value = $(this).data("custom_data");
                    var input_value = $(this).val();
                    if(attribute_value['subscription_scheme']){
                        //console.log(attribute_value['subscription_scheme']);
                        var btnString = $(".single_add_to_cart_button").html();
                        btnString = btnString.replace(/<[^>]*>/g, "");
                        var btnVars = btnString.split(' ');
                        var lenMinOne = btnVars.length - 1;
                        var lenMinTwo = btnVars.length - 2;
                        globPrice = globPrice || parseFloat(btnVars[lenMinOne]);
                        //if(globCount == 0){globCount = 1;globPrice = (globPrice * (100/75)) - (100/75);}
                        var vprice = (globPrice - (globPrice * (parseFloat(attribute_value['subscription_scheme'].discount)/100))).toFixed(2);
                        //$(".single_add_to_cart_button").html("<span>" + btnVars[lenMinTwo] + vprice + ' hinzufügen' + "</span>");
                        $(".single_add_to_cart_button").html("<span>Jetzt hinzufügen</span>");
                    }
                });
                

 

                
            
            });
            
        });
</script>
        
<?php
            return '+ ' . $curr . $variations_data[$_POST['variation_id']];
        }
    } 
    // All other product types
    else {
        $product_price = wc_price( wc_get_price_to_display( $product ) );
        return $product_price . 'hinzufügen';
    }
}
?>
