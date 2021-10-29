<?php
/**
 *Template Name:Details Page Style 1
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
/**
Call header using WordPress function  
*/
get_header();

$args = array(

'post_type'      => 'auto',

'post_id'        => '11',

'posts_per_page' => 1

);

// The Query

$the_query = new WP_Query( $args );

while ( $the_query->have_posts() ) : $the_query->the_post();

	carforyou_detail_page1();

endwhile;

wp_reset_postdata();

//POP Up 

carforyou_popup();

get_footer();