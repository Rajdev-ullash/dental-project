<?php
include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

If(!empty($_POST)){
	$output = "";
	$pname = mysqli_real_escape_string($connection, $_POST["pname"]);
	$mob = mysqli_real_escape_string($connection, $_POST["mob"]);
	$bdate = mysqli_real_escape_string($connection, $_POST["bdate"]);
	$btime = mysqli_real_escape_string($connection, $_POST["btime"]);



	$query = "INSERT INTO booking(bdate, name, mob, appdate, apptime, status) VALUES (NOW(),'$pname','$mob', '$bdate', '$btime', 'pending')";

	if(mysqli_query($connection, $query)){
			echo '1';
	} else
	    echo("Error description: " . mysqli_error($connection));

	}

?>
