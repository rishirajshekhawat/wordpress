jQuery(window).load(function() {
    "use strict";
    //Blog 
    jQuery('.page-container').each(function(i){
        var $this=jQuery(this);
        var $thisInfinte=$this.find('.solitaire-infinite-scroll');
        var $currentIsotopeContainer=$this.find('.list-page-grid');
        $currentIsotopeContainer=$currentIsotopeContainer?$currentIsotopeContainer:$this;
        // Infinite
        $thisInfinte.find('a').unbind('click').bind('click',function(e){
			e.preventDefault();
			
            var $currentNextLink=jQuery(this);
            if($thisInfinte.attr('data-has-next')==='true'&&$currentNextLink.hasClass('next')){
                var $infiniteURL=$currentNextLink.attr('href');
                $thisInfinte.children('.next').hide();
                $thisInfinte.children('.loading').css( 'display', 'inline-block');
                jQuery.ajax({
                    type: "POST",
                    url: $infiniteURL,
                    success: function(response){

                        var $newElements = jQuery(response).find('#content-grids').html();
						//alert($newElements);
                        var $newURL      = jQuery(response).find('.page-container').eq(i).find('.solitaire-infinite-scroll>a.next').attr('href');
                        var $hasNext     = jQuery(response).find('.page-container').eq(i).find('.solitaire-infinite-scroll').attr('data-has-next');
                        if($newElements){
							
                            //$newElements=jQuery('<div />').append($newElements).find('.grid-box-contianer').css('opacity','0');
                            if($currentIsotopeContainer.hasClass('list-page-grid')){
                                $currentIsotopeContainer.append($newElements);
                            }else{
                                $thisInfinte.before($newElements);
                            }
                            if($hasNext==='false'){
                                $thisInfinte.attr('data-has-next','false');
                                $thisInfinte.children('.loading').hide();
                                $thisInfinte.children('.no-more').css( 'display', 'inline-block');
                            }else{
                                $currentNextLink.attr('href',$newURL);
                                $thisInfinte.children('.loading').hide();
                                $thisInfinte.children('.next').fadeIn();
                            }
                        }else{
                            $thisInfinte.attr('data-has-next','false');
                            $thisInfinte.children('.loading').hide();
                            $thisInfinte.children('.no-more') .css( 'display', 'inline-block');
                        }
                        setTimeout(function(){
                            $currentIsotopeContainer.children('.grid-box-contianer').css('opacity','1');
                            
                        },1000);
                        setTimeout(function(){
                            $currentIsotopeContainer.children('.grid-box-contianer').css('opacity','1');
                            
                        },6000);
                    }
                });
            }
        });
    });
});