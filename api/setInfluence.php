<?
	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");

	$id = $mySQLConnection, $_GET['id'];
	$name = $mySQLConnection, $_GET['name'];
	
	mysqli_query($mySQLConnection, "INSERT INTO influences (influenceid, bandName) VALUES('" . $id . "', '" . $name . "')");

	mysqli_close($mySQLConnection);
?>