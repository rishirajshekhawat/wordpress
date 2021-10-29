<?php
/**
	 * Search Filters.
*/
	/* ============== Get child term (tags) in search ============ */
	if (!function_exists('olomo_search_term_method')) {
		function olomo_search_term_method(){
			wp_register_script('search-ajax-script', get_template_directory_uri() . '/assets/js/search-ajax.js', array('jquery') ); 
			wp_enqueue_script('search-ajax-script');
			wp_localize_script( 'search-ajax-script', 'ajax_search_term_object', array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			));
		}
		if(!is_admin()){
			add_action('init', 'olomo_search_term_method');
		}
	}
	/* ============== Home page========== */
	add_action('wp_ajax_olomo_suggested_search', 'olomo_suggested_search');
	add_action('wp_ajax_nopriv_olomo_suggested_search', 'olomo_suggested_search');	
	if (!function_exists('olomo_suggested_search')) {
		function olomo_suggested_search(){
			global $olomo_options;
			
			$qString = '';
			$qString = strtolower($_POST['tagID']);
			$output = null;
			$TAGOutput = null;
			$CATOutput = null;
			$TagCatOutput = null;
			$TitleOutput = null;
			if(empty($qString)){
				global $olomo_options;
				$cats;
				$ucat = array(
					 'post_type' => 'listing',
					  'hide_empty' => false,
					  'orderby' => 'count',
					  'order' => 'ASC',
					  'parent'=> 0,
					);
					$catIcon = '';
					$categories = get_terms( 'listing-category',$ucat);
					foreach($categories as $cat) {
						$catIcon = olomo_get_term_meta( $cat->term_id,'category_image' );
						if(!empty($catIcon)){
							$catIcon = '<img src="'.esc_url($catIcon).'" />';
						}
						$cats[] = '<li class="default-cats" data-catid="'.$cat->term_id.'">'.$catIcon.'<span class="s-cat">'.$cat->name.'</span></li>';
					}
				$output = array('tag'=>'', 'cats'=>$cats, 'tagsncats'=>'', 'titles'=>'','more'=>'');
				$query_suggestion = json_encode(array("tagID"=>$qString,"suggestions"=>$output));
				die($query_suggestion);
			}else{
					$args = array(  
						'posts_per_page'=> -1, // Number of related posts to display.
						'post_type'	=> 'listing',
						'post_status'	=> 'publish'
					);  						  
					$my_query = new wp_query( $args );
					if($my_query->have_posts()){ 
					while ($my_query->have_posts()) : $my_query->the_post();  
						$tagTerms = get_the_terms(get_the_ID(), 'list-tags');
						$catTerms = get_the_terms(get_the_ID(), 'listing-category');
						$locTerms = get_the_terms(get_the_ID(), 'location');
						$catName = '';
						$catIcon = '';
						$locNames = '';
						
						if( !empty($catTerms) && !empty($tagTerms) ){
							
							$catName = $catTerms[0];
							$term_id = $catName->term_id;
							$parent='';
							if(!empty($term_id)){
								$termparent = get_term_by('id', $term_id, 'listing-category');
								$parent = $termparent->parent;
							}
							$catIcon = olomo_get_term_meta( $catName->term_id,'category_image' );
							if(empty($catIcon)){
								$catIcon = olomo_get_term_meta($parent,'category_image');
							}
							if(!empty($catIcon)){
								$catIcon = '<img class="s-caticon" src="'.esc_url($catIcon).'" />';
							}
						
							foreach($tagTerms as $tag){
								if(strpos(strtolower($tag->name), $qString) === 0){
									$TAGOutput[] = '<li class="wrap-tags" data-tagid="'.$tag->term_id.'"><span class="s-tag">'.$tag->name.'</span></li>'; 
									$TagCatOutput[] = '<li class="wrap-catsntags" data-tagid="'.$tag->term_id.'" data-catid="'.$catName->term_id.'">'.$catIcon.'<span class="s-tag">'.$tag->name.'</span><span> in </span><span class="s-cat">'.$catName->name.'</span></li>';
									
								}
							}
							
							foreach($catTerms as $cat){
								if(strpos(strtolower($cat->name), $qString) === 0){
									$CATOutput[] = '<li class="wrap-cats" data-catid="'.$cat->term_id.'">'.$catIcon.'<span class="s-cat">'.$cat->name.'</span></li>' ; 	
								}
							}
							
						
						}
						$listTitle = get_the_title();
						
						$listThumb = '';
						if ( has_post_thumbnail()) {
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'thumbnail' );
									if(!empty($image[0])){
										$listThumb = "<img src='" . esc_url($image[0]) . "' />
											";
									}else{
										$listThumb = '<img src="'.esc_url('https://placeholdit.imgix.net/~text?txtsize=33&w=50&h=50').'">';
									}		
						}
						
						if(strpos(strtolower($listTitle), $qString) === 0){
							
							$TitleOutput[] = '<li class="wrap-title" data-url="'.get_the_permalink().'">'.$listThumb.'<span class="s-title"><a href="'.get_the_permalink().'">'.$listTitle.' <span class="loc">'.$locTerms[0]->name.'</span></a></span></li>';
						}
							
					endwhile;
					wp_reset_postdata();
					}
					$TAGOutput = array_unique($TAGOutput);
					$CATOutput = array_unique($CATOutput);
					$TagCatOutput = array_unique($TagCatOutput);
					if( (!empty($TAGOutput) && count($TAGOutput)>0) || (!empty($TAGOutput) && count($TAGOutput)>0) || (!empty($TAGOutput) && count($TAGOutput)>0) ){
						$output = array('tag'=>$TAGOutput, 'cats'=>$CATOutput, 'tagsncats'=>$TagCatOutput, 'titles'=>$TitleOutput,'more'=>'');
					}
					else{
						$moreResult = array();
						$mResults = '<strong>'.esc_html__('More results for ', 'olomo').'</strong>';
						$mResults .= $qString;
					$moreResult[] = '<li class="wrap-more-results" data-moreval="'.$qString.'">'.esc_html($mResults).'</li>';
						$output = array('tag'=>'', 'cats'=>'', 'tagsncats'=>'', 'titles'=>'','more'=>$moreResult);
					}
				$query_suggestion = json_encode(array("tagID"=>$qString,"suggestions"=>$output));
				die($query_suggestion);
			}				
		}
	}
	
	/* ======================Show Cateogries on focus================ */
	add_action('wp_ajax_olomo_suggested_cats', 'olomo_suggested_cats');
	add_action('wp_ajax_nopriv_olomo_suggested_cats', 'olomo_suggested_cats');
	
	if (!function_exists('olomo_suggested_cats')) {
		function olomo_suggested_cats(){
			global $olomo_options;
			$cats;
			$homeSearchCategory = $olomo_options['home_banner_search_cats'];
			$ucat = array(
				 'post_type' => 'listing',
				  'hide_empty' => false,
				  'orderby' => 'count',
				  'order' => 'ASC',
				  'include'=> $homeSearchCategory
				);
				$categories = get_terms( 'listing-category',$ucat);
				foreach($categories as $category) {
					$cats[] =  $category->name;
				}
			$query_suggestion = json_encode(array("cats"=>$cats));
			die($query_suggestion);
		}
	}