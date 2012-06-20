<?php
require_once(connect.php); //memanggil file database.php

connect_db(); // memanggil fungsi connect_db yang ada di file database.php
if($_POST[tombol])
{
$fileName = $_FILES[`userfile`][`name`]; 
$tmpName = $_FILES[`userfile`][`tmp_name`]; 
$fileSize = $_FILES[`userfile`][`size`]; 
$fileType = $_FILES[`userfile`][`type`];

$uploadDir = ./Photo/;
$filePath = $uploadDir . $fileName;

$result = move_uploaded_file($tmpName, $filePath); 
if (!$result) { 
$error_message=Error uploading file;  
} 

if(!get_magic_quotes_gpc()) 
{ 
$fileName = addslashes($fileName); 
$filePath = addslashes($filePath); 
}

$query = INSERT INTO upload(filename,type,size,path) VALUES (`$fileName`, `$fileType`, `$fileSize`, `$fileName`)”; 
$result=mysql_query($query); 
if($result){ 
echo upload file berhasil dilakukan <br> <a href=daftar_file.php>Daftar File</a>;
}else{
echo <br>File can`t uploaded<br>;
} 
}
?>