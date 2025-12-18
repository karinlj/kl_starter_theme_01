<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset=" <?php bloginfo('charset'); ?> ">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content=" <?php bloginfo('description'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php //header field variables
    $page_domain   = null; //     $page_domain = get_option('page_for_posts'

    if (is_home() || is_archive()) {
        $page_domain = get_option('page_for_posts');
    }
    $header_class = 'header_main';
    $style = '';
    $row_class = 'justify-content-start';
    $col_class = 'col-md-10';
    $bg_image = get_field('background_image', $page_domain);
    $overlay_color = '';
    $color = get_field('header_background', $page_domain);
    $header_heading = get_field('header_heading', $page_domain);
    $header_text = get_field('header_text');
    $header_btn_links = get_field('btn_links', $page_domain);
    $telephone_link = get_field('telephone_link');

    if (is_front_page()) {
        $header_class = 'header_main darkgreen front';
        $row_class = 'justify-content-start';
        $col_class = 'col-md-10';
    }
    if (is_404()) {
        $header_class = 'header_main darkgreen not_found';
        $row_class = 'justify-content-start';
        $col_class = 'col-md-10';
    }
    if (is_singular('post')) {
        $header_class = 'header_main single_post';
    }
    if ($bg_image) {
        $style = 'style="background:url(\'' . wp_get_attachment_url($bg_image, 'full') . '\') no-repeat center; background-size: cover"';
        $overlay_color = get_field('overlay_color', $page_domain);
    }  ?>
    <header id="header_top" class="<?php echo $header_class; ?> <?php echo $color; ?> <?php echo $overlay_color; ?>"
        <?php echo $style; ?>>

        <!-- get menu -->
        <?php get_template_part('template-parts/navigation/main-menu'); ?>

        <div class="header_items_section section_spacing_top_small">
            <div class="container">
                <div class="row <?php echo $row_class; ?>">
                    <div class="<?php echo $col_class; ?>">
                        <!-- heading and text-->
                        <div class="header_items_text">
                            <?php
                            if ($header_heading) { ?>
                                <h1 class="header_heading"><?php echo $header_heading; ?></h1>
                            <?php }  ?>

                            <?php if ($header_text) { ?>
                                <p class="header_text"><?php echo $header_text; ?></p>
                            <?php } ?>
                            <!-- <?php if (is_singular('post')): ?> <h1> <?php the_title(); ?></h1>
                            <?php endif; ?> -->
                            <?php if (is_404()) : ?><h1 class="not_found">Oops! Inget på denna sida.</h1>
                            <?php endif; ?>
                        </div>

                        <!-- button links -->
                        <div class="btn_container">
                            
                            <?php if (have_rows('btn_links')) { ?>
                                <?php while (have_rows('btn_links')) {
                                    the_row();
                                    $link = get_sub_field('link');

                                    $btn_color = get_sub_field('btn_color'); ?>
                                    <?php
                                    if ($link) { ?>
                                        <a class="btn_link <?php echo $btn_color; ?>" href="<?php echo $link['url']; ?>"
                                            rel="noopener noreferrer"
                                            target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?>
                                        </a>
                                <?php }
                                } ?>

                            <?php  } ?>

                            <?php if ($telephone_link) { ?>
                                <div>
                                    <span class="email_icon colored_light_green_part"><i class="fa-solid fa-phone"></i>
                                    </span>
                                    <a class="underscore_link colored_light_green_part" href="tel:<?php echo $telephone_link; ?>"><?php echo $telephone_link; ?>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>