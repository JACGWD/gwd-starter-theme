<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>

<!doctype html>
<html <?php language_attributes(); ?>>
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

<?php get_search_form(); ?>

<div id="branding">

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

    <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'primary-nav' ) ); ?>
    </nav>

</header> 
<!--- HEADER ENDS HERE -----> 

<div class="main-container">
<!---  CONTAINER DIV OPENS HERE ----->

