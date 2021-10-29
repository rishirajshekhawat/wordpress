<?php
/**
 *Template Name:VC Page
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
/**
Call header using WordPress function  
*/
get_header(); ?>
<!--Page Header-->
<?php carforyou_inner_header(); ?>
<!-- /Page Header--> 
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	            <?php the_content();?>
           </article>
        </div>
    </div>
<?php endwhile; 
get_footer();