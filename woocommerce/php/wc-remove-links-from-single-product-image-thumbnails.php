<?php
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'wc_remove_link_on_thumbnails' );
function wc_remove_link_on_thumbnails( $html ) {
	return strip_tags( $html, [ 'div', 'img' ] );
}
?>