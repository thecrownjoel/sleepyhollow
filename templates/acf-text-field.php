<?php 

/** 
 * Template Name: ACF Text
 */
?>

<?php get_header(); ?>

<div class="main-container">

<h1>ACF TEXT FIELD - TEMPLATE</h1>

<h2>Our Custom Fields Below</h2>

<h5>Text Field</h5>
<p><?php the_field('text-field'); ?> </p>

<h5>Text Area</h5>
<p><?php the_field('text-area'); ?> </p>

<h5>Image</h5>
<img src='<?php the_field("image"); ?>' >

<h5>wsyiwig editor</h5>
<?php the_field('add-content'); ?> 

<h5>Page Link</h5>
<a href='<?php the_field("add_a_link"); ?>'>Click the link</a>

<h5>Add a file</h5>
<a href='<?php the_field("add_file"); ?>' target="_blank">Click the link</a>

</div>

<?php get_footer(); ?>


</div>
