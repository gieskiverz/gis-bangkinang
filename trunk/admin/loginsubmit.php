<?
session_start();
$server = "localhost";
$username = "root";
$password = "rita";
$db_name = "gis";

$db = mysql_connect($server,$username,$password) or DIE("Connection is down ");
		mysql_select_db($db_name) or DIE("Database name not available !!");

		$login = mysql_query("select * from users where
			(Username = '" . $_POST['Username'] . "') and
			(Password = '" . md5($_POST['Password']) . "')",$db);
	$rowcount = mysql_num_rows($login);
	if ($rowcount == 1)
	{
	$_SESSION['Username'] = $_POST['Username'];
	header("location: ./edit/viewMap.php");

	}
	else
	{
	
	echo "<font face=verdana size=2> <div id='divLoginError'> <center> Maaf Username atau Password anda salah <a href=login.php> Login " ;
	include "index.php";
	//header("Location: index.php");
	}
?>