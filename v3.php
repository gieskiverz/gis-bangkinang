<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="UTF-8">
    <title>Google Maps JavaScript API v3 Example: Event Closure</title>
    <link href="default.css"
        rel="stylesheet" type="text/css">
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

		<script type="text/javascript" src="labels.js"></script>
<script type="text/javascript" src="ruler.js"></script>
    <script type="text/javascript">
      function initialize() {
        var myOptions = {
          zoom: 13,
          center: new google.maps.LatLng(0.3326417,101.02427310000007),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById('map_canvas'),
            myOptions);

        // Add 5 markers to the map at random locations
        /*var southWest = new google.maps.LatLng(-31.203405, 125.244141);
        var northEast = new google.maps.LatLng(-25.363882, 131.044922);

        var bounds = new google.maps.LatLngBounds(southWest, northEast);
        map.fitBounds(bounds);

        var lngSpan = northEast.lng() - southWest.lng();
        var latSpan = northEast.lat() - southWest.lat();

        for (var i = 0; i < 5; i++) {
          var position = new google.maps.LatLng(
              southWest.lat() + latSpan * Math.random(),
              southWest.lng() + lngSpan * Math.random());
          var marker = new google.maps.Marker({
            position: position,
            map: map
          });

          marker.setTitle((i + 1).toString());
          attachSecretMessage(marker, i);
        }
      }

      // The five markers show a secret message when clicked
      // but that message is not within the marker's instance data
      function attachSecretMessage(marker, num) {
        var message = ['This', 'is', 'the', 'secret', 'message'];
        var infowindow = new google.maps.InfoWindow({
          content: message[num]
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.open(marker.get('map'), marker);
        });
      }*/


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
	
      var southWest = new google.maps.LatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
	  var northEast = new google.maps.LatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>);
      var marker = new google.maps.Marker("<?php echo $data['Icon'];?>",'== <?php echo $data['Title'];?> == <br/><br> <?php echo $data['TextHTML'];?> <br/><?php echo $data['Photo'];?> <br/>');
	<?php
	}
	?>

		};

      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
  </head>
  <body>
    <div id="map_canvas"></div>

	<input type='button' id='addruler' onclick='addruler();' value='Ukur Jalan'/><br>
  </body>
</html>