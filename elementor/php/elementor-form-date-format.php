<?php
add_action('wp_footer', function () {
       ?>
      <script>
      jQuery( document ).ready( function( $ ){
            setTimeout( function(){
                  $('.flatpickr-input').each(function(){ flatpickr( $(this)[0] ).set('dateFormat', 'd/m/Y');});
            }, 1000 );
      });
      </script>
});
