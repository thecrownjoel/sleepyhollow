<div class="main-container">



<?php get_header(); ?>

<h1>INDEX.PHP - this works too</h1>

<?php if ( have_posts() ) : ?>

	<?php if ( is_home() && ! is_front_page() ) : ?>
		<header>
			<h1><?php single_post_title(); ?></h1>
		</header>
	<?php endif; ?>

	<?php
	
	// Start the loop.
	while ( have_posts() ) :
		the_post();


		// End the loop.
	endwhile;


	// If no content, include the "No posts found" template.
else :
	get_template_part( 'template-parts/content', 'none' );

endif;
?>

<?php get_footer(); ?>


</div>
