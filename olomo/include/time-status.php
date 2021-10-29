<?php 
	/* ============== Check Time ============ */
	if (!function_exists('olomo_check_time')) {
		function olomo_check_time($postid,$status = false) {
			$output='';
			$buisness_hours = listing_get_metabox_by_ID('business_hours', $postid);
			if(!empty($buisness_hours)){
				if(!empty($postid)){
					$lat = listing_get_metabox_by_ID('latitude',$postid);
					$long = listing_get_metabox_by_ID('longitude',$postid);
				}
				$timezone = getClosestTimezone($lat, $long);
				$time = gmdate("H:i", time() + 3600*($timezone+date("I"))); 
				$day =  gmdate("l"); 
				$time = strtotime($time);
				$lang = get_locale();
				setlocale(LC_ALL, $lang.'.utf-8');
				$day = strftime("%A");
				foreach($buisness_hours as $key=>$value){
					if($day == $key){
						$dayName = esc_html__('Today','olomo');
					}else{
						$dayName = $key;
					}
					$open = $value['open'];
					$open = str_replace(' ', '', $open);
					$close = $value['close'];
					$close = str_replace(' ', '', $close);
					$open = strtotime($open);
					$close = strtotime($close);
					$newTimeOpen = date('h:i A', $open);
					$newTimeClose = date('h:i A', $close);
					
					if($day == $key){
						if($time > $open && $time < $close){
							if($status == false){
								$output = '<span class="grid-opened">'.esc_html__('Open Now~','olomo').'</span>';
							}else{
								$output = 'open';
							}
						}else{
							if($status == false){
							$output = '<span class="grid-closed">'.esc_html__('Closed Now!','olomo').'</span>';
							}else{
								$output = 'close';
							}
						}								
					}								
					
				}
			}else{
				if($status == true){
					$output = 'open';
				}
			}
			return $output;
		}
	}