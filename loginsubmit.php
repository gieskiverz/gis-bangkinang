<?
session_start();
$mysql_host = "syarif.com";
	$mysql_database = "gis";
	$mysql_user = "root";
	$mysql_password = "rita";

$db = mysql_connect($mysql_host,$mysql_user,$mysql_password) or DIE("Connection is down ");
		mysql_select_db($mysql_database) or DIE("Database name not available !!");

		$login = mysql_query("select * from admin where
			(UserName = '" . $_POST['UserName'] . "') and
			(Password = '" . md5($_POST['Password']) . "')",$db);
	$rowcount = mysql_num_rows($login);
	if ($rowcount == 1)
	{
	$_SESSION['UserName'] = $_POST['UserName'];
	header("location: ./edit/index.php");

	}
	else
	{
	
	echo "<font face=verdana size=2 color=red> <blink><center><b> Maaf UserName atau Password anda salah </b></center></blink> "  ;
	include "login.php";
	//header("Location: index.php");
	}
?>