<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	
	$category_name = mysqli_real_escape_string($connection, $_POST["category_name"]);
	$category_des = mysqli_real_escape_string($connection, $_POST["category_des"]);
		$sl = mysqli_real_escape_string($connection, $_POST["sl"]);
	$status = mysqli_real_escape_string($connection, $_POST["status"]);



	$query = "INSERT INTO categories(name, description, srl, status) VALUES ('$category_name','$category_des', '$sl', '$status')";

	if(mysqli_query($connection, $query)){
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));

	}

?>
