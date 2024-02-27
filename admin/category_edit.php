<?php
 include_once('databases.php');

  $id = mysqli_real_escape_string($connection, $_POST['did']);
  $name = mysqli_real_escape_string($connection, $_POST['category_name']);
    $des = mysqli_real_escape_string($connection, $_POST['category_des']);
  $sl = mysqli_real_escape_string($connection, $_POST['sl']);
    $st = mysqli_real_escape_string($connection, $_POST['status']);

	$query = "UPDATE categories SET name='$name', description='$des', srl='$sl', status='$st' WHERE id='$id'";

  if ( $result = mysqli_query($connection, $query)) {
   header("Location: category.php");
  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }

?>