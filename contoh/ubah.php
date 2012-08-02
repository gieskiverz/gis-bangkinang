<?php

include "../connect.php";

# baca variabel URL (if register global on)
$MarkerID = (int) $_GET['MarkerID'];

 # Penyimpanan
 $sql = "select * from marker where MarkerID ='$MarkerID'"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
$data=mysql_fetch_array($qry);
?>

<form enctype="multipart/form-data" action="proses.php" method="POST"> 

					<input type="hidden" name=
                    "MarkerID" id="MarkerID" value=
                    "<? echo $data['MarkerID'];?>" />
                    <font face="Comic Sans MS" size="2">: 
                    <? echo $data['MarkerID'];?></font>

      
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

                
                  <img src="http://syarif.com/gis-bangkinang/photo/<?php echo $data['Photo'];?>"width=100 height=80/>
				  <br />
                
					<input class="inp" name="Photo" id="Photo"
					type="file" title=" Change Photo"/><br />
                   
					                 
                    <textarea class="inp" placeholder="Info" title="Info" name="" rows="4" cols=
                    "33" id="TextHTML">
<?= $data ['TextHTML']; ?>
</textarea><br />
                  

                 
               
               
                    <textarea class="inp" placeholder="Address" title="Address" rows="2" cols="33" name=
                    "Address" id="Address">
<?= $data ['Address']; ?>
</textarea>
                  

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
				
                     <center><input class="inp" type="Submit" value="Add"/>  </center> </form>