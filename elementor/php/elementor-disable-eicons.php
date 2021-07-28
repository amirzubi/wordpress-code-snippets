<?php
add_action( 'elementor/frontend/after_enqueue_styles', 'js_dequeue_eicons' );
function js_dequeue_eicons() {

  // Don't remove it in the backend
  if ( is_admin() || current_user_can( 'manage_options' ) ) {
        return;
  }
  wp_dequeue_style( 'elementor-icons' );
}
});