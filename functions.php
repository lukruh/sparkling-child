<?php
// Add your custom functions here

add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {
    if($args->theme_location == 'primary') {
        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();
 
        return $items .= '<li id="searchform-item">' . $searchform . '</li>';
    }
    return $items;
}

function my_child_theme_setup() {
    add_image_size( 'header', 1200, 400, true );
    add_image_size('thumb', 200, 200, true);
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );

add_filter( 'upload_mimes', 'edit_upload_mimes' );
function edit_upload_mimes($mimes) {
     $mime_types = array( 
        'pdf' => 'application/pdf',
        'tar' => 'application/x-tar',
         'zip' => 'application/zip',
        'gz|gzip' => 'application/x-gzip',
        'rar' => 'application/rar',
        '7z' => 'application/x-7z-compressed',
	'apk' => '<code>application/vnd.android.package-archive</code>',
     );
    return array_merge($mime_types,$mimes);              
}



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
