<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="heading"></div>


    <!--The div element for the map -->
    <div class="container-fluid ">
    <div class="row">
    <div class="col-md-4 sections-wrapper">
    <ul class="sections-list">
    <li class="title-item">POIs</li>
    </ul>
    </div>

<div class="col-md-8 map-wrapper">
 <div style="width:100%;height:700px;" class="map wow fadeIn" id="map"></div>
    <div id="capture"></div>
</div>

    </div>
    </div>
   
    <script>
 var map;
    window.load=function(){
        
    }
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 33.5408353, lng: 35.5687317};
  // The map, centered at Uluru
   map = new google.maps.Map(
      document.getElementById('map'), {zoom: 14, center: uluru});
     
  // The marker, positioned at Uluru
  //var marker = new google.maps.Marker({position: uluru, map: map});


//   var directionsService = new google.maps.DirectionsService();
//          var directionsDisplay = new google.maps.DirectionsRenderer();
    
//          var map = new google.maps.Map(document.getElementById('map'), {
//            zoom:7,
//            mapTypeId: google.maps.MapTypeId.ROADMAP
//          });
        
//          directionsDisplay.setMap(map);
//          directionsDisplay.setPanel(document.getElementById('panel'));
    
//          var request = {
//            origin: 'Chicago', 
//            destination: 'New York',
//            travelMode: google.maps.DirectionsTravelMode.DRIVING
//          };
    
//          directionsService.route(request, function(response, status) {
//            if (status == google.maps.DirectionsStatus.OK) {
//              directionsDisplay.setDirections(response);
//            }
//          });
}
    </script>
    <!--Load the API from the specified URL
    * The async attribute allows the browser to render the page while the API loads
    * The key parameter will contain your own API key (which is not needed for this tutorial)
    * The callback parameter executes the initMap() function
    -->
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBd8QfarL-Hx3vD4JTKeJN4xMY02GtJJik&callback=initMap">
    </script>
    
    
 