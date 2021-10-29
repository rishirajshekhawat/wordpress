<?php

/**

 * The template for showing all page

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *

 * @package WordPress

 * @subpackage olomo

 * @since olomo 1.5

 */

 

get_header(); ?>

<!-- Inner-Banner -->
<?php if(has_post_thumbnail()){ ?>
<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
<?php } else { ?>
<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo site_url(); ?>/wp-content/themes/olomo/assets/images/page-banner.jpg)">
<?php } ?>

	<div class="container">

    	<div class="white-text text-center div_zindex">

        	<h1><?php single_post_title();?></h1>

        </div>

    </div>

    <div class="dark-overlay"></div>

</section>

<!-- /Inner-Banner -->

<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div id="inner_pages">

    <div class="container">

		<?php the_content();?>        

		<?php comments_template(); 

          wp_link_pages( array(

                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html( 'Pages:', 'olomo' ) . '</span>',

                'after'       => '</div>',

                'link_before' => '<span>',

                'link_after'  => '</span>',

            ) );

         edit_post_link( __('Edit', 'olomo'), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

    </div>

</div>

</article>    

<?php endwhile;

wp_reset_postdata(); 

get_footer();