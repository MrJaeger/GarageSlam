<?
	$id = $_GET['id'];
	$name = $_GET['name'];

	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
	
	mysqli_query($mySQLConnection, "INSERT INTO influences (influenceid, bandName) VALUES('" . $id . "', '" . $name . "')");

	mysqli_close($mySQLConnection);
?>