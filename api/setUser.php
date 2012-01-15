<?

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$id = $_GET['id']; $first = $_GET['fname']; $last = $_GET['lname']; $location = $_GET['location']; $school = $_GET['school']; $soundcloud = $_GET['soundcloud'];

$checkQ = "SELECT id FROM users WHERE id='".$id."'";

if(!mysqli_fetch_assoc(mysqli_query($mySQLConnection, $checkQ))) {
	$geoData = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".rawurlencode($location)."&sensor=false"));
	$lat = $geoData->results[0]->geometry->location->lat;
	$long = $geoData->results[0]->geometry->location->lng;
	$insertQ = "INSERT into users VALUES ($id, '$first', '$last', '$location', '$school', '$soundcloud', $lat, $long)";
	mysqli_query($mySQLConnection, $insertQ);
}

mysqli_close($mySQLConnection);

?>