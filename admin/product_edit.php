<?php
 include_once('databases.php');
//var_dump($_POST,$_FILES);exit;
if(!empty($_POST)){
  $id = mysqli_real_escape_string($connection, $_POST["pro_id1"]);
  $title = mysqli_real_escape_string($connection, $_POST["title"]);
  $short_des = mysqli_real_escape_string($connection, $_POST["short_des"]);
  $art = mysqli_real_escape_string($connection, $_POST["art"]);
  $status = mysqli_real_escape_string($connection, $_POST["status"]);
  $category = mysqli_real_escape_string($connection, $_POST["category"]);
  $sub_cat = mysqli_real_escape_string($connection, $_POST["sub_cat"]);
  $type = mysqli_real_escape_string($connection, $_POST["type"]);
  $api = mysqli_real_escape_string($connection, $_POST["api"]);
  $indi_art = mysqli_real_escape_string($connection, $_POST["indi_art"]);
  $cont_art = mysqli_real_escape_string($connection, $_POST["cont_art"]);
  $side_art = mysqli_real_escape_string($connection, $_POST["side_art"]);
  $dos_art = mysqli_real_escape_string($connection, $_POST["dos_art"]);
  $with_art = mysqli_real_escape_string($connection, $_POST["with_art"]);
  $pack_art = mysqli_real_escape_string($connection, $_POST["pack_art"]);
  /* ----------- IMAGE UPLOAD ------------------*/
  if($_FILES["img"]["name"]!=""){
    $dirpath="images/";
    if (!file_exists($dirpath)) {
        mkdir($dirpath, 0777, true);
    }
    $output ="";
    $target_dir = "images/";

    // rename file


    $fn=rand(10,100000);


    $thisfile = basename($_FILES["img"]["name"]);
    $p = strpos($thisfile,".");
    $ext = substr($thisfile,$p);

    $myfile = $fn.$ext;


    // rename ends
    //$thisfile = basename($_FILES["img"]["name"]);
    $target_file = $target_dir . $myfile;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["img"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $output = "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        $output = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["img"]["size"] > 2500000) {
        $output = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    /*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & Gfdddd fIF files are allowed.";
        $uploadOk = 0;
    }*/
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
         $output = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
             $output = "Data saved";
        } else {
             $output = "Error";
        }
    }

    $imagefile = $target_file; 
    }else{
    $imagefile = 'null';
  } 
  /* -----------end IMAGE UPLOAD ------------------*/

  
  if ($imagefile == 'null') {
    $query = "UPDATE product SET title='$title',short_des='$short_des',description='$art',status='$status',indi='$indi_art',contra='$cont_art',side_effect='$side_art',dosage='$dos_art ',withdrawal='$with_art',package='$pack_art',category='$category',sub_cat='$sub_cat',type='$type',api='$api' WHERE id='$id'";
  } else {
    $query = "UPDATE product SET title='$title',short_des='$short_des',description='$art',main_image='$imagefile',status='$status',indi='$indi_art',contra='$cont_art',side_effect='$side_art',dosage='$dos_art ',withdrawal='$with_art',package='$pack_art',category='$category',sub_cat='$sub_cat',type='$type',api='$api' WHERE id='$id'";
  }

  

  if ( $result = mysqli_query($connection, $query)) {
    echo "1";

  } else {
    echo "Error: " . $query . " / " . $connection->error;
  }
}

?>