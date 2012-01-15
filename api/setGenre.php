<?
	$id = $_GET['id'];
	$genre = $_GET['genre'];

	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
	
	mysqli_query($mySQLConnection, "INSERT INTO genres (genreid, genre) VALUES('" . $id . "', '" . $genre . "')");

	mysqli_close($mySQLConnection);
?>