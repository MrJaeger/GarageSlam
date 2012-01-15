<?
	$id = $_GET['id'];
	$instrument = $_GET['instrument'];

	$mySQLConnection = mysqli_connect("mysql.slamwhale.com", "slamwhale", "cloudwhale00", "garageslam");
	
	mysqli_query($mySQLConnection, "INSERT INTO instruments (instrumentid, instrument) VALUES('" . $id . "', '" . $instrument . "')");

	mysqli_close($mySQLConnection);
?>