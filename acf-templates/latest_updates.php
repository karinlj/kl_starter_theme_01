<?php

// latest_updates field for for Front Page Block
if (get_row_layout() == 'latest_updates') {
    
    $style = '';
    $bg_image = get_sub_field('background_image');

    if ($bg_image) {
        $style = 'style="background:url(\'' . wp_get_attachment_url($bg_image, 'full') . '\') no-repeat center; background-size: cover"';
    }  ?>
    <section class="latest_updates_section lightgrey section_spacing_top_medium" <?php echo $style; ?>>
        <div class="container">
            <div class="heading text_center_laptop margin_3"><?php the_sub_field('heading'); ?></div>
            <ul class="updates_tabs margin_3">
                <?php //repeater field
                if (have_rows('latest_updates_categories')) {
                    while (have_rows('latest_updates_categories')) {
                        the_row();
                        $text_field = get_sub_field('category_item');  ?>
                        <li class="">
                            <a href="#<?php echo $text_field; ?>" class="btn_link outline_color_dark_transparent updates_btn"><?php echo $text_field; ?></a>
                        </li>
                <?php  }
                }
                ?>
            </ul>
            <?php
            // repeater field
            if (have_rows('latest_updates_categories')) {
                while (have_rows('latest_updates_categories')) {
                    the_row();
                    $text_field = get_sub_field('category_item');
                    // echo  $text_field; 
            ?>
                    <ul class="updates_tab_content" id="<?php echo $text_field; ?>">

                        <?php if ($text_field == 'case-studies') {
                            $args = array(
                                'post_type' => 'post',
                                'category_name' => 'case-studies',
                                'post_status' => 'publish',
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC',
                            );
                        } else {
                            $args = (
                                array(
                                    'post_type' => 'videos',
                                    'posts_per_page' => 3,
                                    'post_status' => 'publish',
                                    'orderby' => 'date',
                                    'order'   => 'DESC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'film-category',
                                            'field' => 'slug',
                                            'terms' => $text_field,
                                        )
                                    )
                                )
                            );
                        } ?>

                        <?php $query = new WP_Query($args);
                        if ($query->have_posts()) {
                            while ($query->have_posts()) {
                                $query->the_post();
                                // your loop
                                $title = get_the_title();
                                $description = get_field('description');
                                $image = get_field('image');
                                $video_url = get_field('url');  ?>

                                <li class="card_container">
                                    <div class="img_container">
                                        <?php
                                        if ($image) {
                                            echo wp_get_attachment_image($image, 'full');
                                        } else if (has_post_thumbnail()) {
                                            $thumb_id = get_post_thumbnail_id();
                                            echo wp_get_attachment_image($thumb_id, 'full');
                                        }  ?>
                                    </div>
                                    <?php if ($video_url) { ?>
                                        <a class="embed_link" href="<?php echo $video_url; ?>" target="_blank" aria-label="<?php the_title(); ?>">
                                        </a>
                                    <?php } else { ?>
                                        <a class="embed_link" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
                                        </a>
                                    <?php } ?>
                                    <div class="card_content_container with_img">
                                        <?php echo '<span class="cat_badge">' . $text_field . '</span>'; ?>
                                        <div class="card_content_container_inner">
                                            <h3 class="title"><?php echo $title; ?></h3>

                                            <?php if ($description) { ?>
                                                <p class="description"><?php echo $description; ?></p>

                                            <?php } else { ?>
                                                <p class="description"><?php echo get_the_content();; ?></p>
                                            <?php   } ?>
                                        </div>
                                    </div>
                                </li>
                        <?php    }
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
            <?php  }
            }
            ?>
        </div>
    </section>
<?php
}
?>