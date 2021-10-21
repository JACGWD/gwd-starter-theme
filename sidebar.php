<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.
  
?>

<?php if ( is_active_sidebar( 'primary_sidebar' )  ) : ?>
    <div class="widget-area" role="complementary">
      <?php dynamic_sidebar( 'primary_sidebar' ); ?>
    </div>
<?php endif; ?> 