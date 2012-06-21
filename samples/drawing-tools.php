<!DOCTYPE html>
<html>
  <head>
    <title>Google Maps JavaScript API v3 Example: Drawing Tools Library</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <!--link href="/maps/documentation/javascript/examples/default.css"
        rel="stylesheet" type="text/css"-->


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




    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=drawing">
    </script>
    <script type="text/javascript">

var myOptions;
var map;
var drawingManager;
var infoWindow;


function initialize() {
  myOptions = {
    center: new google.maps.LatLng(-34.397, 150.644),
    zoom: 8,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById('map_canvas'),
    myOptions);

  drawingManager = new google.maps.drawing.DrawingManager({
    drawingMode: google.maps.drawing.OverlayType.MARKER,
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
        google.maps.drawing.OverlayType.MARKER,
        google.maps.drawing.OverlayType.POLYGON,
        google.maps.drawing.OverlayType.CIRCLE,
        google.maps.drawing.OverlayType.POLYLINE
        /*
        --
        [16:29:45.623] google.maps.drawing.OverlayType
        [16:29:45.629] ({MARKER:"marker", POLYGON:"polygon", POLYLINE:"polyline", RECTANGLE:"rectangle", CIRCLE:"circle"})
        */
      ]
    },
    markerOptions: {
      //icon: 'http://google-developers.appspot.com/maps/documentation/javascript/examples/images/beachflag.png'
      icon: 'beachflag.png',
      draggable: true
    },
    polygonOptions:{
      editable:true,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 3,
      fillColor: "#FF0000",
      fillOpacity: 0.35
    },
    circleOptions: {
      fillColor: '#ffff00',
      fillOpacity: 1,
      strokeWeight: 5,
      clickable: false,
      editable: true,
      zIndex: 1
    }
  });
  drawingManager.setMap(map);
  //To remove the drawing tools control from the map object:
  //drawingManager.setMap(null);


  infoWindow = new google.maps.InfoWindow();


  google.maps.event.addListener(drawingManager, 'circlecomplete', function(circle) {
    var radius = circle.getRadius();
    alert("Radius from circlecomplete" + radius);
  });


  //add event listener everytime we complete our drawing ..
  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
    if (event.type == google.maps.drawing.OverlayType.CIRCLE) {
      var radius = event.overlay.getRadius();
      var center = event.overlay.getCenter();
      alert("From overlaycomplete, Radius:"+radius); //OK
      alert("Center:"+center); //OK

      // Add a listener for the click event
      google.maps.event.addListener(event.overlay, 'click', function(e){
        alert(e);//koordinat klik
        var radius = event.overlay.getRadius();
        var center = event.overlay.getCenter();
        alert("Radius:"+radius +"\nCenter:"+center);
        /*
        var contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString += "Clicked Location: <br />Latitude:<INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude:<INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";
        contentString += "Radius:" + radius;
        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        infoWindow.setContent(contentString);

        //alert(contentString)
        infoWindow.setPosition(e.latLng);
        infoWindow.open(map);
        */
      });

    }
    if (event.type == google.maps.drawing.OverlayType.POLYGON) {
      // = event.overlay.getRadius();


      // Add a listener for the click event
      google.maps.event.addListener(event.overlay, 'click', function(e){

        var vertices = event.overlay.getPath();
        var contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString += "Clicked Location: <br />Latitude:<INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude:<INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";

        // Iterate over the vertices.
        for (var i =0; i < vertices.length; i++) {
          var xy = vertices.getAt(i);
          contentString += "<br />" + " " + i + "<INPUT TYPE='text' ID='v"+i+"' VALUE='" + xy.lat() +"," + xy.lng()+"'>";
        }


        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        infoWindow.setContent(contentString);

        //alert(contentString)
        infoWindow.setPosition(e.latLng);
        infoWindow.open(map);
      });

    }
  });

}

google.maps.event.addDomListener(window, 'load', initialize);









    </script>
  </head>
  <body>
    <div id="map_canvas"></div>
  </body>
</html>
