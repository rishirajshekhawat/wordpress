<?php
/**
 * The template for displaying 404 Error Page.
 */
get_header();?>
<section id="inner_banner" class="parallex-bg">
	<div class="container">
    	<div class="white-text text-center div_zindex">
        	<h1><?php esc_html_e('Error 404', 'olomo'); ?> </h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<div id="inner_pages">
	<div class="container">
    	<div class="not_found_msg text-center">
          	<div class="error_msg_div"> 
            	<h2><span><?php esc_html_e('404', 'olomo'); ?></span><?php esc_html_e('Oopss! That page not found', 'olomo'); ?></h2>
            	<p><?php esc_html_e('We are sorry, but the page you were looking for does not exist. Here are some useful links.', 'olomo'); ?></p> 
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"> <?php esc_html_e('Back To Home', 'olomo'); ?> </a>
          </div>
        </div>
    </div>
</div>
<?php
get_footer();