<?php
function wp_register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_register_style('style', get_template_directory_uri() . "/css/style.css", array(), $version, 'all');
    wp_enqueue_style('style');


    wp_register_style('boxicons', 'https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css', array(), '1.0', 'all');
    wp_enqueue_style('boxicons');
}
add_action('wp_enqueue_scripts', 'wp_register_styles');

//loading scripts files for jquery, and custom js
function wp_register_scripts()
{


    wp_register_script('myscript', get_template_directory_uri() . '/js/main.js', array(), 1, 1, 1);
    wp_enqueue_script('myscript');
}
add_action('wp_enqueue_scripts', 'wp_register_scripts');


function yourtheme_setup()
{
    /* add_theme_support(

        'custom-background',

        array(

            'default-color' => '2d2d2d',

            'default-image' => get_template_directory_uri() . '/img/background.jpg',

            'default-repeat'     => 'no-repeat',

            'default-position-x' => 'center',

            'default-attachment' => 'fixed',



        )

    ); */

    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'yourtheme_setup');


register_nav_menus( array(
        'main_menu' => 'Main Menu'
    ) );