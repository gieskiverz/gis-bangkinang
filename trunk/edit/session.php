<?
session_start();
if(!isset($_SESSION['Username']))
{
echo " <div id='divLoginError'> <center>Anda harus Login dulu <a href=../login.php> Login ";
include "../index.php";
exit;
}
?>