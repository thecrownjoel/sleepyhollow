<?php 

/*
 Template Name: SH Homepage template
 */


?>

<?php get_header(); ?>

<h1>Hello from homepage.php</h1>

    <?php

      $args = array( 'numberposts' => 3, 'order'=> 'ASC', 'orderby' => 'title' );
      $postslist = get_posts( $args );
      foreach ($postslist as $post) :  setup_postdata($post); ?> 


        <?php the_post_thumbnail('large'); ?>

    
       <?php the_date(); ?>
       <a href="<?php the_permalink();?>"><h2><?php the_title(); ?>  </h2> </a>
       <?php the_excerpt(); ?>
   <a href="<?php the_permalink();?>">Read more </a>

          

    <?php endforeach; ?>



<?php get_footer(); ?>