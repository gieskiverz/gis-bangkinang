<?php session_start();?> 
<html>
<HEAD>
  <TITLE>Login Form</TITLE>
  <STYLE>
  BODY {
    font-family: Verdana, sans-serif;
    font-size: 11pt;
  }
	/*6/17/2012 12:18:13 PM*/
  #Marker {
    border: 1px solid silver;
    -moz-border-radius: 6px;
    width: 350px;
    margin: auto;
    padding: 2px;	
    text-align: center;
    background:#99ffcc;
	border: 5px solid teal; 
    color: white;
    /*background-image: url(../admin/syarif.jpg);*/
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
	
  </STYLE>
 
  </HEAD>


<BODY>


  <DIV ID='Marker'>
    <DIV ID='Judul'>
   Add Maker
    </DIV>
    
  
  <p>


  <form enctype="multipart/form-data" action="proses.php" method="POST"> 

                 <select name="IconID" id="IconID" title="Icon" onchange=
				  "handleMarkerIcon(this)">
					<?php
                                          include "../connect.php";
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

             
  </DIV>
	
</BODY>
</HTML>

