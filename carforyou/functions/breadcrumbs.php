<?php 
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
// Breadcrumbs
function carforyou_breadcrumb() { 
$breadcrumb = carforyou_get_option('breadcrumb'); 
if($breadcrumb=='1'||$breadcrumb==''): 
 $home_title ='Home';     
	if (!is_home()) {
		echo '<ul class="coustom-breadcrumb">';
		echo '<li>';
			echo '<a class="bread-link bread-home" href="'.esc_url(get_home_url()).'">'.esc_html($home_title).'</a>';
		echo '</li>';
		echo '<li class="separator ">&nbsp;</li>';
		if (is_category() || is_single() ||is_archive()) {
		echo '<li>';	
			the_category(',&nbsp;&nbsp;');
			if (is_single()) {
				echo '<li class="separator">&nbsp;</li>';
				echo '<li>';
					the_title();
				echo '</li>';
			}
		echo '</li>';			
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	echo '</ul>';	
	}
endif;	
}