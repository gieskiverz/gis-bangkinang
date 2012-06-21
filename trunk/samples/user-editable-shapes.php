<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps JavaScript API v3 Example: User-editable Shapes</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
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

function initialize() {
  var myOptions = {
    center: new google.maps.LatLng(44.5452, -78.5389),
    zoom: 9,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById('map_canvas'),
    myOptions);

  var bounds = new google.maps.LatLngBounds(
    new google.maps.LatLng(44.490, -78.649),
    new google.maps.LatLng(44.599, -78.443)
  );

  var rectangle = new google.maps.Rectangle({
    bounds: bounds,
    editable: true
  });

  rectangle.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

</script>
  </head>
  <body>
    <div id="map_canvas"></div>
  </body>
</html>