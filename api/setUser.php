<?

$id = mysqli_real_escape_string($_GET['id']); $first = mysqli_real_escape_string($_GET['fname']); $last = mysqli_real_escape_string($_GET['lname']); $location = mysqli_real_escape_string($_GET['location']); $school = mysqli_real_escape_string($_GET['school']); $soundcloud = mysqli_real_escape_string($_GET['soundcloud']);

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

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