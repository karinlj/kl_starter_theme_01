<?php
// feature_list layout for Pages Content block
if (get_row_layout() == 'feature_list') {
    $heading = get_sub_field('heading');
    $bgColor = get_sub_field('background_color'); ?>

    <section class="feature_list_section <?php echo $bgColor; ?> section_spacing_top_small">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if ($heading) { ?>
                        <h2 class="margin_4"><?php echo $heading; ?></h2>
                    <?php } ?>

                    <div class="row">
                        <!-- repeater field -->
                        <?php if (have_rows('feature_list')) { ?>
                            <?php while (have_rows('feature_list')) {
                                the_row();

                                $icon = get_sub_field('icon');
                                $item_heading = get_sub_field('item_heading');
                                $item_text = get_sub_field('item_text'); ?>
                                <div class="col-md-4">
                                    <div class="feature_list_item">

                                        <span class="features_icon">
                                            <i class="fa fa-<?php echo $icon; ?>" aria-hidden="true"></i>
                                        </span>
                                        <div>
                                            <h3><?php echo $item_heading; ?></h3>
                                            <p><?php echo $item_text; ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } ?>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
<?php
} ?>