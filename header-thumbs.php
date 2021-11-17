<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- **************** GET HEADER********************* -->

  <?php wp_head(); ?>

<!--**************** END HEADER*********************** -->

</head>

<body <?php body_class('thumbs'); ?>>

<div class="main-container">
<!---  CONTAINER DIV OPENS HERE ----->
  
<!--- HEADER STARTS HERE ----->
<header>
<div class="header-nav-search">
<?php get_search_form(); ?>

<nav class="primary-navigation">
<button class="hide-text">Menu</button>

<?php
  wp_nav_menu(array(
	'menu_class'	  	=> 'primary-menu',
	'theme_location' 	=> 'header-menu',
	'menu_id'	    		=> 'menu',
  'container'       => 'div',
	'container_id'		=> 'menu-container',
));
?>
</nav>
</div>


<div id="branding">
<?php 
       if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
    ?>


<div class="brand-texts">
<div class="site-title">
        <a href="<?php echo get_option('home'); ?>">
          <?php bloginfo('name'); ?>
        </a>
    </div>

    <div class="description">
        <a href="<?php echo get_option('home'); ?>">
          <?php bloginfo('description'); ?>
          <?php // This is the WP site tagline, not the meta description tag ?>
        </a>
    </div>
     <!-- END DESCRIPTION -->

  </div>
  <!-- END BRANDING -->
  </div>

  <?php // ADD NAVIGATION ?>



  

</header> 
<!--- HEADER ENDS HERE -----> 

