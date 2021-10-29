<?php
/**
 * The template for displaying Archive Page.
 */
 get_header();
 ?>
<!-- Inner-Banner -->
<section id="inner_banner" class="parallex-bg">
   <div class="container">
      <div class="white-text text-center div_zindex">
         <?php the_archive_title( '<h1>', '</h1>' );?>
         <?php the_archive_description( '<div class="archive-description"><p>', '</p></div>' ); ?>
      </div>
   </div>
   <div class="dark-overlay"></div>
</section>
<!-- /Inner-Banner -->
<?php 
	global $olomo_options;
	$blog_style = $olomo_options['blog_style'];	
	if($blog_style=='BlogGrid'):
		get_template_part('include/blog-grid');
	else:
		get_template_part('include/blog-list');
	endif;
?>
<?php get_footer();