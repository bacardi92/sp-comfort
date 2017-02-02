<?php 


if(!function_exists('sp_load_scripts')){
    
    function sp_load_scripts(){
        wp_deregister_style( 'style' );
        wp_dequeue_style( 'style' );
        wp_register_style('style', get_stylesheet_directory_uri().'/style.css', array(), time(), false);

        wp_enqueue_style('style');
    }
    add_action('wp_enqueue_scripts', 'sp_load_scripts', 1);

}