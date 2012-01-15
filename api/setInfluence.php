<?
	$id = mysqli_real_escape_string($_GET['id']);
	$name = mysqli_real_escape_string($_GET['name']);

	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
	
	mysqli_query($mySQLConnection, "INSERT INTO influences (influenceid, bandName) VALUES('" . $id . "', '" . $name . "')");

	mysqli_close($mySQLConnection);
?>