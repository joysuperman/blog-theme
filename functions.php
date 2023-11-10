<?php
//After Theme Support Bootstraping
add_action('after_setup_theme', 'joySuperman_bootstraping' );
function joySuperman_bootstraping(){
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ));
    add_theme_support( 'post-thumbnails', array( 'post' ) );
    add_theme_support( 'post-thumbnails', array( 'page' ) );
}

//Load Scripts File
add_action('wp_enqueue_scripts', 'joySuperman_scriptLoading');

function joySuperman_scriptLoading(){
    wp_enqueue_style('joySuperman-bootstrap', get_template_directory_uri().'/plugins/bootstrap/bootstrap.min.css','','1.0.0');
    wp_enqueue_style('joySuperman-custom', get_template_directory_uri().'/css/style.css','','1.0.0');
}

//=====================================