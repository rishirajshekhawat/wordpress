<?php

/**

 * functions hooks



 * @package WordPress



 * @subpackage carforyou



 * @since carforyou 2.5

 */



function carforyou_inner_header() {?>

<section class="page-header faq_page" style="background-image:url(<?php carforyou_InnerHeader();?> )">

  <div class="container">

    <div class="page-header_wrap">

      <div class="page-heading">

        <h1><?php echo get_the_title(); ?></h1>

      </div>

      <?php carforyou_breadcrumb(); ?>

    </div>

  </div>

  <!-- Dark Overlay-->

  <div class="dark-overlay"></div>

</section>

<?php } 



//Single Blog Page Title

function carforyou_singletitle() { 

$singletitle = carforyou_get_option('blog-single-title');

if(!empty($singletitle)):

	echo esc_html($singletitle);

endif;

}







//Header Function 

function carforyou_header(){ 

$header_style = carforyou_get_option('header_style');

if($header_style=='header_style_2'){ ?>

<!--Header-->

<header class="header_style2"> 

  <!-- Navigation -->

  <nav id="navigation_bar" class="navbar navbar-default">

    <div class="container">

      <div class="row">

        <div class="col-md-3 abc">

          <div class="navbar-header">

            <div class="logo">

              <?php 

               $site_logo =  carforyou_get_option( 'site_logo' );

               $site_name = get_bloginfo('name', 'display');

                if(!empty($site_logo['url'])):

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" ><img src="'.esc_url($site_logo['url']).'" alt="image"></a>';

                else:

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" >'.esc_html($site_name).'</a>';

                endif;

              ?>

            </div>

            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">

            <?php esc_html('Toggle navigation','carforyou') ?>

            </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

          </div>

        </div>

        <div class="col-md-9 text-right">

          <div class="collapse navbar-collapse" id="navigation">
			
            <?php 

					  if (has_nav_menu('primary')):

						wp_nav_menu( array('theme_location' => 'main-menu', 'menu' => 'main-menu', 'menu_class' => 'nav navbar-nav'));

					  endif;	

			  ?>

			  

          </div>

        </div>

      </div>

    </div>

  </nav>

  <!-- Navigation end --> 

</header>

<!-- /Header -->

<?php } elseif($header_style=='header_style_3'){ ?>

<header class="header_style2"> 

  <!-- Navigation -->

  <nav id="navigation_bar" class="navbar navbar-default">

    <div class="container">

      <div class="row">

        <div class="col-md-3 abc">

          <div class="navbar-header">

            <div class="logo">

              <?php 

               $site_logo =  carforyou_get_option( 'site_logo' );

               $site_name = get_bloginfo('name', 'display');

                if(!empty($site_logo['url'])):

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" ><img src="'.esc_url($site_logo['url']).'" alt="image"></a>';

                else:

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" >'.esc_html($site_name).'</a>';

                endif;

              ?>

            </div>

            <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">

            <?php esc_html('Toggle navigation','carforyou') ?>

            </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

          </div>

        </div>

        <div class="col-md-9 text-right">

          <div class="collapse navbar-collapse" id="navigation">
			<div class="quick-support">
        	<p> <?php $email_id= carforyou_get_option('header_email');



					if(!empty($email_id)) : ?>

              <a href="mailto:<?php echo esc_html($email_id); ?>"><?php echo esc_html($email_id); ?></a>

              <?php endif; ?></p>  | 
        	<p><?php $contact_number= carforyou_get_option('auto_contact_number');

        

                                    if(!empty($contact_number)) : ?>

                      <a href="tel:<?php echo esc_html($contact_number); ?>"><?php echo esc_html($contact_number); ?></a>

                      <?php endif; ?></p>
        </div>
            <?php 

					  if (has_nav_menu('primary')):

						wp_nav_menu( array('theme_location' => 'main-menu', 'menu' => 'main-menu', 'menu_class' => 'nav navbar-nav'));

					  endif;	

			  ?>

			  

          </div>

        </div>

      </div>

    </div>

  </nav>

  <!-- Navigation end --> 

</header>

<?php } else { ?>
<!--Header-->



<header>

  <div class="default-header">

    <div class="container">

      <div class="row">

        <div class="col-sm-3 col-md-2 abc">

          <div class="logo">

            <?php 

               $site_logo =  carforyou_get_option( 'site_logo' );

               $site_name = esc_html(get_bloginfo('name', 'display'));

                if(!empty($site_logo['url'])):

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" ><img src="'.esc_url($site_logo['url']).'" alt="image"></a>';

                else:

                    echo '<a  href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home" >'.esc_html($site_name).'</a>';

                endif;



              ?>

          </div>

        </div>

        <div class="col-sm-9 col-md-10">

          <div class="header_info">

            <?php $email_enable = carforyou_get_option('email_enable'); 

			if($email_enable=='1'): ?>

            <div class="header_widgets">

              <?php $fan_fact_icon1= carforyou_get_option('fan_fact_icon1');



					if(!empty($fan_fact_icon1)) : ?>

              <div class="circle_icon"> <i class="<?php echo esc_html($fan_fact_icon1); ?>" aria-hidden="true"></i> </div>

              <?php endif; ?>

              <?php $email_heading= carforyou_get_option('email_heading');



					if(!empty($email_heading)) : ?>

              <p class="uppercase_text"><?php echo esc_html($email_heading); ?></p>

              <?php endif; ?>

              <?php $email_id= carforyou_get_option('header_email');



					if(!empty($email_id)) : ?>

              <a href="mailto:<?php echo esc_html($email_id); ?>"><?php echo esc_html($email_id); ?></a>

              <?php endif; ?>

            </div>

            <?php endif;

				$contact_enable = carforyou_get_option('contact_enable'); 

				if($contact_enable=='1'): ?>

                    <div class="header_widgets">

                      <?php $fan_fact_icon2= carforyou_get_option('fan_fact_icon2');

        

                            if(!empty($fan_fact_icon2)) : ?>

                      <div class="circle_icon"> <i class="<?php echo esc_html($fan_fact_icon2); ?>" aria-hidden="true"></i> </div>

                      <?php endif; ?>

                      <?php $contact_heading= carforyou_get_option('contact_heading');

        

                            if(!empty($contact_heading)) : ?>

                      <p class="uppercase_text"><?php echo esc_html($contact_heading); ?></p>

                      <?php endif; ?>

                      <?php $contact_number= carforyou_get_option('auto_contact_number');

        

                                    if(!empty($contact_number)) : ?>

                      <a href="tel:<?php echo esc_html($contact_number); ?>"><?php echo esc_html($contact_number); ?></a>

                      <?php endif; ?>

                    </div>

            <?php endif;



				$Social_enable = carforyou_get_option('header_Social_enable'); 



				if($Social_enable=='1'): ?>

                    <div class="social-follow">

                      <ul>

                        <?php 

        

                    $facebook_link = carforyou_get_option('header_facebook_link');

        

                    if(!empty($facebook_link)) : ?>

                        <li><a href="<?php echo esc_url($facebook_link); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                        <?php $twitter_link = carforyou_get_option('header_twitter_link');

        

                    if(!empty($twitter_link)) : ?>

                        <li><a href="<?php echo esc_url($twitter_link); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                        <?php $linkedin_link = carforyou_get_option('header_linkedin_link');

        

                    if(!empty($linkedin_link)) : ?>

                        <li><a href="<?php echo esc_url($linkedin_link); ?>"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                        <?php $google_link = carforyou_get_option('header_google_link');

        

                    if(!empty($google_link)) : ?>

                        <li><a href="<?php echo esc_url($google_link); ?>"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                        <?php $instagram_link = carforyou_get_option('header_instagram_link');

        

                    if(!empty($instagram_link)) : ?>

                        <li><a href="<?php echo esc_url($instagram_link); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                        <?php $pinterese_link = carforyou_get_option('header_pinterest_link');

        

                    if(!empty($pinterese_link)) : ?>

                        <li><a href="<?php echo esc_url($pinterese_link); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>

                        <?php endif; ?>

                      </ul>

                    </div>

            <?php endif; ?>

          </div>

        </div>

      </div>

    </div>

  </div>

  

  <!-- Navigation -->

  

  <nav id="navigation_bar" class="navbar navbar-default">

    <div class="container">

      <div class="navbar-header">

        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">

        <?php esc_html('Toggle navigation','carforyou') ?>

        </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      </div>

      <div class="header_search">

        <form action="<?php echo esc_url(site_url()); ?>/?s" method="get" role="search">

         <?php wp_nonce_field( 'search_value', 'search_nonce',false); ?>

          <input type="search" placeholder="<?php esc_attr_e('Search...','carforyou') ?>" class="form-control" name="s">

          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

        </form>

      </div>

      <div class="collapse navbar-collapse" id="navigation">

        <?php 



		  if (has_nav_menu('primary')):

             wp_nav_menu( array('theme_location' => 'primary', 'menu' => 'menu-main-menu', 'menu_class' => 'nav navbar-nav')

			 );

          endif;



		?>

		<?php 



		  if (has_nav_menu('secondary')):

             wp_nav_menu( array('theme_location' => 'secondary', 'menu' => 'menu-main-menu', 'menu_class' => 'nav navbar-nav')

			 );

          endif;



		?>

		  

		   

		  

      </div>

      

    </div>

  </nav>

  

  <!-- Navigation end --> 

  

</header>

<!-- /Header -->

<?php 

}

}