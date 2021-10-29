<?php 
/**
 * The Template for post Sidebar single posts.
 *
 * @package		olomo
 * @copyright	Copyright (c) 2019
 * @since		olomo 1.5
 */
?>
<div class="sidebar">
<?php 
if (is_active_sidebar('default-sidebar')) :
	dynamic_sidebar('default-sidebar');
endif;
?>
</div>