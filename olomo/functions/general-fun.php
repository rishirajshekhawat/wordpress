<?php 
/**
 * functions hooks
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */// Theme Color
function olomo_theme_color() {
global $olomo_options;
$theme_color = $olomo_options['theme_color'];	
$hover_color = $olomo_options['hover_color'];?>
<style>
a, .outline-btn, .btn-link, .owl-nav > div:hover:after, 
header .navbar-default .navbar-nav li.active a, header .navbar-default .navbar-nav li.active a:hover,header .navbar-default .navbar-nav li.active a:focus, 

header #navigation .navbar-default .navbar-nav li ul.sub-menu li a:hover, header #navigation .navbar-default .navbar-nav li ul.children li a:hover, 

.navbar.navbar-default #navigation .nav.navbar-nav li > a:hover, .listing_info a:hover, .post_category a, .post_info a:hover, .footer_nav ul li a:hover, .icon_div, .plan_price, .office_info_box a:hover, .meta_m .fa, .meta_m a:hover, .sidebar_widgets ul li a:hover, .entry-desc h3 a:hover, .info_m h6 a:hover, .comment-meta.commentmetadata a:hover, 

.listing_price span, p.listing_like .fa, .listing_favorites .fa, .listing_favorites a:hover, .listing_favorites a:focus, p.listing_favorites .fa, p.listing_favorites a:hover, p.listing_favorites a:focus, p.listing_like a:hover, p.listing_like a:focus {
  color:<?php echo esc_html($theme_color); ?>;	
  fill: <?php echo esc_html($theme_color); ?>;
}
a:hover, a:focus, #amenities ul li a:hover, .btn-link:focus, .btn-link:hover {
  color:<?php echo esc_html($hover_color); ?>;	
  fill: <?php echo esc_html($hover_color); ?>;
}

.btn, .primary-bg, .owl-dots .owl-dot.active span, .owl-dots .owl-dot:hover span, .header_solidbg .submit_listing .btn, #category_slider .item:hover, .review_score, .like_post:hover, .featured_label, .listing_cate span.listing_like, .post_category a:hover, .follow_us ul li a:hover, .category_listing_n, .layout-switcher a.active, .layout-switcher a:hover, .widget_title::after, .post_tag a:hover, #view_map:hover, .demo_changer .demo-icon, 

.pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover, .pagination > li > a:focus, .pagination > li > a:hover, .pagination > li > span:focus, .pagination > li > span:hover{
  background:<?php echo esc_html($theme_color); ?>;
  fill: <?php echo esc_html($theme_color); ?>;
}
.vc_btn3-style-custom {
  background:<?php echo esc_html($theme_color); ?> !important;
  fill: <?php echo esc_html($theme_color); ?>;
}
.btn:hover, .btn:focus, .social_links a{
  background-color:<?php echo esc_html($hover_color); ?>;
  fill: <?php echo esc_html($hover_color); ?>;
}
.outline-btn, .owl-dots .owl-dot.active span, .owl-dots .owl-dot:hover span, .header_solidbg .submit_listing .btn, .post_category a, #view_map:hover:after, #view_map:hover:before, .listing_favorites .fa, p.listing_like .fa, .share_listing a, .submit_listing .btn:hover, .marker-container:hover .face.front, .clicked .marker-container .face.front {
	border-color:<?php echo esc_html($theme_color); ?>;
}
.form-control:focus, form input:focus, form textarea:focus, form select:focus {
	outline-color:<?php echo esc_html($theme_color); ?>;
}
.post_category a {
  color:<?php echo esc_html($theme_color); ?> !important;	
  fill: <?php echo esc_html($theme_color); ?>;
}
.marker-arrow {
	border-top-color:<?php echo esc_html($theme_color); ?>;
}
</style>
<?php 	
}
add_action('wp_head', 'olomo_theme_color', 100);// Typography
function olomo_typography() {
global $olomo_options;
$typography_h1= $olomo_options['typography_h1']; 
$typography_h2= $olomo_options['typography_h2']; 
$typography_h3= $olomo_options['typography_h3']; 
$typography_h4= $olomo_options['typography_h4']; 
$typography_h5= $olomo_options['typography_h5']; 
$typography_h6= $olomo_options['typography_h6']; 
$typographyh_p= $olomo_options['typographyh_p']; 
?>
<style>
h1{ font-size:<?php echo esc_html($typography_h1['font-size']);?>;}
h2{ font-size:<?php echo esc_html($typography_h2['font-size']);?>;}
h3{ font-size:<?php echo esc_html($typography_h3['font-size']);?>;}
h4{ font-size:<?php echo esc_html($typography_h4['font-size']);?>;}
h5{ font-size:<?php echo esc_html($typography_h5['font-size']);?>;}
h6{ font-size:<?php echo esc_html($typography_h6['font-size']);?>;}
p{ font-size:<?php echo esc_html($typographyh_p['font-size']);?>;}
</style>
<?php
}
add_action('wp_head', 'olomo_typography', 100);