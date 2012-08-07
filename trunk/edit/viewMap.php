<?php
	include"../session.php";
	include "../connect.php";		
 ?>

<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Bangkinang Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>	
<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
<link href="../dock-menu/style.css" rel="stylesheet" type="text/css" />
<!-- <script type="text/javascript" src="./icon.js.php"></script> -->
<script type="text/javascript"></script>

<style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#map {
  height: 100%;
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
<body onunload="GUnload()">
<title>Map</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    

 <!-- the div where the map will be displayed -->
	<!-- style="width: 550px; height: 450px"-->
    <div id="map"</div>
    <!--a href="menu.php">Back to the  page</a-->
    
    <!-- fail nicely if the browser has no Javascript -->
    <noscript><b>JavaScript must be enabled in order for you to use Google Maps.</b> 
      However, it seems JavaScript is either disabled or not supported by your browser. 
      To view Google Maps, enable JavaScript by changing your browser options, and then 
      try again.
    </noscript>

    <script type="text/javascript">
    //<![CDATA[

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
	  map.setCenter(new GLatLng(0.33813476994911484,101.02830714235847), 15);

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
	$sql = "SELECT * FROM `marker` INNER JOIN `icon` ON marker.IconID = icon.IconID";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
      var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['IconImage'];?>",'<center>== <?php echo $data['Title'];?> ==<br/><br/><img src="../photo/<?php echo $data['Photo'];?>"width=250 height=180/> <br/><br/> <?php echo $data['TextHTML'];?><br/><br/><a href="EditMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input  type=button value=Edit></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../AddMarker.php"><input type=button value=Add></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../delete/DeleteMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input type=button value=Delete></a></center>  ')
		  
      map.addOverlay(marker);
	<?php
	}
	?>
    }

    
    else {
      alert("Sorry, the Google Maps API is not compatible with this browser");
    }

    </script>


  </body>
 
</html>





		<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="sidebar/includesExit.js"></script>
		<!-- saved from url=(0014)about:internet -->
		<!-- script type="text/javascript" src="sidebar/html.js"></script-->
		<!-- <script type="text/javascript" src="./add.js"></script> -->
		<!-- <script type="text/javascript" src="./icon.js.php"></script> -->
		<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
		<script type="text/javascript" src="../search.js"></script>
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
    width: 220px;
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
    font-size: 9pt;
    text-align: center;
	width: 210px;
    background-color: #ffffff;
    border: px solid #ffffff; 
    color: black;
    padding: 4px;
    font-weight:bold;
  }

  #logout {
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



	<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
	<?php
		 include "../dock-menu/dockMenu.html";
	?>

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
  Ketikan lokasi yang anda cari 
    </div>
    
  
  <p>
  <table>
   		<!-- <div id='logout'>
			<div>
			<a href="../logout.php"><img src="images/logout.png" title="logout" width="30px"></a></div> -->

				<!-- Saturday, July 21, 2012 10:42:45 PM -->
			  <input class="inp" placeholder="search" name="Search" title="Search" id=
			  "kata" type="text" size="25" onkeyup=lihat(this.value)><br/>

				<div id=kotaksugest>
				</div>
			
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
