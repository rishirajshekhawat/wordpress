<?php
require_once('../../../../wp-config.php');
$con=mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if($_POST['name'] == ''){ ?>
	<option value="">
        <?php esc_html_e('Year of Model','carforyou'); ?>
        </option>
	<?php $taxonomy = 'year-model';
			$tax_terms = get_terms($taxonomy);
			foreach ($tax_terms as $tax_term) {
				echo '<option value="'.esc_attr($tax_term->slug).'">'. esc_html($tax_term->name).'</option>';
			}
}
else{
		echo '<option value="">'; esc_html_e('Select Year','carforyou'); echo '</option>'; 			
		
		$categorrrr=$_POST['name'];	

			
		
		global $dynamitevisuals_my_query ;			
		
		$args = array( 'post_type' => 'auto', 'posts_per_page' => -1, 'tax_query' => array( array( 'taxonomy' => 'auto-brand', 'field' => 'slug', 'terms' => $categorrrr) )); 
		
		$dynamitevisuals_my_query  = new WP_Query( $args );			
		
		while ( $dynamitevisuals_my_query ->have_posts() ) : 
		
		$dynamitevisuals_my_query ->the_post();   			   
		
		$auto_model = get_the_terms( get_the_ID(), 'year-model');				
		
		foreach ($auto_model as $auto_models){				
		
		$modal_selects[] = '<option value="'.esc_attr($auto_models->slug).'">'.esc_html($auto_models->name).'</option>';
		
		}			  			
		endwhile; 	 			
		
		$modal_selects = array_unique($modal_selects);			
		
		sort($modal_selects);			
		
		foreach($modal_selects as $modal_select):				
		
		echo str_replace('"' , '', $modal_select);			
		
		endforeach;
		
		
}
?>