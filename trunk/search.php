<?php

include 'connect.php';
//print_r($GLOBALS);
//print_r($HTTP_RAW_POST_DATA);
$kata = $HTTP_RAW_POST_DATA;
$sql = "SELECT * 
	FROM  `marker` 
	WHERE title LIKE  '%".$kata."%'
	LIMIT 0 , 4";
echo "<!-- $sql -->";
$query = mysql_query($sql);
while($data=mysql_fetch_array($query))
	{
	echo '<a href="SearchView.php?MarkerID='.$data['MarkerID'].' <?% "style=
				"text-decoration:none;color:#ffffff;">  
				<li onClick="isi(\''.$data['Title'].'\')</a>
	style="cursor:pointer">'.$data['Title'].'</li>';
	}
?>
