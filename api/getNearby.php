<?
require_once('helpNearby.php');

$location = $_GET['location'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
$near = getNearby($mySQLConnection, $location);

echo json_encode($near);

mysqli_close($mySQLConnection);

?>