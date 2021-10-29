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

 * @subpackage carforyou

 * @since carforyou 2.5

 */

get_header(); ?>
<!--Page Header-->
<?php carforyou_inner_header(); ?>
<!-- /Page Header--> 
<?php while ( have_posts() ) : the_post(); ?>
    <div class="container">
        <div class="inner_pages">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          		<div class="inner_pages_content">
			   		<?php if (has_post_thumbnail()):
						  the_post_thumbnail('full', array('class' => 'alignleft'));
					endif;	  
					?>
	            	<?php the_content();?>
            	</div>    
           </article>
			<?php comments_template(); ?>
            <?php wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html( 'Pages:', 'carforyou' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                ) );
            ?>  
          <?php edit_post_link( __( 'Edit', 'carforyou' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>              

         </div>  
    </div>
<?php endwhile; 
get_footer();