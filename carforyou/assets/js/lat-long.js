function initialize() {
        var input = document.getElementById('DREAM_auto_address');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
			

        });
    }
	if(jQuery('input').is('#DREAM_auto_address')){
		google.maps.event.addDomListener(window, 'load', initialize); 
	}


// Autocomplete geo location //     
		 var autocomplete = new google.maps.places.Autocomplete(jQuery("#inputAddress")[0], {});

            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place.address_components);
            });

		
// get latitude longitude //
var geocoder = new google.maps.Geocoder();
jQuery('#inputAddress').on('change', function() {
 // alert( this.value );
var address = this.value;

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
var longitude = results[0].geometry.location.lng();
    
	jQuery('#latitude').val(latitude);
	jQuery('#longitude').val(longitude);
    } 
}); 
});




      