<?php 
session_start();
include "connect.php";		 
?> 
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<title>Bangkinang Maps</title>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=" type="text/javascript"></script>	
<!-- Search Saturday, July 21, 2012 10:13:31 PM --> 
<script type="text/javascript" src="search.js"></script>
<!-- css dock menu Tuesday, July 24, 2012 3:11:04 PM -->
<link href="dock-menu/stylehome.css" rel="stylesheet" type="text/css" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript"></script>
 
</head>
<body onunload="GUnload()">

  <div id="page">
   <br>Sistem Informasi Geografis Fasilitas Umum Kota
    Bangkinang
    <!-- <div id="header">
	
    </div> -->
	<br>


        <div id='peta'>
	<div id='search'>
		
				<!-- untuk dock menu Monday, July 23, 2012 9:49:06 PM -->
				<?php
				include "dock-menu/dockMenuhome.html";
				?> 


			 <img src="images/search.png" width="30" height="" alt="Search"/> 
			<input class="inp" placeholder="search" name="Search" title="Search" id=
                                  "kata" type="text" size="15"  onkeyup=lihat(this.value) >     
                   
									<div id=kotaksugest></div>
	</div>

          <div id='Judul'>
		
			<a href ="http://localhost/gis-bangkinang/Buku Petunjuk Penggunaan Sistem.pdf" target="_blank"
              style=
				"text-decoration:none;color:#ffffff;"> Download Buku Petunjuk Sistem </a>
				<br>

<!-- <iframe width="640" height="360" src="http://www.youtube.com/embed/kt7o9iFyG8E?feature=player_detailpage" frameborder="0" allowfullscreen></iframe> -->
<iframe width="640" height="360" src="http://www.youtube.com/embed/wquOwOPuLus?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>		

		
        </div>
      </div>

      <div id="footer">
 <br>
				<?php
				include "dock-menu/css-dock-bottom.html";
				?> 
     
       &nbsp;&nbsp; <a href="http://syarif25.tk" style=
				"text-decoration:none;color:#fff;" target="_blank">Power by deyen 2012
   
    </div>
  </div>
</body>
</html>