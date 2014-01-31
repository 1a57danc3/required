<?php
/**
 * Pull in the first post from each post to use as the post thumbnail.
 * If one doesn't exist, then use a default image.
 *
 * @package    required
 * @since      1.0.0
 * @version    1.0.0
 */
function required_first_image() {

  $output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', get_the_content(), $matches );
  return empty( $matches[1][0] ) ? get_template_directory_uri() . "/images/default.jpg" : $matches[1][0];

} // required_first_image