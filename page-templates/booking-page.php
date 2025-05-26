<?php
/**
 * Template Name: Booking Page
 */

get_header(); ?>

<section class="more-info py-5 primarybg">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <h2 class="text-white"><?php the_title(); ?></h2>
            <div class="text-white"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>

    <div class="formcasting">
        <div class="container">
            <p class="text-warning"><?php _e('Online Booking should be take a 24 hours process', 'manila-luxury-model'); ?></p>
            <h2 class="text-white" style="font-family:cursive"><?php _e('Miss You Peachy\'s', 'manila-luxury-model'); ?></h2>
            
            <form method="post" action="">
                <div class="row">
                    <div class="col-sm-12 col-12">
                        <select class="form-control" name="escort_name" required>
                            <option selected><?php _e('Escort Name', 'manila-luxury-model'); ?></option>
                            <?php
                            $models = get_posts(array('post_type' => 'model', 'posts_per_page' => -1));
                            foreach ($models as $model) {
                                $selected = (isset($_GET['model_id']) && $_GET['model_id'] == $model->ID) ? 'selected' : '';
                                echo '<option value="' . $model->ID . '" ' . $selected . '>' . $model->post_title . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="text" class="form-control" placeholder="<?php _e('Your Name', 'manila-luxury-model'); ?>" name="client_name" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="email" class="form-control" placeholder="<?php _e('Email', 'manila-luxury-model'); ?>" name="client_email" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="tel" class="form-control" placeholder="<?php _e('Phone Number', 'manila-luxury-model'); ?>" name="client_phone" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="date" class="form-control" placeholder="<?php _e('Booking Date', 'manila-luxury-model'); ?>" name="booking_date" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="time" class="form-control" placeholder="<?php _e('Booking Time', 'manila-luxury-model'); ?>" name="booking_time" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <select class="form-control" name="visit_type" required>
                            <option selected><?php _e('Visit Type', 'manila-luxury-model'); ?></option>
                            <option value="incall"><?php _e('Incall', 'manila-luxury-model'); ?></option>
                            <option value="outcall"><?php _e('Outcall', 'manila-luxury-model'); ?></option>
                        </select>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <input type="text" class="form-control" placeholder="<?php _e('Duration', 'manila-luxury-model'); ?>" name="duration" required>
                    </div>
                    
                    <div class="col-sm-12 col-12">
                        <textarea class="form-control" placeholder="<?php _e('Special Requests', 'manila-luxury-model'); ?>" name="special_requests" rows="3"></textarea>
                    </div>
                </div>
                
                <center>
                    <button type="submit" class="btn bg-white" name="submit_booking"><?php _e('Submit Booking', 'manila-luxury-model'); ?></button>
                </center>
            </form>
            
            <?php
            // Handle form submission
            if (isset($_POST['submit_booking'])) {
                // Process booking here
                // You can save to database or send email
                echo '<div class="alert alert-success mt-3">' . __('Booking submitted successfully!', 'manila-luxury-model') . '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- FAQs -->
<?php get_template_part('template-parts/content', 'faqs'); ?>

<?php get_footer(); ?>