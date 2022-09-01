<?php
/*
 * Plugin Name: Tabs
 * Description: A simple WordPress plugin that allows user to create Tabs with contnet
 * Version: 1.0
 * Author: sameh helal
 * Author URI: https://www.linkedin.com/in/sameh-helal/
 */

if( !function_exists( 'add_action' ) ){
    echo "Hi there! I'm just a plugin, not much I can do when called directly.";
    exit;
}

// Setup
define( 'RECIPE_PLUGIN_URL', __FILE__ );

// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include( 'includes/front/enqueue.php' );
include( 'shortcodes/show_tabs.php' );
//include( 'admin/init.php' );
// Hooks
register_activation_hook( __FILE__, 'r_activate_plugin' );
add_action( 'init', 'tab_init' );
add_action('init', 'add_tabs_catogries');
// add_action( 'save_post_recipe', 'r_save_post_admin', 10, 3 );
// add_filter( 'the_content', 'r_filter_recipe_content' );
add_action( 'wp_enqueue_scripts', 'r_enqueue_scripts', 100 );
add_action( 'wp_ajax_r_rate_recipe', 'r_rate_recipe' );
add_action( 'wp_ajax_nopriv_r_rate_recipe', 'r_rate_recipe' );

//add_action( 'admin_init', 'recipe_admin_init' );
add_action('admin_menu', 'wpdocs_register_my_custom_submenu_page');

function wpdocs_register_my_custom_submenu_page() {
    add_submenu_page(
        'edit.php?post_type=tab',
        'Instructions',
        'Instructions',
        'manage_options',
        'Instructions',
        'wpdocs_my_custom_submenu_page_callback' );
}
 
function wpdocs_my_custom_submenu_page_callback() {
    echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
        echo '<h2>Instructions</h2>';
        echo '<ul>';
        echo '<li><h3>- Copy this shortcode [SiliconeTab] and past it in any WP editor </h3> </li>';
        echo '<li><h3>- Controle of tabs number  -> [SiliconeTab tabs_per_page="your tap number" ] </h3> </li>';
        echo '<li><h3>- Controle of tabs order  -> [SiliconeTab order="DESC OR ASC" ]</h3>  </li>';
        echo '<li><h3>- Show tabs  of specific category  -> [SiliconeTab category_slug="category slug here" ] </h3> </li>';
        echo '</ul>';
    echo '</div>';
}

// Shortcodes
add_shortcode( 'SiliconeTab', 'tab_filter_shortcode' );
