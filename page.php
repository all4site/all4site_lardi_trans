<?php get_header()?>

<?php
while ( have_posts() ) :
	the_post();

	the_content();

	// If comments are open or we have at least one comment, load up the comment template.


endwhile; // End the loop.
?>

<?php get_footer()?>
