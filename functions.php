<?php
function mota_styles() {
    wp_enqueue_style('mota', get_stylesheet_directory_uri() . '/style.css');
}
add_action('wp_enqueue_scripts', 'mota_styles');
?>