<?

$id = $_GET['id'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$project = mysqli_fetch_assoc(
		mysqli_query(
			$mySQLConnection, "select * from `projects` where `projectid` = '" . $id . "'";
		)
);

echo json_encode($project);

mysqli_close($mySQLConnection);

?>