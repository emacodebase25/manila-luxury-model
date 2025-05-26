<?php
/**
 * Template part for displaying locations
 */
?>

<section class="location-service py-5">
    <div class="container">
        <h2 class="title-home text-center"><?php _e('International Travel Escort Service', 'manila-luxury-model'); ?></h2>
        <p class="text-center text-white"><?php _e('Need a beautiful travel companion to escort you to dinner? We provide premium female courteous service that operates worldwide, strictly by appointment, and catering to a select clientele who seek the highest quality.', 'manila-luxury-model'); ?></p>
        <p class="text-center text-white"><?php _e('Mynt Models represents elegant, educated models and dinner escorts, travel companions and businesses in many top cities, luxury travel locations and tropical destinations, such as:', 'manila-luxury-model'); ?></p>
        
        <div class="row">
            <?php
            // You can make these dynamic by creating a custom taxonomy or using a custom field
            $locations = array(
                array('New York', 'Los Angeles', 'Miami', 'Houston', 'Atlanta'),
                array('London', 'Paris', 'Milan', 'Dubai', 'Tokyo'),
                array('Sydney', 'Singapore', 'Hong Kong', 'Bangkok', 'Manila'),
                array('Barcelona', 'Amsterdam', 'Berlin', 'Moscow', 'Istanbul')
            );
            
            foreach ($locations as $column) :
                ?>
                <div class="col-sm-3 col-6">
                    <ul class="icon-list">
                        <?php foreach ($column as $city) : ?>
                            <li><a href="#"><i class="fa-solid fa-location-dot"></i> <?php echo $city; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php
            endforeach;
            ?>
        </div>
        
        <p class="text-center text-white"><?php _e('And more. We can accommodate you in any location with five-star facilities.', 'manila-luxury-model'); ?></p>
        <p class="text-center text-white"><?php _e('With Mynt Models dedicated concierge service, discover friendly, feminine, and well-bred companions whose warm personalities provide you with luxury companionship.', 'manila-luxury-model'); ?></p>
    </div>
</section>