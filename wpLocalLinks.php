<?php
/**
 * Plugin Name: WordPress Local Links
 * Plugin URI: https://github.com/thomasWeise/wpLocalLinks
 * Description: Offers shortcode [plink id=postID title="title"]..[/plink] to produce a link to a post with a given ID.
 * Version: 0.9.0
 * Author: Thomas Weise
 * Author URI: http://www.it-weise.de/
 * License: GPL3
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function  wpLocalLink($atts, $content = null) {
  extract(shortcode_atts(array(
      'id'    => 1,
      'title' => ''
   ), $atts));

  if(is_null($content)) {
    return "";
  } else {
    $result = ('<a href="' . get_permalink($id));

    if(strlen($title) > 0) {
      $result .= ('" title="' . do_shortcode($title));
    }

    return ($result . '">' . do_shortcode($content) . '</a>');
  }
}


add_shortcode("plink", "wpLocalLink");

?>