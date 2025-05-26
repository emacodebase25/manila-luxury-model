<?php get_header(); ?>

<!-- Filter Form -->
<section class="filter-form py-3">
    <div class="container">
        <?php get_template_part('template-parts/filter', 'form'); ?>
    </div>
</section>

<!-- Models Grid -->
<section class="models-grid py-5">
    <div class="container">
        <h2 class="title-home text-center"><?php _e('Our Model', 'manila-luxury-model'); ?></h2>
        <p class="text-center"><?php _e('100% Real and Recent Pictures Guaranteed or pay NO rejection fee', 'manila-luxury-model'); ?></p>
        
        <?php get_template_part('template-parts/content', 'models'); ?>
    </div>
</section>

<!-- Location Service -->
<?php get_template_part('template-parts/content', 'locations'); ?>

<!-- More Info -->
<?php 
$info_title = get_theme_mod('info_section_title', '69 Escorts in London');
$info_content = get_theme_mod('info_section_content', '');
$location_title = get_theme_mod('location_section_title', 'London Escort Location');
$location_content = get_theme_mod('location_section_content', '');
?>
<section class="more-info py-5">
    <div class="container">
        <h2 class="text-white"><?php echo esc_html($info_title); ?></h2>
        <div class="text-white"><?php echo wpautop($info_content); ?></div>
        
        <h2 class="text-white"><?php echo esc_html($location_title); ?></h2>
        <div class="text-white"><?php echo wpautop($location_content); ?></div>
    </div>
</section>

<!-- Reviews -->
<?php get_template_part('template-parts/content', 'reviews'); ?>

<!-- FAQs -->
<?php get_template_part('template-parts/content', 'faqs'); ?>

<!-- Articles -->
<?php get_template_part('template-parts/content', 'articles'); ?>

<?php get_footer(); ?>