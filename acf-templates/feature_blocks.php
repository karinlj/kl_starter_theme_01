<?php
// Feature blocks layout for Front Page Block

if (get_row_layout() == 'feature_blocks') {  ?>

    <section class="feature_blocks darkgreen section_spacing_top_medium">
        <div class="container">
            <?php
            $heading = get_sub_field('heading');
            $features_presentation = get_sub_field('features_presentation');
            $read_more_link = get_sub_field('read_more_link');

            if ($heading) { ?>
                <h2 class="feature_blocks_main_heading"> <?php echo $heading; ?></h2>
            <?php
            } ?>
            <div class="row">
                <div class="col-12 col-lg-4">
                    <?php if ($features_presentation) { ?>
                        <div class="features_presentation">
                            <?php echo $features_presentation; ?>
                        </div>
                    <?php
                    } ?>
                    <div>
                        <?php if ($read_more_link) { ?>
                            <a class="btn_link outline_color_white" href="<?php echo $read_more_link['url']; ?>" target="<?php echo $read_more_link['target']; ?>" rel="noopener noreferrer"><?php echo $read_more_link['title']; ?>
                            </a>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-12 col-lg-8">
                    <div class="row">
                        <?php   // check if the repeater field has rows
                        if (have_rows('feature_blocks_row')) {
                            while (have_rows('feature_blocks_row')) {
                                the_row(); ?>

                                <div class="col-6 col-md-4">
                                    <div class="feature_block">
                                        <div class="feature_text"><?php the_sub_field('featuretext'); ?></div>
                                    </div>
                                </div>
                        <?php   }
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php
} ?>