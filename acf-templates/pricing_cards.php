 <?php
    // pricing layout for Pages Content block
    if (get_row_layout() == 'pricing_cards') { ?>

     <section class="pricing_section section_spacing_top_small">
         <div class="container">
             <div class="row align-items-center">
                 <?php
                    //repeater
                    if (have_rows('pricing_cards')) {
                        while (have_rows('pricing_cards')) {
                            the_row();
                            $color = get_sub_field('color');
                            $heading = get_sub_field('heading');
                            $text = get_sub_field('text'); ?>

                         <div class="col-12 col-md-6 col-xl-4">
                             <div class="card_container">
                                 <div class="card_content_container pricing_card <?php echo $color; ?>">
                                     <div class="pricing_card_body">
                                         <header class="pricing_card_header">
                                             <div class="">
                                                 <h2 class="smaller_size_text"><?php echo $heading; ?></h2>
                                                 <h3 class="smaller_size_text"><?php echo $text; ?></ph3>
                                             </div>
                                         </header>
                                         <main>
                                             <ul class="feat_list">
                                                 <?php
                                                    //repeater field
                                                    if (have_rows('features_list')) {
                                                        while (have_rows('features_list')) {
                                                            the_row();
                                                            $feature = get_sub_field('feature'); ?>
                                                         <li class="list_item"><?php echo $feature; ?></li>
                                                
                                                         <?php }
                                                    } ?>
                                             </ul>
                                         </main>

                                         <?php
                                            $price = get_sub_field('price');
                                            $price_text = get_sub_field('price_text'); ?>
                                         <footer class="price">
                                             <h3 class="number"><?php echo $price; ?>
                                                 <span><?php echo $price_text; ?></span>
                                             </h3>
                                         </footer>
                                         <?php
                                            $btn_link = get_sub_field('button_link');
                                            $btn_class = 'btn_link blue';

                                            if ($color === 'blue' || $color === 'darkblue') {
                                                $btn_class = 'btn_link outline_color_white';
                                            } ?>
                                         <?php if ($btn_link) { ?>
                                             <a class="<?php echo $btn_class ?>" href="<?php echo esc_url($btn_link['url']); ?>" target="<?php echo esc_attr($btn_link['target']); ?>" rel="noopener noreferrer"><?php echo esc_html($btn_link['title']); ?>
                                             </a>
                                         <?php   } ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                 <?php
                        }
                    } ?>
             </div>
         </div>
     </section>
 <?php
    }
    ?>