<?php
//wysiwyg front page
if (get_row_layout() == 'text_content') { ?>

    <?php
    $wider_field = get_sub_field('wider_field');
    $text = get_sub_field('text');
    $column_class = 'col-12 col-lg-10';

    if ($wider_field == 'true') {
        $column_class = 'col-12';
    }
    ?>
    <section class="text_section_pages section_spacing_top_small">
        <div class="container">
            <div class="row">
                <div class="<?php echo $column_class; ?>">
                    <div class="text_content">
                        <?php echo $text; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
}
?>