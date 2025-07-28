<?php
function mota_styles() {
    wp_enqueue_style('mota', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', array(), '6.8.2', true);
}
add_action('wp_enqueue_scripts', 'mota_styles');
?>