<?php
/*
Plugin Name: ReachFactor
Plugin URI: http://www.reachfactor.com/
Description: Display ReachFactor badges and widgets
Version: 1.0.0
Author: ReachFactor
Author URI: http://www.reachfactor.com/
License: GPLv2
*/

require_once(dirname(__FILE__)."/settings.php");

function reachfactor_widget_html() {
  $options = get_option('reachfactor_options');
  return "<div id=\"reachfactor_reviews_widget\"><a href=\"{$options["profile_url"]}\">My ReachFactorProfile</a></div><script>(function(){var e=document.createElement(\"script\");e.type=\"text/javascript\";e.async=true;e.src=document.location.protocol+\"//my.reachfactor.com/reviews.js?user_id={$options["user_id"]}&widget[height]={$options['widget_size']}&widget[style]={$options['widget_style']}\";var s=document.getElementsByTagName(\"script\")[0];s.parentNode.insertBefore(e,s);})();</script>";
}

function reachfactor_badge_html() {
  $options = get_option('reachfactor_options');
  return "<div class=\"rf-badge\" data-rf-style=\"{$options['badge_size']}-{$options['badge_style']}\"><a href=\"{$options["profile_url"]}\" target=\"_blank\"><img src=\"http://my.reachfactor.com/badgev2/{$options["user_id"]}/{$options['badge_style']}/{$options['badge_size']}.png\" title=\"Click here to see {$options["full_name"]}'s full profile.\" alt=\"Click here to see {$options["full_name"]}'s full profile.\" /></a></div>";
}

function reachfactor_widget() {
  echo reachfactor_widget_html();
}

function reachfactor_badge() {
  echo reachfactor_badge_html();
}

add_shortcode( 'reachfactor-widget', 'reachfactor_widget_html' );
add_shortcode( 'reachfactor-badge', 'reachfactor_badge_html' );
?>
