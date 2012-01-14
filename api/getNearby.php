<?

$location = $_GET['location'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$geoData = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".rawurlencode($location)."&sensor=false"));
$lat = $geoData->results[0]->geometry->location->lat;
$long = $geoData->results[0]->geometry->location->lng;

//$cQuery = "SELECT * from users WHERE POW((POW(($lat-lat),2)+POW(($long-lng),2)), .5)<.4 ORDER BY POW((POW(($lat-lat),2)+POW(($long-lng),2)), .5) ASC";
$cQuery = "SELECT id, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($long) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance 
FROM users HAVING distance < 25 ORDER BY distance ASC";
$result = mysqli_query($mySQLConnection, $cQuery);

mysqli_close($mySQLConnection);

?>