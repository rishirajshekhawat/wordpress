<?php 
/**
 * Main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */
get_header();
global $olomo_options;?>
<section id="inner_banner" class="parallex-bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1> <?php single_post_title(); ?> </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<?php 
	$blog_style = $olomo_options['blog_style'];	
	if($blog_style=='BlogGrid'):
		get_template_part('include/blog-grid');
	else:
		get_template_part('include/blog-list');
	endif;
get_footer();