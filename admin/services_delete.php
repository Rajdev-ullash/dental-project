<?php
 include_once('databases.php');
 	//var_dump($_POST);exit;
  $id = $_GET['id'];
  
  $query = "DELETE from services WHERE id=$id";
 
    if(mysqli_query($connection, $query)){
      echo'1';
  }
      

?>