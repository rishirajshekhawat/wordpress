<?php 
require_once(ABSPATH.'wp-admin/includes/user.php' );

$current_user = wp_get_current_user();
	wp_delete_user( $current_user->ID );
	wp_redirect(site_url()); 
?>
