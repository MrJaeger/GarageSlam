<?

$id = $_GET['id'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$user = mysql_fetch_assoc(
		mysql_query(
			"select * from `users` where `id` = '" . $id . "'";
		)
);

echo json_encode($user);

mysqli_close($mySQLConnection);

?>