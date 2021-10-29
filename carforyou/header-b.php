<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
if (!function_exists('wp_site_icon')|| ! wp_site_icon()):
  $favicon = carforyou_get_option('site_favicon');
   if (!empty($favicon['url'])):
  echo '<link rel="shortcut icon" href="'.esc_url($favicon['url']).'" type="image/x-icon">';
  endif;
endif;
if (function_exists('carforyou_pc')):
	carforyou_pc();
endif;
if(function_exists('carforyou_font_family')):
	carforyou_font_family();
endif;
/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */
wp_head();
?>
</head>
<?php 
if (function_exists('carforyou_pc')):
	carforyou_pc();
endif;
if(function_exists('carforyou_font_family')):
	carforyou_font_family();
endif;
?>

<body <?php body_class(); ?> >

<header class="header_style2"> 
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="navbar-header">
            <div class="logo">
              <?php 
               $site_logo =  carforyou_get_option( 'site_logo' );
               $site_name = get_bloginfo('name', 'display');
                if(!empty($site_logo['url'])):
                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" ><img src="'.esc_url($site_logo['url']).'" alt="image"></a>';
                else:
                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" >'.esc_html($site_name).'</a>';
                endif;
              ?>
            </div>
            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">
            <?php esc_html('Toggle navigation','carforyou') ?>
            </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
        </div>
        <div class="col-md-9 text-right">
          <div class="collapse navbar-collapse" id="navigation">
            <?php 
			  if (has_nav_menu('primary')):
				wp_nav_menu( array('theme_location' => 'main-menu', 'menu' => 'main-menu', 'menu_class' => 'nav navbar-nav'));
			  endif;	
			  ?>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
</header>