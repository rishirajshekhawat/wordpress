<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
get_header();
if ( have_posts() ) : ?>
<!-- Banners -->
<section class="page-header blog_page" style="background-image:url(<?php carforyou_InnerHeader();?> )">
  <div class="container">
    <div class="page-header_wrap"> 
      <div class="page-heading">
        <h1 class="page_title"><?php printf( esc_html__( 'Category: %s', 'carforyou' ), single_cat_title( '', false ) ); ?></h1>
      </div>
      <?php carforyou_breadcrumb(); ?>
      <?php the_archive_description( '<div class="taxonomy-description div_zindex white-text">', '</div>' );?>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Banners --> 
<!-- Our Articles -->
<section class="our_blog">
  <div class="container">
    <div class="row">
      <?php carforyou_BlogStyle(); ?>
    </div>
  </div>
</section>
<!-- /Our Articles -->
<?php
endif; 
get_footer();