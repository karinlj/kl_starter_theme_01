<?php

//ACF options page
function my_add_options_page() {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page( array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
        ) );
    }
}
add_action('acf/init', 'my_add_options_page');


//collapse acf fields
function my_acf_admin_head()
{
?>
    <script type="text/javascript">
        (function($) {
            $(document).ready(function() {
                $('.layout').addClass('-collapsed');
                $('.acf-postbox').addClass('closed');
            });
        })(jQuery);
    </script>
<?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');
