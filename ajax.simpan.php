<?php

	include'connect.php';

/*$allowed_filetypes =array('.jpg','.gif','.bmp','.png');
$max_filesize = 2000000; //maximum filesize in BYTES (2MB)
$file_Path='./photo/';
$result = move_uploaded_file($Photo,$file_Path);*/
//$Photo = $_Files["Photo"];
//$move = move_uploaded_file($_Files['Photo']['tmp_name'], 'C:/Xampp/gis-bangkinang/photo/'.$Photo);

//move_uploaded_file($tmp_name, "$uploads_dir/$name");

/*$dir_gambar = 'C:\xampp\htdocs\gis-bangkinang\upload\\';
$Photo = basename($_FILES['Photo']['name']);
$uploadfile = $dir_gambar . $Photo;
move_uploaded_file($_FILES['Photo']['tmp_name'], $uploadfile);
$Photo = $_FILES["Photo"];
echo '<!--'; var_dump($_FILES); echo '-->';*/

 $target = "upload/"; 
 $target = $target . basename( $_FILES["Photo"]["name"]); 

$Latitude = $_POST["Latitude"];
$Longitude = $_POST["Longitude"];
$ZoomLevel = $_POST["ZoomLevel"];
$Title = $_POST["Title"];
$TextHTML = $_POST["TextHTML"];
$Photo = $_POST["Photo"];
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
		Photo='$Photo',
		TextHTML='$TextHTML',
		Address='$Address',
		TypeID='$TypeID',
		MarkerRegistered=NOW()";
mysql_query($sql,$koneksi)
	or die ("SQL Error:".mysql_error());


if(move_uploaded_file($_FILES["Photo"]["name"], $target)) 
 { 
 
 //Tells you if its all ok 
 echo "File ".$Photo. basename( $_FILES["uploadedfile"]["name"]). " Upload berhasil"; 
 } 
 else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; 
 } 

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