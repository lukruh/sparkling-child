<?php
// Add your custom functions here


function my_child_theme_setup() {
    add_image_size( 'header', 1200, 400, true );
    add_image_size('thumb', 200, 200, true);
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );



// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'sparkling_enqueue_child_styles', 99);

function sparkling_enqueue_child_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_dequeue_style('sparkling-style');
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}




?>