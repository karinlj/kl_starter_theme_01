<?php
//video categories
function bn_custom_taxonomies()
{
    // new custom taxonomy hierarchical for videos
    $labels = array(
        'name' => 'Film Categories',
        'singular_name' => ' Film Category',
        'search_items' => 'Search Film Category',
        'all_items' => 'All Film Categories',
        'parent_item' => 'Parent Film Category',
        'parent_item_colon' => 'Parent Film Category:',
        'edit_item' => 'Edit Film Category',
        'update_item' => 'Update Film Category',
        'add_new_item' => 'Add New Film Category',
        'new_item_name' => 'New Film Category Name',
        'menu_name' => 'Film Categories',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'film-category'),
    );
    register_taxonomy('film-category', array('videos'), $args);
}
add_action('init', 'bn_custom_taxonomies');
