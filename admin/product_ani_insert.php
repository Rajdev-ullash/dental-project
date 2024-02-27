<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_POST)){
	$output = "";
	


	$title = mysqli_real_escape_string($connection, $_POST["animal"]);
	$pro_id = mysqli_real_escape_string($connection, $_POST["pro_id"]);






	$query = "INSERT INTO product_animals (animal_name,product_id) VALUES ('$title','$pro_id')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
