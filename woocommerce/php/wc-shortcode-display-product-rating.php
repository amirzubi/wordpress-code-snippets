<?php
// WC - Add Shortcode - Display Product Rating
add_shortcode( 'product_rating', 'displayProductRating' );
function displayProductRating( $atts ) {
	// Shortcode attributes
    $atts = shortcode_atts( array(
        'id' => '',
    ), $atts, 'product_rating' );

    if ( isset($atts['id']) && $atts['id'] > 0 ):

    // Get an instance of the WC_Product Object
    $product = wc_get_product( $atts['id'] );

    // The product average rating (or how many stars this product has)
    $average = $product->get_average_rating();
	$rating_count = $product->get_rating_count();

    endif;

   	echo wc_get_rating_html( $average, $rating_count );
}
?>