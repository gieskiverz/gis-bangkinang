<?php

include '../connect.php';

$kata = $_POST['q'];
$query = mysql_query("select Title from marker");

while($data=mysql_fetch_array($query))
	{
	echo '<a href="viewMap.php"style=
				"text-decoration:none;color:#3b5998;">   
				<li onClick="isi(\''.$data['Title'].'\')</a>
	style="cursor:pointer">'.$data['Title'].'</li>';
	}
?>