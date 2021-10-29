<?php
/**
 * Display the Apps & Integarations
 * @return void
 */




// Registering a new tab name
function apps_settings_tab( $tabs = array() ) {
    $tabs['addons'] = __( 'Apps & Integrations', TWL_TD  );
    return $tabs;
}
add_filter( 'twl_settings_tabs', 'apps_settings_tab' );

// Adding form to new tab
function apps_tab_content( $tab, $page_url ) {
    if( $tab != 'addons' ) {
        return;
    }
	
	//print_r('<pre>');
	//$statuses = wc_get_order_statuses();
	//print_r($statuses);
	
	

	?>


		<h3 class="apps"><?php _e( 'WPSMS Addons & Integrations', TWL_TD ); ?></h3>
		<a href="https://wpsms.io/sms-plugins/?utm_source=plugin-addons-page" class="button-primary wpsms" target="_blank"><?php _e( 'Browse All Addons', TWL_TD ); ?></a>
		<?php _e( 'Or', TWL_TD ); ?>
		<a href="https://wpsms.io/pricing/?utm_source=plugin-addons-page" class="button-primary wpsms bundle" target="_blank"><?php _e( 'Get All for $49 Only!', TWL_TD ); ?></a>
		<div class="clear"></div>
		
		<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS for WooCommerce</h3>
		<a href="https://wpsms.io/sms-plugin/wp-sms-for-woocommerce/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmswc" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/05/wpsms-product-10.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send notifications by SMS as per the orders statuses and customize the SMS for the admin and the customer.</p>
		<a href="https://wpsms.io/sms-plugin/wp-sms-for-woocommerce/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmswc" target="_blank" class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS for Contact Form 7</h3>
		<a href="https://wpsms.io/sms-plugin/wp-sms-for-contact-form-7/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmscf7" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/08/wpsms-contactform7.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send notifications to the admin when someone send a message through the website forms.</p>
		<a href="https://wpsms.io/sms-plugin/wp-sms-for-contact-form-7/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmscf7" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
		<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS Bulk SMS</h3>
		<a href="https://wpsms.io/sms-plugin/bulk-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsbulk" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-bulk.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Select the list of users and send Bulk SMS to them,Extend Twilio integration with Bulk Services.</p>
		<a href="https://wpsms.io/sms-plugin/bulk-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsbulk" target="_blank" class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS For AdForest</h3>
		<a href="https://wpsms.io/sms-plugin/adforest-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsadforest" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-adforest-1.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send instant SMS to your sellers when they are contacted via their listings contact form.</p>
		<a href="https://wpsms.io/sms-plugin/adforest-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsadforest" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS For Vantage</h3>
		<a href="https://wpsms.io/sms-plugin/vantage-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsvantage" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-vantage.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send instant SMS to your sellers when they are contacted via their listings or events.</p>
		<a href="https://wpsms.io/sms-plugin/vantage-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsvantage" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
		
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS For Classipress</h3>
		<a href="https://wpsms.io/sms-plugin/classipress-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsclassipress" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-classipress.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send instant SMS to your sellers when they are contacted via their listings contact form.</p>
		<a href="https://wpsms.io/sms-plugin/classipress-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmsclassipress" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">Event Espresso SMS Reminder</h3>
		<a href="https://wpsms.io/sms-plugin/event-espresso-sms-reminder/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmseventespresso" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-eesms.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send instant SMS to your event attendees when there the event is coming soon.</p>
		<a href="https://wpsms.io/sms-plugin/event-espresso-sms-reminder/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmseventespresso" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
			<div class="addons-container">
		<div class="wpsms-addon">
		<h3 class="addon-title">WPSMS for Easy Digital Downloads</h3>
		<a href="https://wpsms.io/sms-plugin/easy-digital-downloads-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmseed" target="_blank" >
		<img src="https://wpsms.io/wp-content/uploads/2020/06/wpsms-edd.png" class="attachment-download-grid-thumb size-download-grid-thumb wp-post-image" width="1200" height="600"></a>
		<p>Send notifications to admin and customer as per the orders statuses.</p>
		<a href="https://wpsms.io/sms-plugin/easy-digital-downloads-sms/?utm_source=plugin-addons-page&amp;utm_medium=plugin&amp;utm_campaign=wpsmsIntegrationsPage&amp;utm_content=wpsmseed" target="_blank"  class="button-secondary">Get this Extension</a>
		</div>
		</div>
		
		
		<div class="clear"></div>
		
	<?php
}
add_action( 'twl_display_tab', 'apps_tab_content', 10, 2 );
