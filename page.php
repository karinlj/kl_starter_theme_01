<?php
/*
 * Template Name: Page
 * Description: Template for Default Page
 */
?>
<?php get_header(); ?>

    <?php
    $theParent = wp_get_post_parent_id(get_the_ID()); //if parent page, this will = 0
    $parent_active_class = '';

    if ($theParent) {
        $findChildrenOf = $theParent;
        $parent_active_class = '';
        // echo ' $theParent, findChildrenOf:' . $findChildrenOf;
        // echo ', $theParent, theParent :' . $theParent;
        // echo ', id:  ' . get_the_ID();
    } else {
        $findChildrenOf = get_the_ID();
        $parent_active_class = 'parent_active';
        // echo 'findChildrenOf: ' . $findChildrenOf;
        // echo ' , theParent:' . $theParent;
        // echo ', id:  ' . get_the_ID();
    }
    // echo $parent_active_class;
    $pagesArray = get_pages(array(
        'child_of' => get_the_ID()
    ));
    //if is child page or parent page
    if ($theParent or $pagesArray) {
    ?>
        <aside class="page_aside section_spacing_top_mini">
            <div class="container">
                <ul>
                    <li class=" <?php echo $parent_active_class; ?> ">
                        <a href="<?php echo get_permalink($theParent) ?>">
                            <?php echo get_the_title($theParent)  ?>
                        </a>
                    </li>
                    <?php wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' =>   $findChildrenOf

                    )); ?>
                </ul>
            </div>
        </aside>
    <?php
    }
    ?>
    <main class="page_main">
        <?php //layouts of content_block_pages
        if (function_exists('have_rows')) {
            if (have_rows('content_block_pages')) {
                while (have_rows('content_block_pages')) {
                    the_row();

                    $layout = get_row_layout();

                    //layout from templates folder
                    get_template_part('acf-templates/' . $layout);
                }
            }
        } ?>
    </main>
<?php get_footer(); ?>