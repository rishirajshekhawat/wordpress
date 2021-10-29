<?php
/**
 * The template for displaying Search result for Listings.
 */
 
get_header(); 
global $olomo_options;

	$listing_style = $olomo_options['listing_style'];	
	if($listing_style=='half_map_listing'):
		get_template_part('include/listing-with-map');
	elseif($listing_style=='listing_advertisement_sidebar_listing'):
		get_template_part('include/listing-advertisement-with-sidebar');	
	else:
		get_template_part('include/listing-simple');
	endif;
get_footer();