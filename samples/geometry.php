



<script type="text/javascript" src="http://maps.google.com/maps/api/js?libraries=geometry&sensor=false"></script>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
<!--

var nyc = new google.maps.LatLng(40.715, -74.002);
document.write('<br />NYC:'+nyc);
var london = new google.maps.LatLng(51.506, -0.119);
document.write('<br />London:'+london);
var distance = google.maps.geometry.spherical.computeDistanceBetween(nyc, london);
document.write('<br />Distance:'+distance + 'm');


/*

Determining the heading

If you also want to know the heading between two points you can use the computeHeading() function. It also takes two LatLng objects and determines the heading from the first to the second.

var heading = google.maps.geometry.spherical.computeHeading(nyc, london);

The heading is returned in degrees from the true north (counts clockwise from 0). The heading from NYC to London is 51.2145583127633 degrees.

*/
var heading = google.maps.geometry.spherical.computeHeading(nyc, london);
document.write('<br/>Heading NYC to London from true north: '+heading + ' degrees');



var rio = new google.maps.LatLng(-22.916, -43.251);
document.write('<br/>Rio: ' + rio);
var area = google.maps.geometry.spherical.computeArea([nyc, london, rio]);
document.write('<br/> Area between rio nyc london: '+ area+ ' meters<sup>2</sup>');

//
//var distance = 5576673;//5576673.431931234
var endPoint = google.maps.geometry.spherical.computeOffset(nyc, distance, heading);
document.write('<h1>Calculate a point in between</h1>');
document.write('<br /> from NYC,'+nyc+' heading '+ heading +' degrees, with distance '+ distance +' will be:'+ endPoint);


document.write('<h1>Calculate a point in between</h1>');
var inBetween = google.maps.geometry.spherical.interpolate(nyc, london, 0.5);
document.write('half distance from nyc to london: ' + inBetween);

//-->
</SCRIPT>
