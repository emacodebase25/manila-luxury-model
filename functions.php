<?php
/**
 * Manila Luxury Model Theme Functions
 */

// Theme Setup
function mlm_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'manila-luxury-model'),
        'footer-menu-1' => __('Footer Menu Legal', 'manila-luxury-model'),
        'footer-menu-2' => __('Footer Menu Resources', 'manila-luxury-model'),
        'footer-menu-3' => __('Footer Menu Socials', 'manila-luxury-model'),
    ));
    
    // Add image sizes
    add_image_size('model-thumbnail', 300, 400, true);
    add_image_size('article-thumbnail', 600, 400, true);
}
add_action('after_setup_theme', 'mlm_theme_setup');

// Enqueue scripts and styles
function mlm_enqueue_scripts() {
    // Styles
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css');
    wp_enqueue_style('mlm-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css', array(), '1.0.0');
    
    // Scripts
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
    wp_enqueue_script('mlm-multiselect', get_template_directory_uri() . '/assets/js/multiselect.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('mlm-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mlm_enqueue_scripts');

// Register Custom Post Types
require get_template_directory() . '/inc/custom-post-types.php';

// Customizer additions
require get_template_directory() . '/inc/customizer.php';

// Register Widgets
function mlm_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'manila-luxury-model'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here.', 'manila-luxury-model'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'mlm_widgets_init');

// Custom excerpt length
function mlm_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'mlm_excerpt_length');

// Bootstrap 5 NavWalker
class WP_Bootstrap_Navwalker extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';
        
        if (in_array('menu-item-has-children', $classes)) {
            $classes[] = 'dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) .'"' : '';
        $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) .'"' : '';
        $attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) .'"' : '';

        if ($depth === 0) {
            $attributes .= ' class="nav-link"';
        } else {
            $attributes .= ' class="dropdown-item"';
        }

        if (in_array('menu-item-has-children', $classes) && $depth === 0) {
            $attributes .= ' data-bs-toggle="dropdown" aria-expanded="false"';
            $attributes .= ' class="nav-link dropdown-toggle"';
        }

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
