<?php 
/** * functions hooks
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */
//Testimonial function 
function olomo_testimonial($atts){
ob_start();		
extract(shortcode_atts(array('show' =>''), $atts));?>
<div id="testimonial_slider" class="div_zindex text-center">
	 <div class="owl-carousel owl-theme">
			<?php $loop = new WP_Query(array('post_type' => 'testimonial', 'post_status' => 'publish', 'posts_per_page'=>$show)); ?>            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <div class="item">
                        <div class="testimonial_header">
                            <h5><?php the_title(); ?></h5>
                        </div>
                       <?php the_content();?>
                    </div>
            <?php endwhile; wp_reset_postdata(); ?>          
            </div>
</div>
<?php 
return ob_get_clean();             
}
//Testimonial Style 2 function 
function olomo_testimonial2($atts){
ob_start();		
extract(shortcode_atts(array('show' =>''), $atts));?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
    <div class="testimonial_content">
        <div class="top_quote">
            <i class="fa fa-quote-left" aria-hidden="true"></i>
        </div>
        <div id="testimonial_slider2">
                 <div class="owl-carousel owl-theme">
                    <?php $loop = new WP_Query(array('post_type' => 'testimonial', 'post_status' => 'publish', 'posts_per_page'=>$show)); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="item">
                                <div class="testimonial_inner_content">
                                    <?php the_content();?>
                                    <div class="author_block">
                                        <figure>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </figure>
                                        <h4><?php the_title(); ?></h4>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile; wp_reset_postdata(); ?>          
                 </div>
            </div>
        <div class="bottom_quote">
          <i class="fa fa-quote-right" aria-hidden="true"></i>
        </div>
    </div>
</div>
</div>    
<?php 
return ob_get_clean();             
}
//Blog List Function
function olomo_Latestblog($atts){
ob_start();
extract(shortcode_atts(array('show' =>''), $atts));?>
<div class="row">
<?php $loop = new WP_Query( array('post_type' => 'post', 'post_status' => 'publish','posts_per_page'=>'3')); 
while ($loop->have_posts()) : $loop->the_post(); ?>        
      <div class="col-md-4">
          <div class="post_wrap">
             <a href="<?php the_permalink(); ?>">
                <?php echo '<div class="post_img">';
                        the_post_thumbnail('olomo-blog-grid', array('class' => 'img-responsive center-block'));
                      echo '</div>'; ?>
              </a>
             <div class="post_info">
                <div class="post_category"><?php the_category(' ');?></div>
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                <p><?php echo olomo_excerpt('12')?></p>
                <div class="post_meta">
                    <p><?php esc_html_e('By:', 'olomo');?> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'), get_the_author_meta('user_nicename')); ?>"><?php the_author(); ?></a></p>
                    <p><?php esc_html_e('On:', 'olomo');?> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></p>
                </div>
            </div>
        </div>
      </div>
<?php endwhile; wp_reset_postdata(); ?> 
</div>
<?php     
return ob_get_clean();             
}