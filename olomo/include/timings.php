<div class="open-hours">
	<?php esc_html_e('Opening Hours', 'olomo');?>
	<?php
		$buisness_hours = listing_get_metabox('business_hours');
		if(!empty($buisness_hours)){
				$lat = listing_get_metabox('latitude');
				$long = listing_get_metabox('longitude');
			$timezone = getClosestTimezone($lat, $long);
			$time = gmdate("H:i", time() + 3600*($timezone+date("I"))); 
			$day =  gmdate("l"); 
			$lang = get_locale();
			setlocale(LC_ALL, $lang.'.utf-8');
			$day = strftime("%A");
			$time = strtotime($time);
			echo '<div class="today-hrs pos-relative"><ul>';
			$dayName = esc_html__('Today','olomo');
			foreach($buisness_hours as $key=>$value){
				$keyArray[] = $key;
				if($day == $key){
					$open = $value['open'];
					$open = str_replace(' ', '', $open);
					$close = $value['close'];
					$close = str_replace(' ', '', $close);
					$open = strtotime($open);
					$close = strtotime($close);
					$newTimeOpen = date('h:i A', $open);
					$newTimeClose = date('h:i A', $close);
					
					echo '<li class="today-timing clearfix"><strong>'.olomo_icons('todayTime').' '.esc_html($dayName).'</strong>';
						if($time > $open && $time < $close){
							echo '<a class="Opened">'.esc_html__('Open Now~','olomo').'</a>';
						}else{
							echo '<a class="closed">'.esc_html__('Closed Now!','olomo').'</a>';
						}								
					echo '<span>'.esc_html($newTimeOpen).' - '.esc_html($newTimeClose).'</span></li>';
				}
			}
			if(is_array($keyArray) && !in_array($day, $keyArray)){
				echo '<li class="today-timing clearfix"><strong>'.olomo_icons('todayTime').' '.esc_html($dayName).'</strong>';
				echo '<span><a class="closed dayoff">'.esc_html__('Day Off!','olomo').'</a></span></li>';
			}
			echo '</ul>';
			echo '<a href="#" class="show-all-timings">'.esc_html__('Show all timings','olomo').'</a>';
			echo '<ul class="hidding-timings">';
			foreach($buisness_hours as $key=>$value){
				$dayName = $key;
				$open = $value['open'];
				$open = str_replace(' ', '', $open);
				$close = $value['close'];
				$close = str_replace(' ', '', $close);
				$open = strtotime($open);
				$close = strtotime($close);
				$newTimeOpen = date('h:i A', $open);
				$newTimeClose = date('h:i A', $close);
				echo '<li><strong>'.esc_html($dayName).'</strong>';
				echo '<span>'.esc_html($newTimeOpen).' - '.esc_html($newTimeClose).'</span></li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	?>
</div>