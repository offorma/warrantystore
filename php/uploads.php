<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 11:18 AM
 */
session_start();
$target_dir = "uploads/";
$target_file = basename($_FILES["image"]["name"]);

// Check if image file is a actual image or fake image
    if(isset($_POST["file-btn"])) {
        if($_FILES['image']['size']!=0) {

                switch (exif_imagetype('$_FILES["image"]["name"]')) {
                    case "IMAGETYPE_GIF":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
                        }
                        echo "Image is a gif";
                        break;
                    case "IMAGETYPE_JPEG":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
                        }
                        echo "Image is a jpeg";
                        break;
                    case " 	IMAGETYPE_PNG":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir);
                        }
                        echo "Image is a png";
                        break;
                }
        } else {
        echo "File is not an image.";
        $uploadOk = 0;
        }
    }
?>
