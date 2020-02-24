<!DOCTYPE html>
<html lang="en">


    <head>

        <?php wp_head(); ?>
        <title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
        

    </head>


<body <?php body_class(); ?> >



<div class="header-container">

    <div class="navigation">
            
            <?php wp_nav_menu(
                array(
                    'theme_location' => 'top-menu',
                    'menu_class' => 'navigation'
                )
            ); ?>

    </div>

</div>