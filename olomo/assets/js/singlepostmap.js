$siteURL = $('#page').data("site-url");

$lat = $('.singlebigmaptrigger').data("lat");


$lan = $('.singlebigmaptrigger').data("lan");


"use strict";


if($lan != '' && $lat != ''){


function init(){var e={zoom:11,scrollwheel:!1,center:new google.maps.LatLng($lat,$lan),styles:[{featureType:"administrative",elementType:"labels.text.fill",stylers:[{color:"#444444"}]},{featureType:"landscape",elementType:"all",stylers:[{color:"#f2f2f2"}]},{featureType:"poi",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"road",elementType:"all",stylers:[{saturation:-100},{lightness:45}]},{featureType:"road.highway",elementType:"all",stylers:[{visibility:"simplified"}]},{featureType:"road.arterial",elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"all",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"all",stylers:[{color:"#b7ecf0"},{visibility:"on"}]}]},l=document.getElementById("singlepostmap"),t=new google.maps.Map(l,e);new google.maps.Marker({position:new google.maps.LatLng($lat,$lan),icon:""+$siteURL+"wp-content/themes/olomo/assets/images/pins/pin.png",map:t,title:"Snazzy!"})}google.maps.event.addDomListener(window,"load",init);


}