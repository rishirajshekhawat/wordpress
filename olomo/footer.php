<?php 

/**

 * Footer template for our theme *

 * @package WordPress

 * @subpackage olomo

 * @since olomo 1.5

 */ 

global $olomo_options;



$footerNeed = true;

$listing_style = $olomo_options['listing_style'];

if(isset($_GET['list-style']) && !empty($_GET['list-style'])){

	$listing_style = $_GET['list-style'];

}



if(is_tax('location') || is_tax('listing-category') || is_tax('features') || is_search()){

	if($listing_style == 'half_map_listing'){

		$footerNeed = false;

	}

}

if($footerNeed == true){?>

<?php

$footer_style = $olomo_options['footer_style'];



if($footer_style=='footer_style_1'):

get_template_part('functions/footer1');

elseif($footer_style=='footer_style_3'): 

get_template_part('functions/footer3');

do_action('footer_css3');

elseif($footer_style=='footer_style_4'): 

get_template_part('functions/footer4');

do_action('footer_css4');

else: 

get_template_part('functions/footer2');

endif;

?>	

    </div>

<?php }

wp_footer(); ?>


</body>	

</html>