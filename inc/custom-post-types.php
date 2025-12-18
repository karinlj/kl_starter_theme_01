<?php
//videos
function bn_custom_post_types()
{
    $labels = array(
        'name' => __('Videos', ''),
        'singular_name' => __('Video', ''),
        'menu_name' => __('Videos', ''),
        'all_items' => __('All videos', ''),
        'add_new' => __('Add new', ''),
        'add_new_item' => __('Add new video', ''),
        'edit_item' => __('Edit item', ''),
        'new_item' => __('New video', ''),
        'view_item' => __('Show video', ''),
        'search_items' => __('Search for videos', ''),
        'not_found' => __('No videos found', ''),
        'not_found_in_trash' => __('No videos found in trash', ''),
        'featured_image' => __('Featured image for video', ''),
        'set_featured_image' => __('Choose Featured image for video', ''),
        'remove_featured_image' => __('Removed Featured image for video', ''),
        'use_featured_image' => __('Choose Featured image for this video', ''),
        'archives' => __('video-arkive', ''),
        'insert_into_item' => __('Add into video', ''),
        'uploaded_to_this_item' => __('Uploaded to this video', ''),
    );

    $args = array(
        'label' => __('Videos', ''),
        'labels' => $labels,
        'description' => '',
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => false,
        'rest_base' => '',
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'page',
        'map_meta_cap' => true,
        'hierarchical' => true, //för under-videos
        'rewrite' => array('slug' => __('videos'), 'with_front' => true),
        'query_var' => 'videos',
        'menu_position' => 5,
        'menu_icon' => 'dashicons-cart',
        'supports' => array('title', 'revisions', 'page-attributes'),
    );

    register_post_type('videos', $args);
}
add_action('init', 'bn_custom_post_types');
