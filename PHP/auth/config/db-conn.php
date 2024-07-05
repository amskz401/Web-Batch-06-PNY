<?php 

$host = "localhost";
$user = "root";
$pass = "45";
$dbname = "web_b6";

try {
	$dbconn = new mysqli($host, $user, $pass, $dbname);
} catch (Exception $e) {
	die($e->getMessage());
}


?>