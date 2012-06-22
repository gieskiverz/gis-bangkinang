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


function updateMarkerPosition(latLng) {
  document.getElementById('Latitude').value = latLng.lat();
  document.getElementById('Longitude').value = latLng.lng();
}
function updateRadius(latLng){
  document.getElementById('Radius').value = latLng;
}
function updateInput(inputID,newValue){
  document.getElementById(inputID).value = newValue;
}

function initialize() {
  var bangkinang = new google.maps.LatLng(0.344293, 101.029);

  myOptions = {
    //center: new google.maps.LatLng(-34.397, 150.644),
    center: bangkinang,
    zoom: 14,
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
      //clickable: false,
      editable: true,
      zIndex: 1
    },
    polylineOptions: {
      editable:true
    }
  });
  drawingManager.setMap(map);
  //To remove the drawing tools control from the map object:
  //drawingManager.setMap(null);


  infoWindow = new google.maps.InfoWindow();

  /*
  //TODO:
  //permasalahan saat ini: Thursday, 21 June 2012 10:18:41 AM
  // circlecomplete ini jalan, tapi khusus untuk lingkaran tidak bisa addListener
  //UPDATE:
  //Thursday, 21 June 2012 10:58:53 AM
  // TERNYATA TIDAK BISA DI CLICK KARENA DI BARIS 92 DITAMBAHKAN CLICKABLE: FALSE
  //sekarang sudah bisa di click ...
  //tapi masih error tidak bisa keluar infoWindownya ...
  //UPDATE Thursday, 21 June 2012 11:25:46 AM
  //TERNYATA SUDAH BISA KELUAR ... KESALAHANNYA KARENA INFOWINDOW.SETPOSITION DAN OPEN NYA PERLU DI UTAK ATIK
  google.maps.event.addListener(drawingManager, 'circlecomplete', function(circle) {
    var radius = circle.getRadius();
    alert("Radius from circlecomplete" + radius);
  });
  */

  //add event listener everytime we complete our drawing ..
  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
    if (event.type == google.maps.drawing.OverlayType.CIRCLE) {
      //alert("From overlaycomplete, Radius:"+radius); //OK
      //alert("Center:"+center); //OK

      // Add a listener for the click event
      google.maps.event.addListener(event.overlay, 'click', function(e){
        var radius = event.overlay.getRadius();
        var center = event.overlay.getCenter();
        //alert(e);//koordinat klik
        //alert("Radius:"+radius +"\nCenter:"+center); 
        //alert( e.latLng.lat() +','+ e.latLng.lng()); //ok .. tetapi kenapa tidak bisa bikin infoWindow ya?

        var contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString += "Clicked Location: <br />Latitude:<INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude:<INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";
        contentString += "Radius: <INPUT TYPE=\"text\" ID=\"Radius\" NAME=\"Radius\" VALUE=\"" + radius +"\"><br />";
        contentString += "Center: <INPUT TYPE=\"text\" ID=\"Center\" NAME=\"Center\" VALUE=\"" + center +"\"><br />";
        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        infoWindow.setContent(contentString);

        //alert(contentString)
        infoWindow.setPosition(e.latLng);
        infoWindow.open(map);
        
      });

      //jika lingkaran di ubah, event nya adalah bounds_changed, bukan drag
      google.maps.event.addListener(event.overlay, 'bounds_changed', function() {
        updateInput('Center',event.overlay.getCenter());
        updateInput('Radius',event.overlay.getRadius());
      });
      




    }
    if (event.type == google.maps.drawing.OverlayType.POLYGON) {
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
        contentString += "<br />Panjang Keliling: "+  google.maps.geometry.spherical.computeLength(vertices) + " meter" ;
        contentString += "<br />Luas Area: "+  google.maps.geometry.spherical.computeArea(vertices) + " meter persegi" ;
        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        infoWindow.setContent(contentString);
        infoWindow.setPosition(e.latLng);
        infoWindow.open(map);
      });
    }

    if (event.type == google.maps.drawing.OverlayType.MARKER) {
      // Add a listener for the click event
      google.maps.event.addListener(event.overlay, 'click', function(e){

        var contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString += "Clicked Location: <br />Latitude:<INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude:<INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";
        contentString += "<TEXTAREA NAME=\"TextHTML\" ID=\"TextHTML\" ROWS=\"\" COLS=\"\"></TEXTAREA>";
        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        infoWindow.setContent(contentString);

        //alert(contentString)
        //infoWindow.setPosition(e.latLng);
        infoWindow.open(map,event.overlay);
      });

      // Add dragging event listeners.
      google.maps.event.addListener(event.overlay, 'dragstart', function() {
        //updateMarkerAddress('Sedang digeser...!!!');
      });
      
      google.maps.event.addListener(event.overlay, 'drag', function() {
        //updateMarkerStatus('Sedang digeser...!!!');
        updateMarkerPosition(event.overlay.getPosition());
      });
      
      google.maps.event.addListener(event.overlay, 'dragend', function() {
        //updateMarkerStatus('Drag ended');
        //geocodePosition(marker.getPosition());
        //updateZoomLevelStatus(map.zoom);
      });

    }

    //POLYLINE
    if (event.type == google.maps.drawing.OverlayType.POLYLINE) {
      // Add a listener for the click event
      //alert('POLYLINE created'); // OK
      google.maps.event.addListener(event.overlay, 'click', function(e){
      
        var contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString += "Clicked Location: <br />Latitude:<INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude:<INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";
        contentString += "<TEXTAREA NAME=\"TextHTML\" ID=\"TextHTML\" ROWS=\"\" COLS=\"\"></TEXTAREA>";

        var vertices = event.overlay.getPath();
        // Iterate over the vertices.
        for (var i =0; i < vertices.length; i++) {
          var xy = vertices.getAt(i);
          contentString += "<br />" + " " + i + "<INPUT TYPE='text' ID='v"+i+"' VALUE='" + xy.lat() +"," + xy.lng()+"'>";
        }

        contentString += "<br />Panjang: " + google.maps.geometry.spherical.computeLength(vertices) + " meter";
;

        contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
        //alert(contentString);
        infoWindow.setContent(contentString);
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
