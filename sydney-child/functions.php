<?php
function excen_enqueue_styles() {

    $parent_style = 'sydney-style'; // This is 'Sydney-style' for the Sydney theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'excen_enqueue_styles' );

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
        'name'               => _x( 'Publicações', 'post type general name', 'excen-theme' ),
        'singular_name'      => _x( 'publicação', 'post type singular name', 'excen-theme' ),
        'menu_name'          => _x( 'Publicações', 'admin menu', 'excen-theme' ),
        'name_admin_bar'     => _x( 'Publicações', 'add new on admin bar', 'excen-theme' ),
        'add_new'            => _x( 'Add New', 'Publicações', 'excen-theme' ),
        'add_new_item'       => __( 'Add New Publicações', 'excen-theme' ),
        'new_item'           => __( 'New Publicação', 'excen-theme' ),
        'edit_item'          => __( 'Edit Publicação', 'excen-theme' ),
        'view_item'          => __( 'View Publicação', 'excen-theme' ),
        'all_items'          => __( 'All Publicações', 'excen-theme' ),
        'search_items'       => __( 'Search Publicações', 'excen-theme' ),
        'parent_item_colon'  => __( 'Parent Publicações:', 'excen-theme' ),
        'not_found'          => __( 'No Publicações found.', 'excen-theme' ),
        'not_found_in_trash' => __( 'No Publicações found in Trash.', 'excen-theme' )
    );

    $args = array(
        'labels'             => $labels,
                'description'        => __( 'Description.', 'excen-theme' ),
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