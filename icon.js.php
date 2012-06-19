<?php 
include "connect.php";

header("Content-Type: text/javascript");?>

function handleMarkerIcon(x){
  switch (x.value)
  {

<?php
	$sql = "SELECT * FROM  `type` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		
		?>


  case '<?php echo $data['TypeID'];?>':
    marker.setIcon("<?php echo $data['Icon'];?>");
    break;
	<?php
	}
	?>
  }
}


function setMarkerIcon(marker,typeid){

  switch (typeid)
  {

<?php
	$sql = "SELECT * FROM  `type` ";

	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
	while($data=mysql_fetch_array($qry)) {
		
		?>


  case '<?php echo $data['TypeID'];?>':
    marker.setIcon("<?php echo $data['Icon'];?>");
    break;
	<?php
	}
	?>
  }


}

