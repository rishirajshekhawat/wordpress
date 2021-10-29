<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
 // Banner Slider
function carforyou_Slider(){
ob_start();	?>
<section id="banner2">
	<div class="owl-carousel owl-theme">
		<?php 
    extract( shortcode_atts(array('show' =>''), $atts ));
    $loop = new WP_Query( array('post_type' => 'slider', 'posts_per_page'=>-1
));
$i=0;
    while ($loop->have_posts()) : $loop->the_post();
	$i++;
    global $post; 
      
$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');?>
          <div class="slides" id="siderwidth<?php echo esc_html($i);?>" style="background-image:url(<?php echo esc_url($featured_img_url); ?>);">
              <div class="carousel-caption">
                    <div class="banner_text text-center div_zindex white-text">
                   <h1><?php the_title(); ?></h1>
                   <h3 class="slider-content"><?php the_content(); ?></h3>
                   
                 </div>
              </div>
          </div>
        <?php endwhile; wp_reset_query(); ?>         
    </div>
</section>
<?php
$output = ob_get_clean();
return $output; 
}