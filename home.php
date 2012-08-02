<?php 
session_start();
include "connect.php";		 
?> 
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Bangkinang Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>	
<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
<script type="text/javascript" src="search.js"></script>
<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
<link href="dock-menu/stylehome.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"></script>
  <style type="text/css">
  body {
	 background: url(dock-menu/images/main-bg.gif);
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
    border: 2px solid #b6a6a6; 
	border-radius:15px;
    color: black; 
	font-family: Arial,Helvetica,sans-serif;
	font-size: 16px;
    padding: 4px;
    /*font-weight:bold;*/
  }
   #search {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 1.1em;
    text-align: left;
    background-color: #006633;
    border: 2px solid #b6a6a6; 
	border-radius:15px;
    color: black;
	font-family: Arial,Helvetica,sans-serif;
	font-size: 16px;
    padding: 4px;
    /*font-weight:bold;*/
   }
  #kotaksugest {
    font-size: 9pt;
    text-align: left;
    color: #000000;
    padding: 4px;
    font-weight:bold;
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
  height: 125px;
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
  height: 90px; 
  background-image: url(login/footer.png);
  font-family: Arial,Helvetica,sans-serif;
  font-size: x-small;
  color: white;
  text-align: left;

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

{
  height: 100%;
  margin: 0;
  padding: 0;
}

#map {
  /*height: 100%;*/
  height: 380px;
}

@media print {
  html, body {
    height: auto;
  }

  #map {
    height: 200px;
  }
}
</style>

</head>
<body onunload="GUnload()">

  <div id="page">
    <div id="header">
	<!-- untuk slider Monday, July 09, 2012 10:59:06 PM -->
	<?php
	include "index2.html";
	?>
    </div>
	<br>


        <div id='peta'>
	<div id='search'>
		
				<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				<?php
				include "dock-menu/dockMenuhome.html";
				?> 


			 <img src="images/search.png" width="30" height="" alt="Search"/> 
			<input class="inp" placeholder="search" name="Search" title="Search" id=
                                  "kata" type="text" size="15"  onkeyup=lihat(this.value) >     
                   
									<div id=kotaksugest></div>
	</div>

          <div id='Judul'>
          <a href="view.php" target="_blank" style=
				"text-decoration:none;color:#ffffff;" title="Layar Penuh"> <blink> Full Map </blink>  </a>
				<br>
				

				<div id="map">

		
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
	  map.setCenter(new GLatLng(0.33731939257375365,101.02444476137703), 14);

      // Select a map type which supports obliques
      map.setMapType(G_HYBRID_MAP);
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
	$sql = "SELECT * FROM `marker` INNER JOIN `icon` ON marker.IconID = icon.IconID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
       var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['IconImage'];?>",'<center>== <?php echo $data['Title'];?> == <br/><br> <?php echo $data['TextHTML'];?> <br/><img src="photo/<?php echo $data['Photo'];?>"width=300 height=200/> <br/></center>')
		  
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
	<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				
      <div id="footer"><br>
				<?php
				include "dock-menu/css-dock-bottom.html";
				?> 
     
       <a href="http://syarif25.tk" style=
				"text-decoration:none;color:#fff;" target="_blank">&nbsp;&nbsp;Power by  deyen 2012
   
    </div>
  </div>
</body>
</html>