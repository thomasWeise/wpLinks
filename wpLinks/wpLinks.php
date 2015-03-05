<?php
/**
 * Plugin Name: WordPress Links
 * Plugin URI: https://github.com/thomasWeise/wpLinks
 * Description: Offers short codes for links
 * Version: 0.9.1
 * Author: Thomas Weise
 * Author URI: http://www.it-weise.de/
 * License: GPL3
 */
 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wpStyleLink($url = null, $title = null, $content = null, $type = null) {
  
  if(is_null($title) || (strlen($title) <= 0)) {
    $title = $content;
  } else {
    $title = trim(do_shortcode(trim($title)));
  }
  
  if(is_null($content) || (strlen($content) <= 0)) {
    $content = "";
  } else {
    $content = trim(do_shortcode(trim($content)));
  }
  
  if(is_null($title) || (strlen($title) <= 0)) {
    $title = $content;
  }
  
  if( (!(is_null($type))) && (strlen($type) > 0) ) {
    $result  = '<img src="';
    $result .= plugins_url( 'icons/' . $type . '.png', __FILE__ );
    $result .= '" style="display:inline;width:1em;height:1em" alt="';
    if(is_null($title) || (strlen($title) <= 0)) {
      $result .= $type;
      $result .= ' icon';
    } else {
      $result .= $title;
    }
    $result .= '" />';
         
    if((!(is_null($content))) && (strlen($content) > 0)) {
      $result .= '&nbsp;';
      $result .= $content;  
    }
      
    $content = $result;  
  }
  
  $result  = '<a href="';
  $result .= $url;
  if((!is_null($title)) && (strlen($title) > 0)) {
    $result .= '" title="';
    $result .= $title;      
  }
  $result .= '">';
  
  if((!is_null($content)) && (strlen($content) > 0)) {
    $result .= $content;
  }
  
  $result .= '</a>';
  
  return $result; 
}



function  wpPostLink($atts, $content = null) {
  extract(shortcode_atts(array(
      'id'    => 1,
      'title' => null
   ), $atts));

  return wpStyleLink(get_permalink($id), $title, $content, 'post');
}


function  wpDoiLink($atts, $content = null) {
  return ('doi:' . wpStyleLink( ('http://dx.doi.org/' . $content), ('doi:' . $content), $content, null));
}

function  wpPdfLink($atts, $content = null) {
  extract(shortcode_atts(array(
      'url'   => null,
      'title' => null
   ), $atts));

  if(is_null($content) || (strlen($content) <= 0)) {
    $content = 'full text';
  }

  return wpStyleLink($url, $title, $content, 'pdf');
}


function  wpSlidesLink($atts, $content = null) {
  extract(shortcode_atts(array(
      'url'   => null,
      'title' => null
   ), $atts));

  if(is_null($content) || (strlen($content) <= 0)) {
    $content = 'slides';
  }

  return wpStyleLink($url, $title, $content, 'slides');
}

add_shortcode("postLink",    "wpPostLink");
add_shortcode("pdfLink",     "wpPdfLink");
add_shortcode("slidesLink",  "wpSlidesLink");
add_shortcode("doiLink",     "wpDoiLink");

?>