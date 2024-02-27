<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_POST)){
	$output = "";
	$category = mysqli_real_escape_string($connection, $_POST["category"]);
	$name = mysqli_real_escape_string($connection, $_POST["name"]);
	





	$query = "INSERT INTO subcategory (category,sub) VALUES ('$category','$name')";

	if(mysqli_query($connection, $query)){
		//echo $query;
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
