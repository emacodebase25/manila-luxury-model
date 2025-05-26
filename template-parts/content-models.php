<?php
/**
 * Template part for displaying models
 */
?>

<!-- Nav tabs -->
<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#female"><?php _e('Female Escorts', 'manila-luxury-model'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#male"><?php _e('Male Escorts', 'manila-luxury-model'); ?></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#trans"><?php _e('Transexual Escorts', 'manila-luxury-model'); ?></a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane container active" id="female">
        <div class="row">
            <?php
            $args = array(
                'post_type' => 'model',
                'posts_per_page' => 8,
                'meta_query' => array(
                    array(
                        'key' => 'model_gender',
                        'value' => 'female',
                        'compare' => '='
                    )
                )
            );
            
            $models = new WP_Query($args);
            
            if ($models->have_posts()) :
                while ($models->have_posts()) : $models->the_post();
                    ?>
                    <div class="col-sm-3 col-6 px-1">
                        <div class="card shadow-sm my-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('model-thumbnail', array('class' => 'card-img-top')); ?>
                            <?php else : ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            <?php endif; ?>
                            
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
    
    <div class="tab-pane container fade" id="male">
        <div class="row">
            <?php
            $args['meta_query'][0]['value'] = 'male';
            $models = new WP_Query($args);
            
            if ($models->have_posts()) :
                while ($models->have_posts()) : $models->the_post();
                    // Same structure as female
                    ?>
                    <div class="col-sm-3 col-6 px-1">
                        <div class="card shadow-sm my-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('model-thumbnail', array('class' => 'card-img-top')); ?>
                            <?php else : ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            <?php endif; ?>
                            
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
    
    <div class="tab-pane container fade" id="trans">
        <div class="row">
            <?php
            $args['meta_query'][0]['value'] = 'trans';
            $models = new WP_Query($args);
            
            if ($models->have_posts()) :
                while ($models->have_posts()) : $models->the_post();
                    // Same structure as female
                    ?>
                    <div class="col-sm-3 col-6 px-1">
                        <div class="card shadow-sm my-3">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('model-thumbnail', array('class' => 'card-img-top')); ?>
                            <?php else : ?>
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                            <?php endif; ?>
                            
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
</div>