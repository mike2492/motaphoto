<?php
function load_scripts(){
    wp_enqueue_style('mota', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '3.7.1', true);
}

add_action('wp_enqueue_scripts', 'load_scripts');
?>