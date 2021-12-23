<?php

add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'title-tag' ); 

function add_theme_scripts() {
    wp_enqueue_style( 'bulma', 'https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css', array(), '0.9.3', 'all');
    wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;500&display=swap');
    wp_enqueue_style( 'style', get_template_directory_uri() . "/assets/css/style.css", ['bulma', 'fonts']);
    
    // wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');
   
    // wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
   
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


function themename_custom_logo_setup() {
    $defaults = array(   
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
} 
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


function register_my_menus() {
register_nav_menus(
    array(
        // 'header-menu' => __( 'Header Menu' ), 
        'footer-menu' => __( 'Footer Menu' )
    )
    );
}
add_action( 'init', 'register_my_menus' );


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes = [$args->add_li_class];
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


// Estilos para los botones de siguiente y anterior
function post_link_attributes_next($output) {
    $code = 'class="pagination-previous button is-info is-light"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
function post_link_attributes_previous($output) {
    $code = 'class="pagination-next button is-info is-light"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
add_filter('next_post_link', 'post_link_attributes_next');
add_filter('previous_post_link', 'post_link_attributes_previous');


// Obtener artículo archive
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );