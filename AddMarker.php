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
    width: 400px;
    margin: auto;
    padding: 2px;	
    text-align: center;
    background:#99ffcc;
	border: 5px solid teal; 
    color: white;
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
		<a href="#" id="sideBarTab"><img src="sidebar/assets/spacer.gif" alt="" title=""/></a>
		<div id="sideBarContents" style="display:none;">
			<div id="sideBarContentsInner">
				<div id="scrollbar_container">
					<div id="scrollbar_content">
 


  <div ID='Marker'>
    <div ID='Judul'>
   Add Maker
    </tr>
    </div>
    
  
    <table>
			<div id='logout'>
			<div><a href="logout.php"style="text-decoration:none;color:#3b5998;"> Logout</font></div>

    <tr>
      <td width="112"><label>TypeID</label></td>
      <td width="677"><select name="TypeID" id="TypeID" onchange=
      "handleMarkerIcon(this)">
        <?php
                include "connect.php";
                $sql = "SELECT * FROM  `type` ";

                $qry = mysql_query($sql,$koneksi)
                          or die ("SQL Error: ".mysql_error());
                while($data=mysql_fetch_array($qry)) {
                        
                        ?>

        <option value="<?php echo $data['TypeID'];?>">
          <?php echo $data['TypeName'];?>
        </option><?php
                }
                ?>
      </select></td>
    </tr>

    <tr>
      <td width="112"><label>Latitude</label></td>

      <td width="677"><input class="inp" name="Latitude" id=
      "Latitude" type="text" size="38" /><br /></td>
    </tr>

    <tr>
      <td width="112"><label>Longitude</label></td>

      <td width="677"><input class="inp" name="Longitude" id=
      "Longitude" type="text" size="38" /><br /></td>
    </tr>

    <tr>
      <td width="112"><label>ZoomLevel</label></td>

      <td width="677"><input class="inp" name="ZoomLevel" id=
      "ZoomLevel" type="text" size="1" /><br /></td>
    </tr>

    <tr>
      <td width="112"><label>Title</label></td>

      <td width="677">
        <input class="inp" name="Title" id="Title" type="text"
        size="38" /><br />

        <div id="markerStatus">
          <label><i>Click and drag the marker.</i></label>
        </div>
      </td>
    </tr>

    <tr>
      <td width="112"><label>TextHTML</label></td>

      <td width="677">
      <textarea class="inp" name="" rows="8" cols="32" id=
      "TextHTML">
</textarea><br /></td>
    </tr>

	<tr>
      <td width="112"><label>Photo</label></td>

      <td width="677"><input class="inp" name="Photo" id=
      "Photo" type="file" enctype="multipart/form-data"/><br /></td>
    </tr>

    <tr>
      <td width="112"><label>Address</label></td>

      <td width="677">
      <textarea class="inp" rows="2" cols="32" name="Address" id=
      "Address" type="text">
</textarea><br /></td>
    </tr>
<td colspan="2"><center> <font style="text-decoration:none;color:#ff0000;" id='hasil-ajax'"></font></td>
    <tr>
      <td colspan="2">
        <center>
          <input class="inp" type="button" value="Add" onclick=
          "simpanMarker()" />
        </center>
      </td>
    </tr>


  </table>

  </div>
	
<tr>
	<tr align="right" bgcolor="#D5EDB3">
		<td><a href="edit/viewMap.php"><center>Exit</td>
</tr>
</body>
</html>