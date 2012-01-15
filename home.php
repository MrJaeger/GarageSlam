<?php

session_start();
$_SESSION['logged_in'] = 1;
print_r($_SESSION['logged_in']);

?>

<html>
</html>