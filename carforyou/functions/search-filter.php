<?php
/**
 * functions hooks
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */
// Filter Form  Style 1
function carforyouFilterForm(){
session_start();	
	$autotype1 = $_SESSION["autotype1"];
	$fueltype1 = $_SESSION["fueltype1"];
	$modelyear1 = $_SESSION["modelyear1"];
	$automodel1 = $_SESSION["automodel1"];
	$autobrand1 = $_SESSION["autobrand1"];
	$location1 = $_SESSION["location1"];
	$automilage1 = $_SESSION["automilage1"];
	$autoseat1 = $_SESSION["autoseat1"];
	$autotransmission1 = $_SESSION["autotransmission1"];
	$autoowner1 = $_SESSION["autoowner1"];
	$autoengine1 = $_SESSION["autoengine1"];
	$autotank1 = $_SESSION["autotank1"];
$location ='';$brand ='';$modelyear ='';?>
<form id="search_form" action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php wp_nonce_field( 'style1_value', 'style1_nonce',false); ?>
  
<?php
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group col-md-2 input_col_wp black_input">
    <div class="select">
      <select name="autobrand" class="form-control autobrand" >
        <option value="">
        <?php esc_html_e('Select Brand','carforyou'); ?>
        </option>
        <?php if($brand){ ?>
        <option value="<?php echo esc_attr($brand); ?>"><?php echo esc_html($brand); ?></option>
        <?php }
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term) {
			echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
		}?>
      </select>
    </div>
  </div>
  <div class="form-group col-md-2 input_col_wp black_input">
    <div class="select">
      <select name="automodel" class="form-control automodel" >
        <option value="">
        <?php esc_html_e('Select Brand First','carforyou'); ?>
        </option>
      </select>
    </div>
  </div>
<?php endif; 
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''): ?>
  <div class="form-group col-md-2 input_col_wp black_input">
    <div class="select">
      <select class="form-control modelyear" name="modelyear">
        <option value="">
        <?php esc_html_e('Year of Model','carforyou'); ?>
        </option>
        <?php if($modelyear){ ?>
        <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear); ?></option>
        <?php }
			$taxonomy = 'year-model';
			$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term) {
				echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
			}
			?>
      </select>
    </div>
  </div>
  <!---Fuel Type start---->  
 <?php endif;
$fuel_enalble = carforyou_get_option('fuel_enalble');
if($fuel_enalble=='1'|| $fuel_enalble==''):?> 
  <div class="form-group col-md-2 input_col_wp black_input">
    <div class="select">
	<select class="form-control" name="fueltype">
	  <option value=""> <?php esc_html_e('Vehicle Fuel Type','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_fuel_type' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>"><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
       
    </div>
  </div>
<!---Fuel Type End----> 
<?php endif;
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):?>
  <div class="form-group col-md-2 input_col2_wp black_input">
    <div class="select">
	 <select class="form-control" name="autotype">
	 <option value="">
                <?php esc_html_e('Type of Car','carforyou'); ?>
                </option>
	<?php $typeterm = get_terms('type-car');
					foreach ($typeterm as $typeterms){
						echo '<option value="'.esc_attr($typeterms->slug).'">'.esc_html($typeterms->name).'</option>';
					} ?>
     
       
      </select>
    </div>
  </div>
<?php endif; 

$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>  

  <div class="form-group col-md-4 form_price_col black_input">
    <label class="form-label">
      <?php esc_html_e('Price Range','carforyou');?> (<?php carforyou_curcy_prefix(); ?>)
    </label>
    <input name="priceRange" type="text" class="span2 price_range" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif; ?>  
  <div class="form-group col-md-2 input_col2_wp">
    <button type="submit" class="btn btn-block" name="searchauto"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
  <?php $advanced_enalble = carforyou_get_option('advanced_enalble');
if($advanced_enalble=='1'|| $advanced_enalble==''):?> 
  <div class="form-group col-md-2 input_col2_wp">
    <button type="button" class="btn btn-block" data-toggle="modal" data-target="#adnaced_search"><i class="fa fa-search-plus" aria-hidden="true"></i>
    <?php esc_html_e('Advanced Search','carforyou'); ?>
    </button>
  </div>
 <?php endif; $clear_enalble = carforyou_get_option('clear_enalble');
if($clear_enalble=='1'|| $clear_enalble==''):?> 
  <div class="form-group col-md-2 input_col2_wp">
    <button type="button" class="btn btn-block" id="from_reset"><i class="fa fa-refresh" aria-hidden="true"></i>
    <?php esc_html_e('Clear All','carforyou'); ?>
    </button>
  </div>
 <?php endif; ?> 
</form>
<script>
var jquery=jQuery.noConflict();

jquery( document ).ready(function() {
	jquery(".autobrand").change(function(){
		 var name=jquery(".autobrand").val();
		// alert(name);
		 var datastring = 'name='+ name;
		 jquery.ajax({ 
				type: "POST",
				url: "<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/carforyou/functions/get_year.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					jquery(".modelyear").html(html);
				}
			});
		 });
});

</script>
<?php 
} 
// Filter Form  Style 2
function carforyou_FilterForm2(){
session_start();	
	$autotype1 = $_SESSION["autotype1"];
	$fueltype1 = $_SESSION["fueltype1"];
	$modelyear1 = $_SESSION["modelyear1"];
	$automodel1 = $_SESSION["automodel1"];
	$autobrand1 = $_SESSION["autobrand1"];
	$location1 = $_SESSION["location1"];
$location ='';$brand ='';$modelyear =''; ?>
<div class="container">
  <div id="filter_form2">
    <div class="main_bg white-text">
      <?php $serch_filter = carforyou_get_option('serch_filter');
                if(!empty($serch_filter)) : ?>
      <h3><?php echo wp_kses_post($serch_filter); ?></h3>
      <?php endif; ?>
      <div class="row">
        <form id="from_reset" action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
        <?php wp_nonce_field( 'style1_value', 'style1_nonce',false); ?>
		<?php 
		$brand_enalble = carforyou_get_option('brand_enalble');
		if($brand_enalble=='1'|| $brand_enalble==''): ?>
          <div class="form-group col-md-2 input_col_wp">
            <div class="select">
              <select name="autobrand" class="form-control autobrand">
                <option value="">
                <?php esc_html_e('Select Brand','carforyou'); ?>
                </option>
                <?php if($brand){ ?>
                <option value="<?php echo esc_html($brand); ?>"><?php echo esc_html($brand); ?></option>
                <?php }
				$taxonomy = 'auto-brand';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) {
					echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
				}?>
              </select>
            </div> 
          </div>
          <div class="form-group col-md-2 input_col_wp">
            <div class="select">
              <select name="automodel " class="form-control automodel" >
                <option value="">
                <?php esc_html_e('Select Brand First','carforyou'); ?>
                </option>
              </select>
            </div>
          </div>
		<?php endif;
		$year_enalble = carforyou_get_option('year_enalble');
		if($year_enalble=='1'|| $year_enalble==''): ?>
          <div class="form-group col-md-2 input_col_wp">
            <div class="select">
              <select class="form-control modelyear" name="modelyear">
                <option value="">
                <?php esc_html_e('Year of Model','carforyou'); ?>
                </option>
                <?php if($modelyear){ ?>
                <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear); ?></option>
                <?php }
				$taxonomy = 'year-model';
				$tax_terms = get_terms($taxonomy);
				foreach ($tax_terms as $tax_term) {
					echo '<option value="'.esc_attr($tax_term->slug).'">'.esc_html($tax_term->name).'</option>';
				}
				?>
              </select>
            </div>
          </div>
		  <!--Type of fuel start-->
		<?php endif;
		$fuel_enalble = carforyou_get_option('fuel_enalble');
		if($fuel_enalble=='1'|| $fuel_enalble==''):?>
		 <div class="form-group col-md-2 input_col_wp">
			<div class="select">
			   <select class="form-control" name="fueltype">
	  <option value=""> <?php esc_html_e('Vehicle Fuel Type','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_fuel_type' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>"><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
			</div>
		  </div>
		 <!--type of fuel End-->
        <?php endif;
		$type_enalble = carforyou_get_option('type_enalble');
		if($type_enalble=='1'|| $type_enalble==''):?>
          <div class="form-group col-md-2 input_col_wp">
            <div class="select">
              <select class="form-control" name="autotype">
                <option value="">
                <?php esc_html_e('Type of Car','carforyou'); ?>
                </option>
                <?php $typeterm = get_terms('type-car');
					foreach ($typeterm as $typeterms){
						echo '<option value="'.esc_attr($typeterms->slug).'">'.esc_html($typeterms->name).'</option>';
					} ?>
              </select>
            </div>
          </div>
        <?php endif;
        $price_enalble = carforyou_get_option('price_enalble');
		if($price_enalble=='1'|| $price_enalble==''):?> 
          <div class="form-group col-md-4 form_price_col">
            <label class="form-label">
              <?php esc_html_e('Price Range ','carforyou');?>(<?php carforyou_curcy_prefix(); ?>)
            </label>
            <input name="priceRange" type="text" class="span2 price_range" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
          </div>
       <?php endif; ?>  
          <div class="form-group col-md-2 input_col_wp">
            <button type="submit" class="btn btn-block" name="searchauto"><i class="fa fa-search" aria-hidden="true"></i>
            <?php esc_html_e('Search Car','carforyou'); ?>
            </button>
          </div>
		  <?php $advanced_enalble = carforyou_get_option('advanced_enalble');
			if($advanced_enalble=='1'|| $advanced_enalble==''):?> 
			  <div class="form-group col-md-2 input_col_wp">
				<button type="button" class="btn btn-block" data-toggle="modal" data-target="#adnaced_search"><i class="fa fa-search-plus" aria-hidden="true"></i>
				<?php esc_html_e('Advanced Search','carforyou'); ?>
				</button>
			  </div>
			 <?php endif; $clear_enalble = carforyou_get_option('clear_enalble');
			if($clear_enalble=='1'|| $clear_enalble==''):?> 
			  <div class="form-group col-md-2 input_col_wp">
				<button type="button" class="btn btn-block" id="from_reset"><i class="fa fa-refresh" aria-hidden="true"></i>
				<?php esc_html_e('Clear All','carforyou'); ?>
				</button>
			  </div>
			 <?php endif; ?> 
        </form>
		<script>
var jquery=jQuery.noConflict();
jquery( document ).ready(function() {
	jquery(".autobrand").change(function(){
		 var name=jquery(".autobrand").val();
		// alert(name);
		 var datastring = 'name='+ name;
		 jquery.ajax({ 
				type: "POST",
				url: "<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/carforyou/functions/get_year.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					jquery(".modelyear").html(html);
				}
			});
		 });
});

</script>
      </div>
    </div>
  </div>
</div>
<?php
} 
// Sidebar Filter Form
function carforyou_sidebar_filter(){
session_start();	
	$autotype1 = $_SESSION["autotype1"];
	$fueltype1 = $_SESSION["fueltype1"];
	$modelyear1 = $_SESSION["modelyear1"];
	$automodel1 = $_SESSION["automodel1"];
	$autobrand1 = $_SESSION["autobrand1"];
	$location1 = $_SESSION["location1"];
	$automilage1 = $_SESSION["automilage1"];
	$autoseat1 = $_SESSION["autoseat1"];
	$autotransmission1 = $_SESSION["autotransmission1"];
	$autoowner1 = $_SESSION["autoowner1"];
	$autoengine1 = $_SESSION["autoengine1"];
	$autotank1 = $_SESSION["autotank1"];
$location ='';$automodel ='';$modelyear =''; $fueltype =''; $brand ='';$autotype =''; $automilage =''; $autoseat =''; $autotransmission =''; $autoowner =''; $autoengine =''; $autotank ='';

if(isset($_REQUEST['searchauto'])):	
	$location_enalble = carforyou_get_option('location_enalble');
	if($location_enalble=='1'|| $location_enalble==''): 
		$location = $_REQUEST['location'];
	endif;
	$brand_enalble = carforyou_get_option('brand_enalble');
	if($brand_enalble=='1'|| $brand_enalble==''):
		$brand = $_REQUEST['autobrand'];
		$automodel = $_REQUEST['automodel'];
	endif;
	$year_enalble = carforyou_get_option('year_enalble');
	if($year_enalble=='1'|| $year_enalble==''):
		$modelyear = $_REQUEST['modelyear'];
	endif;	
	$type_enalble = carforyou_get_option('type_enalble');
	if($type_enalble=='1'|| $type_enalble==''):
		$autotype = $_REQUEST['autotype'];	
	endif;
   $fuel_enalble = carforyou_get_option('fuel_enalble');
	if($fuel_enalble=='1'|| $fuel_enalble==''):
		$fueltype = $_REQUEST['fueltype'];	
	endif;		
endif;
?>
<form id="side_form" action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php wp_nonce_field( 'style1_value', 'style1_nonce',false); ?>
<?php
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group select">
    <select name="autobrand" class="form-control autobrand">
      <option value="">
      <?php esc_html_e('Select Brand','carforyou'); ?>
      </option>
      <?php
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term):
		$selected = "";
						if($autobrand1 == $tax_term->slug){
							
							$selected = 'selected="selected"';
						}?>
      <option value="<?php echo esc_attr($tax_term->slug); ?>" <?php echo esc_html($selected); ?> ><?php echo esc_html($tax_term->name); ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group select">
    <select name="automodel" class="form-control automodel" >
	<?php 
		$args = array( 'post_type' => 'auto', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'auto-brand', 'field' => 'slug', 'terms' => $autobrand1) ));                    

			$wp_query1  = new WP_Query( $args );

			while ( $wp_query1 ->have_posts() ) : $wp_query1 ->the_post();   

			   $auto_model = get_post_meta( get_the_ID(), 'DREAM_auto_model', true );

			   if(!empty($auto_model)):
				$selected = ""; 
					if($automodel1 == $auto_model){
						$selected = 'selected="selected"';
						
					}
				   $modal_selects[]='<option value="'.$auto_model.'" '.$selected.'>'.$auto_model.'</option>';

			   endif;

			endwhile; 	 

			$modal_selects = array_unique($modal_selects);

			sort($modal_selects);

			foreach($modal_selects as $modal_select):

				echo esc_html($modal_select);

			endforeach;
	 ?>
	<?php if(!empty($automodel)){ ?>
		<option value="" <?php if($automodel):?> selected="selected" <?php endif; ?>>
      <?php echo $automodel; ?>
      </option>
	<?php } else { ?>
	<option value=""><?php esc_html_e('Select Brand First','carforyou'); ?> </option>
	<?php } ?>
    </select>
  </div>
<?php endif;
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''):?>
  <div class="form-group select">
    <select class="form-control modelyear" name="modelyear">
      <option value="">
      <?php esc_html_e('Year of Model','carforyou'); ?>
      </option>
      <?php if($modelyear){ ?>
      <option value="<?php echo esc_html($modelyear); ?>" <?php if($modelyear):?> selected="selected" <?php endif; ?>><?php echo esc_html($modelyear); ?></option>
      <?php }
		$taxonomy = 'year-model';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term) {
			$selected1 = "";
						if($modelyear1 == $tax_term->slug){
							
							$selected1 = 'selected="selected"';
						}
			echo '<option value="'.esc_attr($tax_term->slug).'" '.$selected1.'>'.esc_html($tax_term->name).'</option>';
		}
		?>
    </select>
  </div>
<!--Type Of Fuel start-->
<?php endif;
$fuel_enalble = carforyou_get_option('fuel_enalble');
if($fuel_enalble=='1'|| $fuel_enalble==''):?>
<div class="form-group select">
    <div class="select">
	<select class="form-control" name="fueltype">
	  <option value=""><?php esc_html_e('Vehicle Fuel Type','carforyou'); ?></option>
	  <?php if($fueltype){ ?>
      <option value="<?php echo esc_html($fueltype,'carforyou'); ?>" <?php if($fueltype):?> selected="selected" <?php endif; ?>><?php echo esc_html($fueltype,'carforyou'); ?></option>
      <?php }
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_fuel_type' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			$selected1 = "";
						if($fueltype1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
</div>
<!--Type Of Fuel End-->
<?php endif;
$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>
  <div class="form-group">
    <label class="form-label">
      <?php esc_html_e('Price Range','carforyou');?>
      (
      <?php carforyou_curcy_prefix(); ?>
      ) </label>
    <input name="priceRange" type="text" class="span2 price_range" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif;
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):?>
  <div class="form-group select">
  <select class="form-control" name="autotype">
      <option value=""><?php esc_html_e('Type of Car','carforyou'); ?></option>
      <?php $typeterm = get_terms('type-car');
	 
					foreach ($typeterm as $typeterms){
						
						$selected = "";
						if($autotype1 == $typeterms->slug){
							
							$selected = 'selected="selected"';
						}
						echo '<option value="'.esc_attr($typeterms->slug).'" '.$selected.' >'.esc_html($typeterms->name).'</option>';
					} ?>
    </select>
  </div>
<?php endif; 
$location_enalble = carforyou_get_option('location_enalble');
if($location_enalble=='1'|| $location_enalble==''):?>
  <div class="form-group select">
	<select class="form-control" name="location">
	  <option value=""><?php esc_html_e('Location','carforyou'); ?> </option>
	  <?php if($location){ ?>
      <option value="<?php echo esc_html($location,'carforyou'); ?>" <?php if($location):?> selected="selected" <?php endif; ?>><?php echo esc_html($location,'carforyou'); ?></option>
      <?php }
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_address' order by meta_value ASC") as $key => $row) { 
	 
			
			$string = $row->meta_value;
			$pieces = explode(' ', $string);
			$last_word = array_pop($pieces);
			
			$my_column = $last_word;
			if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			$selected1 = "";
						if($location1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}

		
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
  </div>
<?php endif; 
$milage_enalble_ad = carforyou_get_option('milage_enalble_ad');
if($milage_enalble_ad=='1'|| $milage_enalble_ad==''):?>
  <div class="form-group select">
   <div class="select">
	 <select class="form-control" name="automilage">
	  <?php 
	   global $wpdb;
			
			$query1 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_mileage_city'");
			$max_milage = $query1;
				
		?>
	  <option value=""><?php esc_html_e('Milage','carforyou'); ?></option>
	  
	  <?php if($max_milage>0 || $max_milage<=5){ 
	  if($automilage1=='0-5kmpl'){?> 
	  <option value="0-5kmpl" selected><?php esc_html_e('0-5kmpl','carforyou'); ?></option>
	  <?php } else{ ?>
	  <option value="0-5kmpl"><?php esc_html_e('0-5kmpl','carforyou'); ?></option> 	
	  <?php } } if($max_milage>6 || $max_milage<=10){
	  if($automilage1=='6-10kmpl'){	
	  ?>
	  <option value="6-10kmpl" selected><?php esc_html_e('6-10kmpl','carforyou'); ?></option>
	  <?php } else { ?>
		<option value="6-10kmpl"><?php esc_html_e('6-10kmpl','carforyou'); ?></option>
	  <?php } } if($max_milage>10 || $max_milage<=10){ 
	  if($automilage1=='11-15kmpl'){
	  ?>
	  <option value="11-15kmpl" selected><?php esc_html_e('11-15kmpl','carforyou'); ?></option>	
	  <?php } else { ?>
	  <option value="11-15kmpl"><?php esc_html_e('11-15kmpl','carforyou'); ?></option>
	  <?php } } if($max_milage>15){ 
	  if($automilage1=='+16kmpl'){
	  ?>	  
      <option value="+16kmpl" selected> <?php esc_html_e('< 16kmpl','carforyou'); ?> </option>	
   	  <?php } else {  ?>
	  <option value="+16kmpl"> <?php esc_html_e('< 16kmpl','carforyou'); ?> </option>
	  <?php } }  ?>
     </select>
	</div> 
  </div>
<?php endif; 

$ceat_capacity_enalble_ad = carforyou_get_option('ceat_capacity_enalble_ad');
if($ceat_capacity_enalble_ad=='1'|| $ceat_capacity_enalble_ad==''):?>
  <div class="form-group select">
    <div class="select">
	  <select class="form-control" name="autoseat">
	  <option value=""><?php esc_html_e('Seat Capacity','carforyou'); ?></option>
	  <?php if($autoseat){ ?>
      <option value="<?php echo esc_html($autoseat,'carforyou'); ?>" <?php if($autoseat):?> selected="selected" <?php endif; ?>><?php echo esc_html($autoseat,'carforyou'); ?></option>
      <?php }
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_seat_capacity' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			$selected1 = "";
						if($autoseat1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
  </div>
<?php endif; 

$transmission_enalble_ad = carforyou_get_option('transmission_enalble_ad');
if($transmission_enalble_ad=='1'|| $transmission_enalble_ad==''):?>
  <div class="form-group select">
    <div class="select">
	<select class="form-control" name="autotransmission">
	  <option value=""> <?php esc_html_e('Transmission Type','carforyou'); ?></option>
	  <?php if($autotransmission){ ?>
      <option value="<?php echo esc_html($autotransmission,'carforyou'); ?>" <?php if($autotransmission):?> selected="selected" <?php endif; ?>><?php echo esc_html($autotransmission,'carforyou'); ?></option>
      <?php }
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_transmission' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			$selected1 = "";
						if($autotransmission1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
	
    </div>
  </div>
<?php endif; 

$owner_enalble_ad = carforyou_get_option('owner_enalble_ad');
if($owner_enalble_ad=='1'|| $owner_enalble_ad==''):?>
  <div class="form-group select">
	<div class="select">
	 <select class="form-control" name="autoowner">
	  <option value=""><?php esc_html_e('No. Of Owners','carforyou'); ?></option>
	  <?php if($autoowner){ ?>
      <option value="<?php echo esc_html($autoowner,'carforyou'); ?>" <?php if($autoowner):?> selected="selected" <?php endif; ?>><?php echo esc_html($autoowner,'carforyou'); ?></option>
      <?php }
	  global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
  
	
	
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_no_of_Owners' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			
			if($autoowner1 == $my_column){
							
							$selected1 = 'selected="selected"';
						}
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" <?php echo esc_html($selected1,'carforyou'); ?>><?php echo esc_html($my_column); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
  </div>
<?php endif; 

$engine_enalble_ad = carforyou_get_option('engine_enalble_ad');
if($engine_enalble_ad=='1'|| $engine_enalble_ad==''):?>
  <div class="form-group select">
	<select class="form-control" name="autoengine">
	  <?php global $wpdb;
			$max_engine= '';
			$query1 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_engine'");
			$max_engine = $query1;
			
		?>
		<option value=""><?php esc_html_e('Engine Capacity','carforyou'); ?></option>
		<?php if($max_engine>0 || $max_engine<=100){ 
		if($autoengine1 == '0-100KW'){ ?>
	    <option value="0-100KW" selected> <?php esc_html_e('0-100KW','carforyou'); ?> </option>
		<?php } else { ?>
		<option value="0-100KW" > <?php esc_html_e('0-100KW','carforyou'); ?> </option>	
		<?php } } if($max_engine>=101 || $max_engine<=200){
		if($autoengine1 == '101-200KW'){	?>
	    <option value="101-200KW" selected> <?php esc_html_e('101-200KW','carforyou'); ?> </option>
		<?php } else { ?>
		<option value="101-200KW"> <?php esc_html_e('101-200KW','carforyou'); ?> </option>	
		<?php } } if($max_engine>=201){
		if($autoengine1 == '+201KW'){ ?>
	    <option value="+201KW" selected> <?php esc_html_e('< 201KW','carforyou'); ?> </option>
		<?php } else { ?>
		<option value="+201KW"> <?php esc_html_e('< 201KW','carforyou'); ?> </option>	
		<?php } } ?>
     </select>
  </div>
<?php endif; 

$fuel_tank_enalble_ad = carforyou_get_option('fuel_tank_enalble_ad');
if($fuel_tank_enalble_ad=='1'|| $fuel_tank_enalble_ad==''):?>
  <div class="form-group select">
	<select class="form-control" name="autotank">
	  <?php global $wpdb;
			
			$query2 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_fuel_tank_capacity'");
			$max_fuel = $query2;
				
		
		?>
	  <option value=""> <?php esc_html_e('Fuel Capacity','carforyou'); ?></option>
	  <?php if($max_fuel>0 || $max_fuel<=50){
	  if($autotank1 == '0-50(Liters)') {
	  ?>
	  <option value="0-50(Liters)" selected> <?php esc_html_e('0-50(Liters)','carforyou'); ?> </option>
	  <?php } else { ?>
	  <option value="0-50(Liters)"> <?php esc_html_e('0-50(Liters)','carforyou'); ?> </option>
	  <?php } } if($max_fuel>=51 || $max_fuel<=100){
	  if($autotank1 == '51-100(Liters)') {
	  ?>
	  <option value="51-100(Liters)" selected> <?php esc_html_e('51-100(Liters)','carforyou'); ?> </option>
	  <?php } else { ?> 
	  <option value="51-100(Liters)"> <?php esc_html_e('51-100(Liters)','carforyou'); ?> </option>
	  <?php } } if($max_fuel>=101 || $max_fuel<=150){
	  if($autotank1 == '101-150(Liters)') {
	  ?>
	  <option value="101-150(Liters)" selected> <?php esc_html_e('101-150(Liters)','carforyou'); ?> </option>
	  <?php } else { ?>
	  <option value="101-150(Liters)"> <?php esc_html_e('101-150(Liters)','carforyou'); ?> </option>
	  <?php } } if($max_fuel>=151){
	  if($autotank1 == '+151(Liters)') { 	  
	  ?>
	  <option value="+151(Liters)" selected> <?php esc_html_e('< 151(Liters)','carforyou'); ?> </option>
	  <?php } else { ?>
	  <option value="+151(Liters)"> <?php esc_html_e('< 151(Liters)','carforyou'); ?> </option>
	  <?php } } ?>
     </select>
  </div>
<?php endif; ?>
  <div class="form-group">
    <button type="submit" name="searchauto" class="btn btn-block"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
  <?php $clear_enalble = carforyou_get_option('clear_enalble');
		if($clear_enalble=='1'|| $clear_enalble==''):?> 
  <div class="form-group">
    <button type="button" class="btn btn-block" id="side_reset"><i class="fa fa-refresh" aria-hidden="true"></i>
    <?php esc_html_e('Clear All','carforyou'); ?>
    </button>
  </div>
  <?php endif; ?>
</form>
<script>
var jquery=jQuery.noConflict();
jquery( document ).ready(function() {
	jquery(".autobrand").change(function(){
		 var name=jquery(".autobrand").val();
		// alert(name);
		 var datastring = 'name='+ name;
		 jquery.ajax({ 
				type: "POST",
				url: "<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/carforyou/functions/get_year.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					jquery(".modelyear").html(html);
				}
			});
		 });
});

</script>
<?php 
}

function carforyou_advanced_filter(){

	$autotype1 = $_SESSION["autotype1"];
	$fueltype1 = $_SESSION["fueltype1"];
	$modelyear1 = $_SESSION["modelyear1"];
	$automodel1 = $_SESSION["automodel1"];
	$autobrand1 = $_SESSION["autobrand1"];
	$location1 = $_SESSION["location1"];
	$automilage1 = $_SESSION["automilage1"];
	$autoseat1 = $_SESSION["autoseat1"];
	$autotransmission1 = $_SESSION["autotransmission1"];
	$autoowner1 = $_SESSION["autoowner1"];
	$autoengine1 = $_SESSION["autoengine1"];
	$autotank1 = $_SESSION["autotank1"];
$location ='';$brand ='';$modelyear ='';?>
<form id="advanced_form" action="<?php echo esc_url(get_permalink(carforyou_get_option('serch_filter_pagelink'))); ?>" method="get">
<?php wp_nonce_field( 'style1_value', 'style1_nonce',false); ?>
  
<?php
$type_enalble = carforyou_get_option('type_enalble');
if($type_enalble=='1'|| $type_enalble==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
    <div class="select">
	 <select class="form-control" name="autotype">
	 <option value="">
     <?php esc_html_e('Type of Car','carforyou'); ?>
     </option>
	<?php $typeterm = get_terms('type-car');
					foreach ($typeterm as $typeterms){
						echo '<option value="'.esc_attr($typeterms->slug).'">'.esc_html($typeterms->name).'</option>';
					} ?>
     
       
      </select>
    </div>
  </div>
<?php endif; 

$location_enalble = carforyou_get_option('location_enalble');
        if($location_enalble=='1'|| $location_enalble==''): ?>
          <div class="form-group col-md-4 input_col_wp black_input">
            <div class="select">
             <select class="form-control" name="location">
	  <option value=""><?php esc_html_e('Location','carforyou'); ?></option>
	  <?php 
	   global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	
	
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_address' order by meta_value ASC") as $key => $row) { 
	 
	
			$string = $row->meta_value;
			
			$pieces = explode(' ', $string);
			$last_word[] = array_pop($pieces);
			
			sort($last_word);
			
			$clength = count($last_word);
				for($x = 0; $x < $clength; $x++) {
				 

			
			$my_column = $last_word[$x];
			
			if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
			

		
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>" ><?php echo esc_html($my_column,'carforyou'); ?></option>
	
				<?php endif; } }

	  
	  ?>
     </select>
            </div>
          </div>
<?php endif;
$brand_enalble = carforyou_get_option('brand_enalble');
if($brand_enalble=='1'|| $brand_enalble==''): ?>
  <div class="form-group col-md-4 input_col_wp black_input">
    <div class="select">
      <select name="autobrand" class="form-control autobrand1 autobrand" >
        <option value="">
        <?php esc_html_e('Select Brand','carforyou'); ?>
        </option>
        <?php if($brand){ ?>
        <option value="<?php echo esc_attr($brand); ?>"><?php echo esc_html($brand,'carforyou'); ?></option>
        <?php }
		$taxonomy = 'auto-brand';
		$tax_terms = get_terms($taxonomy);
		foreach ($tax_terms as $tax_term) {
			echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
		}?>
      </select>
    </div>
  </div>
  <div class="form-group col-md-4 input_col_wp black_input">
    <div class="select">
      <select name="automodel" class="form-control automodel" >
        <option value="">
        <?php esc_html_e('Select Brand First','carforyou'); ?>
        </option>
      </select>
    </div>
  </div>
<?php endif; 
$year_enalble = carforyou_get_option('year_enalble');
if($year_enalble=='1'|| $year_enalble==''): ?>
  <div class="form-group col-md-4 input_col_wp black_input">
    <div class="select">
      <select class="form-control modelyear1" name="modelyear">
        <option value="">
        <?php esc_html_e('Year of Model','carforyou'); ?>
        </option>
        <?php if($modelyear){ ?>
        <option value="<?php echo esc_attr($modelyear); ?>"><?php echo esc_html($modelyear,'carforyou'); ?></option>
        <?php }
			$taxonomy = 'year-model';
			$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term) {
				echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
			}
			?>
      </select>
    </div>
  </div>
  <!---Fuel Type start---->  
 <?php endif;
$fuel_enalble = carforyou_get_option('fuel_enalble');
if($fuel_enalble=='1'|| $fuel_enalble==''):?> 
  <div class="form-group col-md-4 input_col_wp black_input">
    <div class="select">
       <select class="form-control" name="fueltype">
	  <option value=""> <?php esc_html_e('Vehicle Fuel Type','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_fuel_type' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>"><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
  </div>
<!---Fuel Type End----> 
<?php endif;

$milage_enalble_ad = carforyou_get_option('milage_enalble_ad');
if($milage_enalble_ad=='1'|| $milage_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
   <div class="select">
	 <select class="form-control" name="automilage">
		<?php global $wpdb;
			
			$query1 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_mileage_city'");
			$max_milage = $query1;
			
		?>
	  <option value=""><?php esc_html_e('Milage','carforyou'); ?></option>
	  <?php if($max_milage>0 || $max_milage<=5){ ?> 
	  <option value="0-5kmpl"><?php esc_html_e('0-5kmpl','carforyou'); ?></option>
	  <?php } if($max_milage>=6 || $max_milage<=10){ ?>
	  <option value="6-10kmpl"><?php esc_html_e('6-10kmpl','carforyou'); ?></option>
	  <?php } if($max_milage>=11 || $max_milage<=15){ ?>
	  <option value="11-15kmpl"><?php esc_html_e('11-15kmpl','carforyou'); ?></option>	
	  <?php } if($max_milage>=16){ ?>	  
      <option value="+16kmpl"> <?php esc_html_e('< 16kmpl','carforyou'); ?> </option>	
   	  <?php }  ?>
     </select>
	</div> 
  </div>
<?php endif; 

$ceat_capacity_enalble_ad = carforyou_get_option('ceat_capacity_enalble_ad');
if($ceat_capacity_enalble_ad=='1'|| $ceat_capacity_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
    <div class="select">
	 <select class="form-control" name="autoseat">
	  <option value=""> <?php esc_html_e('Seat Capacity','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_seat_capacity' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>"><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
  </div>
<?php endif; 

$transmission_enalble_ad = carforyou_get_option('transmission_enalble_ad');
if($transmission_enalble_ad=='1'|| $transmission_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
    <div class="select">
	<select class="form-control" name="autotransmission">
	  <option value=""><?php esc_html_e('Transmission Type','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_transmission' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column,'carforyou'); ?>"><?php echo esc_html($my_column,'carforyou'); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
	
    </div>
  </div>
<?php endif; 

$owner_enalble_ad = carforyou_get_option('owner_enalble_ad');
if($owner_enalble_ad=='1'|| $owner_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
	<div class="select">
	 <select class="form-control" name="autoowner">
	  <option value=""><?php esc_html_e('No. Of Owners','carforyou'); ?></option>
	  <?php global $wpdb;
	$table_name = $wpdb->prefix . "postmeta"; 
    
	$unique_cities = array();
	foreach( $wpdb->get_results("SELECT * FROM $table_name WHERE meta_key='DREAM_auto_no_of_Owners' order by meta_value ASC") as $key => $row) { 
	 $my_column = $row->meta_value;
	 if( ! in_array( $my_column, $unique_cities ) ) :
            // add city to array so it doesn't repeat
            $unique_cities[] = $my_column;
    ?>
	<option value="<?php echo esc_html($my_column); ?>"><?php echo esc_html($my_column); ?></option>
	
	<?php endif; }

	  
	  ?>
     </select>
    </div>
  </div>
<?php endif; 

$engine_enalble_ad = carforyou_get_option('engine_enalble_ad');
if($engine_enalble_ad=='1'|| $engine_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
	<select class="form-control" name="autoengine">
	  
	  <?php global $wpdb;
			$max_engine= '';
			$query1 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_engine'");
			$max_engine = $query1;
			
		?> 
		<option value=""><?php esc_html_e('Engine Capacity','carforyou'); ?></option>
		<?php if($max_engine>0 || $max_engine<=100){ ?>
	  <option value="0-100KW"> <?php esc_html_e('0-100KW','carforyou'); ?> </option>
		<?php } if($max_engine>=101 || $max_engine<=200){ ?>
	  <option value="101-200KW"> <?php esc_html_e('101-200KW','carforyou'); ?> </option>
	  <?php } if($max_engine>=201){ ?>
	  <option value="+201KW"> <?php esc_html_e('< 201KW','carforyou'); ?> </option>
	  <?php } ?>
     </select>
  </div>
<?php endif; 

$fuel_tank_enalble_ad = carforyou_get_option('fuel_tank_enalble_ad');
if($fuel_tank_enalble_ad=='1'|| $fuel_tank_enalble_ad==''):?>
  <div class="form-group col-md-4 input_col2_wp black_input">
	<select class="form-control" name="autotank">
	  <?php global $wpdb;
			
			$query2 = $wpdb->get_var("SELECT max(cast(meta_value as unsigned)) FROM $table_name WHERE meta_key='DREAM_auto_fuel_tank_capacity'");
			$max_fuel = $query2;
				
		
		?>
	  <option value=""><?php esc_html_e('Fuel Capacity','carforyou'); ?></option>
	  <?php if($max_fuel>0 || $max_fuel<=50){ ?>
	  <option value="0-50(Liters)"> <?php esc_html_e('0-50(Liters)','carforyou'); ?> </option>
	  <?php } if($max_fuel>=51 || $max_fuel<=100){ ?>
	  <option value="51-100(Liters)"> <?php esc_html_e('51-100(Liters)','carforyou'); ?> </option>
	  <?php } if($max_fuel>=101 || $max_fuel<=150){ ?>
	  <option value="101-150(Liters)"> <?php esc_html_e('101-150(Liters)','carforyou'); ?> </option>
	  <?php }  if($max_fuel>=151){ ?>
	  <option value="+151(Liters)"> <?php esc_html_e('< 151(Liters)','carforyou'); ?> </option>
	  <?php } ?>
     </select>
  </div>
<?php endif; 

$price_enalble = carforyou_get_option('price_enalble');
if($price_enalble=='1'|| $price_enalble==''):?>  

  <div class="form-group col-md-4 form_price_col black_input ad_sli">
    <label class="form-label">
      <?php esc_html_e('Price Range','carforyou');?> (<?php carforyou_curcy_prefix(); ?>)
    </label>
    <input name="priceRange" type="text" class="span2 price_range" value="" data-slider-min="<?php carforyou_min_meta_value();?>" data-slider-max="<?php carforyou_max_meta_value();?>" data-slider-step="5" data-slider-value="[<?php carforyou_min_meta_value();?>,<?php carforyou_max_meta_value();?>]"/>
  </div>
<?php endif; ?>
 
  <div class="form-group col-md-4 input_col2_wp">
    <button type="submit" class="btn btn-block" name="searchauto"><i class="fa fa-search" aria-hidden="true"></i>
    <?php esc_html_e('Search Car','carforyou'); ?>
    </button>
  </div>
  <?php
  $clear_enalble = carforyou_get_option('ad_clear_enalble');
  if($clear_enalble=='1'|| $clear_enalble==''):?> 
  <div class="form-group col-md-4 input_col2_wp">
    <button type="button" class="btn btn-block" id="ad_reset"><i class="fa fa-refresh" aria-hidden="true"></i>
    <?php esc_html_e('Clear All','carforyou'); ?>
    </button>
  </div>
  <?php endif; ?> 
</form>
<script>
var jquery=jQuery.noConflict();
jquery( document ).ready(function() {
	jquery(".autobrand1").change(function(){
		 var name=jquery(".autobrand1").val();
		// alert(name);
		 var datastring = 'name='+ name;
		 jquery.ajax({ 
				type: "POST",
				url: "<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/carforyou/functions/get_year.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					jquery(".modelyear1").html(html);
				}
			});
		 });
});

</script>

<?php } 
// Min Price
function carforyou_min_meta_value(){
	if (function_exists('carforyou_min_price')):
		carforyou_min_price();
	endif;
}
// Max Price
function carforyou_max_meta_value(){
	if (function_exists('carforyou_max_price')):
		carforyou_max_price();
	endif;
}

