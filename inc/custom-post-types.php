<?php
/**
 * Register Custom Post Types
 */

// Register Models Post Type
function mlm_register_models_post_type() {
    $labels = array(
        'name' => _x('Models', 'Post Type General Name', 'manila-luxury-model'),
        'singular_name' => _x('Model', 'Post Type Singular Name', 'manila-luxury-model'),
        'menu_name' => __('Models', 'manila-luxury-model'),
        'all_items' => __('All Models', 'manila-luxury-model'),
        'add_new_item' => __('Add New Model', 'manila-luxury-model'),
        'add_new' => __('Add New', 'manila-luxury-model'),
        'edit_item' => __('Edit Model', 'manila-luxury-model'),
    );
    
    $args = array(
        'label' => __('Model', 'manila-luxury-model'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => true,
        'rewrite' => array('slug' => 'models'),
    );
    
    register_post_type('model', $args);
}
add_action('init', 'mlm_register_models_post_type', 0);

// Register Reviews Post Type
function mlm_register_reviews_post_type() {
    $labels = array(
        'name' => _x('Reviews', 'Post Type General Name', 'manila-luxury-model'),
        'singular_name' => _x('Review', 'Post Type Singular Name', 'manila-luxury-model'),
        'menu_name' => __('Reviews', 'manila-luxury-model'),
    );
    
    $args = array(
        'label' => __('Review', 'manila-luxury-model'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'custom-fields'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-star-filled',
        'has_archive' => false,
    );
    
    register_post_type('review', $args);
}
add_action('init', 'mlm_register_reviews_post_type', 0);

// Register Model Categories
function mlm_register_model_taxonomies() {
    register_taxonomy('model_category', 'model', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Model Categories', 'taxonomy general name', 'manila-luxury-model'),
            'singular_name' => _x('Model Category', 'taxonomy singular name', 'manila-luxury-model'),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'model-category'),
    ));
    
    register_taxonomy('model_service', 'model', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => _x('Services', 'taxonomy general name', 'manila-luxury-model'),
            'singular_name' => _x('Service', 'taxonomy singular name', 'manila-luxury-model'),
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'service'),
    ));
}
add_action('init', 'mlm_register_model_taxonomies', 0);