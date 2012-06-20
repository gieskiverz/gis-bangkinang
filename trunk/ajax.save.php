<?php

	include'connect.php';

/*$allowed_filetypes =array('.jpg','.gif','.bmp','.png');
$max_filesize = 2000000; //maximum filesize in BYTES (2MB)
$file_Path='./photo/';
$result = move_uploaded_file($Photo,$file_Path);*/
$Photo = $_Files["Photo"];
$move = move_uploaded_file($_Files['Photo']['tmp_name'], 'C:/Xampp/gis-bangkinang/photo/'.$Photo);

$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Address = $_POST["Address"];
$TypeID = $_POST["TypeID"];


$sql =  "INSERT INTO `marker` (
`MarkerID` ,
`Latitude` ,
`Longitude` ,
`ZoomLevel` ,
`Title` ,
`TextHTML` ,
`Photo` ,
`Address` ,
`TypeID`
)
VALUES (
	NULL ,  
	'".$_POST['Latitude']."',  '".$_POST['Longitude']."',  '".$_POST['ZoomLevel']."',  '".$_POST['Title']."',  '".$_POST['TextHTML']."', '".$_Files['Photo']."',	   '".$_POST['Address']."',   '".$_POST['TypeID']."'
);
";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		
		  
		  