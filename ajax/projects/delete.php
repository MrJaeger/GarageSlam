<?

$id = $_GET['id']; $name = $_GET['name'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
$selectQ = "SELECT projectid from projects WHERE name = '$name";
$row = mysqli_fetch_assoc(mysqli_query($mySQLConnction, $selectQ));
$pid = $row['projectid'];

$deleteQ = "DELETE FROM projects WHERE projectid = $id and bandName = '$name'";
mysqli_query($mySQLConnection, $deleteQ);

$deleteQ = "DELETE FROM usersProjects WHERE uid = $id and pid = $pid";
mysqli_query($mySQLConnection, $deleteQ);

mysqli_close($mySQLConnection);

?>