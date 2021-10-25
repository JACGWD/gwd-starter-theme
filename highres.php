<?php
/* Template Name: Highres Template */ 
/* The template for displaying single posts and pages. */
/* @link https://developer.wordpress.org/themes/basics/template-hierarchy/  */




// Add this to all your php files for added security
if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>


<?php get_header('highres'); ?>


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


    <?php // SITE READER COMMENTS  ?>

       <?php //Get only the approved comments
            $args = array(
                'status' => 'approve'
            );
            
            // The comment Query
            $comments_query = new WP_Comment_Query;
            $comments = $comments_query->query( $args );
            
            // Comment Loop
            if ( $comments ) {
            foreach ( $comments as $comment ) {

          //  Enable this comment to see the names of the options you can select
          //  echo '<pre>' . print_r($comment,1) . '</pre>' ;  



            echo '<div class="commentinfo">' . '<p>' . $comment->comment_author . '</p>';
            echo '<p>' . $comment->comment_content .'</p>'. '</div>';
            }
            } else {
            echo '<p>' .'No comments found.' . '</p>';
            }

        ?>

        <?php // ADD COMMENT FORM
        comment_form(); ?>

</main>



<aside>    
   <?php get_sidebar(); ?> 
</aside>
   


<?php get_footer(); ?>
      
  