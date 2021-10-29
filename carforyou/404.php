<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
get_header(); ?>
<!--Page Header-->
<?php 
function carforyou_404(){
$header_image = carforyou_get_option('404_header_image'); 
if(!empty($header_image['url'])):
	echo esc_url($header_image['url']);
else:
 carforyou_InnerHeader();
endif;
}
?>
<section class="page-header page_404" style="background-image:url(<?php carforyou_404(); ?> )">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1><?php echo esc_html(carforyou_get_option('404_page_title')); ?></h1>
      </div>
    </div>
  </div>
  
  <!-- Dark Overlay-->
  
  <div class="dark-overlay"></div>
</section>

<!-- /Page Header--> 
<!--Error-404-->
<section class="error_404 section-padding">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-5">
        <div class="error_text_m">
          <h2><?php echo wp_kses_post(carforyou_get_option('404_page_mid_title'),true); ?></h2>
          <div class="background_icon"><i class="fa fa-road" aria-hidden="true"></i></div>
        </div>
      </div>
      <div class="col-md-6 col-sm-7">
        <div class="not_found_msg">
          <div class="error_icon"> <i class="fa fa-smile-o" aria-hidden="true"></i> </div>
          <div class="error_msg_div"> <?php echo wp_kses_post(carforyou_get_option('404_page_content'),true); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">
            <?php esc_html_e('Back To Home', 'carforyou'); ?>
            <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /Error-404-->
<?php get_footer();
