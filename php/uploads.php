<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 11:18 AM
 */
session_start();

    if(isset($_POST["file-btn"])) {

        $folder="uploads/";
       // echo print_r($_FILES['image']);
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        if($imgFile) {

             //generate random image name
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension and make it lowercase
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            $pic = rand(1000,100000000)."-".$imgFile;

            if(in_array($imgExt, $valid_extensions)){//check if extension is valid

                switch ($imgExt) {
                    case "gif ":
                        if (($imgSize < 5242880) && ($_FILES['image']['error'] == 0)) {
                            $_SESSION['imgsize'] = "Image size must be less than 5MB";
                        } else {
                            move_uploaded_file($tmp_dir, $folder . $pic);
                            header('location: landing.php');
                        }
                        echo "Image is a gif";
                        break;
                    case "jpeg":
                        if ($imgSize > 5242880) {
                            $_SESSION['imgsize'] = "Image size must be less than 5MB";
                        } else {
                            move_uploaded_file($tmp_dir, $folder . $pic);
                            header('location: landing.php');
                        }
                        echo "Image is a jpeg";
                        break;
                    case "png ":
                        if ($imgSize > 5242880) {
                            $_SESSION['imgsize'] = "Image size must be less than 5MB";
                        } else {
                            move_uploaded_file($tmp_dir, $folder . $pic);
                            header('location: landing.php');
                        }
                        echo "Image is a png";
                        break;
                    case "jpg ":
                        if ($imgSize > 5242880) {
                            $_SESSION['imgsize'] = "Image size must be less than 5MB";
                        } else {
                            move_uploaded_file($tmp_dir, $folder . $pic);
                            header('location: landing.php');
                        }
                        echo "Image is a jpg";
                        break;
                }
            }
        }
        else {
            echo "File is not an image.";
        }
    }
?>
