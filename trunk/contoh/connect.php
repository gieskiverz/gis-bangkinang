<?PHP
	$db_host="syarif.com";
	$db_user="root";
	$db_pass="rita";
	$db_data="test";


	$koneksi = mysql_connect($db_host,$db_user,$db_pass)
			   or die ("Koneksi gagal".mysql_error());
	mysql_select_db($db_data, $koneksi)
	     or die ("Baca DB gagal".mysql_error());

?>
