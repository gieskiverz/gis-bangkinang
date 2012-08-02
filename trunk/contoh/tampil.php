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
  <table width="500" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr align="right" bgcolor="#22B5DD">
	<tr>
	<tr align="right" bgcolor="#D5EDB3">
		<td colspan="2"> <center>Data Staff Server</td>
	<?php
	include "../connect.php";
$sql =  "select * from marker LIMIT 0 , 40";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
	$no++;
	
		?>
		
		
	</td>
	 <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  	<td align="center">
	<a href="ubah.php?MarkerID=<? echo $data['MarkerID']; ?>">Ubah</a>
	
	
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="112"><b><font face="Comic Sans MS" size="2">Latitude</font></b></td>
			<td width="677">
			<font face="Comic Sans MS" size="2">: <? echo $data['Latitude'];?></font>
			</td>
		</tr>
	
	
	</tr>
		</tr>
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td width="500"><b><font face="Comic Sans MS" size="2">Longitude</font></b></td>
			<td width="677">
			<font face="Comic Sans MS" size="2">: <? echo $data['Longitude'];?></font>
			</td>
		</tr>
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td valign="top"><b><font face="Comic Sans MS" size="2">ZoomLevel</font></b></td>
			<td><font face="Comic Sans MS" size="2">: <? echo $data['ZoomLevel'];?></font>
			</td>
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td valign="top"><b><font face="Comic Sans MS" size="2">Title</font></b></td>
			<td><font face="Comic Sans MS" size="2">: <? echo $data['Title'];?></font>
			</td>
		<tr>


		<tr align="left" bgcolor="#D5EDB3">
			<td valign="top"><b><font face="Comic Sans MS" size="2">Photo</font></b></td>
			<td><font face="Comic Sans MS" size="2">:<img src="http://syarif.com/gis-bangkinang/photo/<? echo $data['Photo'];?>"width=100 height=80/>

	</font>
			</td>
		<tr>

		<tr align="left" bgcolor="#D5EDB3">
			<td valign="top"><b><font face="Comic Sans MS" size="2">TextHTML</font></b></td>
			<td><font face="Comic Sans MS" size="2">: <? echo $data['TextHTML'];?></font>
			</td>
		<tr>
		<tr align="left" bgcolor="#D5EDB3">
			<td valign="top"><b><font face="Comic Sans MS" size="2">Address</font></b></td>
			<td><font face="Comic Sans MS" size="2">: <? echo $data['Address'];?></font>
			</td>
		<tr>
		
			<td clospan="2">&nbsp;</td>
		</tr>
		<?php
		}
		?>
</table>
  </DIV>
	
</BODY>
</HTML>

