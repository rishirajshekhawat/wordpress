<?php
/**
 *Template Name:Home Main Page
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */
/**
Call header using wordpress function  
*/
get_header();

if(have_posts()): while(have_posts()):the_post();?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <?php the_content(); ?>
    </div>
</article>
<?php endwhile; 
 wp_reset_postdata();
endif;
get_footer();