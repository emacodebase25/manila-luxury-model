<?php
/**
 * Theme Customizer
 */

function mlm_customize_register($wp_customize) {
    // Hero Banner Section
    $wp_customize->add_section('mlm_hero_banner', array(
        'title' => __('Hero Banner', 'manila-luxury-model'),
        'priority' => 30,
    ));
    
    $wp_customize->add_setting('hero_banner_image', array(
        'default' => get_template_directory_uri() . '/assets/images/hero_banner.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_banner_image', array(
        'label' => __('Hero Banner Image', 'manila-luxury-model'),
        'section' => 'mlm_hero_banner',
        'settings' => 'hero_banner_image',
    )));
    
    // Info Section
    $wp_customize->add_section('mlm_info_section', array(
        'title' => __('Info Section', 'manila-luxury-model'),
        'priority' => 40,
    ));
    
    $wp_customize->add_setting('info_section_title', array(
        'default' => '69 Escorts in London',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('info_section_title', array(
        'label' => __('Info Section Title', 'manila-luxury-model'),
        'section' => 'mlm_info_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('info_section_content', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('info_section_content', array(
        'label' => __('Info Section Content', 'manila-luxury-model'),
        'section' => 'mlm_info_section',
        'type' => 'textarea',
    ));
    
    // Footer Section
    $wp_customize->add_section('mlm_footer', array(
        'title' => __('Footer', 'manila-luxury-model'),
        'priority' => 50,
    ));
    
    $wp_customize->add_setting('footer_image', array(
        'default' => get_template_directory_uri() . '/assets/images/imgfooter.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'footer_image', array(
        'label' => __('Footer Logo', 'manila-luxury-model'),
        'section' => 'mlm_footer',
        'settings' => 'footer_image',
    )));
}
add_action('customize_register', 'mlm_customize_register');