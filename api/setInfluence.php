<?
	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

	$id = $_GET['id'];
	$name = $_GET['name'];
	
	mysqli_query($mySQLConnection, "INSERT INTO influences (influenceid, bandName) VALUES('" . $id . "', '" . $name . "')");

	mysqli_close($mySQLConnection);
?>