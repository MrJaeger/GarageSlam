<?

$id = $_GET['id'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$project = mysql_fetch_assoc(
		mysql_query(
			"select * from `projects` where `projectid` = '" . $id . "'";
		)
);

echo json_encode($project);

mysqli_close($mySQLConnection);

?>