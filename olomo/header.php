<?php	
/*function show_template() {
    global $template;
    echo basename($template); exit;	
}
add_action('wp_head', 'show_template');*/	
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <?php olomo_favicon(); ?>
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>
<?php
global $olomo_options;
$mapbox_token= '';
$map_style= '';
$mapOption = $olomo_options['map_option'];
if($mapOption == 'mapbox'){
	$mapbox_token = $olomo_options['mapbox_token'];
	$map_style = $olomo_options['map_style'];
}
$primary_logo = $olomo_options['primary_logo']['url'];
$listing_style = '';
$listing_styledata = '';
$listing_style = $olomo_options['listing_style'];
if(isset($_GET['list-style']) && !empty($_GET['list-style'])){
	$listing_styledata = 'data-list-style="'.$_GET['list-style'].'"';
	$listing_style = $_GET['list-style'];
}
?>
<div id="page" class="clearfix" <?php echo esc_attr($listing_styledata); ?> data-mtoken="<?php echo esc_attr($mapbox_token); ?>"  data-mstyle="<?php echo esc_attr($map_style); ?>" data-sitelogo="<?php echo esc_attr($primary_logo); ?>" data-site-url="<?php echo esc_url(home_url('/')); ?>">
<?php 
$header_style = $olomo_options['header_style'];
if($header_style=='header_style_2'):
get_template_part('functions/header2');
do_action('header_js_css2');
elseif($header_style=='header_style_3'): 
get_template_part('functions/header3');
do_action('header_js_css3');
else: 
get_template_part('functions/header1');
do_action('header_js_css1');
endif;