<?php 

/*
 Template Name: SH Homepage template
 */


?>

<?php get_header(); ?>

<h1>Hello from homepage.php</h1>

<div class="row end-xs">
    <div class="col-xs-6">
        <div class="box">
          <?php $facebook_wall_posts = get_option('johnson_facebook'); ?>
          <a href="https://www.facebook.com/BillJohnsonLeads/posts/<?php echo $facebook_wall_posts[0]['id']; ?>" target="_blank">
          <?php if (!empty($facebook_wall_posts)) {
            $message = strip_tags($facebook_wall_posts[0]['message']);
            echo wp_kses_post( wp_trim_words($message, 40) );
          }
          ?>
          </a>
        </div>
    </div>
</div>


     
                  

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