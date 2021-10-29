<?php 
/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */
// *******Index Page Category Page Archove Page Seach Page ********//

function carforyou_BlogStyle(){
$blogstyle= carforyou_get_option('blog-style');
	if($blogstyle=='left-sidebar'):?>

<div class="col-lg-9 col-md-8 col-md-push-4 col-lg-push-3">
  <?php while (have_posts()) : the_post();
			      if(get_post_format() == 'video'):?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap">
    <div class="articale_header">
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a></h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><a href="<?php the_permalink(); ?>">
            <?php the_time('d M Y') ?>
            </a></li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <?php 
	
		$vedio_url = get_post_meta( get_the_ID(), 'auto_video_link', true );
	
		if (!empty( $vedio_url)): 
	
		$step1=explode('v=', $vedio_url);
	
		$step2 =explode('&',$step1[1]);
	
		$video_url = $step2[0]; ?>
    <div class="article_img">
      <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>" allowfullscreen></iframe>
    </div>
    <?php endif;?>
    <div class="article_info">
      <p><?php echo wp_trim_words( get_the_excerpt(), 80, '...' ); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
  </article>
  <?php else : ?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap">
    <div class="articale_header">
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a></h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>">
            <?php the_time('d M Y') ?>
            </a></li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', '); ?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a></li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ):
			echo '<div class="article_img">';
				the_post_thumbnail('carforyou_large', array('class' => 'img-responsive center-block'));
			echo '</div>';
		  endif;?>
    </a>
    <div class="article_info">
      <p><?php echo wp_trim_words( get_the_excerpt(), 80, '...' ); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
  </article>
  <?php endif; endwhile; wp_reset_query(); ?>
  <!-- pagination -->
  <?php carforyou_pagination(); ?>
  <!-- /pagination --> 
</div>
<!--Side-bar-->
<aside class="col-lg-3 col-md-4 col-md-pull-8 col-lg-pull-9">
  <?php get_sidebar(); ?>
</aside>
<!--/Side-bar-->
<?php else:?>
<div class="col-lg-9 col-md-8">
  <?php while (have_posts()) : the_post();
			      if(get_post_format() == 'video'):?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap">
    <div class="articale_header">
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a></h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i><a href="<?php the_permalink(); ?>">
            <?php the_time('d M Y') ?>
            </a></li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <?php 
		$vedio_url = get_post_meta( get_the_ID(), 'auto_video_link', true );
		if (!empty( $vedio_url)): 
		$step1=explode('v=', $vedio_url);
		$step2 =explode('&',$step1[1]);
		$video_url = $step2[0]; ?>
    <div class="article_img">
      <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>" allowfullscreen></iframe>
    </div>
    <?php endif;?>
    <div class="article_info">
      <p><?php echo wp_trim_words( get_the_excerpt(), 80, '...' ); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
  </article>
  <?php else : ?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap">
    <div class="articale_header">
      <h2><a href="<?php the_permalink(); ?>">
        <?php the_title();?>
        </a></h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <a href="<?php the_permalink(); ?>">
            <?php the_time('d M Y') ?>
            </a></li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', '); ?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a></li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <a href="<?php the_permalink(); ?>">
    <?php if ( has_post_thumbnail() ):
		echo '<div class="article_img">';
			the_post_thumbnail('carforyou_large', array('class' => 'img-responsive center-block'));
		echo '</div>';
	  endif;?>
    </a>
    <div class="article_info">
      <p><?php echo wp_trim_words( get_the_excerpt(), 80, '...' ); ?></p>
      <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html('Read More','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>
  </article>
  <?php endif; endwhile; wp_reset_query(); ?>
  <!-- pagination -->
  <?php carforyou_pagination(); ?>
  <!-- /pagination --> 
</div>
<!--Side-bar-->
<aside class="col-lg-3 col-md-4">
  <?php get_sidebar(); ?>
</aside>
<!--/Side-bar-->
<?php endif;
}

// ******************* Single Blog Page *****************//

function carforyou_Blog_Single_Page(){

$single_style= carforyou_get_option('blog-style');

if($single_style == 'left-sidebar'):?>
<div class="col-lg-9 col-md-8">
  <?php if( get_post_format() == 'video' ):?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap article_full_info">
    <div class="articale_header">
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
          </li>
          <?php	
                            if (is_sticky()):
                                printf( ' <li><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="sticky-post">%s</span></li>', esc_html__( 'Featured', 'carforyou' ) );
                            endif;
                        ?>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <?php the_time('d M Y') ?>
          </li>
          <li><i class="fa fa-tags" aria-hidden="true"></i> <?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <div class="article_img">
      <?php 

		$vedio_url = get_post_meta( get_the_ID(), 'auto_video_link', true );
		if (!empty( $vedio_url)):
		echo '<div class="article_img">'; 
		$step1=explode('v=', $vedio_url);
		$step2 =explode('&',$step1[1]);
		$video_url = $step2[0]; ?>
          <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>" allowfullscreen></iframe>
      <?php echo '</div>'; ?>
      <?php endif;?>
    </div>
    <div class="article_info">
      <?php the_content(); ?>
      <?php  wp_link_pages( array(

								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'carforyou' ),

								'after'       => '</div>',

								'link_before' => '<span class="page-number">',

								'link_after'  => '</span>',

							) );

					?>
    </div>
    <div class="article_tag gray-bg">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <?php 

                                $tagtext= '<h6>Tags:</h6>';

                                $tags = get_the_tags();

                                if(!empty($tags)):

                                     echo wp_kses_post($tagtext);

                                    $html = '<div class="tag_list"><ul>';

                                    foreach ( $tags as $tag ) {

                                        $tag_link = get_tag_link( $tag->term_id );

                                        $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";

                                        $html .= "{$tag->name}</a></li>";

                                    }

                                    $html .= '</ul></div>';

                                    echo esc_html($html);

                                endif; ?>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="share_article">
            <ul>
              <?php carforyou_share_link(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </article>
  <?php else : ?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap article_full_info">
    <div class="articale_header">
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
          </li>
          <?php	
							if (is_sticky()):
								printf( ' <li><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="sticky-post">%s</span></li>', esc_html__( 'Featured', 'carforyou' ) );
							endif;
                        ?>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <?php the_time('d M Y') ?>
          </li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <?php if ( has_post_thumbnail() ):
					  echo '<div class="article_img">';
						  the_post_thumbnail('carforyou_large');
					  echo '</div>';
                      endif;?>
    <div class="article_info">
      <?php the_content(); ?>
      <?php  wp_link_pages( array(

								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'carforyou' ),

								'after'       => '</div>',

								'link_before' => '<span class="page-number">',

								'link_after'  => '</span>',

							) );

					?>
    </div>
    <?php 
		  	$show_social_post = carforyou_get_option('show_social_post'); 
			if($show_social_post=='1' || $show_social_post==''):?>
    <div class="article_tag gray-bg">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <?php 

                                $tagtext= '<h6>Tags:</h6>';

                                $tags = get_the_tags();

                                if(!empty($tags)):

                                     echo wp_kses_post($tagtext);

                                    $html = '<div class="tag_list"><ul>';

                                    foreach ( $tags as $tag ) {

                                        $tag_link = get_tag_link( $tag->term_id );

                                        $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";

                                        $html .= "{$tag->name}</a></li>";

                                    }

                                    $html .= '</ul></div>';

                                    echo esc_html($html);

                                endif; ?>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="share_article ">
            <ul>
              <?php carforyou_share_link(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </article>
  <?php endif; ?>
  
  <!--Comments-->
  
  <?php comments_template(); ?>
  
  <!--Comments-Form-->
  <?php 
		  	$show_navigation = carforyou_get_option('show_navigation_post'); 
			if($show_navigation=='1' || $show_navigation==''):
				carforyou_post_nav();
            endif;
		   ?>
</div>
<aside class="col-lg-3 col-md-4">
  <?php get_sidebar(); ?>
</aside>
<?php else:?>
<div class="col-lg-9 col-md-8"> 
  
  <!--article-1-->
  
  <?php if( get_post_format() == 'video' ):?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap article_full_info">
    <div class="articale_header">
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
          </li>
          <?php	
			if (is_sticky()):
				printf( ' <li><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="sticky-post">%s</span></li>', esc_html__( 'Featured', 'carforyou' ) );
			endif;
			?>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <?php the_time('d M Y') ?>
          </li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <?php 

	$vedio_url = get_post_meta( get_the_ID(), 'auto_video_link', true );
	if (!empty( $vedio_url)): 
	echo '<div class="article_img">';
	$step1=explode('v=', $vedio_url);
	$step2 =explode('&',$step1[1]);
	$video_url = $step2[0]; ?>
    <iframe class="mfp-iframe" src="https://www.youtube.com/embed/<?php echo esc_html($video_url); ?>" allowfullscreen></iframe>
    <?php echo '</div>'; ?>
    <?php endif;?>
    <div class="article_info">
      <?php the_content(); ?>
      <?php  wp_link_pages( array(

								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'carforyou' ),

								'after'       => '</div>',

								'link_before' => '<span class="page-number">',

								'link_after'  => '</span>',

							) );

					?>
    </div>
    <div class="article_tag gray-bg">
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <?php 

                                $tagtext= '<h6>Tags:</h6>';

                                $tags = get_the_tags();

                                if(!empty($tags)):

                                     echo wp_kses_post($tagtext);

                                    $html = '<div class="tag_list"><ul>';

                                    foreach ( $tags as $tag ) {

                                        $tag_link = get_tag_link( $tag->term_id );

                                        $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";

                                        $html .= "{$tag->name}</a></li>";

                                    }

                                    $html .= '</ul></div>';

                                    echo esc_html($html);

                                endif; ?>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="share_article ">
            <ul>
              <?php carforyou_share_link(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </article>
  <?php else : ?>
  <article id="post-<?php the_ID(); ?>" class="article_wrap article_full_info">
    <div class="articale_header">
      <h2>
        <?php the_title(); ?>
      </h2>
      <div class="article_meta">
        <ul>
          <li><i class="fa fa-user" aria-hidden="true"></i>
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
          </li>
          <?php	
							if (is_sticky()):
								printf( ' <li><i class="fa fa-bookmark" aria-hidden="true"></i> <span class="sticky-post">%s</span></li>', esc_html__( 'Featured', 'carforyou' ) );
							endif;
                        ?>
          <li><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            <?php the_time('d M Y') ?>
          </li>
          <li><i class="fa fa-tags" aria-hidden="true"></i><?php the_category(', ');?></li>
          <li><i class="fa fa-comment" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?>
            <?php esc_html_e(' Comments', 'carforyou'); ?>
            </a> </li>
          <li><i class="fa fa-eye" aria-hidden="true"></i><?php echo esc_html(carforyou_getPostViews(get_the_ID())); ?></li>
        </ul>
      </div>
    </div>
    <?php if ( has_post_thumbnail() ):

					  echo '<div class="article_img">';

                      the_post_thumbnail('carforyou_large');

					  echo '</div>';

                      endif;?>
    <div class="article_info">
      <?php the_content(); ?>
      <?php  wp_link_pages( array(

								'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'carforyou' ),

								'after'       => '</div>',

								'link_before' => '<span class="page-number">',

								'link_after'  => '</span>',

							) );

					?>
    </div>
    <?php 
                $show_social_post = carforyou_get_option('show_social_post'); 
                if($show_social_post=='1' || $show_social_post==''):?>
    <div class="article_tag gray-bg">
      <div class="row">
        <div class="col-md-6 col-sm-6">
        
        <?php $tags = get_the_tags();
							$tagtext= '<h6>Tags:</h6>';
							if(!empty($tags)):
								echo _e($tagtext,'carforyou');
								$html = '<div class="tag_list"><ul>';
								foreach ( $tags as $tag ) {
									$tag_link = get_tag_link( $tag->term_id );
									$html .= "<a href='{$tag_link}' class='btn btn-xs'>";
									$html .= "{$tag->name}</a>";
								}
								$html .= '</ul></div>';
								echo _e($html,'carforyou');
							endif;
						  ?> 
          <?php /*?><?php 
    
                                    $tagtext= '<h6>Tags:</h6>';
    
                                    $tags = get_the_tags();
    
                                    if(!empty($tags)):
    
                                         echo wp_kses_post($tagtext);
    
                                        $html = '<div class="tag_list"><ul>';
    
                                        foreach ( $tags as $tag ) {
    
                                            $tag_link = get_tag_link( $tag->term_id );
    
                                            $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
    
                                            $html .= "{$tag->name}</a></li>";
    
                                        }
    
                                        $html .= '</ul></div>';
    
                                        echo esc_html($html);
    
                                    endif; ?><?php */?>
        </div>
        <div class="col-md-6 col-sm-6">
          <div class="share_article ">
            <ul>
              <?php carforyou_share_link(); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </article>
  <?php endif; ?>
  
  <!--Comments-->
  
  <?php comments_template(); ?>
  
  <!--Comments-Form-->
  
  <?php 
		  	$show_navigation = carforyou_get_option('show_navigation_post'); 
			if($show_navigation=='1' || $show_navigation==''):
				carforyou_post_nav();
            endif;
		   ?>
</div>
<aside class="col-lg-3 col-md-4">
  <?php get_sidebar(); ?>
</aside>
<?php endif; }
