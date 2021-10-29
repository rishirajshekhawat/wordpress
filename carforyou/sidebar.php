<?php
/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */

 ?>


<aside class="sidebar">
<?php
if ( is_active_sidebar( 'carforyou_main' ) ) :
	dynamic_sidebar( 'carforyou_main' );
endif;
?>
</aside>