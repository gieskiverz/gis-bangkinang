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


  var map;
  var infoWindow;
  var bermudaTriangle;

  function initialize() {
    var myLatLng = new google.maps.LatLng(24.886436490787712, -70.2685546875);
    var myOptions = {
      zoom: 5,
      center: myLatLng,
      mapTypeId: google.maps.MapTypeId.TERRAIN
    };


    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);

    var triangleCoords = [
        new google.maps.LatLng(25.774252, -80.190262),
        new google.maps.LatLng(18.466465, -66.118292),
        new google.maps.LatLng(32.321384, -64.75737)
    ];

    bermudaTriangle = new google.maps.Polygon({
      paths: triangleCoords,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 3,
      fillColor: "#FF0000",
      fillOpacity: 0.35
    });

    bermudaTriangle.setMap(map);
    
    // Add a listener for the click event
    google.maps.event.addListener(bermudaTriangle, 'click', showArrays);
    
    infoWindow = new google.maps.InfoWindow();
  }

  function showArrays(event) {

    // Since this Polygon only has one path, we can call getPath()
    // to return the MVCArray of LatLngs
    var vertices = this.getPath();

    var contentString = "<b>Bermuda Triangle Polygon</b><br />";
    contentString += "Clicked Location: <br />" + event.latLng.lat() + "," + event.latLng.lng() + "<br />";

    // Iterate over the vertices.
    for (var i =0; i < vertices.length; i++) {
      var xy = vertices.getAt(i);
      contentString += "<br />" + "Coordinate: " + i + "<br />" + xy.lat() +"," + xy.lng();
    }

    // Replace our Info Window's content and position
    infoWindow.setContent(contentString);

    //set position where user click it
    infoWindow.setPosition(event.latLng);

    infoWindow.open(map);
  }  

//bermudaTriangle.getPath().length
//3

/*

--
[15:36:41.819] bermudaTriangle.getPath().getAt(1)
[15:36:41.822] ({$a:18.466465, ab:-66.118292})
--
[15:36:49.058] bermudaTriangle.getPath().getAt(1).lat()
[15:36:49.062] 18.466465
--
[15:36:54.386] bermudaTriangle.getPath().getAt(1).lng()
[15:36:54.389] -66.118292


*/

</script>
</head>
<body onload="initialize()">
  <div id="map_canvas"></div>
</body>
</html>
