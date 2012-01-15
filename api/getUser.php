<?

$id = $_GET['id'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$user = mysqli_fetch_assoc(
		mysqli_query(
			$mySQLConnection, "select * from `users` where `id` = '" . $id . "'"
		)
);

$user['influences'] = array();
$iQuery = "SELECT * from influences WHERE influenceid = $id";
$iResult = mysqli_query($mySQLConnection, $iQuery);
while($row = mysqli_fetch_assoc($iResult)) {
	$user['influences'][] = $row['bandName'];
}

$user['genres'] = array();
$gQuery = "SELECT * from genres WHERE genreid = $id";
$gResult = mysqli_query($mySQLConnection, $gQuery);
while($row = mysqli_fetch_assoc($gResult)) {
	$user['genres'][] = $row['genre'];
}

echo json_encode($user);

mysqli_close($mySQLConnection);

?>