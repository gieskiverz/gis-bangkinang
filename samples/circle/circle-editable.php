<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Polygon Simple</title>
<!--link href="/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" /-->

<style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map_canvas {
  height: 100%;
}

@media print {
  html, body {
    height: auto;
  }

  #map_canvas {
    height: 650px;
  }
}

</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">



  // Create an object containing LatLng, population.
  var citymap = {};
  citymap['chicago'] = {
    center: new google.maps.LatLng(41.878113, -87.629798),
    population: 2842518
  };
  citymap['newyork'] = {
    center: new google.maps.LatLng(40.714352, -74.005973),
    population: 8143197
  };
  citymap['losangeles'] = {
    center: new google.maps.LatLng(34.052234, -118.243684),
    population: 3844829
  }
  var cityCircle;

  function initialize() {
    var mapOptions = {
      zoom: 4,
      center: new google.maps.LatLng(37.09024, -95.712891),
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };

    var map = new google.maps.Map(document.getElementById("map_canvas"),
        mapOptions);
        
    for (var city in citymap) {
      // Construct the circle for each value in citymap. We scale population by 20.
      var populationOptions = {
        strokeColor: "#FF0000",
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: "#FF0000",
        fillOpacity: 0.35,
        map: map,
        center: citymap[city].center,
        radius: citymap[city].population / 20,
        editable:true
      };
      cityCircle = new google.maps.Circle(populationOptions);
    }
  }

</script>
</head>
<body onload="initialize()">
  <div id="map_canvas"></div>
</body>
</html>
