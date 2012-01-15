<?

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$id = mysqli_real_escape_string($mySQLConnection, $_GET['id']); $first = mysqli_real_escape_string($mySQLConnection, $_GET['fname']); $last = mysqli_real_escape_string($mySQLConnection, $_GET['lname']); $location = mysqli_real_escape_string($mySQLConnection, $_GET['location']); $school = mysqli_real_escape_string($mySQLConnection, $_GET['school']); $soundcloud = mysqli_real_escape_string($mySQLConnection, $_GET['soundcloud']);

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