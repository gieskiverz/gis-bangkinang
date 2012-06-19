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
	include "connect.php";
	//$sql =  "select * from marker where 1;";
	$sql = "SELECT * FROM `marker` INNER JOIN `type` ON marker.typeID = type.typeID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
      var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarkerWithIcon(point,"<?php echo $data['Icon'];?>",'== <?php echo $data['Title'];?> == <br/><br> <?php echo $data['TextHTML'];?> <br/> <a href="EditMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input  type=button value=Edit>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../AddMarker.php"> <input  type=button value=Add>&nbsp;&nbsp;&nbsp;&nbsp;<a href="DeleteMarker.php"><input type=button value=Delete>')
		  
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
