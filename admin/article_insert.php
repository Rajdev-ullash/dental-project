<?php
include_once('databases.php');

if(mysqli_connect_errno()) {
die("Database connection failed".mysqli_connect_errno()."(".mysqli_connect_error().")");
}

/* ----------- IMAGE UPLOAD ------------------*/
$output ="";
$target_dir = "p_image/";

// rename file

$idquery = "SELECT id FROM img";
$idresult = mysqli_query($connection, $idquery); 
$row = mysqli_fetch_array($idresult);
$id = $row['id'];
$thisid = $id+1;


$incquery = "UPDATE img SET id=$thisid";
$incresult = mysqli_query($connection, $incquery); 

$thisfile = basename($_FILES["staffimage"]["name"]);
$p = strpos($thisfile,".");
$ext = substr($thisfile,$p);

$myfile = $thisid.$ext;


// rename ends

$target_file = $target_dir . $myfile;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["staffimage"]["tmp_name"]);
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
if ($_FILES["staffimage"]["size"] > 1500000) {
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
    if (move_uploaded_file($_FILES["staffimage"]["tmp_name"], $target_file)) {
         $output = "Data saved";
    } else {
         $output = "Error";
    }
}

$imagefile = $target_file;

/*---------------------- IMAGE UPLOAD ENDS ---------------------------*/

If(!empty($_POST)){

	$output = "";
	$category = mysqli_real_escape_string($connection, $_POST["acat"]);
    $atype = mysqli_real_escape_string($connection, $_POST["atype"]);
	//$itemcode = mysqli_real_escape_string($connection, $_POST["itemcode"]);
	$title = mysqli_real_escape_string($connection, $_POST["title"]);
	$sdate = mysqli_real_escape_string($connection, $_POST["sdate"]);
    $kwords = mysqli_real_escape_string($connection, $_POST["kwords"]);
	$sstatus = mysqli_real_escape_string($connection, $_POST["sstatus"]);
     $homep = mysqli_real_escape_string($connection, $_POST["homep"]);


	$query = "INSERT INTO xarticles(category, type, sdate, title, keywords, img, status, homepage)
       VALUES ('$category','$atype','$sdate', '$title', '$kwords', '$imagefile', '$sstatus', '$homep')";

	if(mysqli_query($connection, $query)){
		 header("Location: article.php");
		}
	else{
		 echo "Error: " . $query . "<br>" . mysqli_error($connection);
	}
 
} // if !empty post

?>