<?php

/**
 * Created by Karin.
 * Layout 'front_text_image_field' in flex content 'Front Page block'
 */
if (get_row_layout() == 'front_text_image_field') {

    $color = get_sub_field('background_color');
    $column_class = 'big_image';
    $padding_class = 'section_spacing_top_small';
    $shadow_class = '';

    $big_or_small_image = get_sub_field('big_or_small_image');
    $narrow_field =  get_sub_field('narrow_field');
    $box_shadow_on_image = get_sub_field('box_shadow_on_image');

    if ($narrow_field == 'true') {
        $padding_class = 'section_spacing_top_small';
    }
    if ($big_or_small_image == 'small_image') {
        $column_class = 'small_image';
    }
    if ($box_shadow_on_image == 'false') {
        $shadow_class = 'box_shadow_off';
    }

?>
    <section class="two_columns_section <?php echo $column_class; ?> <?php echo $color; ?> <?php echo $padding_class; ?>">
        <div class="container">
            <?php
            $color = get_sub_field('background_color'); ?>
            <section class="column_row ">
                <!-- loopa flex content -->
                <?php if (have_rows('two_columns')) {
                    while (have_rows('two_columns')) {
                        the_row();

                        //Innehåll i kolumnerna
                        if (get_row_layout() == 'img') { ?>
                            <div class="part image <?php echo $shadow_class; ?>">
                                <?php $img_id = get_sub_field('img'); ?>
                                <?php $image = wp_get_attachment_image_src($img_id, 'full'); ?>
                                <?php $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>

                                <img src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>" class="pict" />
                                <span class="alt_caption"><?php echo $alt_text; ?></span>
                            </div>
                        <?php
                        } ?>
                        <?php
                        if (get_row_layout() == 'text') { ?>
                            <div class="part text">
                                <div><?php the_sub_field('text'); ?></div>

                                <?php $link = get_sub_field('link'); ?>
                                <?php $link_no_2 = get_sub_field('link_no_2'); ?>

                                <?php
                                $btn_class = 'outline_color_white';
                                if ($color == 'white') {
                                    $btn_class = 'outline_color_dark';
                                } ?>
                                <?php if ($link) { ?>
                                    <a class="btn_link <?php echo $btn_class ?>" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"
                                        rel="noopener noreferrer"><?php echo $link['title']; ?>
                                    </a>
                                <?php } ?>
                                <?php if ($link_no_2) { ?>
                                    <a class="btn_link <?php echo $btn_class ?>" href="<?php echo $link_no_2['url']; ?>" target="<?php echo $link_no_2['target']; ?>"
                                        rel="noopener noreferrer"><?php echo $link_no_2['title']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                <?php
                        }
                    }
                } ?>
            </section>
        </div>
    </section>
<?php
}
?>