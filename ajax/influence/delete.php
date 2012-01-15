<?

$id = $_GET['id']; $name = $_GET['name'];
$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
$deleteQ = "DELETE FROM influences WHERE influenceid = $id and bandName = '$name'";
mysqli_query($mySQLConnection, $deleteQ);
mysqli_close($mySQLConnection);

?>