<?

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$id = $_GET['id'];

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

$user['instruments'] = array();
$inQuery = "SELECT * from instruments WHERE instrumentid = $id";
$inResult = mysqli_query($mySQLConnection, $inQuery);
while($row = mysqli_fetch_assoc($inResult)) {
	$user['instruments'][] = $row['instrument'];
}

$user['projects'] = array();
$pQuery = "SELECT * from projects JOIN usersProjects ON projects.projectid = usersProjects.pid WHERE uid = $id";
$pResult = mysqli_query($mySQLConnection, $pQuery);
while($row = mysqli_fetch_assoc($pResult)) {
	$user['projects'][] = $row;
}

echo json_encode($user);

mysqli_close($mySQLConnection);

?>