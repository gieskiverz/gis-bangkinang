<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <html>
  <head>
    <title>Edit Marker</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>
  </head>
  
  <body onunload="GUnload()">


    <!-- the div where the map will be displayed -->
	<!-- style="width: 550px; height: 450px"-->
    <div id="map"  style="width: 1500px; height: 700px"></div>
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

      var map = new GMap2(document.getElementById("map"));
      map.addControl(new GLargeMapControl());
      map.addControl(new GMapTypeControl());
      map.setCenter(new GLatLng(0.3326417,101.02427310000007), 13);
    
	<?php
	include "connect.php";
	$sql =  "select * from marker where 1;";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
	
      var point = new GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = createMarker(point,'== <?php echo $data['Title'];?> == <br/><br> <?php echo $data['TextHTML'];?> <br/> <a href="EditMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"><input  type=button value=Edit>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../admin/AddMarker.php"> <input  type=button value=Add>&nbsp;&nbsp;&nbsp;&nbsp;<a href="DeleteMarker.php"><input type=button value=Delete>')
		  //<input  type=button  onclick=alert(<?php echo $data['MarkerID'];?>)>')
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