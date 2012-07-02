<?
session_start();
if(!isset($_SESSION['Username']))
{
echo " <div id='LoginError'> <center>Anda harus Login dulu";
include "login.php";
exit;
}
?>