<?php
 include_once('databases.php');
 	//var_dump($_POST);exit;
  $id = $_POST['id'];
  
  $query = "DELETE from subcategory WHERE id=$id";
 
    if(mysqli_query($connection, $query)){
      echo'1';
  }
      

?>
