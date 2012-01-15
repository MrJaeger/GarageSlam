<?

function getNearby($connection, $location) {
	$geoData = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".rawurlencode($location)."&sensor=false"));
	$lat = $geoData->results[0]->geometry->location->lat;
	$long = $geoData->results[0]->geometry->location->lng;

	$cQuery = "SELECT *, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($long) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance 
	FROM users HAVING distance < 25 ORDER BY distance ASC";
	$result = mysqli_query($connection, $cQuery);
	while($row = mysqli_fetch_assoc($result)) {
		$nearby[] = $row;
	}
	return $nearby;
}

?>