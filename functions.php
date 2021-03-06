<?php
// ADD THIS TO ALL YOUR PHP FILES FOR ADDED SECURITY

if (!defined('ABSPATH'))
	exit; // EXIT IF ACCESSED DIRECTLY       





// AUTO UPDATE WP CORE, PLUGINS AND THEMES
add_filter( 'allow_minor_auto_core_updates', '__return_true' );         // ENABLE MINOR UPDATES
add_filter( 'allow_major_auto_core_updates', '__return_true' );         // ENABLE MAJOR UPDATES
add_filter( 'auto_update_plugin', '__return_true' );                    // UPDATE PLUGINS
add_filter( 'auto_update_theme', '__return_true' );                     // UPDATE THEMES 






// PROPER WAY TO ENQUEUE SCRIPTS AND STYLES.


// ADD THEME CSS
function gwd_starter_theme_scripts() {
    $stylesheet=get_stylesheet_directory().'/style.css';
    $stylesheet_version = filemtime($stylesheet);
    wp_enqueue_style( 'child-theme', get_stylesheet_uri(), array(), $stylesheet_version );
}
add_action( 'wp_enqueue_scripts', 'gwd_starter_theme_scripts' );



// ENQUEUE MODERNIZR FOR BROWSER FEATURE DETECTION
function gwdstarter_modernizr() {
    $modernizr_path = get_template_directory() . '/js/modernizr-jacgwd.min.js';
    $modernizr_version = filemtime($modernizr_path);
    wp_enqueue_script( 'gwdstarter-modernizr', get_template_directory_uri() . '/js/modernizr-jacgwd.min.js', array(), $modernizr_version, true );
}
add_action( 'wp_enqueue_scripts', 'gwdstarter_modernizr' );



// ENQUEUE JQUERY-UI.JS FILE
function gwdstarter_jquery_ui() {
    $jquery_ui = get_template_directory() . '/js/jquery-ui.min.js';
    $jquery_ui_version  = filemtime($jquery_ui);
    wp_enqueue_script( 'gwdstarter_jquery_ui', get_template_directory_uri() . '/js/jquery-ui.min.js', array( 'jquery' ), $jquery_ui_version, true );
}
add_action( 'wp_enqueue_scripts', 'gwdstarter_jquery_ui' );



// ENQUEUE COMBINED-SCRIPTS.JS FILE
function gwdstarter_combined_scripts() {
    $combined_scripts = get_template_directory() . '/js/combined-scripts.js';
    $combined_scripts_version  = filemtime($combined_scripts);
    wp_enqueue_script( 'gwdstarter_combined_scripts', get_template_directory_uri() . '/js/combined-scripts.js', array( 'jquery' ), $combined_scripts_version, true );
}
add_action( 'wp_enqueue_scripts', 'gwdstarter_combined_scripts' );


// ENQUEUE GOOGLE ANALYTICS JS FILE
function gwdstarter_google() {
    $gwd_ga = get_template_directory() . '/js/google-analytics.js';
    $gwd_ga_version  = filemtime($gwd_ga);
    wp_enqueue_script( 'gwdstarter_google', get_template_directory_uri() . '/js/google-analytics.js', array(), $gwd_ga_version, true );
}
add_action( 'wp_enqueue_scripts', 'gwdstarter_google' );




// ENABLE SIDEBAR AND WIDGETS
if(!function_exists('eg_enableWidgets')) {
    add_action( 'widgets_init', 'eg_enableWidgets' );
    function eg_enableWidgets(){
            
    register_sidebar( array(
    'name' => 'Blog sidebar',
    'id'   => 'blog-sidebar',
    'before_widget' => '<div class="widget-area widget_blog-sidebar blog-sidebar">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
     ) );
    }
    }





  // ADD THE MENU SYSTEM
  function register_gwd_starter_menus() {
      register_nav_menus(
        array(
          'header-menu' => __( 'Header Menu' ),
          'footer-menu' => __( 'Footer Menu' ),
          'social-menu' => __( 'Social Menu' ),
        )
      );
    }
  add_action( 'init', 'register_gwd_starter_menus' ); 





// DETECT HTTP/S AND CURRENTLY LOADED PAGE FOR SOCIAL MEDIA SHARING
function get_act_url() {
	$act_url  = ( isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ) ? 'https' : 'http';
	$act_url .= '://' . $_SERVER['SERVER_NAME'];
	$act_url .= in_array( $_SERVER['SERVER_PORT'], array( '80', '443' ) ) ? '' : ":" . $_SERVER['SERVER_PORT'];
	return $act_url;
}





// ADD ADDITIONAL WP FEATURES TO THE SITE


// ADD FEATURES TO THE THEME
function gwd_starter_theme_init(){

    add_theme_support('post-thumbnails');
    // ENABLE FEATURED IMAGES AND POST THUMBNAILS
    
    add_theme_support('title-tag');
    // Adds a custom <title> tag in the <head>

    add_theme_support( 'woocommerce' );
    // ADDS SUPPORT FOR THE WOOCOMMERCE E-COMMERCE PLUGIN

    add_theme_support( 'custom-logo' , array( // ADDS SUPPORT FOR ADDING A CUSTOM LOGO VIA THE THEME CUSTOMIZER PAGE
        'height' => 200,
        'width' => 200,
        'flex-width' => true,
        'flex-height' => true,
        'unlink-homepage-logo' => true,
        'header-text' => array( 'site-title', 'site-description' ),
      ));

      add_theme_support( 'post-formats', array(
        'gallery',
        'video',
        'aside',
        'image',
        'audio',
        ) );
    
    add_theme_support( 'responsive-embeds' );  // THE EMBED BLOCKS AUTOMATICALLY APPLY STYLES TO EMBEDDED CONTENT TO REFLECT THE ASPECT RATIO OF CONTENT THAT IS EMBEDDED IN AN IFRAME, SUCH AS YOUTUBE VIDEOS OR GOOGLE MAPS. 
    
    add_theme_support('html5',
    array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'figure', 'figcaption', 'nav', 'section')
    // FORCES WP TO USE SEMANTIC HTML 5 TAGS SUCH As <figure> AND <figcaption>
    );
    }
    
    // ADDS ALL THESE FEATURES TO WP
    add_action('after_setup_theme', 'gwd_starter_theme_init'); 







// ADDS THE GWD EPORTFOLIO PREVIOUS/NEXT PAGINATION NAVIGATION LIST

if (!function_exists('eg_CAnav')){
// Make sure that function name does not already exist

    function eg_CAnav($loop=false){ // Set the looping from last item next to first and from first item back to last. Default is false (no wrapping around the end).
    // Define the function

        global $post; // The currently loaded page
        $pagelist = get_pages("child_of=".$post->post_parent."&parent=".$post->post_parent."&sort_column=title&sort_order=asc");
        if (empty ($pagelist)) {
        return; } // If empty stop here

        $pages = array();
        foreach ($pagelist as $page) {
            $pages[] += $page->ID; // Fetch only the IDs of the pages, not all other data
        }

        $current = array_search($post->ID, $pages); // Get index of results, starting at zero (not one)
        if ($loop) { // If you want pagination to go from Last to First and vice-versa, this part applies
            $first=$pages[0];
            $count=count($pages);
            $last = $count - 1;
            $prevID = ($current==0)?$pages[$last]:$pages[$current-1];
            // Previous ID is either Last Page or Current Page -1
            $nextID = ($current==$last)?$first:$pages[$current+1];
            // Next ID is either First Page or Current Page +1
        } 
        
        else { // If you disable the looping navigation
            $prevID = ($current==0)?false:$pages[$current-1];
            $count=count($pages);
            $last = $count - 1;
            $nextID = ($current==$last)?false:$pages[$current+1];
        }
        ?>
            <ul class="pagination">
                <?php if (!empty ($prevID)) { ?>
                <li class="previous-page">
                <a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
                </li>
                <?php } ?>

                <li class="up-to-gallery"><a class="page-link" href="<?php echo get_permalink($post->post_parent); ?>"><?php echo get_the_title($post->post_parent); ?></a></li>  
                
                <?php
                if (!empty($nextID)) { ?>
                <li class="next-page">
                <a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?></a>
                </li>
                
                <?php } ?>
            </ul>
        <?php
    }
}
