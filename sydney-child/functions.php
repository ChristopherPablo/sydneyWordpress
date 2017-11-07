<?php
function my_theme_enqueue_styles() {

    $parent_style = 'sydney-style'; // This is 'Sydney-style' for the Sydney theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

?>

<?php

add_filter('show_admin_bar', '__return_false');



add_action( 'init', 'codex_publicacoes_init' );
/**
 * Register a publicação post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function codex_publicacoes_init() {
    $labels = array(
        'name'               => _x( 'Publicações', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'publicação', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Publicações', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Publicações', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'Publicações', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Publicações', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Publicação', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Publicação', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Publicação', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Publicações', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Publicações', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Publicações:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No Publicações found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No Publicações found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Publicação' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments','custom-fields','page-attributes', 'post-formats' ),
        'taxonomies' => array( 'post_tag', 'category' ),
        'exclude_from_search' => false
    );

    register_post_type( 'Publicação', $args );
}