<?php
/**
 * Template part for displaying articles
 */
?>

<section class="articals py-3">
    <div class="container">
        <h2 class="text-white text-center mb-3"><?php _e('Our e-Magazine With Interesting Articles', 'manila-luxury-model'); ?></h2>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => 'magazine' // You can create this category
            );
            
            $articles = new WP_Query($args);
            
            if ($articles->have_posts()) :
                $i = 0;
                while ($articles->have_posts()) : $articles->the_post();
                    if ($i == 0) : // First large article
                        ?>
                        <div class="col-sm-6">
                            <div class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', array('class' => 'article-image')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/berlin-museum-travel-companion-visits 1.jpg" class="article-image" alt="Article">
                                <?php endif; ?>
                                <div class="article-overlay">
                                    <h3 class="article-title"><?php the_title(); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                        <?php
                    else : // Smaller articles
                        ?>
                        <div class="col-sm-12">
                            <div class="article-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', array('class' => 'article-image')); ?>
                                <?php else : ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/image (5).jpg" class="article-image" alt="Article">
                                <?php endif; ?>
                                <div class="article-overlay">
                                    <h3 class="article-title"><?php the_title(); ?></h3>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    $i++;
                endwhile;
                
                if ($i > 1) : // Close the row div
                    ?>
                            </div>
                        </div>
                    <?php
                endif;
                
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>