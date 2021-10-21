<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<!-- <link rel='stylesheet'  href='<?php // echo get_stylesheet_directory_uri(); ?>/reset/modern-css-reset.css' media='all' /> -->


<!-- **************** GET HEADER********************* -->

  <?php wp_head(); ?>

<!--**************** END HEADER*********************** -->

</head>

<body <?php body_class(); ?>>

  
<!--- HEADER STARTS HERE ----->
<header>

    <?php get_search_form(); ?>


    <?php 
       if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
    ?>

    

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

    <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_class' => 'primary-nav' ) ); ?>
    </nav>

</header> 
<!--- HEADER ENDS HERE -----> 