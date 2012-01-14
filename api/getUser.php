<?

$id = $_GET['id'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$user = mysqli_fetch_assoc(
		mysqli_query(
			$mySQLConnection, "select * from `users` where `id` = '" . $id . "'"
		)
);

$user['influences'] = array();
$iQuery = "SELECT * from influences WHERE id = $id";
$iResult = mysqli_query($mySQLCOnnection, $iQuery);
while($row = mysqli_fetch_assoc($iResult)) {
	$user['influences'][] = $row['bandName'];
}

echo json_encode($user);

mysqli_close($mySQLConnection);

?>