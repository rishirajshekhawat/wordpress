<?php
/**
 * The template for displaying tag Page.
 */
get_header();?>

<section id="inner_banner" class="parallex-bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	 <h1><?php printf( esc_html__( 'Tag: %s', 'olomo' ), single_cat_title( '', false ) ); ?></h1>
             <?php the_archive_description( '<div class="archive-description"><p>', '</p></div>' ); ?>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<?php 
	global $olomo_options;
	$blog_style = $olomo_options['blog_style'];	
	if($blog_style=='BlogGrid'):
		get_template_part('include/blog-grid');
	else:
		get_template_part('include/blog-list');

	endif;

get_footer();