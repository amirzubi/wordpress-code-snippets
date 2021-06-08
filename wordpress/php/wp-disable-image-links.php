<?php
add_filter( 'the_content', 'attachment_image_link_remove_filter' );
 function attachment_image_link_remove_filter( $content ) {
  $content =
  preg_replace(
  array('{<a(.*?)(wp-att|wp-content/uploads)[^>]*><img}',
  '{ wp-image-[0-9]*" /></a>}'),
  array('<img','" />'),
  $content
  );
  return $content;
   }
   ?>