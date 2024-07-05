<?php 
session_start();
require_once ("config/db-conn.php");



if(isset($_REQUEST['login'])) {

	$email = $_REQUEST['email'];
	$password = md5($_REQUEST['password']);

	$user = $dbconn->query("SELECT * FROM `users` WHERE email = '$email' AND password = '$password'");

	if($user->num_rows === 0) {
		$_SESSION['error'] = "Invalid username/password";
		header("location: login.php"); ;

	} else {
		$fetch_user = $user->fetch_object();
		$_SESSION['user'] = $fetch_user;
		header("location: dashboard.php");
	}


} 
else if(isset($_REQUEST['action'])) {
	session_destroy();
	header("location: index.php");
}
else {

	$full_name = $_REQUEST['full_name'];
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$password = md5($_REQUEST['password']);

	$user = $dbconn->query("SELECT * FROM `users` WHERE email = '$email'");

	if($user->num_rows === 1) {
		$_SESSION['error'] = "email already exists";
		header("location: signup.php");
		exit;
	} else {
		$dbconn->query("INSERT INTO `users`(`full_name`, `username`, `email`, `password`) VALUES ('$full_name', '$username', '$email', '$password')");

		header("Location: login.php");
	}
}



?>