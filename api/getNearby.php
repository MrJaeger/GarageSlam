<?
require_once('helpNearby.php');

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$location = mysqli_real_escape_string($mySQLCOnnection, $_GET['location']);

$near = getNearby($mySQLConnection, $location);

echo json_encode($near);

mysqli_close($mySQLConnection);

?>