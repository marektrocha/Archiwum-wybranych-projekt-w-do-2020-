<?php



//  ======================= 1. STYLE AND JS ======================================================================

function load_stylesheets()
{
    // 1. Download bootstrap css from serwer (katalog otoedu)
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    // 2. Download style css from serwer (katalog otoedu)
    //    It is my style (not bootstrap). That must be second position
    wp_register_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');


function include_jquery()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.5.1.min.js', '', 1, true);

    // add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery');


function loadjs()
{
    wp_register_script('customjs', get_template_directory_uri() . '/js/scripts.js', '', 1, true);
    wp_enqueue_script('customjs');
}
add_action('wp_enqueue_scripts', 'loadjs');



//  ======================= 2. MENU =========================================================================

add_theme_support('menus');

register_nav_menus(
    array(
        'top-menu' => __('OtoEdu (menu górne)', 'theme'),
        'footer-menu' => __('OtoEdu (menu dolne)', 'theme'),
    )
);