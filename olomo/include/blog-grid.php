<?php
/**
 * Blog Grid template for our theme
 *
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */ 
$postGridCount = 0;			
?>
<div id="inner_pages">
    <div class="container">
    <div class="row">
		 <?php 
		// $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		// $args = array('posts_per_page' => 6, 'paged' => $paged );
		// query_posts($args); 
		// $the_query = new WP_Query( $args ); 
		// ?>       <?php 
		if(have_posts()):
		while(have_posts()):the_post(); 
        	  $postGridCount++; ?>
	              <div class="col-md-4 article_wrap">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                		<?php if ( has_post_thumbnail() ): ?>
                        	<div class="post-thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php   the_post_thumbnail('olomo-blog-grid', array('class' => 'img-responsive center-block')); ?>
                            </a>
                            </div>
                        <?php endif; ?>
                        <div class="entry-desc">
                            <h3> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <div class="entry_meta">
                                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"> <span class="meta_m"><i class="fa fa-user"></i> <?php the_author(); ?></span></a>
                                <a href="<?php the_permalink(); ?>"> <span class="meta_m"><i class="fa fa-calendar"></i> <?php echo get_the_date(); ?></span> </a>
                                <?php	
										if (is_sticky()):
											printf( ' <a href="#" class="featured_post_m"> <span class="meta_m"><i class="fa fa-bookmark"></i> %s</span></a>', esc_html__( 'Featured', 'olomo' ) );
										endif;
                       		    ?> 
                            </div>
                            <div class="entry-content">
                                <p><?php echo olomo_excerpt('14');?></p>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read_btn"><?php esc_html_e('Read More','olomo'); ?> <i class="fa fa-angle-right"></i></a>
                        </div>
                 </div>
            </div>
        <?php 
        if($postGridCount%3 == 0){
            echo '<div class="clearfix"></div>';
        }
        endwhile;
        olomo_pagination();
	
        
		
		else: ?>
	            <div class="container">
                   <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="error-column">
                                <i class="fa fa-frown-o" aria-hidden="true"></i>
                                <h1><?php esc_html_e('Sorry!', 'olomo'); ?></h1>
                                <h4><?php esc_html_e('Results Not Found!', 'olomo'); ?></h4>
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"> <?php esc_html_e('Back To Home', 'olomo'); ?> </a>
                            </div>
                        </div>
                    </div>
             </div>                      
       <?php endif; 
			wp_reset_postdata();
		?>
	</div>
    </div>
</div>