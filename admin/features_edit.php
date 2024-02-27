<?php
include_once('databases.php');

$id = mysqli_real_escape_string($connection, $_POST['did']);
$feature_name = mysqli_real_escape_string($connection, $_POST["feature_name"]);
$feature_short_des = mysqli_real_escape_string($connection, $_POST["feature_short_des"]);
$feature_long_des = mysqli_real_escape_string($connection, $_POST["feature_long_des"]);
$img = '';
$upload_errors = array();

// Check if the feature_icon file has been provided
if (!empty($_FILES["feature_icon"]["name"])) {
    // Image Upload Logic
    $dirpath = "upload/feature/";
    if (!file_exists($dirpath)) {
        mkdir($dirpath, 0777, true);
    }

    $output = "";
    $target_dir = "upload/feature/";

    // Rename file
    $fn = rand(10, 100000);
    $thisfile = basename($_FILES["feature_icon"]["name"]);
    $p = strpos($thisfile, ".");
    $ext = substr($thisfile, $p);
    $myfile = $fn . $ext;

    // Target file
    $target_file = $target_dir . $myfile;
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Check if image file is a valid image
    $check = getimagesize($_FILES["feature_icon"]["tmp_name"]);
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
    if ($_FILES["feature_icon"]["size"] > 2500000) {
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
        if (move_uploaded_file($_FILES["feature_icon"]["tmp_name"], $target_file)) {
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
    // If feature_icon is not provided, retrieve the existing icon_img from the database
    $query = "SELECT image FROM features WHERE id='$id'";
    $result = mysqli_query($connection, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $img = $row['image'];
    } else {
        // Handle the case where no record is found in the database
        echo "Error: No record found in the database.";
        exit();
    }
}



// Update the database
$query = "UPDATE features SET name='$feature_name', image='$img', short_desc='$feature_short_des', long_desc='$feature_long_des' WHERE id='$id'";

if ($result = mysqli_query($connection, $query)) {
    header("Location: features.php");
} else {
    echo "Error: " . $query . " / " . $connection->error;
}
?>