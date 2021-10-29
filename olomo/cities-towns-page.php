<?php
/**
 * The template Name: Cities-Town-Page
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
<div class="inner_pages_cities">
  <div class="container">
	<div class="row">
<?php 
    $locations = get_terms('location', array('number' =>$show));
      foreach($locations as $location) {
        $location_image = listing_get_tax_meta($location->term_id,'location','image');?>	
        <div class="col-sm-6 col-md-3">
            <div class="cities_list" style="background-image:url(<?php echo esc_url($location_image); ?>);">
                <div class="city_listings_info">
                    <h4><?php echo esc_html($location->name); ?></h4>
                    <div class="listing_number"><span><?php echo esc_html($location->count); ?> <?php esc_html_e('Listings', 'olomo') ?> </span> </div>
                </div>
                <a href="<?php echo get_term_link($location->term_id, 'location');?>" class="overlay_link"></a>
            </div>
        </div>
    <?php } ?>
   </div>
 </div>
</div>
<?php  
wp_reset_postdata(); 
get_footer();