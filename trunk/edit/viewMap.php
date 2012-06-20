<?php
include "session.php";
?>
<html>
  <head>
    <title>View Map</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>
	<script type="text/javascript" src="../icon.js.php"></script>

    <!-- the div where the map will be displayed -->
	<!-- style="width: 550px; height: 450px"-->
    <div id="map"  style="width: 1500; height: 700"></div>
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

      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);
    

	<?php
	include "../connect.php";
	//$sql =  "select * from marker where 1;";
	$sql = "SELECT * FROM `marker` INNER JOIN `type` ON marker.typeID = type.typeID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
      var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['Icon'];?>",'== <?php echo $data['Title'];?> == <br/><br> <?php echo $data['TextHTML'];?> <br/> <a href="EditMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input  type=button value=Edit>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../AddMarker.php"> <input  type=button value=Add>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../delete/DeleteMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input type=button value=Delete>')
		  
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
<!-- <script type="text/javascript" src="./add.js"></script>
 --><script type="text/javascript" src="./icon.js.php"></script>
  <style>
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
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
			<STYLE>
  BODY {
    font-family: Verdana, sans-serif;
    font-size: 11pt;
  }
	
  #Marker {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: 100px;
    margin: auto;
    padding: 2px;	
    text-align: center;
    background:#99ffcc;
	border: 5px solid teal; 
    color: white;
    /*background-image: url(../admin/peta.jpg);*/
  }
  #Judul {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 11pt;
    text-align: center;
    background-color: #006633;
    border: 2px solid #ffffff; 
    color: white;
    padding: 4px;
    font-weight:bold;
  }
	
  </STYLE>

  <DIV ID='Marker'>
    <DIV ID='Judul'>
   <a href="../logout.php"> <input class="inp" type="button"  value="Logout">
    </DIV>
    
			
			</div>
          </div>
        </div>
      </div>
    </div>
  </div>
