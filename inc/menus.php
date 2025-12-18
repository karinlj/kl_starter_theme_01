<?php
// main menu
function kl_register_menus()
{
    //Nav menus
    register_nav_menus(array(
        'primary' => __('Primary Menu')
    ));
}
add_action('after_setup_theme', 'kl_register_menus');

//WCAG 2.0 Attributes for Dropdown Menus
function wcag_nav_menu_link_attributes($atts, $item, $args, $depth)
{
    // Add [aria-haspopup] and [aria-expanded] to menu items that have children
    $item_has_children = in_array('menu-item-has-children', $item->classes);
    if ($item_has_children) {
        $atts['aria-haspopup'] = "true";
        $atts['aria-expanded'] = "false";
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'wcag_nav_menu_link_attributes', 10, 4);
