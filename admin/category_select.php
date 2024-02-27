<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

if(!empty($_GET)){
	$output = "";
	
	$id = mysqli_real_escape_string($connection, $_GET["id"]);
	


	$query = "SELECT * FROM categories WHERE id='$id'";

	if(mysqli_query($connection, $query)){
		$row=mysqli_query($connection, $query);
		$result=mysqli_fetch_assoc($row);
		echo json_encode($result);
	} else
	    echo("Error description: " . mysqli_error($connection));
			
			//echo json_encode($output);
			
	}

?>
