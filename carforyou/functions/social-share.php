<?php 
/**

 * functions hooks

 * @package WordPress

 * @subpackage carforyou

 * @since carforyou 2.5

 */
function carforyou_share_link() {?>

	<div class="share_article ">

                                	<h6><?php esc_html_e('Share:', 'carforyou'); ?></h6>

                	                <ul>

                                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(the_permalink());?>&amp;t=<?php echo esc_html(the_title()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>

                                    <li><a href="http://twitter.com/home/?status=<?php echo esc_html(the_title()); ?> - <?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>

                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo esc_html(the_title()); ?>&amp;url=<?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>

                                    <li><a href="https://plus.google.com/share?url=<?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>

	                                </ul>

                                </div>

<?php }



function carforyou_share_vehicle() {?>

	<div class="share_vehicle ">

                                    <p><?php esc_html_e('Share:', 'carforyou'); ?> <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url(the_permalink());?>&amp;t=<?php esc_html(the_title()); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>

                                    <a href="http://twitter.com/home/?status=<?php echo esc_html(the_title()); ?> - <?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>  

                                    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;title=<?php echo esc_html(the_title()); ?>&amp;url=<?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>                                    

                                  <a href="https://plus.google.com/share?url=<?php echo esc_url(the_permalink());?>" onclick="javascript:window.open(this.href,

  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>

	                                </p>
                                </div>

<?php }