<?php 
session_start();
include "connect.php";		 
?> 
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Bangkinang Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>	
<script type="text/javascript"></script>
  <style type="text/css">
  body {
    font-family: Verdana, sans-serif;
    font-size: 11pt;

  }

  #peta {
  height: auto;
  /*height: 400px;*/
}

@media print {
  html, body {
    height: auto;
  }

  #peta {
    height: auto;
  }
}

        /*6/17/2012 12:18:13 PM*/
  #peta {
    /*border: 1px solid silver;*/
    -moz-border-radius: 6px;
    margin: 20px auto;
	width: 780px;
    padding: 2px;  
	border-radius:15px;
	background-color: white;
    /*background:#99ffcc;
    border: 3px solid teal; */
    /*background-image: url(./syarif.jpg);*/
  }
  #Judul {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 1.1em;
    text-align: center;
    background-color: #006633;
    border: 2px solid #ffffff; 
	border-radius:15px;
    color: black;
	font-family: Arial,Helvetica,sans-serif;
	font-size: 16px;
    padding: 4px;
    /*font-weight:bold;*/
  }


/*Saturday, June 30, 2012 11:27:14 AM*/
  body {
  background-color: #333333;
  }
  #page {
  margin: auto;
  width: 900px;
  height: auto;
   /*background-color: #006633;*/
  background-image: url(login/page.png);
  text-align: center;
  background-repeat: repeat-y;
  }
  #header {
  clear: both;
  width: auto;
  height: 280px;
  /*background-image: url(login/header.png);*/
  font-family: Arial,Helvetica,sans-serif;
  font-size: 16px;
  font-weight: bold;
  color: #006633;
  text-align: center;

  }

   #footer {
  clear: both;
  width: 900px;
  height: 80px; 
  background-image: url(login/footer.png);
  font-family: Arial,Helvetica,sans-serif;
  font-size: x-small;
  color: white;
  text-align: center;
  }
  /* #window {
  width: 900px;
  height: 75px;
  font-family: Arial,Helvetica,sans-serif;
  font-size: x-small;
  color: black;
  text-align: center;*/
  }
  /*#menu {
  background-image: url(login/menu.png);
  width: 900px;
  height: 37px;
  clear: both;
  background-repeat: no-repeat;
  padding-left: 45px;
  }*/
 /*#contentarea {
  width: 900px;
  padding-top: 10px;
  clear: both;
  }*/
  /*#sidebar {
  float: left;
  padding-left: 45px;
  width: 180px;
  margin-bottom: 10px;
  }
  
  #content {
  float: right;
  text-align: justify;
  width: 500px;
  padding-right: 45px;
  }*/

 
  /*#sidebar a {
  }
  #menu a {
  font-weight: bold;
  font-family: Arial,Helvetica,sans-serif;
  font-size: 14px;
  color: black;
  }
  #menu a:hover {
  background-image: url(login/hover.png);
  background-repeat: repeat-x;
  }*/

/* Friday, July 06, 2012 3:06 PM */


html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map {
  height: 100%;
  /*height: 380px;*/
}

@media print {
  html, body {
    height: auto;
  }

  #map {
    height: 650px;
  }
}
</style>

</head>


  <div id="page">
    <div id="header">
	<!-- untuk slider Monday, July 09, 2012 10:59:06 PM -->
	<?php
	include "index2.html";
	?>
    </div>

 
        <div id='peta'>
          <div id='Judul'>
          <a href="view.php" target="_blank" style=
				"text-decoration:none;color:#ffffff;" title="Layar Penuh"> <blink> Full Screen </blink>  </a>

				<div id="map"</div>

				<body onunload="GUnload()">
   

   
    <script type="text/javascript">

    if (GBrowserIsCompatible()) {

      function createMarker(point,html) {
        var marker = new GMarker(point);

        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }
      function createMarkerWithIcon(point,icon,html) {
		// Create our "tiny" marker icon
		var blueIcon = new GIcon(G_DEFAULT_ICON);
		blueIcon.image = icon;
						
		// Set up our GMarkerOptions object
		markerOptions = { icon:blueIcon };

        var marker = new GMarker(point, markerOptions);
        GEvent.addListener(marker, "click", function() {
          marker.openInfoWindowHtml(html);
        });
        return marker;
      }
       //Monday, July 23, 2012 2:50:47 PM
      var map = new GMap2(document.getElementById("map"));
	  map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);

      // Select a map type which supports obliques
      map.setMapType(G_NORMAL_MAP);
      map.setUIToDefault();

      // Enable the additional map types within
      //the map type collection
      map.enableRotation();
    
	/*var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);*/
    


	<?php
	//$sql =  "select * from marker where 1;";
	$sql = "SELECT * FROM `marker` INNER JOIN `type` ON marker.typeID = type.typeID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
      var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['Icon'];?>",'<center>== <?php echo $data['Title'];?> ==</center> <br/> <?php echo $data['TextHTML'];?> <br/><br/><br/><?php echo $data['Photo'];?> <br/>')
		  
      map.addOverlay(marker);
	<?php
	}
	?>

    }

    
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    </script>


		 </div>
        </div>
      </div>

      <div id="footer">
        <br />
        Power by <a href="http://syarif25.tk" style=
				"text-decoration:none;color:#fff;" target="_blank"> deyen 2012
   
    </div>
  </div>
</body>
</html>