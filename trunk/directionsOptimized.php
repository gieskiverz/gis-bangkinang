<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>Jenis Perjalanan</title>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<link href="dock-menu/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="directions.js"></script>
	<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
		<script type="text/javascript" src="search.js"></script>

<script type="text/javascript"></script>
 
</head>

<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
<?php
include "dock-menu/css-dock-top.html";
?>
<style type="text/css">
  body {
	background: #66cccc url(dock-menu/images/main-bg.gif);
   
  }
  </style>
<body onload="initialize()" style="font-family: sans-serif;">

   <br><br><br><br>
     <type id="optimize" checked />


			Pilih Kategori
     
        <select id="mode" onchange="updateMode()">
          <option value="driving">Berkendaraan</option>
          <option value="walking">Berjalan Kaki</option>
		   <option value="bicycling">Bersepeda</option>
        </select>
      
 
   
     <!-- <input type="" id="highways" checked />Avoid highways -->
     <input type="button" id="highways"  value="Clear" onclick="reset()" />
 
   
     <!-- <input type="" id="tolls" checked />Avoid tolls -->
     <input type="button" id="tolls"  value="Go!" onclick="calcRoute()" />

    
 <br><br>

  <div style="position:relative; border: 1px; width: 610px; height: 400px;">
    <div id="map_canvas" style="border: 1px solid black; position:absolute; width:778px; height:500px"></div>
    <div id="directionsPanel" style="position:absolute; left:780px; width:240px; height:400px; overflow: auto"></div>
  </div>

</body>
</html>

