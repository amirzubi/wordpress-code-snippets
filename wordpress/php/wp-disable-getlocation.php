<?php
add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );

function my_deregister_javascript() 
 { 
    if ( is_page([9160,8455,609,3936,1145,607,2907,8981,3866,1138,9687,8953,3849,7437,2695,11987,11604,6748,6399,6252,6204,6043,5878,5325,3353]) ) 
      {
        wp_deregister_script( 'wc-price-based-country-frontend' ); 
      } 
 }
 ?>