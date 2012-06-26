<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Galeri</title>
</head>

<body>
<p>
<a href="index.php">depan</a> | <a href="galeri.php">galeri</a>
</p>
<?php
include('db.php');
if( !empty($_REQUEST['j']) ){
	$msg = '<div style="background:#F6F3C0;text-align:center;color:#999;">';
	$msg .= 'Gambar baru telah ditambahkan | <strong>' . $_REQUEST['j'];
	$msg .= '</strong></div>';
	echo $msg;
}
$query = "SELECT * FROM gambar";
$query = mysql_query( $query );
if(!$query){
	die( mysql_error() );
}
while( $rows = mysql_fetch_row($query) ){
	?>
	<p>
	<img src="<?php echo $url_folder_gambar . $rows[2];?>" width="100" />
	</p>
	<?php
	echo $rows[1];
	?>
	<hr />
<?php
}
?>
</body>
</html>
