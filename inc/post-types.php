<?php
/**
 * Created by PhpStorm.
 * User: kyallbarrows
 * Date: 10/29/18
 * Time: 2:28 PM
 */

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'portfolio_item',
        array(
            'labels' => array(
                'name' => __( 'Portfolio Items' ),
                'singular_name' => __( 'Portfolio Item' ),
                'add_item' => __('New Portfolio Item'),
                'add_new_item' => __('Add New Portfolio Item'),
                'edit_item' => __('Edit Portfolio Item')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'portfolio'),
            'menu_position' => 5,
            'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'post-formats', 'comments')
        )
    );
    
    register_post_type( 'team_item',
        array(
            'labels' => array(
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Member' ),
                'add_item' => __('New Team Member'),
                'add_new_item' => __('Add New Team Member'),
                'edit_item' => __('Edit Team Member')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'team'),
            'menu_position' => 6,
            'show_ui' => true,
            'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'post-formats', 'comments')
        )
    );
    
    flush_rewrite_rules();
}


add_action( 'init', 'create_portfolio_category_taxonomies', 0 );
function create_portfolio_category_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => __( 'Portfolio Categories', 'taxonomy general name' ),
        'singular_name' => __( 'Portfolio Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Portfolio Categories' ),
        'all_items' => __( 'All Portfolio Categories' ),
        'parent_item' => __( 'Parent Portfolio Category' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:' ),
        'edit_item' => __( 'Edit Portfolio Category' ),
        'update_item' => __( 'Update Portfolio Category' ),
        'add_new_item' => __( 'Add New Portfolio Category' ),
        'new_item_name' => __( 'New Portfolio Category Name' ),
        'menu_name' => __( 'Portfolio Categories' ),
    );

    register_taxonomy('portfolio_category',array('portfolio_item'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio_category' ),
    ));

    //require_once (BRANKIC_INCLUDES . 'bra_create_portfolio_select.php');
}

