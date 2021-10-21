<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.


// Because you're never too certain, make sure this is executed
// ONLY when you're in the admin by verifying the “register_nav_menus”
// function exists

if( function_exists('register_nav_menus') ) {
    register_nav_menus(array(
        'menu_primary'	=> __('Main menu', 'gwd_starter_theme'),
        'menu_secondary'=> __('Secondary menu', 'gwd_starter_theme'),
        'menu_footer'	=> __('Footer menu', 'gwd_starter_theme'),
        'menu_social'	=> __('Social menu', 'gwd_starter_theme')
    ));}

 //   add_action( 'init', 'register_nav_menus' );