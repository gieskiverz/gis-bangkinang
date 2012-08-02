<?php

include 'connect.php';
//print_r($GLOBALS);
//print_r($HTTP_RAW_POST_DATA);
$kata = $HTTP_RAW_POST_DATA;
$sql = "SELECT * 
	FROM  `marker` 
	WHERE title LIKE  '%".$kata."%'
	LIMIT 0 , 5";
echo "<!-- $sql -->";
$query = mysql_query($sql);
while($data=mysql_fetch_array($query))
	{
	echo '<a href="searchView.php?MarkerID='.$data['MarkerID'].'.101 "style=
				"text-decoration:none; color:#ffff00;">  
				<li onClick="isi('.$data['Title'].') 
				<style="text-align: justify;>'.$data['Title'].'</li></a>';
	}
?>
