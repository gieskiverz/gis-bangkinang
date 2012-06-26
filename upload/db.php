<?php
include_once('config.php');

if( !mysql_connect($server, $user, $password) ) {
	die(mysql_error());
} else {
	if( !mysql_select_db($db) ){
		die(mysql_error());
	}
}
?>