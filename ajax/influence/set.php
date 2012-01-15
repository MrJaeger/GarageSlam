<?

$id = $_GET['id']; $name = $_GET['name'];
$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
$insertQ = "INSERT into influences VALUES ($id, '$name')";
mysqli_close($mySQLConnection);

?>