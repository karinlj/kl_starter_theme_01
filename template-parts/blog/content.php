<?php
//blog variables - default: (!is_single()
$col_class = 'col-sm-6 col-lg-4';
$post_class = 'card_container';
?>
<?php if (is_single()) {
    $col_class = 'col-lg-10 offset-lg-1';
} ?>
<div class="<?php echo $col_class; ?>">

    <?php if (is_single()) {
        $post_class = 'card_container single';
    } ?>
    <div class="<?php echo $post_class; ?>">
            <div class="img_container">
                <?php the_post_thumbnail(); ?>
            </div>

        <!-- link if blog page  -->
        <?php if (!is_single()) { ?>
            <a class="embed_link" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>">
            </a>
        <?php } ?>

        <div class="card_content_container with_img">
            <?php $categories = get_the_category();
            $separator = " ";
            $output = '';

            if ($categories) {
                foreach ($categories as $category) {
                    // categories as a link separated by comma
                    $output .= '<a class ="cat_badge" href=" ' . get_category_link($category->term_id) . ' ">' . $category->cat_name . '</a>' . $separator;
                }
                //trim takes $output and removes $separator
                echo trim($output, $separator);
            }
            ?>
            <?php if (!is_single()) { ?>
                <div class="card_content_container_inner">
                <h3 class="title">
                    <?php the_title(); ?>
                </h3>
                <?php } ?>

                <!-- title and meta - single-->
                <?php if (is_single()) { ?>
                    <h1 class="title">
                    <?php the_title(); ?>
                </h1>
                    <div class="blog_post_meta">
                        <p>by <?php the_author(); ?> &nbsp; | &nbsp;</p>
                        <p><?php echo get_the_date('F j, Y'); ?></p>
                    </div>
                <?php } ?>

                <!-- content and exerpt-->
                <p class="description">
                    <!--if search.php or archive.php -> show only excerpts-->
                    <?php if (is_search() or is_archive()) { ?>
                        <?php echo get_the_excerpt(); ?>
                        <?php } else {

                        /*if excerpt used in adminGUI -> show excerpt*/
                        if ($post->post_excerpt) { ?>
                            <?php echo get_the_excerpt(); ?>
                        <?php } else { ?>
                            <?php echo the_content(); ?>
                    <?php }
                    } ?>
                </p>

                <?php if (!is_single()) { ?>
                    <!--/end  card_content_container_inner -->
                </div>
            <?php } ?>

            <!-- meta - blog page-->
            <?php if (!is_single()) { ?>
                <div class="blog_post_meta">
                    <p>by <?php the_author(); ?></p>
                    <p><?php echo get_the_date('F j, Y'); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>