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
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"></script>
 
</head>
<body onunload="GUnload()">

  <div id="page">
   <br>Sistem Informasi Geografis Fasilitas Umum Kota
    Bangkinang
    <!-- <div id="header">
	
    </div> -->
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
          <a href="rumahSakit.php" target="" style=
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
	$sql = "SELECT * FROM `marker` INNER JOIN `icon` ON marker.IconID = icon.IconID where marker.IconID ='25' ";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
       var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['IconImage'];?>",'<center>== <?php echo $data['Title'];?> == <br/><br><img src="photo/<?php echo $data['Photo'];?>"width=300 height=200/><br/><br/><?php echo $data['TextHTML'];?> <br/></center>')
		  
		  
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