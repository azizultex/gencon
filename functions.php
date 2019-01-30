<?php

show_admin_bar(false);
require_once('wp_bootstrap_navwalker.php');

if ( ! function_exists( 'gencon_setup' ) ) {

    function gencon_setup() {
        /** Make theme available for translation. */
        load_theme_textdomain( 'gencon', get_template_directory() . '/languages' );

        /** Enable support for Post Thumbnails on posts and pages. */
        add_theme_support( 'post-thumbnails' );

        /** This theme uses wp_nav_menu() in one location. */
        register_nav_menus( array(
          'menu-1' => esc_html__( 'Primary menu', 'gencon' )
        ) );

    }
}
add_action( 'after_setup_theme', 'gencon_setup' );

/*** Enqueue scripts and styles. */
function gencon_scripts() {

  /*** Enqueue styles. */
  wp_enqueue_style('adobe-typekit', 'https://use.typekit.net/hyn1tgx.css', array(), false, 'all');
  wp_enqueue_style('plugins', get_template_directory_uri() . '/css/plugins.css', array(), date("ymd-Gis", filemtime( get_template_directory() . '/css/plugins.css' )), 'all');
  wp_enqueue_style( 'nmr-style', get_stylesheet_uri(), array(), date("ymd-Gis", filemtime( get_stylesheet_directory())));

  /*** Enqueue scripts. */
  wp_enqueue_script('jquery');
  wp_enqueue_script('plugins', get_template_directory_uri() . '/js/plugins.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/plugins.js' )), true);
  wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), date("ymd-Gis", filemtime( get_template_directory() . '/js/scripts.js' )), true);
}
add_action( 'wp_enqueue_scripts', 'gencon_scripts' );

/**
 * Dashboard google map api key support.
 */
add_filter('acf/settings/google_api_key', function () {
  $gmap_api = get_field('google_map_api_key', 'options');
    return $gmap_api;
});

/*** ACF OPTIONS PAGE */
if(function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

/*** Reorder dashboard menu */
function reorder_admin_menu( $__return_true ) {
    return array(
         'index.php',                 // Dashboard
         'separator1',                // --Space--
         'acf-options',               // ACF Theme Settings
         'edit.php?post_type=page',   // Pages 
         'edit.php',                  // Posts
         'separator2',                // --Space--
         'gf_edit_forms',             // Gravity Forms
         'upload.php',                // Media
         'wpseo_dashboard',           // Yoasta
         'gadash_settings',           // Google Analytics
         'themes.php',                // Appearance
         'edit-comments.php',         // Comments 
         'users.php',                 // Users
         'tools.php',                 // Tools
         'options-general.php',       // Settings
         'plugins.php',               // Plugins
   );
}
add_filter( 'custom_menu_order', 'reorder_admin_menu' );
add_filter( 'menu_order', 'reorder_admin_menu' );

/*** Remove dashboard menu */
function remove_admin_menus() {
  remove_menu_page( 'edit.php' );              // Comments
  remove_menu_page( 'edit-comments.php' );              // Comments
  remove_menu_page( 'tools.php' );                      // Tools
  remove_menu_page( 'plugins.php' );                    // Plugings
  remove_menu_page( 'sharethis-general' );          // share this
  remove_menu_page( 'edit.php?post_type=acf-field-group' ); // Custom Field 
  remove_menu_page( 'pods' );                         // Pods Custom post type
}
//add_action( 'admin_menu', 'remove_admin_menus', 999);

/*** GC Color Theme */
function additional_admin_color_schemes() {
  //Get the theme directory
  $theme_dir = get_template_directory_uri();

  //GoingClear
  wp_admin_css_color(
    'goingclear', __('GoingClear'),
    admin_url("css/colors/goingclear/colors.css"),
    array('#8ec652', '#008cc6', '#e5e5e5', '#999'),
    array( 'base' => '#e5f8ff', 'focus' => '#fff', 'current' => '#fff' )
  );
}
add_action('admin_init', 'additional_admin_color_schemes');

/*** Reset GC Color Theme as Default for New Users */
function set_default_admin_color($user_id) {
  $args = array(
      'ID' => $user_id,
      'admin_color' => 'goingclear'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

/*** Remove Login Wiggle */
function remove_login_shake() {
    // remove the wp_shake JavaScript
    remove_action( 'login_head', 'wp_shake_js', 12 );
}
add_action( 'login_head', 'remove_login_shake' );

function custom_header() { 
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.css" />'; 
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/jquery-3.2.1.min.js"></script>';
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '../../../../wp-admin/admin/login.js"></script>';
   
}
add_action('login_head', 'custom_header');

/*** Gravity form user role */
function gforms_editor_access() {
    $role = get_role( 'editor' );
    $role->add_cap( 'gform_full_access' );
}
add_action( 'after_switch_theme', 'gforms_editor_access' );

/*** Gravity form anchor */
add_filter( 'gform_confirmation_anchor', '__return_false' );

/*** Limit blog text */
function Limit_Text($text, $limit=30) {
  $array = explode( "\n", wordwrap( $text, $limit));
  return $array['0'];
}

function form_submit_button($button, $form) {
    return "<button class='btn' id='gform_submit_button_{$form["id"]}'>{$form['button']['text']}</button>";
}
add_filter("gform_submit_button", "form_submit_button", 10, 2);