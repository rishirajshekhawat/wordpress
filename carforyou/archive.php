<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 *
 * If you'd like to further customize these archive views, you may create a
 * has tag.php for Tag archives, category.php for Category archives, and
 * 
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5
 */
get_header();
if (have_posts()) : ?>
<!-- Banners -->
<section class="page-header blog_page" style="background-image:url(<?php carforyou_InnerHeader();?> )">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <?php the_archive_title( '<h1 class="page_title">', '</h1>' );?>
      </div>
      <?php carforyou_breadcrumb(); ?>
      <?php  the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
