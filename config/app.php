<?php
define('DBhost', "localhost:3306");
define('DBuser', "root");
define('DBpassword', "");
define('DBdatabase', "student");

include('DatabaseConnection.php');
$db = new DatabaseConnection();
?>
