<?php
// Add this to all your php files for added security

if ( ! defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly.
?>

<?php // Add pagination ?>

<div class="pagination">
    <?php 
	the_posts_pagination(
        array(
		'mid_size' => 3,
		'label' => __( 'Posts navigation', 'gwd_starter_theme'),
		'class' => 'pagination',)
	); 
?>

</div>