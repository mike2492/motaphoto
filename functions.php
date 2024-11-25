<?php
function add_my_scripts() {
    wp_enqueue_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), '3.7.1', true );
    wp_enqueue_style('theme-enfant', get_stylesheet_directory_uri() . '/style.css' );
}
add_action('wp_enqueue_scripts', 'add_my_scripts');
?>