<?php
global $listinghub_options;
$authorURL = $listinghub_options['listing-author'];
?>
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2><?php esc_html_e('Plan','olomo');?></h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','olomo'); ?></a></li>
                    <li><a href="<?php echo esc_url($authorURL); ?>"><?php esc_html_e('Dashboard','olomo'); ?></a></li>
                    <li><?php esc_html_e('My Plan','olomo');?></li>
                </ul>
            </nav>
        </div>
    </div>
</div>	
	<?php
		global $wpdb;
		$dbprefix = '';
		$post_ids = '';
		$dbprefix = $wpdb->prefix;
		$user_ID = '';
		$user_ID = get_current_user_id();
		$results = '';
		$resultss = '';
		$results = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND plan_type ='Package' AND status='success'" );
		$resultss = $wpdb->get_results( "SELECT * FROM ".$dbprefix."listing_orders WHERE user_id ='$user_ID' AND plan_type ='Package' AND status='expired'" );
	?>
	<!-- Active Packages -->
	<div class="packages">
		<div class="active-packages-area">
			<?php if(!empty($results) && count($results)>0 ){ ?>
			
					<?php foreach ($results as $info) 
					{ ?>
						<?php
						$plainID = '';
						$plainName = '';
						$plainType = '';
						$plainDate = '';
						$plainExpiry = '';
						$plainPrice = '';
						$plainUsed = '';
						$plainRemains = '';
						$plainTID = '';
						$pendingListings = 0;
						$activeListings = 0;
						
						$plainTID = $info->order_id;
						$plainID = $info->plan_id;
						$plainName = $info->plan_name;
						$plainType = $info->plan_type;
						$plainPrice = $info->currency.$info->price;
						if(!empty($info->used)){
							$plainUsed = $info->used;
							$post_ids = $info->post_id;
						}
						
						$activeListingArray = array();
						$activeListingArray = explode(',', $post_ids);
						
						if(!empty($activeListingArray)){
							foreach($activeListingArray as $pid){
								if(get_post_status( $pid )=="pending"){
								$pendingListings++;
								}
								else if(get_post_status( $pid )=="publish"){
								$activeListings++;
								}
							}
						}
						
						$plainDate = $info->date;
						$plainDate = strtr($plainDate, '/', '-');
						
						
						
						$days = '';
						$totalPosts = '';
						$planTIme = get_post_meta( $plainID, 'plan_time', true );
						if(!empty($planTIme)){
							$days = get_post_meta( $plainID, 'plan_time', true );
						}
						
						if(!empty($days)){
							$plainExpiry = date('Y-m-d', strtotime($plainDate. ' + '.$days.' days'));
							$plainExpiry = date('d-m-Y', strtotime($plainExpiry));
						}
						else{
							$plainExpiry = 'Unlimited';
						}
						$planText = get_post_meta( $plainID, 'plan_text', true );
						if(!empty($planText)){
							$totalPosts = get_post_meta( $plainID, 'plan_text', true );
							$plainRemains = $totalPosts - $plainUsed;
						}
						else{
							$plainRemains = 'unlimited';
							$planText = 'unlimited';
						}
						
						?>
						<div class="table-responsive">
							<div class="top-area">
								<h2><?php echo esc_html($plainName); ?> <span class="active-status active"><?php esc_html_e('Active','olomo'); ?></span></h2>
								<div class="listing-options">
									<ul>
										<li><?php esc_html_e('Listings Used : ','olomo'); ?><span><?php echo esc_html($plainUsed); ?></span></li>
										<li><?php esc_html_e('Remaining Listings : ','olomo'); ?><span class="remains_plan"><?php echo esc_html($plainRemains); ?></span></li>
									</ul>
								</div>
							</div>
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th><?php esc_html_e('Trans ID','olomo'); ?></th>
										<th><?php esc_html_e('Date','olomo'); ?></th>
										<th><?php esc_html_e('Ammount','olomo'); ?></th>
										<th><?php esc_html_e('Duration','olomo'); ?></th>
										<th><?php esc_html_e('Total Listings','olomo'); ?></th>
										<th><?php esc_html_e('Status','olomo'); ?></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo esc_html($plainTID); ?></td>
										<td><?php echo esc_html($plainDate); ?></td>
										<td><?php echo esc_html($plainPrice); ?></td>
										<?php if(!empty($days) && $days>1) { ?>
										<td><?php echo esc_html($days);?> <?php esc_html_e('Days','olomo'); ?></td>
										<?php } else { ?>
										<td><?php echo esc_html($days);?> <?php esc_html_e('Day','olomo'); ?></td>
										<?php } ?>
										<td><?php echo esc_html($planText); ?></td>
										<td><?php esc_html_e('Active','olomo'); ?></td>
									</tr>
								</tbody>
							</table>
						</div>
				<?php } ?>
				
		<?php } if(!empty($resultss) && isset($resultss) ){ ?>
			<?php foreach ( $resultss as $info ) 
					{ ?>
						<?php
						$plainID = '';
						$plainName = '';
						$plainType = '';
						$plainDate = '';
						$plainExpiry = '';
						$plainPrice = '';
						$plainUsed = '';
						$plainRemains = '';
						$plainTID = '';
						
						$plainTID = $info->order_id;
						$plainID = $info->plan_id;
						$plainName = $info->plan_name;
						$plainType = $info->plan_type;
						$plainPrice = $info->currency.$info->price;
						if(!empty($info->used)){
							$plainUsed = $info->used;
							$post_ids = $info->post_id;
						}
						
						$plainDate = $info->date;
						$plainDate = strtr($plainDate, '/', '-');
						
						$days = '';
						$totalPosts = '';
						$planTIme = get_post_meta( $plainID, 'plan_time', true );
						if(!empty($planTIme)){
							$days = get_post_meta( $plainID, 'plan_time', true );
						}
						
						if(!empty($days)){
							$plainExpiry = date('Y-m-d', strtotime($plainDate. ' + '.$days. esc_html__('days','olomo')));
							$plainExpiry = date('d-m-Y', strtotime($plainExpiry));
						}
						else{
							$plainExpiry = esc_html__('Unlimited','olomo');
						}
						$planText = get_post_meta( $plainID, 'plan_text', true );
						if(!empty($planText)){
							$totalPosts = get_post_meta( $plainID, 'plan_text', true );
							$plainRemains = $totalPosts - $plainUsed;
						}
						else{
							$plainRemains = 'unlimited';
							$planText = 'unlimited';
						}
						?>
			<div class="table-responsive">
				<div class="top-area">
					<h2><?php echo esc_html($plainName); ?> <span class="active-status inactive"><?php esc_html_e('Expired','olomo'); ?></span></h2>
				</div>
				<table class="table table-striped table-bordered">
					<thead>
					  	<tr>
							<th><?php esc_html_e('Trans ID','olomo'); ?></th>
							<th><?php esc_html_e('Date','olomo'); ?></th>
							<th><?php esc_html_e('Ammount','olomo'); ?></th>
							<th><?php esc_html_e('Duration','olomo'); ?></th>
							<th><?php esc_html_e('Total Listings','olomo'); ?></th>
							<th><?php esc_html_e('Status','olomo'); ?></th>
					  	</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo esc_html($plainTID); ?></td>
							<td><?php echo esc_html($plainDate); ?></td>
							<td><?php echo esc_html($plainPrice); ?></td>
							<td><?php echo esc_html($days);?> <?php esc_html_e('Days','olomo'); ?></td>
							<td><?php echo esc_html($planText); ?></td>
							<td><?php esc_html_e('Inactive','olomo'); ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<?php } ?>
		<?php } if(empty($results) && empty($resultss) ){ ?>
                <div class="error-column">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    <h1><?php esc_html_e('Sorry','olomo'); ?></h1>
                    <h2><?php esc_html_e('You have no Active Package!','olomo'); ?></h2>
                 </div>
				<?php } ?>
		</div>
</div>