<?php
add_action( 'wp_enqueue_scripts', 'misha_deactivate_pass_strength_meter', 10 );
function misha_deactivate_pass_strength_meter() {
	wp_dequeue_script( 'wc-password-strength-meter' );
}
?>