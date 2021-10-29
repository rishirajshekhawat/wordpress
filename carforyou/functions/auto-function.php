<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
 // Populer Brand
 error_reporting(0);
 session_start();
function carforyou_populerbrand(){
$footer_brand = carforyou_get_option('footer_brand'); 
if($footer_brand=='1'): ?>
<section class="brand-section gray-bg">
  <div class="container">
    <?php $brand_text = carforyou_get_option('brand_text');
			if(!empty($brand_text)) : ?>
    <div class="brand-hadding">
      <h5>
        <?php  echo esc_html($brand_text);?>
      </h5>
    </div>
    <?php endif; ?>
    <div class="brand-logo-list">
      <div id="popular_brands">
        <div class="owl-carousel">
          <?php 
		  $brandpages = carforyou_get_option('footer_brand_limit');
		  $loop = new WP_Query( array('post_type' => 'brand', 'post_status' =>' publish', 'order'  => 'ASC', 'posts_per_page' => esc_html($brandpages)))?>
          <?php while ($loop->have_posts()) : $loop->the_post(); ?>
          <div>
            <?php if ( has_post_thumbnail() ) : ?>
            <a href="<?php echo esc_url( get_post_meta(get_the_ID(), 'auto_brand_link', true)); ?>" target="_blank">
            <?php the_post_thumbnail('carforyou_small', array('class' => 'img-responsive')); ?>
            </a>
            <?php endif; ?>
          </div>
          <?php endwhile; wp_reset_query(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif;
}

// Compare Form
function carforyou_Compare_Form(){ ?>
<?php
	$first = "";
	$second = "";
	$third = "" ;
	$src ="";
	$src1 ="";
	$src2 ="";
	$count= "";
	$class1 = "";
	$class2 = "";
	$class3 = "";
	$x1 = "";
	$x2 = "";
	$x3 = "";
	if(isset($_COOKIE['first'])){
		$count= "1";
		$first = $_COOKIE['first'];
		$src = wp_get_attachment_url( get_post_thumbnail_id($first) );
	$class1 = "closes";
	$x1 = "X";
	}
	if(isset($_COOKIE['second'])){
		$class2 = "closes";
		$count= "2";
		$x2 = "X";
		$second = $_COOKIE['second'];
		$src1 = wp_get_attachment_url( get_post_thumbnail_id($second) );
	}
	if(isset($_COOKIE['third'])){
		$count= "3";
		$class3 = "closes";
		$x3 = "X";
		$third = $_COOKIE['third'];
		$src2 = wp_get_attachment_url( get_post_thumbnail_id($third) );
	}
	?>
<div id="add_model_compare">
  <form id="productCompareForm" method="post" action="<?php echo esc_url(get_permalink(carforyou_get_option('compared_pagelink'))); ?>" enctype="multipart/form-data">
    <h2>
      <?php esc_html_e('Compared Auto','carforyou'); ?>
<span>(<span id="countProduct"><?php if(!empty($count)){ echo esc_attr($count); }else{echo "0"; } ?></span>)</span><span class="compare-close"><a onclick="javascript:closePopUp();"> × </a></span></h2>
    <ul class="removdata">
	
	<?php //echo get_template_directory_uri()."/assets/images/auto-img.png" ;?>
       <li class="vs_model"><span class="<?php echo esc_attr($class1); ?> allID" id="im1" dat-id="<?php echo esc_html($first); ?>" cook-id="first" ><?php echo esc_html($x1); ?></span><a href="javascript();"><img id="pro_img_1" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="pro_img_1" class="img-responsive im1"></a></li>
      <li class="vs_model"><span class="<?php echo esc_attr($class2); ?> allID" id="im2" dat-id="<?php echo esc_html($second); ?>" cook-id="second" ><?php echo esc_html($x2); ?></span><a href="javascript();"><img id="pro_img_2" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="pro_img_2" class="img-responsive im2"></a></li>
      <li class="vs_model "><span class="<?php echo esc_attr($class3); ?> allID" id="im3" dat-id="<?php echo esc_html($third); ?>" cook-id="third" ><?php echo esc_html($x3); ?></span><a href="javascript();"><img id="pro_img_3" src="<?php echo esc_url( get_template_directory_uri() )?>/assets/images/auto-img.png" alt="pro_img_3" class="img-responsive im3"></a></li>
	  
     </ul> 
    <a onclick="javascript:formSubmit();" class="compare_now_btn">
    <?php esc_html_e('Compare','carforyou'); ?>
    </a>
	<a onclick="javascript:;" class="compare_now_btn resatecompare">
    <?php esc_html_e('Clear All','carforyou'); ?>
    </a>
    <div class="hidden">
	
	
      <input id="p1" name="p1" value="<?php echo esc_html($first); ?>"/>
      <input id="p2" name="p2" value="<?php echo esc_html($second); ?>"/>
      <input id="p3" name="p3" value="<?php echo esc_html($third); ?>"/>
	
    </div>
  </form>
</div>
<?php }
function carforyou_footer_bottom(){
	//Auto Compare Form
	if (function_exists('carforyou_Compare_Form')):
		carforyou_Compare_Form();
	endif;
	//Auto Brand Ajax Filter
	if (function_exists('carforyou_Brand_Filter')):
		carforyou_Brand_Filter();
	endif;
	//Auto Compare Popup Ajax
	if (function_exists('carforyou_Compare_PopupAjax')):
		carforyou_Compare_PopupAjax();
	endif;
}
function carforyou_FilterbyOrder(){ 
$vehicle_order='';
if(isset($_REQUEST['vehicle_order'])):	
	$vehicle_order = $_REQUEST['vehicle_order'];
endif;
?>
<div class="result-sorting-by">
  <p>
    <?php esc_html_e('Sort by:','carforyou'); ?>
  </p>
  <form action="" method="get" id="ShortOrder">
  <input type="hidden" name="lock" value="<?php echo esc_html($_SESSION["location1"]); ?>" >  
  <input type="hidden" name="autobrand_1" value="<?php echo esc_html($_SESSION["autobrand1"]); ?>" > 
  <input type="hidden" name="automodel_1" value="<?php echo esc_html($_SESSION["automodel1"]); ?>" > 
  <input type="hidden" name="modelyear_1" value="<?php echo esc_html($_SESSION["modelyear1"]); ?>" > 
  <input type="hidden" name="min_price_1" value="<?php echo esc_html($_SESSION["min_price1"]); ?>" > 
  <input type="hidden" name="max_price_1" value="<?php echo esc_html($_SESSION["max_price1"]); ?>" >     
  <input type="hidden" name="autotype_1" value="<?php echo esc_html($_SESSION["autotype1"]); ?>" >
  <input type="hidden" name="fueltype_1" value="<?php echo esc_html($_SESSION["fueltype1"]); ?>" >
  <input type="hidden" name="automilage_1" value="<?php echo esc_html($_SESSION["automilage1"]); ?>" >
  <input type="hidden" name="autoseat_1" value="<?php echo esc_html($_SESSION["autoseat1"]); ?>" >
  <input type="hidden" name="autotransmission_1" value="<?php echo esc_html($_SESSION["autotransmission1"]); ?>" >
  <input type="hidden" name="autoowner_1" value="<?php echo esc_html($_SESSION["autoowner1"]); ?>" >
  <input type="hidden" name="autoengine_1" value="<?php echo esc_html($_SESSION["autoengine1"]); ?>" >
  <input type="hidden" name="autotank_1" value="<?php echo esc_html($_SESSION["autotank1"]); ?>" >
    <div class="form-group select sorting-select">
      <select id="auto_price_list" class="form-control" name="vehicle_order">
        <!--<option value="">
        <?php esc_html_e('Sort Listing','carforyou'); ?>
        </option>-->
        <option value="Asc">
        <?php esc_html_e('A-Z','carforyou'); ?>
        </option>
        <option value="price_low" <?php if($vehicle_order=="price_low"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Price (Low to High)','carforyou'); ?>
        </option>
        <option value="price_high" <?php if($vehicle_order=="price_high"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Price (High to Low)','carforyou'); ?>
        </option>
        <option value="newItem" <?php if($vehicle_order=="newItem"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Newest Items','carforyou'); ?>
        </option>
        <option value="oldItem" <?php if($vehicle_order=="oldItem"):?> selected="selected" <?php endif; ?>>
        <?php esc_html_e('Oldest Items','carforyou'); ?>
        </option>
      </select>
    </div>
  </form>
</div>
<?php }                 
