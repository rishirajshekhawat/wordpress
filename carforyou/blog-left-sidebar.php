<?php
/**
 *Template Name:Blog Left Style
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
get_header();
if ( have_posts() ) :while ( have_posts() ) : the_post();?>
<!--Page Header-->
<?php carforyou_inner_header(); ?>
<!-- /Page Header-->
<!-- Our Articles -->
<section class="our_blog">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-8 col-md-push-4 col-lg-push-3">
        <?php
				global $paged;
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('post_type' => 'post','paged' =>$paged);
				$my_query1  = new WP_Query($args);
				while ($my_query1 ->have_posts()) : $my_query1 ->the_post(); ?>
        <!-- article-1 -->
        <?php if(get_post_format() == 'video'):?>
        <article id="post-<?php the_ID(); ?>" class="article_wrap">
          <div class="articale_header">
            <h2><a href="<?php the_permalink(); ?>"> <?php the_title();?></a></h2>
            <div class="article_meta">
              <ul>
                <li><i class="fa fa-user" aria-hidden="true"></i>
                 <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                </li>
                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>">
                  <?php the_time('d M Y') ?>
                  </a></li>
                <li><i class="fa fa-tags" aria-hidden="true"></i>
                  <?php the_category(', ');?>
                </li>
                <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
                  <?php esc_html_e(' Comments', 'carforyou'); ?>
                  </a> </li>
                <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
              </ul>
            </div>
          </div>
          <div class="article_img">
            <?php 
			$vedio_url = get_post_meta( get_the_ID(), 'auto_video_link', true );
			if (!empty( $vedio_url)): 
			$step1=explode('v=', $vedio_url);
			$step2 =explode('&',$step1[1]);
			$video_url = $step2[0]; ?>
                <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>" allowfullscreen></iframe>
            <?php endif;?>
          </div>
          <div class="article_info">
            <p><?php echo wp_trim_words( get_the_content(), 80, '...' ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </article>
        <?php else : ?>
        <article id="post-<?php the_ID(); ?>" class="article_wrap">
          <div class="articale_header">
            <h2><a href="<?php the_permalink(); ?>">
              <?php the_title();?>
              </a></h2>
            <div class="article_meta">
              <ul>
                <li><i class="fa fa-user" aria-hidden="true"></i>
                  <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
                </li>
                <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>">
                  <?php the_time('d M Y') ?>
                  </a></li>
                <li><i class="fa fa-tags" aria-hidden="true"></i>
                  <?php the_category(', '); ?>
                </li>
                <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
                  <?php esc_html_e(' Comments', 'carforyou'); ?>
                  </a></li>
                <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
              </ul>
            </div>
          </div>
          <div class="article_img"> <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ):

                                  the_post_thumbnail('carforyou_large', array('class' => 'img-responsive'));

                                  endif;?>
            </a> </div>
          <div class="article_info">
            <p><?php echo wp_trim_words( get_the_content(), 80, '...' ); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html_e('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </article>
        <?php endif; 
                endwhile;  wp_reset_query();?>
        <!-- pagination -->
        <?php carforyou_pagination(); ?>
        <!-- /pagination --> 
      </div>
      <!--Side-bar-->
      
      <aside class="col-lg-3 col-md-4 col-md-pull-8 col-lg-pull-9">
        <?php get_sidebar(); ?>
      </aside>
      
      <!--/Side-bar--> 
      
    </div>
  </div>
</section>

<!-- /Our Articles -->

<?php  endwhile; wp_reset_query(); endif;  

 get_footer(); 
