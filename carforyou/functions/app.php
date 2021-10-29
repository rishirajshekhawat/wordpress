<?php



if (!function_exists('carforyou_logos')) {

	function carforyou_logos() {

		global $carforyou_options;

		$logos = $carforyou_options['app_logo']['url'];

		if(!empty($logos)){

			echo '<img src="'.esc_url($logos).'" />';

		}

		else{

			echo '<span class="logo_text">'.get_bloginfo('name', 'display').'</span>';	

		}

	}

}



ob_start();



	function app_setup($atts, $content = null) {



	extract(shortcode_atts(array(



		'title'   => '',



		'subtitle'   => ''



	), $atts));



global $carforyou_options;

$logos = $carforyou_options['app_logo']['url'];

$app_logo = esc_url($logos);

$enable = $carforyou_options['enable_app'];

$splash = $carforyou_options['splash_color'];

$title = $carforyou_options['app_title'];

$url = $carforyou_options['app_url'];


$response["status"] = TRUE;
				$response["msg"] = "data are";
				$response["logo"] = $app_logo;
				$response["color"] =$splash;
				$response["Title"]=$title;
				$response["URL"]=$url;

echo json_encode($response);

	}
		
?>