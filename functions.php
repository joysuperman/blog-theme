<?php

// After Theme Support Bootstrapping
add_action('after_setup_theme', 'joySuperman_bootstrapping');

function joySuperman_bootstrapping(){
    add_theme_support('title-tag');
    add_theme_support('align-wide');
    add_theme_support('automatic-feed-links');
    add_theme_support('core-block-patterns');
    add_theme_support('custom-background');
    add_theme_support('custom-header');
    add_theme_support('custom-line-height');
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('custom-spacing');
    add_theme_support('custom-units');
    add_theme_support('dark-editor-style');
    add_theme_support('disable-custom-colors');
    add_theme_support('disable-custom-font-sizes');
    add_theme_support('editor-color-palette');
    add_theme_support('editor-gradient-presets');
    add_theme_support('editor-font-sizes');
    add_theme_support('editor-styles');
    add_theme_support('featured-content');
    add_theme_support('menus');
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
    add_theme_support('post-thumbnails', array('post', 'page'));
    add_theme_support('responsive-embeds');
    add_theme_support('starter-content');
    add_theme_support('title-tag');
    add_theme_support('wp-block-styles');
    add_theme_support('widgets');
    add_theme_support('widgets-block-editor');

    // Elementor theme support
    add_theme_support('elementor');

    // Divi theme support
    add_theme_support('divi');

    //Gutenberg theme support
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-color-palette', array(/* ... */));
    add_theme_support('editor-font-sizes', array(/* ... */));
    add_theme_support('wp-block-styles');
    add_theme_support('editor-styles');
    add_editor_style('editor-style.css');
}

// Load Styles
add_action('wp_enqueue_scripts', 'joySuperman_enqueue_styles');

function joySuperman_enqueue_styles(){
    //Google Font Neuton
    wp_enqueue_style('joySuperman-fonts', 'https://fonts.googleapis.com/css2?family=Neuton:wght@700&family=Work+Sans:wght@400;500;600;700&display=swap', '', '1.0.0');
    // Enqueue Bootstrap CSS
    wp_enqueue_style('joySuperman-bootstrap', get_template_directory_uri() . '/plugins/bootstrap/bootstrap.min.css', '', '1.0.0');
    // Enqueue Custom Stylesheet
    wp_enqueue_style('joySuperman-custom', get_template_directory_uri() . '/css/style.css', '', '1.0.0');
    // Core Css
    wp_enqueue_style('joySuperman-core', get_stylesheet_uri());

    // Enqueue jQuery
    wp_enqueue_script('joySuperman-jQuery', get_template_directory_uri().'/plugins/jquery/jquery.min.js', array('JQuery'), '1.0.0', true);
    // Enqueue Bootstrap Js
    wp_enqueue_script('joySuperman-bootstrap', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.js', array('JQuery'), '1.0.0', true);
    // Enqueue Custom Js
    wp_enqueue_script('joySuperman-custom', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.js', '', '1.0.0', true);
}

// Custom Excerpt Length
function joySuperman_custom_excerpt_length($length){
    return 20; // Change the number to your desired excerpt length
}

add_filter('excerpt_length', 'joySuperman_custom_excerpt_length');

// Excerpt "Read More" Link
function joySuperman_excerpt_more($more){
    return '... <a href="' . get_permalink() . '">' . esc_html__('Read More', 'joySuperman') . '</a>';
}

add_filter('excerpt_more', 'joySuperman_excerpt_more');

// Register Navigation Menu
add_action('init', 'joySuperman_register_menus');

function joySuperman_register_menus(){
    register_nav_menus(array(
        'primary-menu' => esc_html__('Primary Menu', 'joySuperman'),
    ));
}

//Custom Menu Style
class Custom_Nav_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        // Add class to the sub-menu (dropdown menu)
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $current_object_id = 0) {
        $classes = 'nav-item';

        // Add 'dropdown' class if the item has children
        if (in_array('menu-item-has-children', $item->classes)) {
            $classes .= ' dropdown';
            $output .= '<li class="' . esc_attr($classes) . '">';
            $output .= '<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        } else {
            $output .= '<li class="' . esc_attr($classes) . '">';
            $output .= '<a class="nav-link" href="' . esc_url($item->url) . '">';
        }

        // Output the modified menu item
        $output .= esc_html($item->title);

        // Close the <a> tag if it's not a dropdown item
        if (!in_array('menu-item-has-children', $item->classes)) {
            $output .= '</a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        // Close the <li> tag
        $output .= '</li>';
    }
}

//Sidebar Register
function theme_register_sidebar() {
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'theme-text-domain'),
        'id'            => 'primary-sidebar',
        'description'   => __('This is the primary sidebar.', 'theme-text-domain'),
        'before_widget' => '<div id="%1$s" class="widget-list %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="section-title mb-3">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'theme_register_sidebar');
