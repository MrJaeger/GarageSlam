<?php

session_start();

if($_SESSION['logged_in']== 1) {
	header("Location: http://garageslam.slamwhale.com/home.php");
}

require_once("facebook.php");

$facebook = new Facebook(array(
  'appId'  => '283313805059550',
  'secret' => '409b470d0d0e0f0478cfda13a4ae4cd3',
));

$uid = $facebook->getUser();
echo $uid;

$params = array(
scope => 'read_stream, friends_likes',
redirect_uri => 'http://garageslam.slamwhale.com/home.php'
);

$loginUrl = $facebook->getLoginUrl($params);
echo $loginUrl;

?>

<html>
	<head>
		<title>Sign in through Facebook</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	</head>
	<body>
		<a href="<?= $loginUrl ?>">Sign in to Facebook</a>
	</body>
</html>
