<?php
include "../connect.php";

# baca variabel URL (if register global on)
$Delete = (int) $_GET['MarkerID'];

 # Penyimpanan
 $sql = "Delete from marker where MarkerID ='$Delete'"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
	header("location: ../edit/viewMap.php");
?>