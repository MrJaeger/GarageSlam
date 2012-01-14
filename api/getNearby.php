<?

$location = $_GET['location'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$geoData = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".rawurlencode($location)."&sensor=false"));
$lat = $geoData->results[0]->geometry->location->lat;
$long = $geoData->results[0]->geometry->location->lng;

$cQuery = "SELECT * from users WHERE POW((POW(($lat-lat),2)+POW(($long-lng),2)), .5)<.4 ORDER BY POW((POW(($lat-lat),2)+POW(($long-lng),2)), .5) ASC";
$result = mysqli_query($mySQLConnection, $cQuery);
while($row = mysqli_fetch_assoc($result)) {
	print_r($row);
}

mysqli_close($mySQLConnection);

?>