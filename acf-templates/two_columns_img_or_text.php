<?php

/**
 * Created by Karin.
 * Layout 'two_columns_img_or_text' in flex content 'Pages Content block'
 */

if (get_row_layout() == 'two_columns_img_or_text') { ?>

    <section class="two_columns_section section_spacing_top_small">
        <div class="container">
            <?php
            //loopa repeater
            if (have_rows('two_columns_row')) {
                while (have_rows('two_columns_row')) {
                    the_row(); ?>
                    <div class="column_row">

                        <!-- loopa flex content -->
                        <?php if (have_rows('two_columns')) {
                            while (have_rows('two_columns')) {
                                the_row();

                                //Innehåll i kolumnerna
                                if (get_row_layout() == 'img') { ?>
                                    <div class="part image">
                                        <?php $img_id = get_sub_field('img'); ?>

                                        <?php $image = wp_get_attachment_image_src($img_id, 'full'); ?>
                                        <?php $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true); ?>

                                        <img class="pict" src="<?php echo $image[0]; ?>" alt="<?php echo $alt_text; ?>"
                                            title="Click on image to enlarge" />
                                        <span class="alt_caption"><?php echo $alt_text; ?></span>

                                    </div>
                                <?php
                                } ?>
                                <?php
                                if (get_row_layout() == 'text') { ?>
                                    <div class="part text">
                                        <h2 class="smaller_size_text"><?php the_sub_field('heading'); ?></h2>
                                        <p><?php the_sub_field('text'); ?></p>
                                    </div>
                        <?php
                                }
                            }
                        } ?>

                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
<?php
}
?>