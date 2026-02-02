<!-- signup field -->
<section class="signup_section  section_spacing_top_small">
    <div class="container">
        <?php
        $footer_text = get_field('footer_text', 'option');
        $sign_up_link = get_field('sign_up_link', 'option');
        $sign_up_link_demo = get_field('sign_up_link_demo', 'option'); ?>
        <div class="text_center">

            <h2>Som text and buttons here..</h2>
            <?php if ($footer_text) { ?>
                <?php echo $footer_text; ?>
            <?php
            } ?>
        </div>
        <div class="btn_container">
            <?php if ($sign_up_link) { ?>
                <a class="btn_link green" href="<?php echo $sign_up_link['url']; ?>" target="<?php echo $sign_up_link['target']; ?>" rel="noopener noreferrer"><?php echo $sign_up_link['title']; ?>
                </a>
            <?php } ?>
            <?php if ($sign_up_link_demo) { ?>
                <a class="btn_link outline_color_dark" href="<?php echo $sign_up_link_demo['url']; ?>" target="<?php echo $sign_up_link_demo['target']; ?>" rel="noopener noreferrer"><?php echo $sign_up_link_demo['title']; ?>
                </a>
            <?php } ?>
        </div>
    </div>
</section>

<!-- footer -->
<footer id="footer" class="footer_main section_spacing_top_small">
    <div class="container">
        <div class="row align-items-start justify-content-between">
            <div class="col-12 col-md-6 col-xl-3">
                <div class="logo">
                    <a href="<?php echo home_url() ?>" class="logo" aria-label="Home page">
                        <h2 class="colored_light_green_part">Sample site logo</h2>

                        <!-- <img class="logo_img" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang_logo_reverse.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/boozang_logo_reverse@2x.png 325w" width="208" height="51" alt="Boozang home page" /> -->
                    </a>
                </div>
                <div class="customer_contact" id="contact_us">
                    <p>Skicka ett email eller ring!</p>


                    <!-- <a href="mailto:sample_site@gmail.com" class="underscore_link colored_blue_part" >sample_site@gmail.com</a> -->
                    <?php $mail_link = get_field('mail_link', 'option');
                    if ($mail_link) { ?>
                        <div>
                            <span class="email_icon colored_light_green_part"><i class="fa-regular fa-envelope"></i>
                            </span><a href="<?php echo esc_url('mailto:' . antispambot(($mail_link))); ?>" class="underscore_link colored_light_green_part" target="_top" aria-label="Company email"><?php echo esc_html($mail_link); ?>
                            </a>
                        </div>

                    <?php   } ?>
                    <?php $telephone = get_field('telephone', 'option');
                    if ($telephone) { ?>
                        <div>
                            <span class="email_icon colored_light_green_part"><i class="fa-solid fa-phone"></i>
                            </span>
                            <a href="<?php echo $telephone; ?>" class="underscore_link colored_light_green_part" target="_top" aria-label="Company telephone"><?php echo $telephone; ?>
                            </a>
                        </div>

                    <?php   } ?>
                </div>
                <div class="social_icons">
                    <ul class="social">
                        <!-- repeater -->
                        <?php if (have_rows('social_icons', 'option')) {
                            while (have_rows('social_icons', 'option')) {
                                the_row();

                                $social_url = get_sub_field('social_url');
                                $social_site = get_sub_field('social_site'); ?>
                                <li class="social_item">
                                    <a href="<?php echo $social_url; ?>" aria-label="<?php echo $social_site; ?>">
                                        <i class="fa-brands fa-<?php echo $social_site; ?>" aria-hidden="true"></i>
                                    </a>
                                </li>
                        <?php
                            }
                        } ?>
                    </ul>
                </div>
            </div>

             <div class="col-md-12 col-xl-8">
                <div class="row align-items-start links">
                    <?php
                    if (function_exists('acf_add_options_page')) {
                        //repeater field
                        if (have_rows('footer_links', 'option')) {
                            while (have_rows('footer_links', 'option')) {
                                the_row(); ?>

                                <div class="col-6 col-md-3">
                                    <p class="footer_links_heading"><?php the_sub_field('heading'); ?> </p>
                                    <!-- repeater field -->
                                    <?php if (have_rows('links')) {  ?>
                                        <ul class="footer_links">
                                            <?php while (have_rows('links')) {
                                                the_row(); ?>

                                                <?php $link = get_sub_field('link'); ?>
                                                <li class="link_item">
                                                    <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </div>
                    <?php }
                        }
                    }  ?>
                </div>
            </div>
        </div>

        <div class="footer_copy">
            <div class="container">
                <div class="row align-items-start justify-content-between">
                    <div class="col-10">

                        <div class="copy">
                            <p>&copy; <?php echo Date('Y'); ?> - <?php bloginfo('name'); ?> All rights reserved. </p>
                            <p>Site & design av <a href="http://frilans.karinljunggren.com/" target="_blank" rel="noopener noreferrer" aria-label="Karin Ljunggren Home Page"><span class="colored_green_part">Karin Ljunggren</span></a>
                                | <a href="http://localhost/privacy-policy/" target="_blank" rel="noopener noreferrer" aria-label="Integritetspolicy"><span class="colored_green_part">Integritetspolicy</span></a></p>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="back_to_top_link">
                            <a href="#header_top" aria-label="To top of page">
                                <i class="fas fa-angle-up" aria-hidden="true" aria-label="Toppen av sidan" title="To top of page"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>