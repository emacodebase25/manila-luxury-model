<?php
/**
 * Template Name: Model Detail Page
 */

get_header(); ?>

<section class="model-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <!-- Carousel -->
                <div id="demo" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    </div>
                    
                    <div class="carousel-inner">
                        <?php
                        $gallery = get_post_meta(get_the_ID(), 'model_gallery', true);
                        if ($gallery) {
                            $images = explode(',', $gallery);
                            $i = 0;
                            foreach ($images as $image_id) {
                                $active = $i === 0 ? 'active' : '';
                                echo '<div class="carousel-item ' . $active . '">';
                                echo wp_get_attachment_image($image_id, 'large', false, array('class' => 'd-block w-100'));
                                echo '</div>';
                                $i++;
                            }
                        } else {
                            ?>
                            <div class="carousel-item active">
                                <?php the_post_thumbnail('large', array('class' => 'd-block w-100')); ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            
            <div class="col-sm-8">
                <h3 class="text-white"><?php the_title(); ?> (<?php echo get_post_meta(get_the_ID(), 'model_age', true); ?>)</h3>
                
                <table class="table">
                    <tr>
                        <th><?php _e('Figure Details', 'manila-luxury-model'); ?></th>
                        <th><?php _e('Other Details', 'manila-luxury-model'); ?></th>
                    </tr>
                    <tr>
                        <td>
                            <table class="table">
                                <tr><td><b><?php _e('Age:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_age', true); ?></td></tr>
                                <tr><td><b><?php _e('Height:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_height', true); ?></td></tr>
                                <tr><td><b><?php _e('Weight:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_weight', true); ?></td></tr>
                                <tr><td><b><?php _e('Bust:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_bust', true); ?></td></tr>
                                <tr><td><b><?php _e('Waist:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_waist', true); ?></td></tr>
                                <tr><td><b><?php _e('Hips:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_hips', true); ?></td></tr>
                            </table>
                        </td>
                        <td>
                            <table class="table">
                                <tr><td><b><?php _e('Hair:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_hair', true); ?></td></tr>
                                <tr><td><b><?php _e('Eyes:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_eyes', true); ?></td></tr>
                                <tr><td><b><?php _e('Nationality:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_nationality', true); ?></td></tr>
                                <tr><td><b><?php _e('Languages:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_languages', true); ?></td></tr>
                                <tr><td><b><?php _e('Orientation:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_orientation', true); ?></td></tr>
                                <tr><td><b><?php _e('Available:', 'manila-luxury-model'); ?></b></td><td><?php echo get_post_meta(get_the_ID(), 'model_availability', true); ?></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Rates -->
<section class="model-rate py-3">
    <div class="container">
        <table class="table table-bordered text-center">
            <tr>
                <td><b><?php _e('Time', 'manila-luxury-model'); ?></b></td>
                <td><b><?php _e('Rounds', 'manila-luxury-model'); ?></b></td>
                <td><b><?php _e('Outcalls', 'manila-luxury-model'); ?></b></td>
            </tr>
            <?php
            $rates = get_post_meta(get_the_ID(), 'model_rates', true);
            if ($rates) {
                foreach ($rates as $rate) {
                    echo '<tr>';
                    echo '<td>' . $rate['time'] . '</td>';
                    echo '<td>' . $rate['rounds'] . '</td>';
                    echo '<td>' . $rate['price'] . '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </table>
    </div>
</section>

<!-- Location & Contact -->
<section class="location-add py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 primarybg">
                <div class="contact p-4 rounded h-100">
                    <h3 class="text-white"><?php _e('Location & Contact Details', 'manila-luxury-model'); ?></h3>
                    <p class="text-white"><i class="fa fa-phone"></i> <?php echo get_post_meta(get_the_ID(), 'model_phone', true); ?></p>
                    <p class="text-white"><i class="fa fa-map"></i> <?php echo get_post_meta(get_the_ID(), 'model_location', true); ?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <?php
                $map_embed = get_post_meta(get_the_ID(), 'model_map', true);
                if ($map_embed) {
                    echo $map_embed;
                } else {
                    ?>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30768773.7530444!2d60.88533959328086!3d19.714589836810603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1747671715793!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Services & Reviews -->
<section class="reviews">
    <center class="mb-4">
        <a href="<?php echo get_permalink(get_page_by_path('booking')); ?>?model_id=<?php echo get_the_ID(); ?>" class="btn btn-primary mb-2 btn-lg"><?php _e('Book', 'manila-luxury-model'); ?> <?php the_title(); ?> <?php _e('Now', 'manila-luxury-model'); ?></a>
        <a href="#reviews" class="btn btn-outline-light mb-2 btn-lg"><i class="fa fa-edit"></i> <?php _e('Leave a Review', 'manila-luxury-model'); ?></a>
    </center>
    
    <div class="primarybg py-4">
        <div class="container">
            <h3 class="text-center text-white"><?php _e('Services', 'manila-luxury-model'); ?></h3>
            <center>
                <?php
                $services = wp_get_post_terms(get_the_ID(), 'model_service');
                foreach ($services as $service) {
                    echo '<a href="' . get_term_link($service) . '" class="btn btn-outline-light mb-2">' . $service->name . '</a> ';
                }
                ?>
            </center>
        </div>
    </div>
    
    <!-- Reviews Content -->
    <?php get_template_part('template-parts/content', 'model-reviews'); ?>
</section>

<!-- FAQs -->
<?php get_template_part('template-parts/content', 'faqs'); ?>

<!-- Near Me Models -->
<section class="primarybg py-5">
    <div class="container">
        <h3 class="text-center text-white"><?php _e('Near Me', 'manila-luxury-model'); ?></h3>
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'model',
                'posts_per_page' => 4,
                'post__not_in' => array(get_the_ID()),
                'orderby' => 'rand'
            );
            
            $related = new WP_Query($args);
            
            if ($related->have_posts()) :
                while ($related->have_posts()) : $related->the_post();
                    ?>
                    <div class="col-sm-3 col-6 px-1">
                        <div class="card shadow-sm my-3">
                            <a href="<?php the_permalink(); ?>">
                                <div class="bd-placeholder-img card-img-top">
                                    <?php the_post_thumbnail('model-thumbnail', array('class' => 'img-fluid')); ?>
                                </div>
                            </a>
                            <div class="card-body text-center">
                                <h3 class="card-text"><?php the_title(); ?></h3>
                                <h4><?php echo get_post_meta(get_the_ID(), 'model_age', true); ?> Yr.</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>