<?php
// WC - Add Shortcode - Display Product Name
function displayProductName($item) {
    $productName = get_the_title($item['id']);
    return $productName;
}

add_shortcode('product_name', 'displayProductName');
?>
