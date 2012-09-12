<!--  Rute Perjalanan Monday, July 30, 2012 3:45:51 PM -->

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Rute Perjalanan</title>
    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/routeboxer/src/RouteBoxer.js"
	type="text/javascript"></script>
	<link href="dock-menu/style.css" rel="stylesheet" type="text/css" />
	<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
		<script type="text/javascript" src="search.js"></script>
    <script type="text/javascript">
  

  var map = null;
    var boxpolys = null;
    var directions = null;
    var routeBoxer = null;
    var distance = null; // km
    
    function initialize() {
      // Default the map view to the continental U.S.
      var mapOptions = {
        center: new google.maps.LatLng(0.33731939257375365,101.02444476137703),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        zoom: 15
      };
      
      map = new google.maps.Map(document.getElementById("map"), mapOptions);
      routeBoxer = new RouteBoxer();
      
      directionService = new google.maps.DirectionsService();
      directionsRenderer = new google.maps.DirectionsRenderer({ map: map });      
    }
    
    function route() {
      // Clear any previous route boxes from the map
      /*clearBoxes();*/
      
      // Convert the distance to box around the route from miles to km
      //distance = parseFloat(document.getElementById("distance").value) * 1.609344;
      
      var request = {
        origin: document.getElementById("from").value,
        destination: document.getElementById("to").value,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
      }
      
      // Make the directions request
      directionService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          directionsRenderer.setDirections(result);
          
          // Box around the overview path of the first route
          var path = result.routes[0].overview_path;
          var boxes = routeBoxer.box(path, distance);
          /*drawBoxes(boxes);*/
        } else {
          alert("Rute tidak bisa ditemukan : " + status);
        }
      });
    }
    
    // Draw the array of boxes as polylines on the map
    /*function drawBoxes(boxes) {
      boxpolys = new Array(boxes.length);
      for (var i = 0; i < boxes.length; i++) {
        boxpolys[i] = new google.maps.Rectangle({
          bounds: boxes[i],
          fillOpacity: 0,
          strokeOpacity: 1.0,
          strokeColor: '#000000',
          strokeWeight: 1,
          map: map
        });
      }
    }
    
    // Clear boxes currently on the map
    function clearBoxes() {
      if (boxpolys != null) {
        for (var i = 0; i < boxpolys.length; i++) {
          boxpolys[i].setMap(null);
        }
      }
      boxpolys = null;
    }*/
  </script>



  <style>

  body{
	background: #66cccc url(dock-menu/images/main-bg.gif);
    #map {
      border: 1px solid black;
    }

    #controls {
      font-family: sans-serif;
      font-size: 11pt;
      margin-top: 10px;
      margin-left: 20px;
  </style>
  </head>

  <body onload="initialize();">
    <div id="map" style="width: 100%; height: 420px;"></div>
	<br>
    <div id="controls">
   <center>
    <!-- <b type="text" id="distance"> -->
  Awal Perjalanan
    <input type="text" id="from" size="20"  value="Jalan Pelajar, Bangkinang Barat"/>
    Akhir Perjalanan
    <input type="text" id="to" size="20"  value="Jalan Agus Salim, Bangkinang Barat"/>
    <input type="submit" value="Tampil" onclick="route()"/>
	 </center>
    </div>
<br><br>
	<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
<?php
include "dock-menu/css-dock-top.html";
?>

  </body>
</html>