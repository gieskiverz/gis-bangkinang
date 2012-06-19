<?php
include "connect.php";

# baca variabel URL (if register global on)
$edit = (int) $_GET['MarkerID'];

 # Penyimpanan
 $sql = "select * from marker where MarkerID ='$edit'"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
$data=mysql_fetch_array($qry);
?>
<html>
<head>
<script type="text/javascript" src="./edit.js"></script>
<title>Edit Marker</title>

<table width="500" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr align="right" bgcolor="#D5EDB3">
		<td colspan="5"> <center>view  </td>
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">MarkerID</font></b>
			<input type="hidden" name="MarkerID" id="MarkerID" value="<? echo $data['MarkerID'];?>"/>
			</td>
			<td width="677">
			<font face="Comic Sans MS" size="2">: <? echo $data['MarkerID'];?></font>
			</td>
		</tr>
	</tr>
		</tr>

<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">Latitude</font></b></td>
			<td width="677">
			<input name="Latitude" id="Latitude" type="text" size="35" value="<?= $data ['Latitude']; ?>"> <br/>
		
</tr>

<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">Longitude</font></b></td>
			<td width="677">
			<input name="Longitude" id="Longitude" type="text" size="35" value="<?= $data ['Longitude']; ?>"> <br/>
			
</tr>


<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">ZoomLevel</font></b></td>
			<td width="677">
			<input name="ZoomLevel" id="ZoomLevel" type="text" size="1" value="<?= $data ['ZoomLevel']; ?>"> <br/>
			
</tr>


<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">Title</font></b></td>
			<td width="677">
			<input name="Title" id="Title" type="text" size="71" value="<?= $data ['Title']; ?>" > <br/>
			<div id="markerStatus"><i>Click and drag the marker.</i></div>
			
</tr>

<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">TexHTML</font></b></td>
			<td width="677">
			
			<textarea name="" rows="8" cols="51" id="TextHTML" > <?echo $data['TextHTML'];?></textarea><br/>
			
</tr>

<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">Address</font></b></td>
			<td width="677">
			<input name="Address"  id="Address" type="text" size="71" value="<?= $data ['Address']; ?>"> <br/>
		
</tr>

<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Arial" size="2">TypeName</font></b></td>
			<td width="677">
			<select name="TypeID" id="TypeID" onchange="handleMarkerIcon(this)">
	<?php
	include "connect.php";
	$sql = "SELECT * FROM  `type` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		//$no++;
		?>
		<option value="<?php echo $data['TypeID'];?>"> <?php echo $data['TypeName'];?></option>
		
	<?php
	}
	?>
	</select>

</tr>
<tr>
	<tr align="right" bgcolor="#D5EDB3">
		<td colspan="2"> <center> <input type="button"  value="Simpan" onclick="simpanMarker()"></td>
		
</table>
	
		
</table>
</body>
</html>