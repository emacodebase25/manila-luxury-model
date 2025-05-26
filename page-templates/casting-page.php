<?php
/**
 * Template Name: Casting Page
 */

get_header(); ?>

<section class="more-info py-5 primarybg">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <h2 class="text-white"><?php the_title(); ?></h2>
            <div class="text-white"><?php the_content(); ?></div>
        <?php endwhile; ?>
    </div>
</section>

<section class="formcasting py-5">
    <div class="container">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Name', 'manila-luxury-model'); ?>" name="name" required>
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Height', 'manila-luxury-model'); ?>" name="height">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="number" class="form-control" placeholder="<?php _e('Age', 'manila-luxury-model'); ?>" name="age" required>
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Weight', 'manila-luxury-model'); ?>" name="weight">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="email" class="form-control" placeholder="<?php _e('Email', 'manila-luxury-model'); ?>" name="email" required>
                </div>
                <div class="col-sm-6 col-6">
                    <input type="tel" class="form-control" placeholder="<?php _e('Phone', 'manila-luxury-model'); ?>" name="phone" required>
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Nationality', 'manila-luxury-model'); ?>" name="nationality">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Languages', 'manila-luxury-model'); ?>" name="languages">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Bust', 'manila-luxury-model'); ?>" name="bust">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Waist', 'manila-luxury-model'); ?>" name="waist">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Hips', 'manila-luxury-model'); ?>" name="hips">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Hair Color', 'manila-luxury-model'); ?>" name="hair_color">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Eye Color', 'manila-luxury-model'); ?>" name="eye_color">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('City', 'manila-luxury-model'); ?>" name="city">
                </div>
                <div class="col-sm-6 col-6">
                    <select class="form-control" name="gender">
                        <option><?php _e('Gender', 'manila-luxury-model'); ?></option>
                        <option value="female"><?php _e('Female', 'manila-luxury-model'); ?></option>
                        <option value="male"><?php _e('Male', 'manila-luxury-model'); ?></option>
                        <option value="trans"><?php _e('Transgender', 'manila-luxury-model'); ?></option>
                    </select>
                </div>
                <div class="col-sm-6 col-6">
                    <select class="form-control" name="orientation">
                        <option><?php _e('Orientation', 'manila-luxury-model'); ?></option>
                        <option value="straight"><?php _e('Straight', 'manila-luxury-model'); ?></option>
                        <option value="gay"><?php _e('Gay', 'manila-luxury-model'); ?></option>
                        <option value="bisexual"><?php _e('Bisexual', 'manila-luxury-model'); ?></option>
                    </select>
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Experience', 'manila-luxury-model'); ?>" name="experience">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="text" class="form-control" placeholder="<?php _e('Availability', 'manila-luxury-model'); ?>" name="availability">
                </div>
                <div class="col-sm-6 col-6">
                    <input type="file" class="form-control" name="photo_main" accept="image/*">
                </div>
            </div>
            
            <center><button type="submit" class="btn btn-primary" name="submit_application"><?php _e('Submit', 'manila-luxury-model'); ?></button></center>
            
            <h2 class="text-white text-center"><?php _e('Please select which services can you offer:', 'manila-luxury-model'); ?></h2>
            
            <div class="row">
                <?php
                $services = get_terms('model_service', array('hide_empty' => false));
                foreach ($services as $service) {
                    ?>
                    <div class="col-sm-6 col-6">
                        <div class="selectt">
                            <label for="service_<?php echo $service->term_id; ?>"><?php echo $service->name; ?></label>
                            <input type="checkbox" class="float-end" name="services[]" id="service_<?php echo $service->term_id; ?>" value="<?php echo $service->term_id; ?>">
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <center><button type="submit" class="btn btn-primary" name="submit_services"><?php _e('Submit', 'manila-luxury-model'); ?></button></center>
            
            <div class="py-3">
                <h2 class="text-white"><?php _e('Photos', 'manila-luxury-model'); ?></h2>
                <div class="row">
                    <div class="col-sm-12 col-6">
                        <input type="file" class="form-control" name="photo1" accept="image/*">
                    </div>
                    <div class="col-sm-12 col-6">
                        <input type="file" class="form-control" name="photo2" accept="image/*">
                    </div>
                    <div class="col-sm-12 col-6">
                        <input type="file" class="form-control" name="photo3" accept="image/*">
                    </div>
                    <div class="col-sm-12 col-6">
                        <input type="file" class="form-control" name="photo4" accept="image/*">
                    </div>
                    <div class="col-sm-12 col-6">
                        <input type="file" class="form-control" name="photo5" accept="image/*">
                    </div>
                </div>
            </div>
            
            <center><button type="submit" class="btn bg-white" name="submit_full"><?php _e('Submit Complete Application', 'manila-luxury-model'); ?></button></center>
        </form>
        
        <?php
        // Handle form submission
        if (isset($_POST['submit_full'])) {
            // Process the application
            // You can save to database or send email
            echo '<div class="alert alert-success mt-3">' . __('Application submitted successfully!', 'manila-luxury-model') . '</div>';
        }
        ?>
    </div>
</section>

<?php get_footer(); ?>