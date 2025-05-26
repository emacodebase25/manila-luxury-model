<?php
/**
 * Template part for displaying reviews
 */
?>

<section class="review py-5 bg-black">
    <div class="container">
        <h2 class="title-home text-center"><?php _e('Latest Review', 'manila-luxury-model'); ?></h2>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'review',
                'posts_per_page' => 3
            );
            
            $reviews = new WP_Query($args);
            
            if ($reviews->have_posts()) :
                while ($reviews->have_posts()) : $reviews->the_post();
                    $model_id = get_post_meta(get_the_ID(), 'review_model_id', true);
                    $model = get_post($model_id);
                    $rating_looks = get_post_meta(get_the_ID(), 'rating_looks', true);
                    $rating_service = get_post_meta(get_the_ID(), 'rating_service', true);
                    ?>
                    <div class="col-sm-4 review-section">
                        <div class="bg-white p-3">
                            <h3><?php echo $model ? $model->post_title : __('Anonymous', 'manila-luxury-model'); ?></h3>
                            <div class="d-flex align-items-start">
                                <div class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                                    <?php if ($model && has_post_thumbnail($model_id)) : ?>
                                        <?php echo get_the_post_thumbnail($model_id, 'thumbnail', array('class' => 'img-rounded', 'style' => 'height: 160px;')); ?>
                                    <?php else : ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial.jpg" height="160px" class="img-rounded">
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <p><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="testi-monial">
                            <div class="tag"><?php echo get_the_date('F d'); ?></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <span><?php _e('Looks:', 'manila-luxury-model'); ?> 
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fa-solid fa-star<?php echo $i <= $rating_looks ? '' : '-o'; ?>"></i>
                                        <?php endfor; ?>
                                    </span>
                                </div>
                                <div class="btn-group">
                                    <span><?php _e('Service:', 'manila-luxury-model'); ?> 
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fa-solid fa-star<?php echo $i <= $rating_service ? '' : '-o'; ?>"></i>
                                        <?php endfor; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
        <center class="mt-3">
            <a href="<?php echo get_permalink(get_page_by_path('submit-review')); ?>" class="btn btn-dark btn-lg">
                <?php _e('Click Here to add a Review »', 'manila-luxury-model'); ?>
            </a>
        </center>
    </div>
</section>