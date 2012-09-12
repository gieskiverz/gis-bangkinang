<?php

include '../connect.php';
//print_r($GLOBALS);
//print_r($HTTP_RAW_POST_DATA);
$kata = $HTTP_RAW_POST_DATA;
$sql = "SELECT * 
	FROM  `marker` 
	WHERE title LIKE  '%".$kata."%'
	LIMIT 0 , 15";
echo "<!-- $sql -->";

/*list($usec, $sec)= explode(' ',microtime());
$querytime_before = ((int)$usec + (int)$sec);


list($usec, $sec)= explode(' ',microtime());
$querytime_after = ((float)$usec + (float)$sec);

$total_waktu = $querytime_after - $querytime_before;
echo" <br>Waktu pencarian : "; printf("%1.2f", $total_waktu); 
echo" detik";*/

$query = mysql_query($sql);
while($data=mysql_fetch_array($query))

	{

	echo '<a href="searchView.php?MarkerID='.$data['MarkerID'].'.101 "style=
				"text-decoration:none; color:#000;">  
				<li onClick="isi('.$data['Title'].') 
				<style="text-align: justify;>'.$data['Title'].'</li></a>';
			
	}
?>
