 jQuery(document).ready(function($){
// contact Listing Owner	 
	 jQuery('#contactOwner').on('submit', function(e){	
		$this = jQuery(this);
		$this.find('.search-icon').removeClass('fa-send');	
		$this.find('.search-icon').addClass('fa-spinner fa-spin');
		e.preventDefault();
		var formData = $(this).serialize();
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'olomo_contactowner', 
                'formData': formData, 
			},   
            success: function(res){
				if(res.result==="fail"){
					jQuery.each(res.errors, function (k, v) {
						if(k==="email"){
							jQuery("input[name='email7']").addClass('error-msg');
						}
						if(k==="message"){
							jQuery("textarea[name='message7']").addClass('error-msg');
						}
						if(k==="name7"){
							jQuery("input[name='name7']").addClass('error-msg');
						}
						$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
						$this.find('.search-icon').addClass('fa-cross');
					});
				}
				else{
					$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
					$this.find('.search-icon').addClass('fa-check');
					$this[0].reset();
				}
            }
        });
	 });
	 
// Mail To Friend	 
	 jQuery('#friendemail').on('submit', function(e){
		$this = jQuery(this);
		$this.find('.search-icon').removeClass('fa-send');	
		$this.find('.search-icon').addClass('fa-spinner fa-spin');
		e.preventDefault();
		var formData = $(this).serialize();
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'olomo_contactfriend', 
                'formData': formData, 
			},   
            success: function(res){
				if(res.result==="fail"){
					jQuery.each(res.errors, function (k, v) {
						if(k==="email"){
							jQuery("input[name='y_email']").addClass('error-msg');
						}
						if(k==="message"){
							jQuery("textarea[name='f_message']").addClass('error-msg');
						}
						if(k==="email"){
							jQuery("input[name='f_email']").addClass('error-msg');
						}
						if(k==="yr_name"){
							jQuery("input[name='yr_name']").addClass('error-msg');
						}
						
						$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
						$this.find('.search-icon').addClass('fa-cross');
					});
				}
				else{
					$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
					$this.find('.search-icon').addClass('fa-check');
					$this[0].reset();
				}
            }
        });
	 });
	 
	 
	 
 // Report Listing	 
	 jQuery('#reportlisting').on('submit', function(e){
		$this = jQuery(this);
		$this.find('.search-icon').removeClass('fa-send');	
		$this.find('.search-icon').addClass('fa-spinner fa-spin');
		e.preventDefault();
		var formData = $(this).serialize();
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'olomo_reportlisting', 
                'formData': formData, 
			},   
            success: function(res){
				if(res.result==="fail"){
					jQuery.each(res.errors, function (k, v) {
						if(k==="email"){
							jQuery("input[name='report_email']").addClass('error-msg');
						}
						if(k==="report_restion"){
							jQuery("input[name='report_restion']").addClass('error-msg');
						}
						if(k==="message"){
							jQuery("textarea[name='report_message']").addClass('error-msg');
						}
					
						$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
						$this.find('.search-icon').addClass('fa-cross');
					});
				}
				else{
					$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
					$this.find('.search-icon').addClass('fa-check');
					$this[0].reset();
				}
            }
        });
	 });
	 
	 
		 
// Claim Listing	 
	 jQuery('#claimlistingmail').on('submit', function(e){ 
		$this = jQuery(this);
		$this.find('.search-icon').removeClass('fa-send');	
		$this.find('.search-icon').addClass('fa-spinner fa-spin');
		e.preventDefault();
		var formData = $(this).serialize();
		jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: single_ajax_object.ajaxurl,
            data: { 
                'action': 'olomo_claimlisting', 
                'formData': formData, 
			},   
            success: function(res){ 
				if(res.result==="fail"){
					jQuery.each(res.errors, function (k, v) {
						if(k==="c_email"){
							jQuery("input[name='c_email']").addClass('error-msg');
						}
						if(k==="c_message"){
							jQuery("textarea[name='c_message']").addClass('error-msg');
						}
						if(k==="c_phone"){
							jQuery("input[name='c_phone']").addClass('error-msg');
						}
						if(k==="c_name"){
							jQuery("input[name='c_name']").addClass('error-msg');
						}
						
						$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
						$this.find('.search-icon').addClass('fa-cross');
						//$this.find('.search-icon').html(res.state);
						
					});
				}
				else{
					$this.find('.search-icon').removeClass('fa-spinner fa-spin');	
					$this.find('.search-icon').addClass('fa-check');
					//$this.find('.search-icon').html(res.state);
					$this[0].reset();
				}
            }
        });
	 });
	 
	  
	 
	 	 
 });
 
 
	 
