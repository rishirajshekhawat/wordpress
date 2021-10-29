<?php 
/**
 * Footer template for our theme
 *
 * @package WordPress
 * @subpackage carforyou
 * @since carforyou 2.5
 */ 

carforyou_populerbrand(); 
?>
<!--Footer -->
<?php carforyou_footer(); ?>
<!-- /Footer--> 
<!--Back to top-->
<?php 

$back_to_home = carforyou_get_option('footer_botton_back_to_top');  
if($back_to_home=='1'|| $back_to_home==''): ?>
<div id="back-top" class="back-top"> 
	<a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> 
</div>
<?php endif; ?>
<!--/Back to top--> 
<div style="display:none;">
    <div id="siderwidth1"></div>
    <div id="siderwidth2"></div>
    <div id="siderwidth3"></div>
    <div id="siderwidth4"></div>
    <div id="siderwidth5"></div>
    <div id="siderwidth6"></div>
</div>
<?php carforyou_footer_bottom(); ?>
<?php  wp_footer(); ?>
<script>
$ = jQuery;
$(".resatecompare").click(function(){
	$.ajax({ 
      data: {
		  action:'MyAjaxDelete', 
		  security: '<?php echo wp_create_nonce("ajaxdelete"); ?>',
		  'test':'delete'
		  },
        type: 'post',
	 url: "<?php echo esc_url(home_url()); ?>/wp-admin/admin-ajax.php",
	  success: function(data)
	  {
		//alert(data);  
	  }
	 });
	$("#countProduct").text("0");
	$(".removdata").html('<li class="vs_model"><span class="allID" id="im1" ></span><a href="javascript();"><img id="pro_img_1" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="auto-img" class="img-responsive im1"></a></li><li class="vs_model "><span class="allID" id="im2" ></span><a href="javascript();"><img id="pro_img_2" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="auto-img" class="img-responsive im2"></a></li><li class="vs_model "><span class="allID" id="im3" ></span><a href="javascript();"><img id="pro_img_3" src="<?php echo get_template_directory_uri(); ?>/assets/images/auto-img.png" alt="auto-img" class="img-responsive im3"></a></li>');
	$(".hidden").html('<input id="p1" name="p1" value=""/><input id="p2" name="p2" value=""/><input id="p3" name="p3" value=""/>');
	//document.getElementById('#productCompareForm').reset();
	
});
$("body").delegate(".allID" ," click", function(e){
	e.preventDefault();
	
	var thisID = $(this).attr("dat-id");
	var cookid = $(this).attr("cook-id");
	
	var ctext = $("#countProduct").text();
	var ntext = ctext - 1;
	var ID = $(this).attr("id");
	$.ajax({ 
      data: {
		  action:'MYDELETEFUNCTION', 
		  'DeletID':thisID,
		  'cookid':cookid
		  },
        type: 'post',
	  
     url: "<?php echo admin_url('admin-ajax.php'); ?>",
	  success: function(data)
	  {
		  //alert(data);
		  if(ID == "im1"){
			 $("#p1").val("");
			  
		  }else if(ID == "im2"){
			 $("#p2").val("");
			  
		  }
		  else if(ID == "im3"){
			 $("#p3").val("");
			  
		  }
		  $("#countProduct").text(ntext);
		  
		  $("."+ID).attr("src" , "http://themes.webmasterdriver.net/carforyouwp/wp-content/themes/carforyou/assets/images/auto-img.png");
		   $("#"+ID).text("");
		   $("."+ID).attr("value" , "");
		   $("#"+ID).removeClass("closes");
	  }
	});
	
});
</script>


</body>
</html>