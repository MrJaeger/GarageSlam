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
<<<<<<< HEAD
$iResult = mysqli_query($mySQLCnnection, $iQuery);
=======
$iResult = mysqli_query($mySQLConnection, $iQuery);
>>>>>>> 3c02aa74d20d4b41038fef10465c7d3a1a7f859a
while($row = mysqli_fetch_assoc($iResult)) {
	$user['influences'][] = $row['bandName'];
}

echo json_encode($user);

mysqli_close($mySQLConnection);

?>