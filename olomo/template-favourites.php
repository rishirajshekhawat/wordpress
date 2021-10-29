<?php
/**
 * Template name: Favourites
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 */
 ?>
<?php get_header();
if(have_posts()): ?>
<!-- Inner-Banner -->
<?php if(has_post_thumbnail()){ ?>
<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo the_post_thumbnail_url( 'full' ); ?>)">
<?php } else { ?>
<section id="inner_banner" class="parallex-bg" style="background:url(<?php echo site_url(); ?>/wp-content/themes/olomo/assets/images/page-banner.jpg)">
<?php } ?>
  <div class="container">
    <div class="white-text text-center div_zindex">
      <h1> <?php the_title();?></h1>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>
<!-- /Inner-Banner -->
<div id="inner_pages">
	<?php
    $fav = olomo_fav_ids();
    if(!empty($fav)){?>
    <div class="container">
        <div class="row">
           <div id="content-grids" >
				  <?php
                    $args=array(
                        'post_type' => 'listing',
                        'post_status' => 'publish',
                        'post__in' => $fav,						
                    );	
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                        while ($my_query->have_posts()) : $my_query->the_post(); 
                                get_template_part( 'listing-loop' );
                        endwhile;
                        wp_reset_query();
                    }
                 ?>
           </div>
        </div>
    </div>	
    <?php } else{ ?>
    <div class="error-panel">
        <div class="container">
               <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="error-column">
                            <i class="fa fa-frown-o" aria-hidden="true"></i>
                            <h1><?php esc_html_e('Sorry!', 'olomo'); ?></h1>
                            <h4><?php esc_html_e('You have not selected any list in Wishlist.', 'olomo'); ?></h4>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"> <?php esc_html_e('Back To Home', 'olomo'); ?> </a>
                        </div>
                    </div>
                </div>
         </div>                      
    </div>           
    <?php }	 ?>
</div>
<?php 
endif;
wp_reset_query();
get_footer();