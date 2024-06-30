<?php 
require_once ("config/db-connection.php");


if( isset($_REQUEST['id']) ) {
	$mydb->query("DELETE FROM `tbl_products` WHERE `id` = ".$_GET['id']);
	header("Location: /php-crud/");
} 
else if( isset($_POST['update_id']) ) {
	$title = $_POST['title'];
	$stock = $_POST['stock'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$mydb->query("UPDATE `tbl_products` SET `title`='$title',`description`='$description',`price`='$price',`stock`='$stock' WHERE id = ".$_POST['update_id']);
	header("Location: /php-crud/");
}
else {	
	$title = $_POST['title'];
	$stock = $_POST['stock'];
	$description = $_POST['description'];
	$price = $_POST['price'];



	if($title == "") {
		echo "Title is required";
	} else {

		$mydb->query("INSERT INTO tbl_products(title, description, price, stock) VALUES ('$title','$description', $price, $stock)");

		header("Location: /php-crud/");
	}
}

 ?>