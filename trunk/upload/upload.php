<?php

if( isset($_REQUEST['submit']) ){

	include('connect.php');
	
	//$title = $_REQUEST['judul'] ? htmlspecialchars($_REQUEST['judul']) : 'blun ada judul'; //ternary operator

	$dir_gambar = 'C:\xampp\htdocs\gis-bangkinang\upload\gambar\\';	
	$gambar = basename($_FILES['gambar']['name']);
	$uploadfile = $dir_gambar . $gambar;
	
	if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
		$query = "INSERT INTO gambar set gambar='$gambar'";
		$query = mysql_query($query);
		if(!$query){
			die( mysql_error() );
		}
		//header('Location: galeri.php?j=' . $title);
		exit();
	} else {
		echo "Kemungkinan hacking!\n";
	}
}
//else{
	//echo "Anda kesasaar? kembali ke <a href='index.php'>jalan yang benar</a>";7/17/2012
//}
?>

<!-- 
$sql="INSERT INTO marker SET 
		Latitude='$Latitude',
		Longitude='$Longitude',
		ZoomLevel='$ZoomLevel',
		Title='$Title',
		TextHTML='$TextHTML',
		Photo='$Photo',
		Address='$Address',
		TypeID='$TypeID',
		MarkerDate=NOW()"; -->