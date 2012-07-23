<?
session_start();
$server = "localhost";
$username = "root";
$password = "rita";
$db_name = "gis";

$db = mysql_connect($server,$username,$password) or DIE("Connection is down ");
		mysql_select_db($db_name) or DIE("Database name not available !!");

		$login = mysql_query("select * from users where
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