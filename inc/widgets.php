<?php

function wpb_init_widgets($id)
{
    //blog sidebar
    register_sidebar(array(
        'name' => 'Sidebar-blog',
        'id' => 'sidebar-blog',
        'before_widget' => '<nav class="filter_nav">',
        'after_widget' => '</nav>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Sidebar-forum',
        'id' => 'sidebar-forum',
        'before_widget' => '<div class="sidebar_forum">',
        'after_widget' => '</div>',
    ));
}
add_action('widgets_init', 'wpb_init_widgets');
