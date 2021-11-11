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


		<p>&copy; Billy Poppins, 2021</p>
		
	
<!-- ********  GET FOOTER ******************** -->


  <?php wp_footer(); ?>

 <!-- ******** END FOOTER ******************** -->


	
	</footer>
	 <!---  FOOTER ENDS HERE -----> 
  

</div>
<!---  CONTAINER DIV ENDS HERE -----> 


<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-jacgwd.min.js"></script>
<?php // load Modernizr for feature detection (classes added to the html tag) ?>


<script src="<?php echo get_template_directory_uri();  ?>/js/combined-scripts.js"></script>


</body>
</html>