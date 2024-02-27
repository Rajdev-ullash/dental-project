<?php
include_once('databases.php');

$id = mysqli_real_escape_string($connection, $_POST['did']);
$service_name = mysqli_real_escape_string($connection, $_POST["service_name"]);
$service_short_des = mysqli_real_escape_string($connection, $_POST["service_short_des"]);
$service_long_des = mysqli_real_escape_string($connection, $_POST["service_long_des"]);
$img = '';
$service_images_paths = array();
$upload_errors = array();

// Check if the service_icon file has been provided
if (!empty($_FILES["service_icon"]["name"])) {
    // Image Upload Logic
    $dirpath = "upload/service/";
    if (!file_exists($dirpath)) {
        mkdir($dirpath, 0777, true);
    }

    $output = "";
    $target_dir = "upload/service/";

    // Rename file
    $fn = rand(10, 100000);
    $thisfile = basename($_FILES["service_icon"]["name"]);
    $p = strpos($thisfile, ".");
    $ext = substr($thisfile, $p);
    $myfile = $fn . $ext;

    // Target file
    $target_file = $target_dir . $myfile;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Check if image file is a valid image
    $check = getimagesize($_FILES["service_icon"]["tmp_name"]);
    if ($check === false) {
        $output = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $output = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["service_icon"]["size"] > 2500000) {
        $output = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
        $output = "Sorry, only JPG, JPEG, PNG, GIF files are allowed.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["service_icon"]["tmp_name"], $target_file)) {
            $img = $target_file;
        } else {
            $output = "Error uploading file.";
            echo "Error: " . $output;
            exit();
        }
    } else {
        // Handle the error, you might want to redirect the user or display an error message.
        echo "Error: " . $output;
        exit();
    }
} else {
    // If service_icon is not provided, retrieve the existing icon_img from the database
    $query = "SELECT icon_img FROM services WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $img = $row['icon_img'];
    } else {
        // Handle the case where no record is found in the database
        echo "Error: No record found in the database.";
        exit();
    }
}

// Check if service_images are provided
if (!empty($_FILES["service_images"]["tmp_name"][0])) {
    // Multiple Images Upload Logic
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
                if ($_FILES['service_images']['size'][$key] > 2500000) {
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
    $serialized_images = json_encode($service_images_paths);
} else {
    // If service_images are not provided, retrieve the existing images from the database
    $query = "SELECT images FROM services WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $serialized_images = $row['images'];
    } else {
        // Handle the case where no record is found in the database
        echo "Error: No record found in the database.";
        exit();
    }
}

// Update the database
$query = "UPDATE services SET name='$service_name', icon_img='$img', short_desc='$service_short_des', long_desc='$service_long_des', images='$serialized_images' WHERE id='$id'";

if ($result = mysqli_query($connection, $query)) {
    header("Location: services.php");
} else {
    echo "Error: " . $query . " / " . $connection->error;
}
?>