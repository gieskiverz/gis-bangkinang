<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Google Maps JavaScript API v3 Example: Polyline Complex</title>
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

  var poly;
  var map;

  function initialize() {
    var chicago = new google.maps.LatLng(41.879535, -87.624333);
    var bangkinang = new google.maps.LatLng(0.344293, 101.029);
    var myOptions = {
      //zoom: 7,
      zoom: 18, //zoom di Bangkinang agar lebih besar
      //center: chicago,
      center: bangkinang,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById('map_canvas'), myOptions);

    var polyOptions = {
      strokeColor: '#000000',
      strokeOpacity: 1.0,
      strokeWeight: 3
    }
    poly = new google.maps.Polyline(polyOptions);
    poly.setMap(map);

    // Add a listener for the click event
    google.maps.event.addListener(map, 'click', addLatLng);
  }

  /**
   * Handles click events on a map, and adds a new point to the Polyline.
   * @param {MouseEvent} mouseEvent
   */
  function addLatLng(event) {


/*
A polyline specifies a series of coordinates as an array of LatLng objects. To retrieve these coordinates, call the Polyline's getPath(), which will return an array of type MVCArray. As such, you can manipulate and inspect the array using the following operations:

    getAt() returns the LatLng at a given zero-based index value.
    insertAt() inserts a passed LatLng at a given zero-based index value. Note that any existing coordinates at that index value are moved forward.
    removeAt() removes a LatLng at a given zero-based index value.

Note: you cannot simply retrieve the ith element of an array by using the syntax mvcArray[i]; you must use mvcArray.getAt(i).
*/
    var path = poly.getPath();

    // Because path is an MVCArray, we can simply append a new coordinate
    // and it will automatically appear
    path.push(event.latLng);

    // Add a new marker at the new plotted point on the polyline.
    var marker = new google.maps.Marker({
      position: event.latLng,
      title: '#' + path.getLength()+'('+event.latLng.lat()+','+event.latLng.lng()+')',
      map: map
    });

  }


  //poly.getPath().getLength()
  //poly.getPath().getAt(1).lat()
  /*
  --
  [15:15:52.870] poly.getPath().getAt(1).lat()
  [15:15:52.873] 0.3461892873479359
  --
  [15:16:30.717] poly.getPath().getAt(1).lng()
  [15:16:30.720] 101.02685959720611
  */
</script>
</head>
<body onload="initialize()">
  <div id="map_canvas"></div>
</body>
</html>
