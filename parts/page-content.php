<?php
// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
		
 the_title('<h1>','</h1>');
		
 the_content();
?>
</article>
