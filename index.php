<?php
/**
 * The main template file
 *
 * @package Manila_Luxury_Model
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container py-5">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h1 class="text-white"><?php the_title(); ?></h1>
                    <div class="text-white">
                        <?php the_content(); ?>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p class="text-white"><?php _e('Sorry, no posts matched your criteria.', 'manila-luxury-model'); ?></p>
            <?php
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>