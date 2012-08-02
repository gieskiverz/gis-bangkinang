<?php 
include "connect.php";

header("Content-Type: text/javascript");?>

function handleMarkerIcon(x){
  switch (x.value)
  {

<?php
	$sql = "SELECT * FROM  `icon` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		
		?>


  case '<?php echo $data['IconID'];?>':
    marker.setIcon("<?php echo $data['IconImage'];?>");
    break;
	<?php
	}
	?>
  }
}


function setMarkerIcon(marker,iconid){

  switch (iconid)
  {

<?php
	$sql = "SELECT * FROM  `icon` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		
		?>


  case '<?php echo $data['IconID'];?>':
    marker.setIcon("<?php echo $data['IconImage'];?>");
    break;
	<?php
	}
	?>
  }


}

