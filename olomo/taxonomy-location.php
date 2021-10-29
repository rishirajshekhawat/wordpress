<?php
/**
 * The template for displaying Listing Locations.
 */
get_header();

global $olomo_options;
$listing_style = $olomo_options['listing_style'];	

if($listing_style=='half_map_listing'):
	get_template_part('include/listing-with-map');
else:
	get_template_part('include/listing-simple');
endif;

get_footer();