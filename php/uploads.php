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
        if(isset($_FILES['image'])) {
            $pic = rand(1000,100000)."-".$_FILES['image']['name'];
            $pic_loc = $_FILES['pic']['tmp_name'];

                switch (exif_imagetype('$_FILES["image"]["name"]')) {
                    case "IMAGETYPE_GIF":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($pic_loc,$folder.$pic);
                        }
                        echo "Image is a gif";
                        break;
                    case "IMAGETYPE_JPEG":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($pic_loc,$folder.$pic);
                        }
                        echo "Image is a jpeg";
                        break;
                    case " 	IMAGETYPE_PNG":
                        if($_FILES['image']['tmp_name']>5242880){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($pic_loc,$folder.$pic);
                        }
                        echo "Image is a png";
                        break;
                }
        }
        else {
            echo "File is not an image.";
        }
    }
?>
