<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 11:18 AM
 */
session_start();
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Check if image file is a actual image or fake image
    if(isset($_POST["file-btn"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($_FILES['image']['size']!=0) {

                switch ($check["mime"]) {
                    case "image/gif":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        }
                        echo "Image is a gif";
                        break;
                    case "image/jpeg":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        }
                        echo "Image is a jpeg";
                        break;
                    case "image/png":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        }
                        echo "Image is a png";
                        break;
                    case "image/bmp":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target);
                        }
                        echo "Image is a bmp";
                        break;
                }
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }
    }
?>
