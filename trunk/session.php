<?
session_start();
if(!isset($_SESSION['UserName']))
{
echo "<font face=verdana size=2 color=red> <blink><center><b> Anda harus login dulu </b></center></blink> "  ;
include "login.php";
exit;
}
?>