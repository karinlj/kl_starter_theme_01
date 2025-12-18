<?php
//Featured Image Support
function bn_theme_setup()
{
    add_theme_support('post-thumbnails');
    //width, height, hard-or soft cropping(hard)
    add_image_size('small-thumbnail', 230, 144, true);
    add_image_size('normal-thumbnail', 320, 380, true);
    add_image_size('large-thumbnail', 500, 375, true);
}
add_action('after_setup_theme', 'bn_theme_setup');

//favicon
function favicon()
{ ?>
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

<?php }
add_action('wp_head', 'favicon', 99);


//remove emoji support
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

//remove block library css
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
});

//limit post revisions
if (!defined('WP_POST_REVISIONS')) define('WP_POST_REVISIONS', 3);
