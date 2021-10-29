<?php
/**
 * The template for displaying Search Page.
 */
 get_header();
 $post_type='';
	if(isset($_GET['post_type'])){
		$post_type = $_GET['post_type'];
		if(isset( $post_type )&&locate_template( 'search-' . $post_type . '.php' ) ) {
		  	get_template_part( 'search', $post_type );  
		exit;
		}
	}
	else{?>

    <section id="inner_banner" class="parallex-bg">
        <div class="container">
            <div class="white-text text-center div_zindex">
                 <h1><?php esc_html_e('Search Results for:', 'olomo') ?><?php printf(esc_html__(' %s', 'olomo' ), get_search_query() ); ?></h1>
            </div>
        </div>
        <div class="dark-overlay"></div>
    </section>
	<?php 
    global $olomo_options;
    $blog_style = $olomo_options['blog_style'];	
    if($blog_style=='BlogGrid'):
        get_template_part('include/blog-grid');
    else:
        get_template_part('include/blog-list'); 
    endif;
   } 
get_footer();