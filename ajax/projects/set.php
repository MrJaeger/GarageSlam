<?

$name = $_GET['name']; $years = $_GET['years']; $label = $_GET['label']; $location = $_GET['location']; $soundcloud = $_GET['soundcloud'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$checkQ = "SELECT * FROM  projects WHERE name='".$name."'";

if(!mysqli_fetch_assoc(mysqli_query($mySQLConnection, $checkQ))) {
	$insertQ = "INSERT into projects (name, years active, label, location, soundcloud) VALUES ('$name', '$years', '$label', '$location', '$soundcloud')";
}

mysqli_query($mySQLConnection, $insertQ);

?>