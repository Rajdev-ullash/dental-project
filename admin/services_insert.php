<?php
include_once('databases.php');

if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_errno() . " (" . mysqli_connect_error() . ")");
}

if (!empty($_POST)) {
    $output = "";

    $service_name = mysqli_real_escape_string($connection, $_POST["service_name"]);
    $service_short_des = mysqli_real_escape_string($connection, $_POST["service_short_des"]);
    $service_long_des = mysqli_real_escape_string($connection, $_POST["service_long_des"]);
    // echo $_FILES;
    // echo $_FILE['service_icon'];
    // Initialize variables for error handling
    $service_icon_path = '';
    $service_images_paths = array();
    $upload_errors = array(); // Array to store any upload errors

  /* ----------- IMAGE UPLOAD ------------------*/
		$dirpath="upload/service/";
		if (!file_exists($dirpath)) {
		    mkdir($dirpath, 0777, true);
		}
		$output ="";
		$target_dir = "upload/service/";

		// rename file


		$fn=rand(10,100000);


		$thisfile = basename($_FILES["service_icon"]["name"]);
		$p = strpos($thisfile,".");
		$ext = substr($thisfile,$p);

		$myfile = $fn.$ext;


		// rename ends
		$thisfile = basename($_FILES["service_icon"]["name"]);
		$target_file = $target_dir . $myfile;
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["service_icon"]["tmp_name"]);
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
		if ($_FILES["service_icon"]["size"] > 5500000) {
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
		    if (move_uploaded_file($_FILES["service_icon"]["tmp_name"], $target_file)) {
		         $output = "Data saved";
		    } else {
		         $output = "Error";
		    }
		}

		$img = $target_file;	
	/* -----------end IMAGE UPLOAD ------------------*/

    // Process and handle multiple file uploads for service_images
    if (isset($_FILES['service_images']) && is_array($_FILES['service_images']['tmp_name'])) {
        foreach ($_FILES['service_images']['tmp_name'] as $key => $tmp_name) {
            if (isset($_FILES['service_images']['name'][$key]) && !empty($_FILES['service_images']['name'][$key])) {
                $dirpath = "upload/";
                if (!file_exists($dirpath)) {
                    mkdir($dirpath, 0777, true);
                }

                $target_dir = "upload/";
                $fn = rand(10, 100000);

                $thisfile = basename($_FILES['service_images']['name'][$key]);
                $p = strpos($thisfile, ".");
                $ext = substr($thisfile, $p);

                $myfile = $fn . $ext;

                $target_file = $target_dir . $myfile;
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                // Check if image file is a valid image
                $check = getimagesize($tmp_name);
                if ($check === false) {
                    $upload_errors[] = "File is not a valid image.";
                    $uploadOk = 0;
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                    $upload_errors[] = "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES['service_images']['size'][$key] > 5500000) {
                    $upload_errors[] = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats (you can customize this as needed)
                if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
                    $upload_errors[] = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
                    $uploadOk = 0;
                }

                // If everything is ok, try to upload file
                if ($uploadOk == 1) {
                    if (move_uploaded_file($tmp_name, $target_file)) {
                        $service_images_paths[] = $target_file;
                    } else {
                        $upload_errors[] = "Sorry, there was an error uploading your file.";
                    }
                }
            }
        }
    }

    if (!empty($upload_errors)) {
        // Handle upload errors
        foreach ($upload_errors as $error) {
            echo $error . '<br>';
        }
        exit;
    }

    // Serialize the array of image paths
    $serialized_images = json_encode($service_images_paths);

    // Insert data into the services table
    $query = "INSERT INTO services (icon_img, name, short_desc, long_desc, images) 
              VALUES ('$img', '$service_name', '$service_short_des', '$service_long_des', '$serialized_images')";

    if (mysqli_query($connection, $query)) {
        echo "1";
    } else {
        echo("Error description: " . mysqli_error($connection));
    }
}

mysqli_close($connection);
?>