<?php
/**
 * The template for displaying Listing single page.
 *
 */
get_header();
global $olomo_options;
$single_listing_style = $olomo_options['single_listing_style'];	

if($single_listing_style == 1){
get_template_part('templates/listing-detail1');
}
else{
get_template_part('templates/listing-detail2');
}

get_footer();