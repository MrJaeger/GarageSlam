<?
$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

$id = mysqli_real_escape_string($mySQLConnection, $_GET['id']);
$genre = mysqli_real_escape_string($mySQLConnection, $_GET['genre']);

mysqli_query($mySQLConnection, "INSERT INTO genres (genreid, genre) VALUES('" . $id . "', '" . $genre . "')");

mysqli_close($mySQLConnection);
?>