 <?php
    /*
 * The template for displaying 404 pages (Not Found)
 */
    get_header(); ?>
 <?php
    if (function_exists('acf_add_options_page')) { ?>
     <main class="page_main">
         <section class="nopage_section section_spacing_top_mini">
             <div class="container">
                 <div class="row">
                     <div class="col-md-10">
                         <section class="">
                             <h2 class="nopage_heading"><?php the_field('404_heading', 'option'); ?>
                             </h2>
                             <div class="nopage_text"><?php the_field('404_content', 'option'); ?></div>
                         </section>
                     </div>
                 </div>
             </div>
         </section>
     </main>

 <?php
    }
    ?>
 <?php get_footer(); ?>