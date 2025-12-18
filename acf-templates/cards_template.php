<?php
if (get_row_layout() == 'cards_template') {

    $style = '';
    $bg_color = get_sub_field('background_color');
    $bg_image = get_sub_field('background_image');
    $overlay_color_class = '';
    if ($bg_image) {
        $style = 'style="background:url(\'' . wp_get_attachment_url($bg_image, 'full') . '\') no-repeat center; background-size: cover"';
        $overlay_color_class = 'overlay-darker';
    }  ?>

    <section class="cards_template <?php echo $bg_color ?> section_spacing_top_medium <?php echo $overlay_color_class; ?>" <?php echo $style; ?>>
        <div class="container">
            <?php
            $heading = get_sub_field('heading');
            $text = get_sub_field('text'); ?>

            <?php if ($heading) { ?>
                <h2><?php echo $heading ?></h2>
            <?php
            } ?>
            <?php if ($text) { ?>
                <p class="medium_text margin_2"><?php echo $text ?></p>
            <?php
            } ?>
            <ul class="cards_template_content">
                <?php
                // check if the repeater field has rows
                if (have_rows('single_card')) {
                    while (have_rows('single_card')) {
                        the_row(); ?>

                        <li class="card_container">
                            <div class="card_content_container">
                                <div class="icon">
                                    <i class="<?php echo the_sub_field('icon_code') ?>" aria-hidden="true"></i>
                                </div>
                                <h3 class="title"><?php the_sub_field('heading'); ?></h3>
                                <p class="card_text"><?php the_sub_field('text'); ?></p>

                                <?php $link = get_sub_field('link');
                                $btn_class = 'btn_link outline_color_green'
                                ?>
                                <?php if ($bg_color === 'darkgreen') {
                                    $btn_class = 'btn_link outline_color_lightgreen';
                                } ?>
                                <?php if ($bg_image) {
                                    $btn_class = 'btn_link outline_color_white';
                                } ?>

                                <?php if ($link) { ?>
                                    <a class="<?php echo $btn_class ?>" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target']); ?>" rel="noopener noreferrer"><?php echo esc_html($link['title']); ?>
                                    </a>
                                <?php   } ?>
                            </div>
                        </li>
                <?php
                    }
                } ?>
        </div>
        </div>
    </section>
<?php
}
?>