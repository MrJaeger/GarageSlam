<?
$result = array();
$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$term = $_GET['term']; $filter = $_GET['filter'];

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
		$sQuery = "SELECT * from users WHERE";
		$names = explode(" ", $term);
		foreach($names as $name) {
			$sQuery .= " first LIKE '$name%' OR last LIKE '$name%' OR";	
		}
		$res = mysqli_query($mySQLConnection, substr($sQuery, 0, strlen($sQuery)-2));
		while($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		break;
	case 'genre':
		$sQuery = "SELECT * from users JOIN genres ON users.id = genres.genreid WHERE genres.genre LIKE '$term%'";
		$res = mysqli_query($mySQLConnection, $sQuery);
		while($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		break;
	case 'influence':
		$sQuery = "SELECT * from users JOIN influences ON users.id = influences.influenceid WHERE influences.influence LIKE '$term%'";
		$res = mysqli_query($mySQLConnection, $sQuery);
		while($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;
		}
		break;
}

$back = array();
foreach($result as $r) {
	$back[] = json_decode(file_get_contents("http://garageslam.slamwhale.com/api/getUser.php?id=".$r['id']));
}

echo json_encode($back);

mysqli_close($mySQLConnection);
?>
