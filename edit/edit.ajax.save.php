<?php

include "../session.php";
include "../connect.php";

$MarkerID = (int) $_POST["MarkerID"];
$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = (int)  $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Address = $_POST["Address"];
$Photo = $_POST["Photo"];
$IconID = (int) $_POST["IconID"];


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
		Photo		='$Photo',
		TextHTML	='$TextHTML',
		Address		='$Address',
		IconID		='$IconID'
		where MarkerID	='$MarkerID'";

echo $sql;
   mysql_query($sql, $koneksi)
			or die ("SQL Error: ".mysql_error());