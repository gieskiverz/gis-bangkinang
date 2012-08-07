<?php
include "session.php";
?>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<!-- YANG INI UNTUK SIDEBAR DI SEBELAH KANAN Friday, June 15, 2012 5:16:22 PM -->
		<script type="text/javascript" src="sidebar/includeAdmin.js"></script>
		<!-- saved from url=(0014)about:internet -->
		<!-- script type="text/javascript" src="sidebar/html.js"></script-->

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="./add.js"></script>
<script type="text/javascript" src="./icon.js.php"></script>
<script type="text/javascript">

</script>
	<!-- Style Form Add Marker 
	 6/17/2012 12:18:13 PM -->
 
  <style>

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
    font-size: 9pt;
    text-align: right;
    background-color: #99ffcc;
   /*border: 2px solid #ffffff;*/
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
	font-size: 11pt;
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

  </STYLE>

</head>
<body onunload="GUnload()">


   <div id="mapCanvas"></div>

  <div id="infoPanel">
    <div id="tempStorage" style="display:none;"></div>

    <div id="sideBar">
      <a href="#" id="sideBarTab"><img src=
      "sidebar/assets/spacer.gif" alt="" title="" /></a>

      <div id="sideBarContents" style="display:none;">
        <div id="sideBarContentsInner">
          <div id="scrollbar_container">
            <div id="scrollbar_content">
              <div id='Marker'>
                <div id='Judul'>
                  Add Marker
                </div>

                <div id='logout'>
                  <div>
                    <a href="logout.php" style=
                    "text-decoration:none;color:#3b5998;">Logout</a>
                  </div>
                </div>

				<form enctype="multipart/form-data" action="markerSave.php" method="POST"> 

                 <select name="IconID" id="IconID" title="Icon" onchange=
				  "handleMarkerIcon(this)">
					<?php
                                          include "connect.php";
                                          $sql = "SELECT * FROM  `icon` ";

                                          $qry = mysql_query($sql,$koneksi)
                                                    or die ("SQL Error: ".mysql_error());
                                          while($data=mysql_fetch_array($qry)) {
                                                  
                                                  ?>

    <option value="<?php echo $data['IconID'];?>">
      <?php echo $data['IconName'];?>
    </option><?php
                                          }
                                          ?>
  </select>
	<br />
	
    <input class="inp" placeholder="Latitude" name="Latitude" id=
    "Latitude" type="text" size="38"  title="Latitude"/><br />
 
    <input class="inp" placeholder="Longitude" name="Longitude" id=
    "Longitude" type="text" size="38"  title="Longitude"/><br />
   
    <input class="inp" placeholder="ZoomLevel" name="ZoomLevel" id=
    "ZoomLevel" type="text" size="38"  title="ZoomLevel"/><br />

    <input class="inp" placeholder="Title" name="Title" id="Title"
    type="text" size="38"  title="Title"/><br />
  

  <div id="markerStatus">
    <label><i>Click and drag the marker.</i></label>
  </div><br />

 <input class="inp" placeholder="Photo" name="Photo" id="Photo"
    type="file" title="Photo"/><br />
 
  <textarea class="inp" placeholder="Info" name="TextHTML" rows="4" cols=
  "32" id="TextHTML" title="Info">
</textarea><br />
 
  <textarea class="inp" placeholder="Address" rows="2" cols="32"
  name="Address" id="Address" type="text" title="Address">
</textarea><br />
  <font style="text-decoration:none;color:#ff0000;" id=
  'hasil-ajax'></font><br />

  
    <center><input class="inp" type="Submit" value="Add"/>  </center> </form>
              </div>

             
                
                    <a href="edit/viewMap.php">

                    <center>
                    <font style="text-decoration:none;color:#ffffff;" </font> Exit
                    </center>
                  </td>
                </tr>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>