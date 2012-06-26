<?php
include "../connect.php";

 $sql = "select * from marker"; 
 $qry = mysql_query($sql, $koneksi) 
	or die ("SQL Error : ".mysql_error());
$data=mysql_fetch_array($qry);
?>


<html>
<head>

<title>Info Window Tabs (v3)</title>

<style type="text/css">

 body, html {
	height:100%;
	width: 100%;
	margin:0;
 }

 div.wrapper { /* Outer infowindow size */
	width:320px;
	height:240px;
	margin: 6px;
	display: none;
 }

 div.tabs { position: relative;
	top: -44px;
	left: -24px;
	margin-bottom: -15px;
}

span.activeTab, span.passiveTab, span.hoverTab {
	-moz-border-radius-topleft: 8px;
	-moz-border-radius-topright: 8px;
	-webkit-border-top-left-radius: 8px;
	-webkit-border-top-right-radius: 8px;
	border-top-left-radius: 8px;
	border-top-right-radius: 8px;
}

 span.activeTab {
	margin-right:-5px;
	padding-left:7px;
	padding-right:7px;
	font-weight:bold;
	font-size:16px;
	border:1px solid #AAA;
	color:#5D5CA0;
	background-color:#FFF;
	border-bottom:2px solid #FFF;
 }

span.activeTab {
	/* IE border top fix */
	zoom:1;
	/* IE border bottom fix */
	position:relative;
	bottom:-1px;
}

 span.passiveTab {
	margin-right:-5px;
	padding-left:8px;
	padding-right:8px;
	border:1px solid #AAA;
	font-size:12px;
	cursor:default;
	background-color:#E9E9E9;
	color:#006;
	border-bottom:2px solid #E9E9E9;
}

 span.hoverTab {
	margin-right:-5px;
	padding-left:7px;
	padding-right:7px;
	font-size:14px;
	border:none;
	border-bottom:2px solid #DCDCDC;
	cursor:pointer;
	background-color:#DCDCDC;
	color:#5676EA;
}

 div.cardContent { /* Inner infowindow size */
	width:320px; height:230px;
	padding: 4px 5px 0 0;
	border-top:1px solid #CACACA;
	overflow-y:auto;
font-size: 0.9em;
	display:none;
}

</style>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB1Wwh21ce7jnB6yDbjVGN3LC5ns7OoOL4&amp;sensor=false">
</script>

</head>
<body>


<div id="map" style="width: 100%; height: 100%; min-height: 420px;"></div>

 <?php
	include "../connect.php";
	//$sql =  "select * from marker where 1;";
	$sql = "SELECT * FROM `marker` INNER JOIN `type` ON marker.typeID = type.typeID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>
<!-- Tabs of marker number:<?php echo $no;?> marker -->
<div id="wrapper<?php echo $no;?>" class="wrapper">
	<div id="marker<?php echo $no;?>Tabs" class="tabs">

		<span data-name="1">Details</span>
		<span data-name="2">Street View</span>
		<span data-name="3">Mini Map</span>
		<span data-name="4">Photo</span>

	</div>

	<div id="marker<?php echo $no;?>Card1" class="cardContent">
		<!-- Content of first tab card untuk marker nomor <?php echo $no;?> -->
		<!-- <b>Tabbed Info Window - Marker 1</b> -->

		<p>
		<?php echo $data['Title'];?>; <br/>
		<?php echo $data['TextHTML'];?>;
		
		</p>

	</div>

	<div id="marker<?php echo $no;?>Card2" class="cardContent">
		<!-- Street View herein -->
	</div>


	<div id="marker<?php echo $no;?>Card3" class="cardContent">
		<!-- Mini Map herein; otherwise HTML content --> 
	</div>
	<div id="marker<?php echo $no;?>Card4" class="cardContent">

		<img src="../syarif.jpg" width=300 height=200>

	</div>


</div>
<?php
	}
?>




<script type="text/javascript">
//<![CDATA[

 // Global variables
 var map, infowindow;

 /**
 * Constructor function
 * TabCard is based on HTML 5's id and data attributes
 * and completely map independent.
 */
function TabCard(tabid, cardid, point) {

 this.tabid = tabid;
 this.cardid = cardid;
 this.handleTabs = handleTabs;
 this.point = point;
 this.handleTabs(1);
}


function handleTabs(num) {

  var me = this;
  var tabsdiv = document.getElementById(this.tabid);
  this.newcard = this.cardid + num;
  if (!this.card) this.card = this.newcard;
  // Switch cards
  document.getElementById(this.card).style.display = "none";
  document.getElementById(this.newcard).style.display = "block";

  // Store active card
  this.card = this.newcard;

  // Handle tab events
  for (var i = 0, tab; tab = tabsdiv.getElementsByTagName("span")[i]; i++) {

    // Make clicked tab active and
    // unregister event listener for active tab
    if (tab.getAttribute("data-name") == num) {
     tab.className = "activeTab";
     tab.onmouseover = null;
     tab.onmouseout = null;
     tab.onclick = null;
    }
    // Register mouse event listener for tabs
    else {

     // Reset tabs
     tab.className = "passiveTab";

     tab.onmouseover = function() {
      this.className = "hoverTab";
     };

     tab.onmouseout = function() {
      this.className = "passiveTab";
     };

     tab.onclick = function() {
      // 'this' refers to the tab here
      var tabnum = this.getAttribute("data-name");
      me.handleTabs(tabnum);
      // Displays street view in tab #2 
      if (tabnum == 2) viewStreet(me.card, me.point);
      // Display mini map in tab #3
      else if (tabnum == 3) seeMiniMap(me.card, me.point);
     };
    }
  }
}


function viewStreet(div, point) {

  var g = google.maps;
  var pano = new g.StreetViewPanorama(document.getElementById(div), {
    position: point });
//  map.setStreetView(pano);
  pano.setVisible(true);
}


function seeMiniMap(div, point) {

  var g = google.maps;
  var mini = new g.Map(document.getElementById(div), {
    center: point,
    zoom: 18,
    streetViewControl: false,
    mapTypeId: "hybrid",
    mapTypeControlOptions: {
     style: g.MapTypeControlStyle.DROPDOWN_MENU
    }
  });
}


function createMarker(point, iw_content) {

  var g = google.maps;
  var marker = new g.Marker({
    position: point, map: map,
    clickable: true, draggable: true
  });

  g.event.addListener(marker, "click", function() {
   infowindow.setContent(iw_content);
   iw_content.style.display = "block";
   infowindow.open(map, this); 
  });
  return marker;
}


function buildMap() { // Create the map

  var g = google.maps;

  <?php
	include "../connect.php";
	//$sql =  "select * from marker where 1;";
	$sql = "SELECT * FROM `marker` INNER JOIN `type` ON marker.typeID = type.typeID LIMIT 0 , 30";
	$qry = mysql_query($sql,$koneksi)
		  or die ("SQL Error: ".mysql_error());
		  
	$no = 0;
	while($data=mysql_fetch_array($qry)) {
	$no++;
 	
	?>

  //looping untuk setiap marker... sekarang kita di posisi ke <?php echo $no;?>	
  var point<?php echo $no;?> = new g.LatLng(<?php echo $data['Latitude'].','. $data['Longitude'];?>);

  // Info window tabs of marker numbero <?php echo $no;?>	
  var iw_content = document.getElementById("wrapper<?php echo $no;?>");
  // Required arguments for TabCard: (tabid, cardid without number) 
  var tabs = new TabCard("marker<?php echo $no;?>Tabs", "marker<?php echo $no;?>Card", point<?php echo $no;?>);
  var marker<?php echo $no;?> = createMarker(point<?php echo $no;?>, iw_content);

  <?php
	}
	?>

  var map_options = {
   center: new g.LatLng(0.33264646,101.02427310000353537),
   zoom: 15,
   mapTypeId: "roadmap",
   streetViewControl: false,
   mapTypeControlOptions: {
    style: g.MapTypeControlStyle.DEFAULT,
    mapTypeIds: [ g.MapTypeId.ROADMAP,
     g.MapTypeId.SATELLITE,
     g.MapTypeId.HYBRID,
     g.MapTypeId.TERRAIN]
   }
  };

  //map = new g.Map(document.getElementById("map"), map_options);
 // infowindow = new g.InfoWindow();


  // Info window tabs of second marker
  //var iw_content = document.getElementById("wrapper2");
  //var tabs = new TabCard("secTabs", "secCard", point2);
  //var marker2 = createMarker(point2, iw_content);
}

window.onload = buildMap;


//]]>
</script>

</body>
</html>
