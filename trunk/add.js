var geocoder = new google.maps.Geocoder();
function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;

}

function updateMarkerPosition(latLng) {
  /*
  //Thursday, June 14, 2012 1:23:11 PM 
  //dikomentari karena kita sudah memiliki textbox sendiri
  document.getElementById('info').innerHTML = [
    latLng.lat(),
    latLng.lng()
  ].join(', ');
  */
  document.getElementById('Latitude').value = latLng.lat();
  document.getElementById('Longitude').value = latLng.lng();

}

function updateMarkerAddress(str) {
  document.getElementById('Address').value = str;
}
function updateZoomLevelStatus(i){
  document.getElementById('ZoomLevel').value = i;
}


var marker;
var map;
var latLng;
function initialize() {
  //set map untuk senternya di Bangkinang ... asli ... wajib tio ... horam kok indak
  latLng = new google.maps.LatLng(0.3326417,101.02427310000007);
  map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 14,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  marker = new google.maps.Marker({
    position: latLng,
    title: 'Baru',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  updateZoomLevelStatus(map.zoom);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Sedang digeser...!!!');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Sedang digeser...!!!');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
    updateZoomLevelStatus(map.zoom);
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);

var obj;
var params = "";

function simpanMarker(){
	//alert("heheheh");
  //alert(map.zoom);
  //SIMPAN MARKER KE FILE PHP DENGAN MENGGUNAKAN AJAX
  var url="ajax.save.php";
  params = "Title="+document.getElementById('Title').value;
  params +="&Latitude="+document.getElementById('Latitude').value;
  params +="&Longitude="+document.getElementById('Longitude').value;
  params +="&ZoomLevel="+document.getElementById('ZoomLevel').value;
  params +="&TextHTML="+document.getElementById('TextHTML').value;
  params +="&Photo="+document.getElementById('Photo').value;
  params +="&Address="+document.getElementById('Address').value;
  params +="&TypeID="+document.getElementById('TypeID').value;

  if (window.XMLHttpRequest) {
    // obtain new object
    obj = new XMLHttpRequest();
    // set the callback function
    obj.onreadystatechange = processChange;
    // we will do a GET with the url; "true" for asynch
    obj.open("POST", url, true);

    //Send the proper header information along with the request
    obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    obj.setRequestHeader("Content-length", params.length);
    obj.setRequestHeader("Connection", "close");
    obj.send(params);
  // IE/Windows ActiveX object
  } else if (window.ActiveXObject) {
    obj = new ActiveXObject("Microsoft.XMLHTTP");
    if (obj) {
      obj.onreadystatechange = processChange;
      obj.open("POST", url, true);
      //Send the proper header information along with the request
      obj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      //obj.setRequestHeader("Content-length", params.length);
      //obj.setRequestHeader("Connection", "close");
      obj.send(params);
      obj.send();
    }
  } else {
    alert("Your browser does not support AJAX");
  }

}

function processChange() {
    // 4 means the response has been returned and ready to be processed
    if (obj.readyState == 4) {
        // 200 means "OK"
        if (obj.status == 200) {
            // process whatever has been sent back here:
        // anything else means a problem
          //alert("Sukses Coy");
          //alert(obj);
		  document.getElementById('hasil-ajax').innerHTML = obj.responseText;
        } else {
            alert("There was a problem in the returned data:\n");
        }
    }
}