<?php
/**
 * Template Name: Service Page
 */

get_header(); ?>

<!-- Filter Form -->
<section class="filter-form py-3 primarybg ingfl">
    <div class="container">
        <?php get_template_part('template-parts/filter', 'form'); ?>
    </div>
</section>

<!-- Models Grid -->
<section class="models-grid py-5">
    <div class="container">
        <div class="row">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'model',
                'posts_per_page' => 8,
                'paged' => $paged
            );
            
            $models = new WP_Query($args);
            
            if ($models->have_posts()) :
                while ($models->have_posts()) : $models->the_post();
                    ?>
                    <div class="col-sm-3 col-6 px-1">
                        <div class="card shadow-sm my-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('model-thumbnail', array('class' => 'card-img-top')); ?>
                                <?php else : ?>
                                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225">
                                        <rect width="100%" height="100%" fill="#55595c"/>
                                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                    </svg>
                                <?php endif; ?>
                            </a>
                            <div class="card-body text-center">
                                <h3 class="card-text"><?php the_title(); ?></h3>
                                <h4><?php echo get_post_meta(get_the_ID(), 'model_age', true); ?> Yr.</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>
        </div>
        
        <?php if ($models->max_num_pages > 1) : ?>
            <center><a href="#" class="btn btn-primary btn-lg"><?php _e('View More', 'manila-luxury-model'); ?></a></center>
        <?php endif; ?>
        
        <?php wp_reset_postdata(); ?>
    </div>
</section>

<!-- More Info -->
<section class="more-info py-5">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
</section>

<!-- Reviews -->
<?php get_template_part('template-parts/content', 'reviews'); ?>

<!-- Gallery Tags -->
<section class="gallerytb primarybg py-5">
    <div class="container">
        <h2 class="text-white text-center mb-3"><?php _e('Our e-Magazine With Interesting Articles', 'manila-luxury-model'); ?></h2>
        <?php
        $services = get_terms('model_service', array('hide_empty' => false));
        foreach ($services as $service) {
            echo '<a href="' . get_term_link($service) . '" class="btn btn-primary bg-white text-black">' . $service->name . '</a> ';
        }
        ?>
    </div>
</section>

<!-- Articles -->
<?php get_template_part('template-parts/content', 'articles'); ?>

<?php get_footer(); ?>