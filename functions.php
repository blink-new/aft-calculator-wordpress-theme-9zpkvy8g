<?php
// Theme setup
function aftcalculator_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    register_nav_menus([
        'primary' => __('Primary Menu', 'aftcalculator'),
        'footer' => __('Footer Menu', 'aftcalculator'),
    ]);
}
add_action('after_setup_theme', 'aftcalculator_theme_setup');

// Enqueue Tailwind CSS and custom JS
function aftcalculator_enqueue_scripts() {
    wp_enqueue_style('aftcalculator-tailwind', get_template_directory_uri() . '/assets/tailwind.min.css', [], '3.4.1');
    wp_enqueue_style('aftcalculator-style', get_stylesheet_uri());
    wp_enqueue_script('aftcalculator-main', get_template_directory_uri() . '/assets/main.js', [], '1.0', true);
}
add_action('wp_enqueue_scripts', 'aftcalculator_enqueue_scripts');
