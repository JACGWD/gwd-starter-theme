<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>

<!---  FOOTER STARTS  HERE -----> 
	<footer>

	<nav>
        <?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container_class' => 'footer-nav' ) ); ?>
    </nav>

	<nav>
        <?php wp_nav_menu( array( 'theme_location' => 'social-menu', 'container_class' => 'footer-social' ) ); ?>
    </nav>


		<p>&copy; <?php echo bloginfo('name') ?>, <?php echo date("Y"); ?></p>
		
	
<!-- ********  GET FOOTER ******************** -->


  <?php wp_footer(); ?>

 <!-- ******** END FOOTER ******************** -->


	
	</footer>
	 <!---  FOOTER ENDS HERE -----> 
  

</div>
<!---  CONTAINER DIV ENDS HERE -----> 


</body>
</html>