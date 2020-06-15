<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function wpse52737_enqueue_comment_reply_script() {
    if ( get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment_reply' );
    }
}
add_action( 'comment_form_before', 'wpse52737_enqueue_comment_reply_script' );

function redirect_to_custom_logout() {
    wp_redirect ( home_url()  );
    exit();
}
add_action( "wp_logout" , "redirect_to_custom_logout" );

function sl_start_session(){

    if( ! session_id() ){

        session_start();

    }

}
add_action('init','sl_start_session');

if(!function_exists('dd')){

    function dd($data){

        echo '<pre>';
        var_dump($data);
        die();
        echo '</pre>';

    }

}
/*
    ==========================================
     Include scripts
    ==========================================
*/
function webgaran_script_enqueue() {
    //css
    wp_enqueue_style( 'fonts' , get_template_directory_uri() . '/assets/css/fonts.css');
    wp_enqueue_style( 'webgaran-jquery.mCustomScrollbar.min' , get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css');//https://github.com/malihu/malihu-custom-scrollbar-plugin
    wp_enqueue_style( 'fontawesome' , get_template_directory_uri() . '/assets/css/fontawesome.min.css');
    wp_enqueue_style( 'webgaran-bootstrap' , get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'webgaran', get_stylesheet_uri() );
    wp_enqueue_style( 'core' , get_template_directory_uri() . '/assets/css/core.css');
    //js
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'webgaran-like-post-js', get_template_directory_uri() . '/assets/js/like-post.js', array(), '20142542', true );//https://github.com/daveyheuser/WP-ajax-like-button
    wp_enqueue_script( 'webgaran-jquery.mCustomScrollbar.concat.min-js', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array(), '20142544', true );//https://github.com/malihu/malihu-custom-scrollbar-plugin
    wp_enqueue_script( 'hover3d', get_template_directory_uri() . '/assets/js/jquery.hover3d.min.js', array(), '20140408', true );// https://github.com/ariona/hover3d
    wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20190401', true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '20190402', true );
    wp_enqueue_script( 'webgaran-js', get_template_directory_uri() . '/assets/js/webgaran-js.js', array(), '20190403', true );
    wp_localize_script('webgaran-js','data',array('ajax_url' =>  admin_url('admin-ajax.php')));

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

//    if (is_front_page()) {
//        wp_enqueue_style( 'owlcarousel' , get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
//        wp_enqueue_style( 'owlthemedefault' , get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');
//        wp_enqueue_script( 'owlcarousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '20140213', true );
//        wp_enqueue_script( 'front', get_template_directory_uri() . '/assets/js/front.js', array(), '20140410', true );
//
//    }
}
add_action( 'wp_enqueue_scripts', 'webgaran_script_enqueue');



/*
    ==========================================
     Theme support function
    ==========================================
*/
add_theme_support('custom-background');
add_theme_support('custom-header');
add_theme_support('post-thumbnails');
add_theme_support('html5',array('search-form'));
add_image_size( 'posts', 275, 215, true );



/*
    ==========================================
     Activate menus
    ==========================================
*/
function awesome_theme_setup() {

    add_theme_support('menus');

    register_nav_menu('header', 'Header Navigation');
    register_nav_menu('footer', 'footer Navigation');
    add_theme_support( 'html5', array( 'comment-list' ) );
}

add_action('init', 'awesome_theme_setup');

/*
    ==========================================
     Sidebar function
    ==========================================
*/
function awesome_widget_setup() {

    register_sidebar(
        array(
            'name'  => 'single',
            'id'    => 'single',
            'class' => 'custom',
            'description' => 'Single Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
		register_sidebar(
        array(
            'name'  => 'footer-left',
            'id'    => 'footer-left',
            'class' => 'custom',
            'description' => 'Single Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
		register_sidebar(
        array(
            'name'  => 'footer-center',
            'id'    => 'footer-center',
            'class' => 'custom',
            'description' => 'Single Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );
		register_sidebar(
        array(
            'name'  => 'footer-right',
            'id'    => 'footer-right',
            'class' => 'custom',
            'description' => 'Single Sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        )
    );

}
add_action('widgets_init','awesome_widget_setup');





include_once('inc/comment-walker.php');
include_once('inc/like-metabox.php');
include_once('inc/like-post.php');
include_once('inc/custom-post-type.php');
include_once('inc/ajax.php');
include_once('inc/admin/admin.php');


//add_filter( 'pre_option_link_manager_enabled', '__return_true' );

add_filter( 'user_row_actions', '__return_empty_array' );
























 /*
 ==========================================
 Head function
 ==========================================
 */
 /* remove version string from js and css */
 function sunset_remove_wp_version_strings( $src ) {

    global $wp_version;
    parse_str( parse_url($src, PHP_URL_QUERY), $query );
    if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
        $src = remove_query_arg( 'ver', $src );
    }
    return $src;

 }
 add_filter( 'script_loader_src', 'sunset_remove_wp_version_strings' );
 add_filter( 'style_loader_src', 'sunset_remove_wp_version_strings' );

 /* remove metatag generator from header */
 function sunset_remove_meta_version() {
    return '';
 }
 add_filter( 'the_generator', 'sunset_remove_meta_version' );

 /*
 ==========================================
 post-views-count
 ==========================================
 */
 function set_post_view_custom_field() {
     if ( is_single() ) {
         global $post;
         $post_id = $post->ID;
         $count = 1;
         $post_view_count = get_post_meta( $post_id, 'post_view_count', true );
         if ( $post_view_count ) {
             $count = $post_view_count + 1;
         }
         update_post_meta( $post_id, 'post_view_count', $count );
     }
 }
 add_action( 'wp_head', 'set_post_view_custom_field' );
 // in Pannel
 function add_post_view_count_column( $columns ) {
     if( is_array( $columns ) && ! isset( $columns['post_view_count'] ) )
         $columns[ 'post_view_count' ] = 'تعداد بازدید';
     return $columns;
 }
 add_filter( 'manage_posts_columns', 'add_post_view_count_column' );
 // Show in Pannel
 function set_post_view_count_column( $column_name, $post_ID ) {
     if ( $column_name == 'post_view_count' ) {
         $count = get_post_meta( $post_ID, 'post_view_count', true );
         echo $count ? $count : 0;
     }
 }
 add_action( 'manage_posts_custom_column', 'set_post_view_count_column', 10, 2);
 // in front
 function get_post_view_count( $post_id ){
     return get_post_meta( $post_id, 'post_view_count', true );
 }





