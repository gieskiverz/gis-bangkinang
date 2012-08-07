<?php
include'../connect.php';


if($fileName='none'){
	$update = " UPDATE  `marker` SET  `Latitude` =  '".$_POST['Latitude']."',
`Longitude` =  '".$_POST['Longitude']."',
`ZoomLevel` =  '".$_POST['ZoomLevel']."',
`Title` =  '".$_POST['Title']."',
`TextHTML` =  '".$_POST['TextHTML']."',
`Address` =  '".$_POST['Address']."',
`IconID` =  '".$_POST['IconID']."'";
if($_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){
		$move = move_uploaded_file($_FILES['file']['tmp_name'], "../photo/".$_FILES['file']['name']);
		if($move){
			$update .= ", Photo='".$_FILES['file']['name']."'";
		}
	}
	$update .= "WHERE  `marker`.`MarkerID` ='".$_POST['MarkerID']."'";
	$qry = mysql_query($update,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	
	
}
else 
{

$update = " UPDATE  `marker` SET  `Latitude` =  '".$_POST['Latitude']."',
`Longitude` =  '".$_POST['Longitude']."',
`ZoomLevel` =  '".$_POST['ZoomLevel']."',
`Title` =  '".$_POST['Title']."',
`Photo` =  '$fileName',
`TextHTML` =  '".$_POST['TextHTML']."',
`Address` =  '".$_POST['Address']."',
`IconID` =  '".$_POST['IconID']."' ";

	if($_FILES['file']['size'] > 0 && $_FILES['file']['error'] == 0){
		$move = move_uploaded_file($_FILES['file']['tmp_name'], "../photo/".$_FILES['file']['name']);
		if($move){
			$update .= ", Photo='".$_FILES['file']['name']."'";
		}
	}
	$update .= "WHERE  `marker`.`MarkerID` ='".$_POST['MarkerID']."'";
	$qry = mysql_query($update,$koneksi)
		  or die ("SQL Error: ".mysql_error());

	
}
 header("Location: index.php");
?>