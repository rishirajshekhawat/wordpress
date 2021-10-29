<?php

	$type = 'listing';

	$term_id = '';

	$taxName = '';

	$termID = '';

	$term_ID = '';

	global $paged;

	$taxTaxDisplay = true;

	$TxQuery = '';

	$tagQuery = '';

	$catQuery = '';

	$locQuery = '';

	$taxQuery = '';

	$searchQuery = '';

	$sKeyword = '';

	$priceQuery = '';



	if( !empty($_GET['s']) && isset($_GET['s']) && $_GET['s']=="listfilter" ){

		if( !empty($_GET['s_cat']) && isset($_GET['s_cat'])){

			$lpsCat = $_GET['s_cat'];

			$catQuery = array(

				'taxonomy' => 'listing-category',

				'field' => 'id',

				'terms' => $lpsCat,

				'operator'=> 'IN' //Or 'AND' or 'NOT IN'

			);

			$taxName = 'listing-category';

		}



		if( !empty($_GET['s_loc']) && isset($_GET['s_loc'])){							

			$lpsLoc = $_GET['s_loc'];

			if(is_numeric($lpsLoc)){

				$lpsLoc = $lpsLoc;

			}

			else{

				$term = olomo_term_exist($lpsLoc,'location');

				if(!empty($term)){

					$lpsLoc=$term['term_id'];

				}

				else{

					$lpsLoc = '';

				}

			}

			$locQuery = array(

				'taxonomy' => 'location',

				'field' => 'id',

				'terms' => $lpsLoc,

				'operator'=> 'IN'

			);

		}

		if(empty($_GET['s_cat']) && !empty($_GET['select']) ){

			$sKeyword = $_GET['select'];	

		}

		$TxQuery = array(

			'relation' => 'AND',

			$tagQuery,

			$catQuery,

			$locQuery,

		);

	}

	else{

		$queried_object = get_queried_object();

		$term_id = $queried_object->term_id;

		$taxName = $queried_object->taxonomy;

		if(!empty($term_id)){

			$termID = get_term_by('id', $term_id, $taxName);

			$termName = $termID->name;

			$term_ID = $termID->term_id;

		}



		$TxQuery = array(

			array(

				'taxonomy' => $taxName,

				'field' => 'id',

				'terms' => $termID->term_id,

				'operator'=> 'IN' //Or 'AND' or 'NOT IN'

			),

		);	

	}					

	$args=array(

		'post_type' => $type,

		'post_status' => 'publish',

		'posts_per_page' => -1,

		's'	=> $sKeyword,

		'paged'  => $paged,

		'tax_query' => $TxQuery	,

	);



	$my_query = null;

	$my_query = new WP_Query($args);

	global $olomo_options;

?>

<!-- Inner-Banner -->

<?php if (function_exists('get_wp_term_image'))
{
    $meta_image = get_wp_term_image($term_id); 
    //It will give category/term image url 
} if($meta_image) {
?>
<section id="listing_banner" class="parallex-bg" style="background:url(<?php echo $meta_image; ?>)">
<?php } else { ?>
<section id="listing_banner" class="parallex-bg" style="background:url(<?php echo site_url(); ?>/wp-content/themes/olomo/assets/images/page-banner.jpg)">
<?php } ?>

	<div class="container">

    	<div class="white-text text-center div_zindex">

        	<?php olomo_forms(); ?>

        </div>

    </div>

    <div class="dark-overlay"></div>

</section>

<!-- /Inner-Banner -->

<div id="inner_pages" class="simple-listing">

	<div class="container">

    	<div class="listing_header">

        	<h5><?php printf( esc_html__('%s Listings ', 'olomo'), single_cat_title( '', false ) ); ?></h5>

            <div class="layout-switcher">

                <a href="#" class="grid active"><i class="fa fa-th"></i></a>

                <a href="#" class="list "><i class="fa fa-align-justify"></i></a>

            </div>

        </div>        

        <div class="row">

				<?php 

                if($my_query->have_posts()) {

                    while($my_query->have_posts()) : $my_query->the_post(); 

                            get_template_part( 'listing-loop' );

                    endwhile; 

                    wp_reset_postdata();

                }

				else{?> 

					<div class="container">

                       <div class="row">

                            <div class="error-column box-shadownon">

                                <i class="fa fa-frown-o" aria-hidden="true"></i>

                                <h1><?php esc_html_e('Sorry!', 'olomo'); ?></h1>

                                <h4><?php esc_html_e('Results Not Found!', 'olomo'); ?></h4>

                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"> <?php esc_html_e('Back To Home', 'olomo'); ?> </a>

                            </div>

                        </div>

                    </div>	

                <?php } ?>

        </div>

    </div>

</div>