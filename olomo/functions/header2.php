<?php 
/**
 * functions hooks
 * @package WordPress
 * @subpackage olomo
 * @since olomo 1.5
 */
//Header Style 2 
global $olomo_options;
?>
<header id="header" class="header_style2">
                <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="10">
                    <div class="container">
                      <div class="navbar-header">
                        <div class="logo"> <a href="<?php echo esc_url(home_url('/')); ?>"><?php olomo_logo(); ?></a> </div>
                        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button>
                      </div>
                      <div class="collapse navbar-collapse" id="navigation">
                         <?php 
			    olomo_main_menu(); 
				
				?>
                      
                        <div class="front_nav_bar">
                            <a href="javascript:;" class="menu-toggle-bar">
                                <i class="fa fa-bars"></i>
                                <i class="fa fa-close"></i>
                            </a>
                        </div>
                        
                         <?php 
						 
						 // Ladd Listing    
				$addURL = olomo_url('add_listing_url_mode');
				/*if(is_plugin_active('olomo-plugin/plugin.php')){*/
					
				if(function_exists('olomo_plugin_functions')){	
					if(!empty($addURL)){ ?>   
						<div class="submit_listing">
							<a href="<?php echo esc_url(olomo_url('add_listing_url_mode'));?>" class="btn outline-btn"><i class="fa fa-plus-circle"></i> <?php esc_html_e('Submit Listing','olomo'); ?></a>
						</div>
					<?php } 
					if(!is_user_logged_in()){
					$loginURL = $olomo_options['login-page'];?>
						<ul class="nav navbar-nav dashboard_menu">
							<li><a href="<?php echo esc_url($loginURL); ?>"><?php esc_html_e('Sign In','olomo'); ?></a> </li>
						</ul>
					<?php }
					else{
						$current_user = wp_get_current_user();
						global $olomo_options;
						$authorURL = $olomo_options['listing-author']; ?>
						<div class="user_nav">
							<div class="dropdown pull-right">
								<span id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
									<img src="<?php echo olomo_author_image(); ?>"> 
								</span>
								<ul class="dropdown-menu" aria-labelledby="dLabel">
								<?php 
									$ltr_group = substr($current_user->user_login, 0, 1);
									/*if(is_plugin_active('olomo-plugin/plugin.php')){*/
									if(function_exists('olomo_plugin_functions')){		
										
										
										?>
										<li><a href="<?php echo esc_url($authorURL); ?>"><i><?php echo esc_html($ltr_group); ?></i><?php echo  esc_html($current_user->user_login); ?> </a></li>
								<?php }else{?>
										<li><a href="<?php echo get_author_posts_url($current_user->ID); ?>"><?php echo  esc_html($current_user->user_login); ?></a></li>
								<?php }
								$dashURL = olomo_url('listing-author');
								if(!empty($dashURL)){
									$currentURL = $dashURL;
									$perma = '';
									$dashQuery = 'dashboard=';
									global $wp_rewrite;
									if ($wp_rewrite->permalink_structure == ''){
										$perma = "&";
									}else{
										$perma = "?";
									} ?>	
										<li><a href="<?php echo esc_url(olomo_url('listing-author')); ?>"><i class="fa fa-cogs"></i> <?php esc_html_e('Dashboard','olomo'); ?></a></li>
										<li><a href="<?php echo esc_url($currentURL.$perma.$dashQuery).'update-profile'; ?>"><i class="fa fa-user-o"></i> <?php esc_html_e('My Profile','olomo'); ?></a></li>
										<li><a href="<?php echo wp_logout_url( esc_url(home_url('/')) ); ?>"><i class="fa fa-power-off"></i> <?php esc_html_e('Logout','olomo'); ?></a></li>
								<?php }?>
								 </ul>
						  </div>
						</div>
					<?php }
				}
                        
                       ?>
                       
                      </div>
                      
                    </div>
                </nav>
            </header>