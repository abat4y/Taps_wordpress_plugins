<?php

function tab_init(){

    $labels = array(
        'name'                  => _x( 'tab', 'Post type general name', 'tab' ),
        'singular_name'         => _x( 'tabs', 'Post type singular name', 'tab' ),
        'menu_name'             => _x( 'tabs', 'Admin Menu text', 'tab' ),
        'name_admin_bar'        => _x( 'tabs', 'Add New on Toolbar', 'tab' ),
        'add_new'               => __( 'Add New', 'tab' ),
        'add_new_item'          => __( 'Add New tabs', 'tab' ),
        'new_item'              => __( 'New tabs', 'tab' ),
        'edit_item'             => __( 'Edit tabs', 'tab' ),
        'view_item'             => __( 'View tabs', 'tab' ),
        'all_items'             => __( 'All tabs', 'tab' ),
        'search_items'          => __( 'Search tabs', 'tab' ),
        'parent_item_colon'     => __( 'Parent tabs:', 'tab' ),
        'not_found'             => __( 'No tabs found.', 'tab' ),
        'not_found_in_trash'    => __( 'No tabs found in Trash.', 'tab' ),
        'featured_image'        => _x( 'tabs Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'tab' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'tab' ),
        'archives'              => _x( 'tabs archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'tab' ),
        'insert_into_item'      => _x( 'Insert into tabs', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'tab' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this tabs', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'tab' ),
        'filter_items_list'     => _x( 'Filter tabs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'tab' ),
        'items_list_navigation' => _x( 'tabs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'tab' ),
        'items_list'            => _x( 'tabs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'tab' ),
    );
 
    $args                       =   array(
        'labels'                =>  $labels,
        'description'           =>  'A custom post type for tabs',
        'public'                =>  true,
        'publicly_queryable'    =>  true,
        'show_ui'               =>  true,
        'show_in_menu'          =>  true,
        'query_var'             =>  true,
        'rewrite'               =>  array( 'slug' => 'tab' ),
        'capability_type'       =>  'post',
        'has_archive'           =>  true,
        'hierarchical'          =>  false,
        'menu_position'         =>  20,
        'supports'              =>  [ 'title', 'editor', 'author' ],
        'taxonomies'            =>  [ 'tabs_catogries' ],
        'menu_icon'   => 'dashicons-table-row-after',
        'show_in_rest'          =>  true
    );
 
    register_post_type( 'tab', $args );

}
function add_tabs_catogries()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'labels' => array(
            'name' => 'tabs Categories',
            'search_items' =>  __('Search tabs Tags'),
            'all_items' => __('All tabs Tags'),
            'parent_item' => __('Parent tabs Tag'),
            'parent_item_colon' => __('Parent tabs Tag:'),
            'edit_item' => __('Edit tabs Tag'),
            'update_item' => __('Update tabs Tag'),
            'add_new_item' => __('Add New tabs Tag'),
            'new_item_name' => __('New tabs Tag Name'),
            'menu_name' => __('tabs Categories'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest' => true,
        'has_archive' => true,
        'capabilities' => array(
            'manage_terms' => 'manage_categories',
            'edit_terms' => 'manage_categories',
            'delete_terms' => 'manage_categories',
            'assign_terms' => 'read'
        ),
        'rewrite'  => array('slug' => 'tabs_catogries'),
    );

    register_taxonomy('tabs_catogries', 'tab', $labels);
}
