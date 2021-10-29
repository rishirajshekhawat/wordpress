<?php
/**
 * Favorite Functions.
 */
/* ============== Add To favorite ============ */
add_action('wp_ajax_olomo_add_favorite',        'olomo_add_favorite');
add_action('wp_ajax_nopriv_olomo_add_favorite', 'olomo_add_favorite');
if(!function_exists('olomo_add_favorite')){
	function olomo_add_favorite(){
		// Load current favourite posts from cookie
		$favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
		$favposts = array_map('absint', $favposts); // Clean cookie input, it's user input!

		// Add (or remove) favourite post IDs
		$favposts[] = $_POST['post-id'];
		$type = $_POST['type'];
		
		$time_to_live = 3600 * 24 * 30; // 30 days
		setcookie('newco', implode(',', array_unique($favposts)), time() + $time_to_live ,"/");
		
		$done = json_encode(array("type"=>$type,"active"=>'yes',"id"=>$favposts));
		die($done);
				
	}
}	
/* ============== Remove from favorite ============ */
add_action('wp_ajax_olomo_remove_favorite',        'olomo_remove_favorite');
add_action('wp_ajax_nopriv_olomo_remove_favorite', 'olomo_remove_favorite');
if(!function_exists('olomo_remove_favorite')){
	function olomo_remove_favorite(){
		// Load current favourite posts from cookie
		$favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
		$favposts = array_map('absint', $favposts); // Clean cookie input, it's user input!
		// Add (or remove) favourite post IDs
		$favpostsd = $_POST['post-id'];		
		foreach($favposts as $index => $value)
		{
			if($value == $favpostsd)
			{
				unset($favposts[$index]);
			}
		}
		$time_to_live = 3600 * 24 * 30; // 30 days
		setcookie('newco', implode(',', array_unique($favposts)), time() + $time_to_live ,"/");
		$done = json_encode(array("remove"=>'yes',"id"=>$favposts));
		die($done);				
	}
}
add_action('init', 'olomo_fav_ids');
if(!function_exists('olomo_fav_ids')){
	function olomo_fav_ids(){
	 $favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
	 $favposts = array_map('absint', $favposts);
	 return $favposts;
	}
}
/* ============== Is Favourite DETAIL ============ */
if (!function_exists('olomo_is_favourite')) {		
	function olomo_is_favourite($postid,$onlyicon=true){
		$favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
		$favposts = array_map('absint', $favposts);
		if($onlyicon == true){
			if (in_array($postid,$favposts )) {
				return 'fa-bookmark';
			}else{
				return 'fa-bookmark-o';
			}
		}else{
			global $olomo_options;	
			if (in_array($postid,$favposts )) {
				echo esc_html__('Saved', 'olomo');
			}else{
				echo esc_html__('Save', 'olomo');
			}
		}
	}	
}

/* ============== is favourite GRID ============ */
if (!function_exists('olomo_is_favourite_grids')) {
	
	function olomo_is_favourite_grids($postid,$onlyicon=true){
		$favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
		$favposts = array_map('absint', $favposts); // Clean cookie input, it's user input!
		if($onlyicon == true){
			if (in_array($postid,$favposts)) {
				return 'fa-bookmark';
			}else{
				return 'fa-bookmark-o';
			}
		}else{
			if (in_array($postid,$favposts)) {
				return esc_html__('Saved', 'olomo');
			}else{
				return esc_html__('Save', 'olomo');
			}
		}
	}	
}

/* ============ Fav Function to get fav ====================== */
function getSaved(){
	 $favposts = (isset($_COOKIE['newco'])) ? explode(',', (string) $_COOKIE['newco']) : array();
	 $favposts = array_map('absint', $favposts);
	 return $favposts;
}