<!-- faq accordion layout for Pages Content block-->

<?php if (get_row_layout() == 'faq_accordion') {
    $heading = get_sub_field('heading');
    $bgColor = get_sub_field('background_color'); ?>

    <section class="faq_accordion_section <?php echo $bgColor; ?> section_spacing_top_small">
        <div class="container">
            <?php if ($heading) { ?>
                <h2 class="margin_4"><?php echo $heading; ?></h2>
            <?php } ?>

            <div class="row">
                <div class="col-md-10">
                    <?php if (have_rows('faq_accordion_list')) { ?>
                        <?php while (have_rows('faq_accordion_list')) {
                            the_row();

                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer'); ?>

                            <button class="accordion_btn" aria-expanded="false" aria-label="FAQ content">
                                <div class="heading">
                                    <h3 class="smaller_size_text"><?php echo $question; ?>
                                    </h3>
                                    <i class="fas fa-angle-down" aria-hidden="true" aria-label="Open faq content"></i>
                                </div>
                                <div class="accordion_content medium_text">
                                    <p><?php echo $answer; ?></p>
                                </div>
                            </button>
                    <?php
                        }
                    } ?>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>
