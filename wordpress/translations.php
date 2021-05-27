<?php
function translate_text( $translated ) {

  // The first parameter is the original text, the second parameter is the changed text.
  $translated = str_ireplace( 'Gutschein anwenden',  'Einlösen',  $translated );
	
  // Returns the translated text
  return $translated;
}
add_filter( 'gettext',  'translate_text' );
add_filter( 'ngettext',  'translate_text' );
?>