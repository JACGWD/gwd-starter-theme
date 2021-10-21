<?php

/* Template Name: Index Template */ 
/* The template for displaying single posts and pages. */
/* @link https://developer.wordpress.org/themes/basics/template-hierarchy/  */


// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.
?>

<?php get_header(); ?>
<main>
		
    <?php
    if ( have_posts() ) 
        while ( have_posts() ) : the_post();			
            get_template_part( 'parts/page', 'content' );			
        endwhile;			
    // endif;	

    get_sidebar();
    ?>

</main>
<?php get_footer(); ?>

