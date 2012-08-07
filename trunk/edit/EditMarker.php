<?php
include "../session.php";	
include "../connect.php";


# baca variabel URL (if register global on)
$MarkerID = (int) $_GET['MarkerID'];

 # Penyimpanan
 $sql = "select * from marker where MarkerID ='$MarkerID'"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
$data=mysql_fetch_array($qry);
?>

<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="./sidebar/includes.js"></script>
		<!-- saved from url=(0014)about:internet -->
		<!-- script type="text/javascript" src="sidebar/html.js"></script-->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="edit.js"></script>
<script type="text/javascript" src="../icon.js.php"></script>
<script type="text/javascript">

function initialize() {
  //set map untuk senternya di Bangkinang ... asli ... wajib tio ... horam kok indak
  //GLatLng( <?php echo $data['Latitude'].','. $data['Longitude'];?>)
  //latLng = new google.maps.LatLng(0.3326417,101.02427310000007);
  latLng = new google.maps.LatLng(<?php echo $data['Latitude'].','. $data['Longitude'];?>);
  map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: <?php echo $data['ZoomLevel'];?>,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.HYBRID
  });
  marker = new google.maps.Marker({
    position: latLng,
    title: '<?php echo $data["Title"];?>',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  updateZoomLevelStatus(map.zoom);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Sedang digeser...!!!');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Sedang digeser...!!!');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
    updateZoomLevelStatus(map.zoom);
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
//-->

		
</script>

<body onunload="GUnload()">

 <style type="text/css">
/*<![CDATA[*/

  <!-- Style Form Add Marker 
  6/17/2012 12:18:13 PM -->


  BODY {
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
    background:#99ffcc;
        border: 5px solid teal; 
    color: #000000;
    /*background-image: url(../admin/peta.jpg);*/
  }
        #logout {
    /*background:url(../admin/syarif.jpg);*/
    font-size: 11pt;
    text-align: right;
    background-color: #99ffcc;
   #border: 2px solid #ffffff; 
    color: white;
    padding: 4px;
    font-weight:bold;
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
  }

  html, body {
  height: 100%;
  margin: 0;
  padding: 0;
  }

  #mapCanvas {
  height: 100%;
  }

  @media print {
  html, body {
    height: auto;
  }
  #mapCanvas {
    height: 650px;
  }


        
  /*]]>*/
  </style>

</head>




  <div id="mapCanvas"></div>




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
                  Edit Marker
                </div>

                <div id='logout'>
                  <div>
                    <a href="../logout.php" style=
                    "text-decoration:none;color:#3b5998;">Logout</a>
                  </div>
                </div>
				<form name="form1" action="editSave.php" method="post" enctype="multipart/form-data">
		
		
					<input type="hidden" name=
                    "MarkerID" id="MarkerID" value=
                    "<? echo $data['MarkerID'];?>" />
                   <font style="text-decoration:none;color:#99ffcc;">
                    <? echo $data['MarkerID'];?></font><br />

      
                   <input class="inp" placeholder="Latitude" title="Latitude" name=
                    "Latitude" id="Latitude" type="text" size="38"
                    value=
                    "<?= $data ['Latitude'];?>" /><br />
                  
				
                 
               
				
                   <input class="inp" placeholder="Longitude" title="Longitude" name=
                    "Longitude" id="Longitude" type="text" size=
                    "38" value=
                    "<?= $data ['Longitude']; ?>" /><br />
                  

                 
               
				
                   <input class="inp" placeholder="ZooMLevel" title="ZoomLevel" name=
                    "ZoomLevel" id="ZoomLevel" type="text" size="38"
                    value=
                    "<?= $data ['ZoomLevel']; ?>" /><br />
                        
                

                      <input class="inp"placeholder="Title" title="Title" name="Title" id="Title"
                      type="text" size="38" value=
                      "<?= $data ['Title']; ?>" /><br />
					    <div id="markerStatus">
    <label><i>Click and drag the marker.</i></label>
  </div>

                <!-- menampilkan gambar sebelumnya -->
		<img src="../photo/<?php echo $data['Photo'];?>" alt="" width="100" height="90" border="0"/><br/>
                
				  <!-- <input type="file" name="file" id="file"/><br/> -->

					<input class="inp" name="file" id="file"
					type="file" title=" Change Photo"/><br />
                   
					                 
                    <textarea class="inp" placeholder="Info" title="Info" name="TextHTML" rows="3" cols=
                    "33" id="TextHTML">
<?= $data ['TextHTML']; ?>
</textarea><br />
                  

                 
               
               
                    <textarea class="inp" placeholder="Address" title="Address" rows="2" cols="33" name=
                    "Address" id="Address">
<?= $data ['Address']; ?>
</textarea>
                  <br>
                   <select name="IconID" title="Icon" id=
                    "TypeID" onchange="handleMarkerIcon(this)">
                      <?php
                                      include "../connect.php";
                                      $sql = "SELECT * FROM  `icon` ";

                                      $qry = mysql_query($sql,$koneksi)
                                                or die ("SQL Error: ".mysql_error());
                                      while($data=mysql_fetch_array($qry)) {
                                              
                                              ?>

                      <option value=
                      "<?php echo $data['IconID'];?>">
                        <?php echo $data['IconName'];?>
                      </option><?php
                                      }
                                      ?>
                    </select>
                  

                
                    <br>
				
                    <center><input class="inp" type="Submit" value="Simpan"/> <center> </form>

                  
               
              </div>

               <center>
                    <a href="viewMap.php">
                  
                     <font style="text-decoration:none;color:#ffffff;">Exit </font> 
               </center>
                  
                
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
