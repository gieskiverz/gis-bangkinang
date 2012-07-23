<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$judul = $_GET['judul'];
$des = $_GET['des'];
$jenis  = $_GET['jenis'];

$masuk = mysql_query("insert into peta_icon
values(null,'$judul','$jenis','$des',$x,$y)");
if($masuk){
    echo "berhasil";
}else{
    echo "gagal";
}
?>
