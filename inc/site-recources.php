<?php
//All resourses for the site

//Scripts
function kl_script_resourses()
{
    //name, absolute path, dependencies, version, in_footer
    wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '1.12.4', true);
    wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/a9f08520e7.js', array(), '6.7.2', true);

    wp_register_script(
        'custom_script',
        home_url() . '/wp-content/themes/kl_starter_theme_01/assets/js/custom_script.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_enqueue_script('custom_script');
}
add_action('wp_enqueue_scripts', 'kl_script_resourses');

//Styles
function kl_style_resourses()
{
    //name, absolute path, dependencies, version, media
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap-v4-grid-only@1.0.0/dist/bootstrap-grid.min.css');

    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0.0', 'all');

    wp_enqueue_style('kl_starter_theme_01_style', get_stylesheet_directory_uri() . '/assets/css/custom.css');
}
add_action('wp_enqueue_scripts', 'kl_style_resourses');

//Fonts
function google_fonts()
{
    //Av någon anledning knasar det med wp_enqueue_script
?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet">
<?php
}
add_action('wp_head', 'google_fonts');

?>