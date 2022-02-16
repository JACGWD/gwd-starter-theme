<?php
/* Template Name: Blogs Page Template */ 
/* The template for displaying the blog page of the site. */
/* @link https://developer.wordpress.org/themes/basics/template-hierarchy/  */


// Add this to all your php files for added security

if (!defined('ABSPATH'))
	exit; // Exit if accessed directly.
?>

<?php
$blog_posts = new WP_Query( 
    array( 
        'post_type' => 'post', 
        'post_status’' => 'publish', 
        'posts_per_page' => -1 ) 
    );
?>

<?php get_header(); ?>

<main class="blog-posts-page">

<h1>Blog Posts</h1>

<?php if ( $blog_posts->have_posts() ) : ?>
<? // IF THERE ARE ANY POST START THE LOOP, OTHERWISE GO TO LINE 83 ?>



        <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
        <?php // AS LONG AS THERE ARE POSTS, REPEAT THE FOLLOWING PATTERN ?>


    <section class = "blog-post">
        <article id = "post-<?php the_ID(); ?>">

                <h2 class = "post-title">
                <?php // CLICKABLE H2 TAG ?>
                    <a href = "<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>



                <ul class="blog-post-metadata">
                    <li class="post-category"><?php the_category(', '); ?></li>
                    <?php // ADD BLOG POST CATEGORY ?>
                    <li class="post-author">by <?php the_author(); ?></li>
                    <?php // ADD AUTHOR NAME ?>
                    <li class="post-date">Published on <?php the_date(); ?></li>
                    <?php // ADD PUBLISHED DATE ?>
                </ul>
                


                <?php if ( has_post_thumbnail() ) { 
                 echo '<a href = "<?php the_permalink(); ?>">' .
                the_post_thumbnail( get_the_ID(), 'full' ) .
                '</a>';
                } ?>
                <?php // ADD CLICKABLE THUMBNAIL IMAGE IF ONE EXISTS ?>

               

                <section class="post-excerpt">
                    <?php wp_kses_post( the_excerpt() ) ?>
                    <?php // ADD TEXT EXCERPT OF BLOG POST ?>
                </section>


                <div class = "post-read-more">
                    <a itemprop = "url" href = "<?php the_permalink(); ?>" target = "_blank">
                    <?php echo esc_html__( 'Read more', 'gwdstarter' ) ?>
                    <?php // ADD READ MORE LINK ?>
                    </a>
                </div> 

        </article>
    </section> 
    <?php endwhile; ?>



<? // IF NO BLOG POSTS - DO THE FOLLOWING ?>
<?php else: ?>
<p class = "no-blog-posts">
<?php esc_html_e('Sorry, no posts matched your criteria.', 'theme-domain'); ?> 
</p>
<?php endif; 
wp_reset_postdata(); ?>
</div>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
