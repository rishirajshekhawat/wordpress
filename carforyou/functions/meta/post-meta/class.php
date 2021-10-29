<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'your_prefix_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function your_prefix_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'auto_';
	// 1st meta box
	$meta_boxes[] = array(
		// Meta box id, UNIQUE per meta box. Optional since 4.1.5
		'id'         => 'standard',
		// Meta box title - Will appear at the drag and drop handle bar. Required.
		'title'      => esc_html__( 'Designation Field', 'carforyou' ),
		// Post types, accept custom post types as well - DEFAULT is 'post'. Can be array (multiple post types) or string (1 post type). Optional.
		'post_types' => array('testimonial'),
		// Where the meta box appear: normal (default), advanced, side. Optional.
		'context'    => 'normal',
		// Order of meta box: high (default), low. Optional.
		'priority'   => 'high',
		// Auto save: true, false (default). Optional.
		'autosave'   => true,
		// List of meta fields
		'fields'     => array(
			array(
				'name'  => esc_html__( 'Designation of Testimonial:-', 'carforyou' ),
				'id'    => "{$prefix}tes_designation",
				'desc'  => esc_html__( 'Example: CEO of xzy company', 'carforyou' ),
				'type'  => 'text',
			),
		),
	);
	// 5nd meta box
	$meta_boxes[] = array(
		'post_types' => array('brand'),
		'title' => esc_html__( 'Brand Link', 'carforyou' ),
		'fields' => array(
			array(
				'name'  => esc_html__( 'Add Brand Link:-', 'carforyou' ),
				'id'    => "{$prefix}brand_link",
				'desc'  => esc_html__( 'Example: http://www.bmw.in/', 'carforyou' ),
				'type'  => 'text',
			),
		),
	);

	// 5nd meta box
	$meta_boxes[] = array(
		'post_types' => array('page','post'),
		'title' => esc_html__( 'Header Setting', 'carforyou' ),
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => esc_html__('Custom Header', 'carforyou'),
				'desc' => esc_html__('Custom Header Banner Image Upload','carforyou'),
			),
			array(
				'name'             => esc_html__('Header Image Upload', 'carforyou'),
				'id'               => "{$prefix}header_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'type' => 'heading',
			),
		),
	);
	
	
	//SPecific Page ,meta box
	
	$meta_boxes[] = array(
		'post_types' => array('page','post'),
		'title' => esc_html__( 'Header Setting', 'carforyou' ),
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => esc_html__('Custom Header', 'carforyou'),
				'desc' => esc_html__('Custom Header Banner Image Upload','carforyou'),
			),
			array(
				'name'             => esc_html__('Header Image Upload', 'carforyou'),
			    'id'               => "{$prefix}header_image",
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			
			
		),
	);
	
	$meta_boxes[] = array(
		'post_types' => array('page'),
		'title' => esc_html__( 'Show car type on page', 'carforyou' ),
		'show_on_cb' => 'show_this_field_if_true',
		'show_on' => array( 'key' => 'page-template', 'value' => 'single-type-term.php' ),
		'fields' => array(
			array(
				'name'  => esc_html__( 'Select car type:-', 'carforyou' ),
				'id'    => "{$prefix}new_status",
				'type'  => 'taxonomy',
				'taxonomy'   => 'type-car',
				'field_type' => 'Select',
				'query_args' => array(),
				
			),
		),
	);
	
	
	

	// 5nd meta box
	$meta_boxes[] = array(
		'post_types' => array('post'),
		'title' => esc_html__( 'Post Formet Setting', 'carforyou' ),
		'fields' => array(
			array(
				'type' => 'heading',
				'name' => esc_html__('Video Link For Video Post Formet', 'carforyou'),
			),
			array(
				'name'             => esc_html__( 'Video Link', 'carforyou' ),
				'id'               => "{$prefix}video_link",
				'type'             => 'text',
				'desc' => esc_html__('Note:- Please Add youtube Only','carforyou'),
			),
			array(
				'type' => 'heading',
			),
		),
	);
	
	//Trending Meta Box
	   
	$meta_boxes[] = array(
		'post_types' => array('post'),
		'title' => esc_html__( 'Trending Post', 'carforyou' ),
		'fields' => array(
			array(
				'id'               => "meta-checkbox",
				'type'             => 'checkbox',
				'desc'             => esc_html__( 'Trending Car Post', 'carforyou' ),  
			),
			
		),
	);
	
	// 5nd meta box
	$meta_boxes[] = array(
		'post_types' => array('team'),
		'title' => esc_html__( 'Team Member Info', 'carforyou' ),
		'fields' => array(
			array(
				'name'  => esc_html__( 'Member Designation :-', 'carforyou' ),
				'id'    => "{$prefix}member_designation",
				'desc'  => esc_html__( 'Example: Chief Finance Manager', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member Phone No. :-', 'carforyou' ),
				'id'    => "{$prefix}member_phone",
				'desc'  => esc_html__( 'Example: +61-12134-567-89', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member Email :-', 'carforyou' ),
				'id'    => "{$prefix}member_email",
				'desc'  => esc_html__( 'Example: contact@example.com', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member Facebook Page Link:-', 'carforyou' ),
				'id'    => "{$prefix}member_fb",
				'desc'  => esc_html__( 'Example: https://www.facebook.com', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member Twitter Page Link:-', 'carforyou' ),
				'id'    => "{$prefix}member_tw",
				'desc'  => esc_html__( 'Example: https://www.twitter.com', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member linkedin Page Link:-', 'carforyou' ),
				'id'    => "{$prefix}member_link",
				'desc'  => esc_html__( 'Example: https://www.linkedin.com', 'carforyou' ),
				'type'  => 'text',
			),
			array(
				'name'  => esc_html__( 'Member Google Plus Link:-', 'carforyou' ),
				'id'    => "{$prefix}member_google",
				'desc'  => esc_html__( 'Example: https://www.google.com', 'carforyou' ),
				'type'  => 'text',
			),
		),
	);
	
	
	return $meta_boxes;
}