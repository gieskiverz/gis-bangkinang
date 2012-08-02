<!DOCTYPE html>
<html>
  <head>
    <title>Polyline & Drawing </title>
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
var infoWindow;
var currentPolyline;
var currentPolygon;


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
function removePolylineVertice(vertice){
  currentPolyline.getPath().removeAt(vertice);
  infoWindow.close();
}
function removePolygonVertice(vertice){
  currentPolygon.getPath().removeAt(vertice);
  infoWindow.close();
}

function initialize() {
  var bangkinang = new google.maps.LatLng(0.33731939257375365,101.02444476137703);

  myOptions = {
   
    center: bangkinang,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.HYBRID
  };

  map = new google.maps.Map(document.getElementById('map_canvas'),
    myOptions);

  drawingManager = new google.maps.drawing.DrawingManager({
   
    drawingControl: true,
    drawingControlOptions: {
      position: google.maps.ControlPosition.TOP_CENTER,
      drawingModes: [
     
        google.maps.drawing.OverlayType.POLYLINE,
		google.maps.drawing.OverlayType.POLYGON
        
      ]
    },
   
markerOptions: {
      
    },
    polygonOptions:{
      editable:true,
      strokeColor: "#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 3,
      fillColor: "#FF0000",
      fillOpacity: 0.35
    },

    polylineOptions: {
      editable:true,
	strokeColor: "#FF0000",
      strokeOpacity: 0.8,
    }
  });
  drawingManager.setMap(map);
  //To remove the drawing tools control from the map object:
  //drawingManager.setMap(null);


  infoWindow = new google.maps.InfoWindow();

  

  google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {

    if (event.type == google.maps.drawing.OverlayType.POLYGON) {
      currentPolygon = event.overlay;
      // Add a listener for the click event
      google.maps.event.addListener(event.overlay, 'click', function(e){
        currentPolygon = event.overlay;
        var vertices = event.overlay.getPath();
        var contentString = "<center><b>Clicked Location</b> <br/><br/>Latitude <br><INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\">,<br />Longitude <br><INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";

        // Iterate over the vertices.
        for (var i =0; i < vertices.length; i++) {
          var xy = vertices.getAt(i);
          contentString += "<br />Location Coordinat" + " " + i + "<a href=\"#\" onclick=removePolygonVertice("+ i+")>-</a><INPUT TYPE='text'  size='40' ID='v"+i+"' VALUE='" + xy.lat() +"," + xy.lng()+"'>";
        }
        contentString += "<br><br><b>Panjang Keliling</b> <br> "+  google.maps.geometry.spherical.computeLength(vertices) + " meter" ;
        contentString += "<br/><b>Luas Area</b><br> "+  google.maps.geometry.spherical.computeArea(vertices) + " meter persegi<center>" ;
        infoWindow.setContent(contentString);
        infoWindow.setPosition(e.latLng);
        infoWindow.open(map);
      });
    }
    
    //POLYLINE
    if (event.type == google.maps.drawing.OverlayType.POLYLINE) {
      currentPolyline = event.overlay; 
      // Add a listener for the click event
      //alert('POLYLINE created'); // OK
      google.maps.event.addListener(event.overlay, 'click', function(e){
        currentPolyline = event.overlay;
        var //contentString = "<b>Judul:</b><INPUT TYPE=\"text\" ID=\"Title\" NAME=\"Title\" VALUE=\"\"> <br />";
        contentString = "<center><b>Clicked Location </b> <br />Latitude <br><INPUT TYPE=\"text\" ID=\"Latitude\" NAME=\"Latitude\" VALUE=\"" + e.latLng.lat() 
           + "\"><br />Longitude <br><INPUT TYPE=\"text\" ID=\"Longitude\" NAME=\"Longitude\" VALUE=\""+ e.latLng.lng()  + "\"><br />";
        //contentString += "<TEXTAREA NAME=\"TextHTML\" ID=\"TextHTML\" ROWS=\"\" COLS=\"\"></TEXTAREA>";

        var vertices = event.overlay.getPath();
        // Iterate over the vertices.
        for (var i =0; i < vertices.length; i++) {
          var xy = vertices.getAt(i);
          contentString += "<br />Location Coordinat" + " " + i + " <a href=\"#\" title='Remove this Vertice' onclick=removePolylineVertice("+ i+")>-</a> <INPUT TYPE='text' size='40' ID='v"+i+"'   VALUE=" + xy.lat() +"," + xy.lng()+">";
        }

        contentString += "<br><br><b>Panjang Jalan adalah </b> <br>" + google.maps.geometry.spherical.computeLength(vertices) + " meter </center>";
;

        //contentString += "<br /><INPUT TYPE=\"button\" VALUE='Save'>";
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

    <div id="map_canvas">

	</div>

	
	<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="sidebar/includes.js"></script>
		<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
		<link href="dock-menu/polyline.css" rel="stylesheet" type="text/css" />
		<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
		<script type="text/javascript" src="search.js"></script>
		<script type="text/javascript"></script>

  <style>
  /*
  #mapCanvas {
    width: 1500px;
    height: 700px;
    float: left;
  }
  */
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }

  Body {
    font-family: Verdana, sans-serif;
    font-size: 11pt;
  }
	
  #Marker {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: auto;
    margin: auto;
    padding: 2px;	
    text-align: left;
    background:#006633;
	border: 3px solid white; 
    color: white;
    /*background-image: url(../admin/peta.jpg);*/
  }
  #Judul {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 11pt;
    text-align: center;
    background-color: #ffffff;
    border: px solid #ffffff; 
    color: black;
    padding: 4px;
    font-weight:bold;
  }



  #login {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 9pt;
    text-align: right;
    background-color: #006633;
   /*border: 2px solid #ffffff;*/
    color: white;
    padding: 4px;
    font-weight:bold;
  }
  #kotaksugest {
    font-size: 9pt;
    text-align: left;
    color: #000000;
    padding: 4px;
    font-weight:bold;
  }
 #menu {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 9pt;
    text-align: left;
    background-color: #99ffcc;
   /*border: 2px solid #ffffff; */
    color: white;
    padding: 4px;
    font-weight:bold;
  }

  .inp {
    font-size: 11pt;
    text-align: left;
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 2px;
  }
  .btn{
    border: 1px solid silver;-moz-border-radius: 6px;
    padding: 4px;
    font-weight: bold;
   background-color:#f2f2f2;
  }
  label {
	font-size: 9pt;
    color: #000000;
    font-style: ;
	 font-weight:bold;
  }
	
  </style>

				


  <!-- <div id="mapCanvas"></div> -->
  
  <div id="infoPanel">
    <div id="tempStorage" style="display:none;"></div>

    <div id="sideBar">
      <a href="#" id="sideBarTab" name="sideBarTab"><img src=
      "sidebar/assets/spacer.gif" alt="" title="" /></a>

      <div id="sideBarContents" style="display:none;">
        <div id="sideBarContentsInner">
          <div id="scrollbar_container">
            <div id="scrollbar_content">

  <div id='Marker'>
    <div id='Judul'>
   Menu
    </div>
    
  
  <!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				<?php
				include "dock-menu/polyline.html";
				?>
 

   	<!-- <div id='login'>
			<div>
				<a href="login.php"style=
				"text-decoration:none;color:#ffffff;"> Login</a> -->
				
	<br>
      <input class="inp" placeholder="Search" name="Search" title="Search" id=
      "kata" type="text" size="20" onkeyup=lihat(this.value)><br/>

		<div id=kotaksugest>
		</div>

	
			</div>

          </div>
        </div>
      </div>
    </div>
	
  </div>

  	

  </body>
</html>
