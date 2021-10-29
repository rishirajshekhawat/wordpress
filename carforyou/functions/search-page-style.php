<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
 //Search  Page Style
// 1. Search List Style 
function carforyou_search_style(){
	global $post;
	$listing_style = carforyou_get_option('car_listing_style');
	if($listing_style=='grid_style'):?>
<div class="col-md-4 grid_listing">
  <div class="product-listing-m gray-bg">
    <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">
      <?php if (has_post_thumbnail() ):
			the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
			else:
			echo "<div class='is-empty-img-box'></div>";
			endif;
	 ?>
      </a>
      <?php carforyou_AutoType();  
	  ?>
      <div class="compare_item">
        <div class="checkbox">
          <button id="compare_auto_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>">
          <?php esc_html_e('Compare','carforyou'); ?>
          </button>
        </div>
      </div>
    </div>
    <div class="product-listing-content">
      <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>
      <?php  if(!empty($post->DREAM_auto_price)): ?>
      <p class="list-price">
        <?php carforyou_curcy_prefix(); ?>
        <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
      <?php endif; ?>
      <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>
      <ul class="features_list">
        <?php carforyou_featuredList(); ?>
      </ul>
    </div>
  </div>
</div>
<?php else: ?>
<div class="product-listing-m gray-bg">
  <div class="product-listing-img"> <a href="<?php the_permalink(); ?>">
    <?php if (has_post_thumbnail() ):
		the_post_thumbnail('carforyou_small', array('class' => 'img-responsive'));
		else:
		echo "<div class='is-empty-img-box'></div>";
		endif;
	 ?>
    </a>
    <?php carforyou_AutoType();
				 ?>
    <div class="compare_item">
      <div class="checkbox">
        <button id="compare_model_btn" onclick="<?php echo esc_js('javascript:productCompare('.$post->ID.')'); ?>">
        <?php esc_html_e('Compare','carforyou'); ?>
        </button>
      </div>
    </div>
  </div>
  <div class="product-listing-content">
    <h5><a href="<?php the_permalink(); ?>"><?php echo the_title();?></a></h5>
    <?php  if(!empty($post->DREAM_auto_price)): ?>
    <p class="list-price">
      <?php carforyou_curcy_prefix(); ?>
      <?php echo number_format_i18n(esc_html($post->DREAM_auto_price)); ?></p>
    <?php endif; ?>
    <ul>
      <?php carforyou_featuredList(); ?>
    </ul>
    <a href="<?php the_permalink(); ?>" class="btn"><?php esc_html_e('View Details','carforyou'); ?> <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
    <div class="car-location">

        <?php $location = $post->DREAM_auto_address;
											$pieces = explode(' ', $location);
											$last_word = array_pop($pieces);

			  if(!empty($location)): ?>

    			    <span><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo esc_html($last_word); ?> </span>

        	<?php endif; ?>

      </div>
  </div>
</div>
<?php endif;
}
