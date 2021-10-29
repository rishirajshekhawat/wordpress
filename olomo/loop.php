<?php 
/**
 * The Template for displaying all single posts.
 *
 * @package		olomo
 * @author		webmasterdriver
 * @copyright	Copyright (c) 2019
 * @link		http://www.webmasterdriver.net
 * @since		olomo 1.5
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="post-thumbnail"> <a href="<?php the_permalink(); ?>">
    <?php if(has_post_thumbnail()) {
			the_post_thumbnail('olomo-blog-grid');
		}
	?>
    </a> </div>
  <div class="entry-desc">
    <h3> <a href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
      </a></h3>
    <div class="entry_meta"> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <span class="meta_m"><i class="fa fa-user"></i>
      <?php the_author(); ?>
      </span></a> <a href="<?php the_permalink(); ?>"> <span class="meta_m"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span> </a> </div>
    <div class="entry-content">
      <p><?php echo olomo_excerpt('14');?></p>
    </div>
    <a href="<?php the_permalink(); ?>" class="read_btn">
    <?php esc_html_e('Read More','olomo'); ?>
    <i class="fa fa-angle-right"></i></a> </div>
</div>