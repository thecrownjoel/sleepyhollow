<?php 

if (is_user_logged_in()) {
    show_admin_bar(true);
}



function my_assets() {

	wp_register_style('all', get_template_directory_uri() . '/src/scss/all.css', array(), false, 'all');
    wp_enqueue_style( 'all');

    wp_enqueue_script('app',get_template_directory_uri() .'/src/js/app.js');
}

add_action( 'wp_enqueue_scripts', 'my_assets' );


// add menus option to wordpress admin
add_theme_support('menus');

// add featured image thumbnails
add_theme_support('post-thumbnails');

register_nav_menus(
    array(
        'top-menu' =>__('Top Menu', 'theme'),
        'footer-menu' =>__('Footer Menu', 'theme'),
    )
);

add_image_size('smallest', 300, 300, true);
add_image_size('largest', 800, 800, true);

/************************************************************************
wpmu_add_google_fonts - register google fonts
************************************************************************/

function wpmu_add_google_fonts() {
    wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Arimo|IM+Fell+English&display=swap');	
    wp_enqueue_style( 'googleFonts');
}

add_action( 'wp_enqueue_scripts', 'wpmu_add_google_fonts' );