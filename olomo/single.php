<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package		olomo
 * @subpackage	Templates
 * @author		webmasterdriver
 * @copyright	Copyright (c) 2019
 * @link		http://www.webmasterdriver.net
 * @since		olomo 1.5
 */
get_header();
/* The loop starts here. */
if(have_posts()){
	while (have_posts()){
		the_post();
?>
<section id="inner_banner" class="parallex-bg howitwork_bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>    
<div id="inner_pages">
	<div class="container">
		<div class="row">
        	<div class="col-md-8">
            	<article class="article_wrap single_post">    
                    <?php if ( has_post_thumbnail() ):?>
                    <div class="post-thumbnail">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" class="center-block img-responsive">
                    </div>
                    <?php endif; ?>
                    <div class="entry_meta">
                        <span class="meta_m"><i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <?php the_author(); ?></a></span>
                        <span class="meta_m"><i class="fa fa-calendar"></i> <a href="<?php the_permalink(); ?>"><?php the_date(get_option('date_format')); ?></a></span>
                    </div>
                        <div class="entry-content">
                           <?php the_content(); 
						    wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'olomo' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'olomo' ) . ' </span>%',
							));
						   ?> 
                        </div>
                        <?php
							$posttags = get_the_tags();
							if($posttags) {
								echo '<div class="post_tag"><span>Tags:</span>';
							  foreach($posttags as $tag) {
								echo '&nbsp;<a href="' .get_tag_link($tag->term_id). '">' .$tag->name. '</a>'; 
							  }
							  echo '</div>';
							}
						?>
                </article>  
                <?php comments_template();
				olomo_post_nav(); ?>
            </div>
            <aside class="col-md-4">
             <?php get_sidebar(); ?>
            </aside>
        </div>
    </div>
</div>    
<?php 
} // end while
	} // end if
wp_reset_query();
get_footer();