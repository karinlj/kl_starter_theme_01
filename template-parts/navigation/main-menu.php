<?php
// header background
$color = get_field('header_background');
if (is_home() || is_archive()) {
    $color = get_field('header_background', get_option('page_for_posts'));
}
?>
<div id="nav-wrap" class="">
    <div class="container">

        <nav class="main_menu" role="navigation" aria-label="Main Navigation">
            <a class="logo_header" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Home page">
                <!--extra double size image for retina-->
                <!-- <?php
                if ($color === 'darkblue' | $color === 'blue') { ?>
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang_logo_reverse.png"
                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang_logo_reverse@2x.png 325w"
                        width="208" height="51" alt="Boozang home page" />
                <?php
                } else { ?>
                    <img
                        src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang.png"
                        srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang@2x.png 325w"
                        width="208" height="51" alt="Boozang home page" />
                <?php
                } ?> -->
                <span>Sample site</span>
            </a>

            <div class="nav_links">
                <?php  //wp_nav_menu();
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                ));
                ?>
                <section class="signup">
                    <ul>
                        <li>
                            <a class="btn_link green" href="<?php echo esc_url(home_url('#footer')); ?>"
                                aria-label="Kontakt">
                                Kontakta Oss
                            </a>
                        </li>
                    </ul>
                </section>
            </div>
            <!--hamburger-->
            <button class="menu_toggle_btn" aria-expanded="false" aria-label="Mobile Menu">
                <div aria-hidden="true"></div>
            </button>
        </nav>
    </div>

</div>

<div class="nav-mobile">
    <div class="nav_links">
        <?php  //wp_nav_menu();
        wp_nav_menu(array(
            'theme_location' => 'primary',
        ));
        ?>
        <div class="signup">
            <ul>
                <li>
                    <a class="btn_link green" href="<?php echo esc_url(home_url('#footer')); ?>"
                        aria-label="Kontakt">
                        Kontakta Oss
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>