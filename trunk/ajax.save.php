<?php

	include'connect.php';

$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Address = $_POST["Address"];
$TypeID = $_POST["TypeID"];
# validasi Form 

if  (trim($Latitude)=="") {
	echo "Latitude masih kosong!!!";
	
}
elseif  (trim($Longitude)=="") {
	echo "Longitude masih kosong!!!";

}
elseif  (trim($ZoomLevel)=="") {
	echo "ZoomLevel masih kosong!!!";

	}
elseif  ( trim($Title)==""){
	echo "Title masih kosong!!!";
	
	}
elseif  (trim($TextHTML)=="") {
	echo "TextHTML masih kosong!!!";
	//}
//elseif  (trim($Photo)=="") {
	//echo "Photo masih kosong!!!";
	}
elseif  (trim($Address)=="") {
	echo "Address masih kosong!!!";
	
	}
	
else{


$sql="INSERT INTO marker SET 
		Latitude='$Latitude',
		Longitude='$Longitude',
		ZoomLevel='$ZoomLevel',
		Title='$Title',
		TextHTML='$TextHTML',
		Address='$Address',
		TypeID='$TypeID',
		MarkerRegistered=NOW()";
mysql_query($sql,$koneksi)
	or die ("SQL Error:".mysql_error());


/*
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
		  or die ("SQL Error: ".mysql_error()); */
}
?>  