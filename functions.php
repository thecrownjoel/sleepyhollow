<?php 

if (is_user_logged_in()) {
    show_admin_bar(true);
}



function my_assets() {

    wp_register_style('flexboxgrid', get_template_directory_uri() . '/src/css/flexboxgrid.css', array(), false, 'all');
    wp_enqueue_style( 'flexboxgrid');

	wp_register_style('all', get_template_directory_uri() . '/src/css/all.css', array(), false, 'all');
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



if (!wp_next_scheduled('johnson_facebook')) {
    wp_schedule_event(time(), 'hourly', 'johnson_facebook');
}
add_action('johnson_facebook', 'johnson_get_facebook_wall');

function johnson_get_facebook_wall() {
    $facebook_response = wp_remote_get('https://www.juicer.io/api/feeds/billjohnson'); 
    if (!is_wp_error($facebook_response)) { 
        $formatted_facebook_wall_posts = array();
        $facebook_object = json_decode($facebook_response['body']);
        $facebook_wall_posts = $facebook_object->posts->items;

        $fb = 0;
        foreach ($facebook_wall_posts as $facebook_wall_post) {
            if (!empty($facebook_wall_post->message)) {
                $formatted_facebook_wall_posts[] = array(
                    'id' => $facebook_wall_post->id,
                    'created' => $facebook_wall_post->external_created_at,
                    'message' => $facebook_wall_post->message,
                    'link' => $facebook_wall_post->full_url
                );
                $fb++;
                if ($fb == 3) {
                    break;
                }
            }
        }
        update_option('johnson_facebook', $formatted_facebook_wall_posts);
    }
}