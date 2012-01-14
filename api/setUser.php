<?

$id = $_GET['id']; $first = $_GET['fname']; $last = $_GET['lname']; $location = $_GET['location']; $school = $_GET['school'];

$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$query = "INSERT into users VALUES ($id, $first, $last, $location, $school)";
mysqli_query($mySQLConnection, mysqli_real_escape_string($query));

mysqli_close($mySQLConnection);

?>