var jquery=jQuery.noConflict();
jquery( document ).ready(function() {
	//alert("hello");
	jquery("#redux_save").click(function(){
		 var url=jquery("#app_url").val();
		 var skey=jquery("#security_key").val();
		//alert(url);
		//alert (skey);
		 var datastring = 'url='+ url + '&skey=' + skey;
		 jquery.ajax({ 
				type: "POST",
				url: "http://php.webmasterdriver.net/carforyouwp/wp-content/themes/carforyou/app_setup.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					//jquery(".modalyear").html(html);
				}
			});
		 });

});
var jquery=jQuery.noConflict();
jquery( document ).ready(function() {
	jquery("#redux_save_sticky").click(function(){
		//alert("hello");
		 var url=jquery("#app_url").val();
		 var skey=jquery("#security_key").val();
		//alert(url);
		//alert (skey);
		 var datastring = 'url='+ url + '&skey=' + skey;
		 jquery.ajax({ 
				type: "POST",
				url: "http://php.webmasterdriver.net/carforyouwp/wp-content/themes/carforyou/app_setup.php",
				data: datastring,
				cache: false,
				success: function(html)
				{
					//jquery(".modalyear").html(html);
				}
			});
		 });

});
