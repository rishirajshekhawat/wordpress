jQuery(document).ready(function($) {
	'use strict';
	var inputField = jQuery('.dropdown_fields');

	var inputTagField = jQuery('#s_tag');

	var inputCatField = jQuery('#s_cat');

	var myDropDown = jQuery("#input-dropdown");

	var myDropDown1 = jQuery("#input-dropdown ul li");

	var myDropOption = jQuery('#input-dropdown > option');

	var html = jQuery('html');

	var select = jQuery('.dropdown_fields, #input-dropdown > option');

	var lps_tag = jQuery('.s-tag');

	var lps_cat = jQuery('.s-cat');



    var length = myDropOption.length;

    inputField.on('click', function(event) {

		myDropDown.attr('size', length);

		myDropDown.css('display', 'block');		

	});

	

    jQuery(document).on('click', '#input-dropdown ul li', function(event) {

		

        myDropDown.attr('size', 0);

        var dropValue =  jQuery(this).text();

        var tagVal =  jQuery(this).data('tagid');

        var catVal =  jQuery(this).data('catid');

        var moreVal =  jQuery(this).data('moreval');

        inputField.val(dropValue);

        inputTagField.val(tagVal);

        inputCatField.val(catVal);

		if( tagVal==null && catVal==null && moreVal!=null){

			inputField.val(moreVal);

		}

        jQuery("form i.cross-search-q").css("display","block");

        myDropDown.css('display', 'none');

    });



    html.on('click', function(event) {

		//event.preventDefault();

        myDropDown.attr('size', 0);

         myDropDown.css('display', 'none');

	});



    select.on('click', function(event) {

		event.stopPropagation();

	});

	var resArray = [];

	var bufferedResArray = [];

	var prevQString = '?';

	

	inputField.bind('change paste keyup', function(){

		

		$this = jQuery(this);

		var qString = this.value;

		

		prevQuery = $this.data('prev-value');

		$this.data( "prev-value", qString.length );

		

		

		if(qString.length==0){

			

			defCats = jQuery('#def-cats').html();

			myDropDown.css('display', 'none');

			jQuery("#input-dropdown ul").empty();

			

			jQuery("#input-dropdown ul").append(defCats);

			myDropDown.css('display', 'block');

			$this.data( "prev-value", qString.length );

			

		}

		else if( (qString.length==1 && prevQString!=qString) || (qString.length==1 && prevQuery < qString.length) ){

			

						myDropDown.css('display', 'none');

						jQuery("#input-dropdown ul").empty();

						resArray = [];

					jQuery("form i.cross-search-q").css("display","none");

					jQuery("img.loadinerSearch").css("display","block");

					jQuery.ajax({

						type: 'POST',

						dataType: 'json',

						url: ajax_search_term_object.ajaxurl,

						data: { 

							'action': 'olomo_suggested_search', 

							'tagID': qString, 

							},

						success: function(data){

							if(data){

									if(data.suggestions.tag|| data.suggestions.tagsncats || data.suggestions.cats || data.suggestions.titles){

											

											if(data.suggestions.tag){

													jQuery.each(data.suggestions.tag, function(i,v) {

														resArray.push(v);

													});





											}

											if(data.suggestions.tagsncats){

													jQuery.each(data.suggestions.tagsncats, function(i,v) {

														resArray.push(v);

													});



											}

												

											if(data.suggestions.cats){

												jQuery.each(data.suggestions.cats, function(i,v) {

														

														resArray.push(v);

													

													});

													

												if(data.suggestions.tag==null && data.suggestions.tagsncats==null && data.suggestions.titles==null ){

													resArray = resArray;

												}

												else{



												}

												

											}

											

											if(data.suggestions.titles){

												jQuery.each(data.suggestions.titles, function(i,v) { 		

													

														resArray.push(v);

													

												});



											}

										

									}

									else{

											if(data.suggestions.more){

												jQuery.each(data.suggestions.more, function(i,v) {

													resArray.push(v);

												});

											

										}

									}

									

									prevQString = data.tagID;

									

									jQuery('img.loadinerSearch').css('display','none');

									if(jQuery('form #select').val() == ''){

										jQuery("form i.cross-search-q").css("display","none");

									}

									else{

										jQuery("form i.cross-search-q").css("display","block");

									}



									bufferedResArray = resArray;

									filteredRes = [];

									qStringNow = jQuery('.dropdown_fields').val();

									jQuery.each( resArray, function( key, value ) {

										

										if(jQuery(value).find('a').length=="1"){

											rText = jQuery(value).find('a').text();

										}

										else{

											rText = jQuery(value).text();

										}

										

										if (rText.substr(0, qStringNow.length).toUpperCase() == qStringNow.toUpperCase()) {

											filteredRes.push(value);

										}

										

									});

									

									if( filteredRes.length > 0){

										myDropDown.css('display', 'none');

										jQuery("#input-dropdown ul").empty();

										

										jQuery("#input-dropdown ul").append(filteredRes);

										myDropDown.css('display', 'block');

										$this.data( "prev-value", qString.length );

										

									}

									

									else if( filteredRes.length < 1 && qStringNow.length < 2){

										myDropDown.css('display', 'none');

										jQuery("#input-dropdown ul").empty();

										$mResults = '<strong>More results for </strong>';

										$mResults = $mResults+qString;

										var defRes = '<li class="wrap-more-results" data-moreval="'+qString+'">'+$mResults+'</li>';

										newResArray.push(defRes);

										jQuery("#input-dropdown ul").append(newResArray);

										myDropDown.css('display', 'block');

										$this.data( "prev-value", qString.length );

									}									

								}

							}

						

					});

		}



		else{

			newResArray = [];

			myDropDown.css('display', 'none');

			jQuery("#input-dropdown ul").empty();

			jQuery.each( bufferedResArray, function( key, value ) {

			  var stringToCheck = jQuery(value).find('span').first().text();

			  if (stringToCheck.substr(0, qString.length).toUpperCase() == qString.toUpperCase()) {

					newResArray.push(value);

			  }

			});

			if(newResArray.length == 0){

				$mResults = '<strong>More results for </strong>';

				$mResults = $mResults+qString;

				var defRes = '<li class="wrap-more-results" data-moreval="'+qString+'">'+$mResults+'</li>';

				newResArray.push(defRes);

			}

			jQuery("#input-dropdown ul").append(newResArray);

			myDropDown.css('display', 'block');

		}

	});

    

});



jQuery(document).ready(function($){

	jQuery(document).on('click', '.add-to-fav',function(e) {

		e.preventDefault() 

		$this = jQuery(this);

		$this.find('i').addClass('fa-spin fa-spinner');

		var val = jQuery(this).data('post-id');

		var type = jQuery(this).data('post-type');

			jQuery.ajax({

				type: 'POST',

				dataType: 'json',

				url: ajax_search_term_object.ajaxurl,

				data: { 

					'action': 'olomo_add_favorite', 

					'post-id': val, 

					'type': type,

					},

				success: function(data) {

					if(data){

						if(data.active == 'yes'){

							$this.find('i').removeClass('fa-spin fa-spinner');

							if(data.type == 'grids' || data.type == 'list'){

							var successText = $this.data('success-text');

							$this.find('span').text(successText);

							//alert($this.find('i'));

							$this.find('.fa').removeClass('fa-bookmark-o');

							$this.find('.fa').addClass('fa-bookmark');

							}else{

								var successText =$this.data('success-text');

								$this.find('span').text(successText);

								$this.find('i').removeClass('fa-bookmark-o');

								$this.find('i').addClass('fa-bookmark');

							}				

						}				

					}

				  } 

			});

	});

	

	jQuery(".remove-fav").click(function(e) {

			e.preventDefault() 

			var val = jQuery(this).data('post-id');

			jQuery(this).find('i').removeClass('fa-close');

			jQuery(this).find('i').addClass('fa-spinner fa-spin');

			$this = jQuery(this);

				jQuery.ajax({

					type: 'POST',

					dataType: 'json',

					url: ajax_search_term_object.ajaxurl,

					data: { 

						'action': 'olomo_remove_favorite', 

						'post-id': val, 

						},

					success: function(data) {

						if(data){

							if(data.remove == 'yes'){

								$this .parent( ".bookmark-listing" ).fadeOut();

							}

						}

					  }

				});				

	});

});