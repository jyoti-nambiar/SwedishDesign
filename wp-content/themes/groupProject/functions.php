<?php

function wp_register_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_register_style("bootstrap-css", get_template_directory_uri() . "/css/bootstrap.min.css");
    wp_enqueue_style("bootstrap-css");

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
    wp_register_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array("jquery"), "20120206", true);
    wp_enqueue_script('bootstrap-js');
   

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
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'yourtheme_setup');



//Custom post type for stores

function our_stores()
{

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


//Woocommerce setup

function mytheme_add_woocommerce_support()
{
    add_theme_support('woocommerce');
}

add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


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
add_filter('loop_shop_per_page', 'new_loop_shop_per_page', 20);

function new_loop_shop_per_page($cols)
{
    $cols = 9;
    return $cols;
}

//Add styling to shop page 
add_action("woocommerce_before_shop_loop_item_title", "start_my_product_tag", 15);
add_action("woocommerce_after_shop_loop_item", "end_my_product_tag", 15);
add_action("woocommerce_after_shop_loop_item_title", "my_product_excerpt", 5);

//Adding <figcaption> 
function start_my_product_tag(){
    echo "<figcaption>";
}

//Ending <figcaption>
function end_my_product_tag(){
    echo "</figcaption>";
}

//Adding excerpt to all products in shop page with text limit
function my_product_excerpt(){
    $text = get_the_excerpt();
    echo "<p>" . substr($text, 0, 65) . "</p>";
}

//Remove review tab and additional information tab in single product
add_filter("woocommerce_product_tabs", "my_tabs_function");

function my_tabs_function($tabs)
{
    unset($tabs["reviews"]);
    unset($tabs["additional_information"]);
    return $tabs;
}


//Front page slider using custom post types

function create_slider_post_type() {
 
	$labels = array(
		'name' => __( 'Sliders' ),
		'singular_name' => __( 'Slider' ),
		'all_items'           => __( 'All Sliders' ),
		'view_item'           => __( 'View Slider' ),
		'add_new_item'        => __( 'Add New Slider' ),
		'add_new'             => __( 'Add New Slider' ),
		'edit_item'           => __( 'Edit Slider' ),
		'update_item'         => __( 'Update Slider' ),
		'search_items'        => __( 'Search Slider' ),
		'search_items' => __('Sliders')
	);

	$args = array(
		'labels' => $labels,
		'description' => 'Add New Slider contents',
		'menu_position' => 27,
		'public' => true,
		'has_archive' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => false),
		'menu_icon'=>'dashicons-format-image',
		'supports' => array(
			'title',
			'thumbnail','excerpt'
		),
	);
	register_post_type( 'slider', $args);
 
}
add_action( 'init', 'create_slider_post_type' );

//Removing the editor and slug field from 

add_action( 'init', function() {
    remove_post_type_support( 'slider', 'editor' );
    remove_post_type_support( 'slider', 'slug' );
} );

function sliderLink_add_meta_box() {
    add_meta_box('slider_link','Slider Link','slider_link_callback','slider');
 }
  
 function slider_link_callback( $post ) {
  
    wp_nonce_field('slider_link_save','slider_link_meta_box_nonce');
    $value = get_post_meta($post->ID,'_slider_link_value_key',true);
    ?>
     <input type="text" name="slider_link_field" id="slider_link_field" value="<?php echo esc_attr( $value ); ?>" required="required" size="73" />
    <?php
 }
 add_action('add_meta_boxes','sliderLink_add_meta_box');
 
 function slider_link_save( $post_id ) {
    if( ! isset($_POST['slider_link_meta_box_nonce'])) {
       return;
    }
    if( ! wp_verify_nonce( $_POST['slider_link_meta_box_nonce'], 'slider_link_save') ) {
       return;
    }
    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
       return;
    }
    if( ! current_user_can('edit_post', $post_id)) {
       return;
    }
    if( ! isset($_POST['slider_link_field'])) {
       return;
    }
    $slider_link = sanitize_text_field($_POST['slider_link_field']);
    update_post_meta( $post_id,'_slider_link_value_key', $slider_link );
 }
 add_action('save_post','slider_link_save');

/**
 * Add body classes for WC ACCOUNT PAGE as override when we know we are on the account page because XT Floating cart makes every page think it's a cart page ... see https://wordpress.org/support/topic/my-account-page-css-affected-by-this-plugin/#post-12378463.
 *
 * @param  array $classes Body Classes.
 * @return array
 */
function woocommmerce_style()
{
    wp_enqueue_style('woocommerce_stylesheet', WP_PLUGIN_URL . '/woocommerce/assets/css/woocommerce.css', false, '1.0', "all");
}
add_action('wp_head', 'woocommmerce_style');


/**
 * Edit my account menu order
 */

function my_account_menu_order()
{
    $menuOrder = array(

        'orders' => __('Orders', 'woocommerce'),

        'edit-address' => __('Addresses', 'woocommerce'),
        'edit-account' => __('Account Details', 'woocommerce'),
        'customer-logout' => __('Logout', 'woocommerce'),
    );
    return $menuOrder;
}
add_filter('woocommerce_account_menu_items', 'my_account_menu_order');

//footer widget

function wp_sidebar()
{

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'html2wp'),
        'id'            => 'footer-1',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme_name'),
        'before_widget' => '<aside id="%1$s" class="footer-box">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget->',
        'after_title'   => '</h3>',
    ));


    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'html2wp'),
        'id'            => 'footer-2',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'theme_name'),
        'before_widget' => '<div id="%1$s" class="footer-box">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'wp_sidebar');

