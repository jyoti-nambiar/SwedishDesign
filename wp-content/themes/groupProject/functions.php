<?php
function wp_register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_register_style('style', get_template_directory_uri() . "/css/style.css", array(), $version, 'all');
    wp_enqueue_style('style');
    wp_register_style('kontakt', get_template_directory_uri() . "/css/kontakt.css", array(), $version, 'all');
    wp_enqueue_style('kontakt');

    wp_register_style("shop-style", get_template_directory_uri() . "/css/shop-style.css", array(), $version, "all");
    wp_enqueue_style("shop-style");

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

//theme start page background image
function yourtheme_setup()
{
    add_theme_support(

        'custom-background',

        array(

            'default-color' => '2d2d2d',

            'default-image' => get_template_directory_uri() . '/img/background.jpg',

            'default-repeat'     => 'no-repeat',

            'default-position-x' => 'center',

            'default-attachment' => 'fixed',



        ),

    );
    add_theme_support("post-thumbnails");
    add_theme_support("menus");
    add_theme_support( 'woocommerce' );
}
add_action('after_setup_theme', 'yourtheme_setup');



//Custom post type for stores

function our_stores(){

    $args = array(
        "labels" => array(
                "name" => "Stores",
                "singular_name" => "Store"
        ),
        "hierarchical" => true,
        "public" => true,
        "has_archive" => true,
        "menu_icon" => "dashicons-store",
        "supports" => array("title", "editor", "thumbnail", "custom-fields"),
        //"rewrite" => array("slug" => "our-stores")

    );

    register_post_type("stores", $args);

}
add_action("init", "our_stores");

/* function store_taxonomy(){

    $args = array(
            "labels" => array(
                    "name" => "Locations",
                    "singular_name" => "Location"
    ),
    "public" => true,
    "hierarchical" => false

    );

    register_taxonomy("locations", array("stores"), $args);

}
add_action("init", "store_taxonomy"); */


//hooking menus
function navbar_menus()
{
    $locations = array(
        'primary' => "Header Primary menu ",
        'secondary' => "Pages Secondary menu ",
        'tertiary' => "Blog Tertiary menu",
        'footer' => "Footer Menu Items"

    );

    register_nav_menus($locations);
}

add_action('init', 'navbar_menus');

//post thumbnail pic

function wpshout_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'wpshout_theme_support');

//Remove sidebar on the shop page

add_action('woocommerce_after_main_content', 'remove_sidebar');
function remove_sidebar()
{
if (is_shop()) {
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
}
}

// Show maximum 9 products per page on the Shop page
add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  $cols = 9;
  return $cols;
}

//Add styling to shop page 
add_action("woocommerce_before_shop_loop_item_title", "start_my_product_tag", 15);
add_action("woocommerce_after_shop_loop_item", "end_my_product_tag", 15);
add_action("woocommerce_after_shop_loop_item_title", "my_product_excerpt", 5);


function start_my_product_tag(){
    echo "<figcaption>";
}

function end_my_product_tag(){
    echo "</figcaption>";
}

function my_product_excerpt(){
    $text = get_the_excerpt();
    echo "<p>".substr($text, 0, 65)."</p>";
}

//Remove review tab and additional information tab in single product
add_filter("woocommerce_product_tabs", "my_custom_tabs_function");

function my_custom_tabs_function($tabs){
    unset($tabs["reviews"]);
    unset($tabs["additional_information"]);
    return $tabs;
}