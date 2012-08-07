<?PHP
	$mysql_host = "syarif.com";
	$mysql_database = "gis";
	$mysql_user = "root";
	$mysql_password = "rita";


	$koneksi = mysql_connect($mysql_host,$mysql_user,$mysql_password)
			   or die ("Koneksi gagal".mysql_error());
	mysql_select_db($mysql_database, $koneksi)
	     or die ("Baca DB gagal".mysql_error());

?>