<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_POST)){
	$output = "";
	


	$title = mysqli_real_escape_string($connection, $_POST["composition"]);
	$pro_id = mysqli_real_escape_string($connection, $_POST["pro_id"]);
	$uom = mysqli_real_escape_string($connection, $_POST["uom"]);





	$query = "INSERT INTO composition(title,product_id, uom) VALUES ('$title','$pro_id','$uom')";

	if(mysqli_query($connection, $query)){
		
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			//echo $output;
	}

?>
