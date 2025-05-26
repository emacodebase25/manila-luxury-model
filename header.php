
## 3. header.php
```php
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-black">
    <div class="container">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        <?php endif; ?>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary-menu',
                'menu_class' => 'navbar-nav ms-auto',
                'container' => false,
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>
</nav>

<!-- Hero Banner -->
<?php if (is_front_page() || is_page_template()) : ?>
<section class="herobanner">
    <?php 
    $banner_image = get_theme_mod('hero_banner_image', get_template_directory_uri() . '/assets/images/hero_banner.jpg');
    ?>
    <img src="<?php echo esc_url($banner_image); ?>" alt="Hero Banner">
</section>
<?php endif; ?>