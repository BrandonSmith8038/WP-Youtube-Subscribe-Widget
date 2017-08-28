<?php
/*
Plugin Name: WP-Youtube Subscribe
Plugin URI: https://reddirtwebdesign.com
Description: Display Youtube ssub button and count
Version: 1.0.0
Author: Brandon Smith
Author URI: https://reddirtwebdesign.com
*/

//Exit if accessed directly

if(!defined('ABSPATH')){
    exit;
}
//Load Scripts
require_once(plugin_dir_path( __file__ )."includes/WP-Youtube-Subscribe-scripts.php");
//Load Class
require_once(plugin_dir_path( __file__ )."includes/wpyts-subs-class.php");
//Register The Widget
function register_youtube_subs(){
    register_widget( 'WP_Youtbe_Subscribe_Widget' );
}

//Hook in function
add_action( 'widgets_init', register_youtube_subs );