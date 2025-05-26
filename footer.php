<footer class="bg-black pt-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-6">
                <h3><?php _e('Legal', 'manila-luxury-model'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu-1',
                    'menu_class' => 'icon-list',
                    'container' => false,
                    'fallback_cb' => '__return_false',
                ));
                ?>
            </div>
            <div class="col-sm-3 col-6">
                <h3><?php _e('Resources', 'manila-luxury-model'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu-2',
                    'menu_class' => 'icon-list',
                    'container' => false,
                    'fallback_cb' => '__return_false',
                ));
                ?>
            </div>
            <div class="col-sm-3 col-6">
                <h3><?php _e('Socials', 'manila-luxury-model'); ?></h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer-menu-3',
                    'menu_class' => 'icon-list',
                    'container' => false,
                    'fallback_cb' => '__return_false',
                ));
                ?>
            </div>
            <div class="col-sm-3 col-6">
                <?php 
                $footer_image = get_theme_mod('footer_image', get_template_directory_uri() . '/assets/images/imgfooter.png');
                if ($footer_image) : ?>
                    <img src="<?php echo esc_url($footer_image); ?>" class="img-fluid" alt="Footer Logo">
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>