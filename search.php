<?php

include 'connect.php';

$kata = $_POST['q'];
$query = mysql_query("select * from marker");

while($data=mysql_fetch_array($query))
	{
	echo '<a href="SearchViewgmap2.php?MarkerID='.$data['MarkerID'].' <?% "style=
				"text-decoration:none;color:#3b5998;">   
				<li onClick="isi(\''.$data['Title'].'\')</a>
	style="cursor:pointer">'.$data['Title'].'</li>';
	}
?>


<!-- <a href="EditMarker.php?MarkerID=<? echo $data['MarkerID']; ?>"> -->