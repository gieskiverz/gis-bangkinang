<?
session_start();
if(!isset($_SESSION['Username']))
{
echo " <div id='divLoginError'> <center>Anda harus Login dulu ";
include "index.php";
exit;
}
?>