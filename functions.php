<?php
function load_scripts(){
    wp_enqueue_style('mota', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'load_scripts'); 
?>