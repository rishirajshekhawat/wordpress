<?php
global $olomo_options;
$authorURL = $olomo_options['listing-author'];
 ?>
<div id="titlebar">
    <div class="row">
        <div class="col-md-12">
            <h2><?php esc_html_e('Order History','olomo');?></h2>
            <!-- Breadcrumbs -->
            <nav id="breadcrumbs">
                <ul>
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','olomo'); ?></a></li>
                    <li><a href="<?php echo esc_url($authorURL); ?>"><?php esc_html_e('Dashboard','olomo'); ?></a></li>
                    <li><?php esc_html_e('Order History','olomo'); ?></li>
                </ul>
            </nav>
        </div>
    </div>
</div> 
<div class="packages">
		<div class="active-packages-area">
			<?php 
				global $user_id;
				$results = get_invoices_list($user_id, '', 'success');
			?>
			<?php if( count($results) > 0 ){  ?>
				<?php $n=1; ?>                
				<?php foreach( $results as $data ){ ?>
					<div class="listing-order-section">
						<table class="wp-list-table widefat fixed striped posts">
							<thead>
								<tr>
									<th><?php esc_html_e('No.','olomo'); ?></th>
									<th><?php esc_html_e('Order#','olomo'); ?></th>
									<th><?php esc_html_e('Method','olomo'); ?></th>
									<th><?php esc_html_e('Plan','olomo'); ?></th>
									<th><?php esc_html_e('Price','olomo'); ?></th>
									<th><?php esc_html_e('Date','olomo'); ?></th>
									<th><?php esc_html_e('Days','olomo'); ?></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo esc_html($n); ?></td>
									<td><?php echo esc_html($data->order_id); ?></td>
									<td><?php echo esc_html($data->payment_method); ?></td>
									<td><?php echo esc_html($data->plan_name); ?></td>
									<td><?php echo esc_html($data->price.$data->currency); ?></td>
									<td><?php echo esc_html($data->date); ?></td>
                                    <?php if($data->days==''):?>
									<td><?php esc_html_e('Unlimited','olomo'); ?></td>
									<?php else:?>
									<td><?php echo esc_html($data->days); ?></td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
					</div>
					<?php $n++; ?>
				<?php } ?>
			<?php  }  ?>
			<?php if(empty($results) || count($results) <= 0){ ?>

               <div class="error-column">
                <i class="fa fa-frown-o" aria-hidden="true"></i><p></p>
                <h1><?php esc_html_e('Sorry!','olomo'); ?></h1>
                <h4><?php esc_html_e('There is no Order generated!','olomo'); ?></h4>
          </div>     
           <?php } ?>
	</div>
</div>