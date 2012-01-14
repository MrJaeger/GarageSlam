<?

session_start();
if($_SESSION['logged_in']== 1) {
	header("Location: ".$_SERVER['DOCUMENT_ROOT']."/home.php");
}

require_once("facebook.php");

$facebook = new Facebook(array(
  'appId'  => '283313805059550',
  'secret' => '409b470d0d0e0f0478cfda13a4ae4cd3',
));

$params = array(
scope => 'user_about_me, user_education_history, user_hometown, user_location, email',
redirect_uri => $_SERVER['DOCUMENT_ROOT']."/home.php"
);

$loginUrl = $facebook->getLoginUrl($params);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>GarageSlam</title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		
		<!--Stylesheets-->
		<link rel="stylesheet" type="text/css" href="/style.css" />
		<link rel="stylesheet" type="text/css" href="/fonts/Freesans.css">

		<link rel="icon" type="image/ico" href="/favicon.ico">

		<!--Scripts-->
		<script type="text/javascript" src="/include/jquery-1.7.1.min.js"></script>
	</head>
	<body>
		<header>
			<div class="wrapper">
				<div id="login">
					login goes here
				</div>
				<h1><a href="/">GarageSlam</a></h1>
			</div><!--/.wrapper-->
		</header>