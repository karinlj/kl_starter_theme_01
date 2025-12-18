<div class="video_filter section_spacing_top_mini">
    <div class="container">
        <nav class="filter_nav">
            <ul class="video_categories">
                <?php $post_type = 'videos';

                if (isset($_GET['filter'])) {
                    $filter = $_GET['filter'];
                } else {
                    $filter = 'getting-started';
                } ?>

                <?php    // Get all the taxonomies for this post type
                $taxonomies = get_object_taxonomies((object) array('post_type' => $post_type));
                foreach ($taxonomies as $taxonomy) {
                    // Gets every "category" (term) in this taxonomy to get the respective posts
                    $terms = get_terms($taxonomy); ?>

                    <?php foreach ($terms as $term) {
                        if ($term->slug === $filter) {
                            $activeClass = 'current-cat';
                        } else {
                            $activeClass = '';
                        } ?>
                        <li class="cat-item <?php echo $activeClass ?>"><a href="/Boozang/videos?filter=<?php echo $term->slug ?>" aria-label="Category: <?php echo $term->name ?>">
                                <?php echo $term->name ?></a>
                        </li>
                <?php   }
                } ?>
            </ul>
        </nav>
    </div>
</div>
<section class="video_section section_spacing_top_small">
    <div class="container">
        <div class="row">
            <?php
            $post_type = 'videos';
            // Get all the taxonomies for this post type
            $taxonomies = get_object_taxonomies((object) array('post_type' => $post_type));

            foreach ($taxonomies as $taxonomy) {

                // Gets every "category" (term) in this taxonomy to get the respective posts
                $terms = get_terms($taxonomy); ?>

                <?php foreach ($terms as $term) { ?>

                    <?php $posts = new WP_Query("taxonomy=$taxonomy&term=$term->slug&posts_per_page=-1"); ?>

                    <?php if ($posts->have_posts() && !isset($filter) || $term->slug === $filter) {
                        while ($posts->have_posts()) {
                            $posts->the_post();

                            $title = get_the_title();
                            $description = get_field('description');
                            $image = get_field('image');
                            $video_url = get_field('url');
                    ?>
                            <div class="col-sm-6 col-md-4">
                                <div class="card_container">
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
                                        <?php echo '<span class="cat_badge">' . $term->name . '</span>'; ?>
                                        <div class="card_content_container_inner">
                                            <h3 class="title"><?php echo $title; ?></h3>

                                            <?php if ($description) { ?>
                                                <p class="description"><?php echo $description; ?></p>
                                            <?php } else { ?>
                                                <p class="description"><?php echo get_the_content();; ?></p>
                                            <?php   } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php   }
                    }
                }
            } ?>
        </div>
    </div>
    </div>
    </div>
</section>