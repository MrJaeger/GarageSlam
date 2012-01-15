<?

$term = $_GET['term']; $filter = $_GET['filter'];

$result = array();
$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");


switch($filter) {
	case 'instrument':
		$sQuery = "SELECT * from users JOIN instruments ON users.id = instruments.instrumentid WHERE instruments.instrument LIKE '$term%'";
		$res = mysqli_query($mySQLConnection, $sQuery);
		while($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		break;
	case 'location':
		require_once('helpNearby.php');
		$result = getNearby($mySQLConnection, $term);
		break;
	case 'name':
		$sQuery = "SELECT * from users";
		$names = explode($term, ' ');
		foreach($names as $name) {
			$sQuery .= " WHERE first LIKE '$term%' OR last LIKE '$term%'";	
		}
		$res = mysqli_query($mySQLConnection, $sQuery);
		while($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		break;
}

echo json_encode($result);

mysqli_close($mySQLConnection);
?>