<?php
include_once('databases.php');

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_errno() . " (" . mysqli_connect_error() . ")");
}

if (!empty($_POST)) {
    $output = "";

    $feature_name = mysqli_real_escape_string($connection, $_POST["feature_name"]);
    $feature_short_des = mysqli_real_escape_string($connection, $_POST["feature_short_des"]);
    $feature_long_des = mysqli_real_escape_string($connection, $_POST["feature_long_des"]);
    // echo $_FILES;
    // echo $_FILE['service_icon'];
    // Initialize variables for error handling
    $feature_icon_path = '';
    $feature_images_paths = array();
    $upload_errors = array(); // Array to store any upload errors

  /* ----------- IMAGE UPLOAD ------------------*/
		$dirpath="upload/feature/";
		if (!file_exists($dirpath)) {
		    mkdir($dirpath, 0777, true);
		}
		$output ="";
		$target_dir = "upload/feature/";

		// rename file


		$fn=rand(10,100000);


		$thisfile = basename($_FILES["feature_icon"]["name"]);
		$p = strpos($thisfile,".");
		$ext = substr($thisfile,$p);

		$myfile = $fn.$ext;


		// rename ends
		$thisfile = basename($_FILES["feature_icon"]["name"]);
		$target_file = $target_dir . $myfile;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["feature_icon"]["tmp_name"]);
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
		if ($_FILES["feature_icon"]["size"] > 5500000) {
		    $output = "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & Gfdddd fIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		     $output = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["feature_icon"]["tmp_name"], $target_file)) {
		         $output = "Data saved";
		    } else {
		         $output = "Error";
		    }
		}

		$img = $target_file;	
	/* -----------end IMAGE UPLOAD ------------------*/

   

    if (!empty($upload_errors)) {
        // Handle upload errors
        foreach ($upload_errors as $error) {
            echo $error . '<br>';
        }
        exit;
    }

    // Insert data into the services table
    $query = "INSERT INTO features (image, name, short_desc, long_desc) VALUES ('$img', '$feature_name', '$feature_short_des', '$feature_long_des')";

    if (mysqli_query($connection, $query)) {
        echo "1";
    } else {
        echo("Error description: " . mysqli_error($connection));
    }
}

mysqli_close($connection);
?>