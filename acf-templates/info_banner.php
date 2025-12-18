<?php
// get started layout for  Pages Content block
if (get_row_layout() == 'info_banner') { ?>

    <?php
    $style = '';
    $color = get_sub_field('color_theme');
    $bg_image = get_sub_field('background_image');

    if ($bg_image) {
        $style = 'style="background:url(\'' . wp_get_attachment_url($bg_image, 'full') . '\') no-repeat center; background-size: cover"';
        $overlay_color = get_sub_field('overlay_color');
    }
    ?>
    <section class="info_banner <?php echo $color; ?> <?php echo $overlay_color; ?> section_spacing_top_small"
        <?php echo $style; ?>>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $heading = get_sub_field('heading');
                    $text = get_sub_field('text');
                    ?>
                    <h2 class=""><?php echo $heading; ?></h2>
                    <p class=""><?php echo $text; ?></p>

                    <?php if (have_rows('banner_links')) {
                        while (have_rows('banner_links')) {
                            the_row(); ?>

                            <?php $link = get_sub_field('link');?>
                            <div class="link_wrapper">
                                <?php if ($link) { ?>
                                    <a class="underscore_link" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" rel="noopener noreferrer"><?php echo esc_html($link['title']); ?>
                                    </a>
                                <?php   } ?>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php
} ?>