<?php


/*

POST /gis/test/ajax.save.php HTTP/1.1
Host: syarif.com
Connection: keep-alive
Content-Length: 127
Origin: http://syarif.com
User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.5 (KHTML, like Gecko) Chrome/19.0.1084.56 Safari/536.5
Content-type: application/x-www-form-urlencoded
Accept: * / * --> sengaja di jarangin
Referer: http://syarif.com/gis/test/draggable.html
Accept-Encoding: gzip,deflate,sdch
Accept-Language: en-US,en;q=0.8
Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.3



Title:bbbbbbbbbb
Latitude:0.33435828468992074
Longitude:101.02066821108406
ZoomLevel:13
TextHTML:aaaaaaaaaaaaaaaaaaaaa
TypeID:1
*/

	$db_host="localhost";
	$db_user="root";
	$db_pass="rita";
	$db_data="gis";


	$koneksi = mysql_connect($db_host,$db_user,$db_pass)
			   or die ("Koneksi gagal".mysql_error());
	mysql_select_db($db_data, $koneksi)
	     or die ("Baca DB gagal".mysql_error());

	

$MarkerID = (int) $_POST["MarkerID"];
$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = (int)  $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Address = $_POST["Address"];
$TypeID = (int) $_POST["TypeID"];


/*$sql =  "INSERT INTO `marker` (
`MarkerID` ,
`Latitude` ,
`Longitude` ,
`ZoomLevel` ,
`Title` ,
`TextHTML` ,
`Address` ,
`TypeID`
)
VALUES (
	NULL ,  
	'".$_POST['Latitude']."',  '".$_POST['Longitude']."',  '".$_POST['ZoomLevel']."',  '".$_POST['Title']."',  '".$_POST['TextHTML']."',			'".$_POST['Address']."',   '".$_POST['TypeID']."'
);
";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());*/


$sql="Update marker set Latitude ='$Latitude',
		Longitude	='$Longitude',
		ZoomLevel	='$ZoomLevel',
		Title		='$Title',
		TextHTML	='$TextHTML',
		Address		='$Address',
		TypeID		='$TypeID'
		where MarkerID	='$MarkerID'";

echo $sql;
   mysql_query($sql, $koneksi)
			or die ("SQL Error: ".mysql_error());