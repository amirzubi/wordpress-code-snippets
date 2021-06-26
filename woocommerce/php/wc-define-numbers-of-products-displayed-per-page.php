// Change the number "50" for the number of products you like to display per page
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 50;' ), 20 );