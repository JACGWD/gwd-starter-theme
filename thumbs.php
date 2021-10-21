<?php

/* Template Name: Thumbnails Template */ 
/* The template for displaying single posts and pages. */
/* @link https://developer.wordpress.org/themes/basics/template-hierarchy/  */




// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.
?>

<?php 

?>


<?php get_header('thumbs'); ?>


<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

<main>
      <?php 
         if ( have_posts() ) : 
          while ( have_posts() ) : the_post();
              the_content();
          endwhile;
      else :
          _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
      endif;
      ?>
      
        <?php if (is_page_template('highres.php')){ eg_CAnav(false); } ?>

</main>



<aside>    
   <?php get_sidebar(); ?> 
</aside>
   


<?php get_footer(); ?>
      
  