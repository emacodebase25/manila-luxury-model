<?php
/**
 * Template part for filter form
 */
?>

<form method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="row">
        <div class="col-sm-1 col-6 px-1">
            <select class="form-select mb-2" name="filter_name">
                <option selected><?php _e('Name', 'manila-luxury-model'); ?></option>
                <?php
                // Get all models for name dropdown
                $models = get_posts(array('post_type' => 'model', 'posts_per_page' => -1));
                foreach ($models as $model) {
                    echo '<option value="' . $model->ID . '">' . $model->post_title . '</option>';
                }
                ?>
            </select>
        </div>
        
        <div class="col-sm-1 col-6 px-1">
            <select class="form-select mb-2" name="filter_services">
                <option selected><?php _e('Services', 'manila-luxury-model'); ?></option>
                <?php
                $services = get_terms('model_service', array('hide_empty' => false));
                foreach ($services as $service) {
                    echo '<option value="' . $service->slug . '">' . $service->name . '</option>';
                }
                ?>
            </select>
        </div>
        
        <div class="col-sm-1 col-6 px-1">
            <select class="form-select mb-2" name="filter_age">
                <option selected><?php _e('Age', 'manila-luxury-model'); ?></option>
                <option value="18-25">18-25</option>
                <option value="26-30">26-30</option>
                <option value="31-35">31-35</option>
                <option value="36+">36+</option>
            </select>
        </div>
        
        <div class="col-sm-1 col-6 px-1">
            <select class="form-select mb-2" name="filter_price">
                <option selected><?php _e('Price', 'manila-luxury-model'); ?></option>
                <option value="0-100">$0-$100</option>
                <option value="100-200">$100-$200</option>
                <option value="200-500">$200-$500</option>
                <option value="500+">$500+</option>
            </select>
        </div>
        
        <div class="col-sm-2 col-6 px-1">
            <select class="form-select mb-2" name="filter_location">
                <option selected><?php _e('Location', 'manila-luxury-model'); ?></option>
                <option value="new-york">New York</option>
                <option value="los-angeles">Los Angeles</option>
                <option value="miami">Miami</option>
                <option value="houston">Houston</option>
                <option value="atlanta">Atlanta</option>
            </select>
        </div>
        
        <div class="col-sm-2 col-6 px-1">
            <select class="form-select mb-2" name="filter_nationality">
                <option selected><?php _e('Nationality', 'manila-luxury-model'); ?></option>
                <option value="american">American</option>
                <option value="european">European</option>
                <option value="asian">Asian</option>
                <option value="latin">Latin</option>
            </select>
        </div>
        
        <div class="col-sm-2 col-12 px-1">
            <select class="form-select mb-2" name="filter_gallery">
                <option selected><?php _e('Popular Gallery', 'manila-luxury-model'); ?></option>
                <option value="featured">Featured</option>
                <option value="new">New</option>
                <option value="verified">Verified</option>
            </select>
        </div>
        
        <div class="col-sm-2 col-12 px-1">
            <div class="d-grid gap-2">
                <button class="btn btn-primary" type="submit"><?php _e('Filter', 'manila-luxury-model'); ?></button>
            </div>
        </div>
    </div>
</form>