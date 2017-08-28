<?php

//Add Scritps

function wpyts_add_scripts(){
    //Add main css
    wp_enqueue_style('wpyts-main-style', plugins_url(). '/WP-Youtube-Subsribe/includes/css/style.css');
    //Add main js
    wp_enqueue_script('wpyts-main-script', plugins_url(). '/WP-Youtube-Subsribe/includes/js/main.js');
}

add_action( 'wp_enqueue_scripts', 'wpyts_add_scripts' );