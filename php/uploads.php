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
        echo print_r($_FILES['image']);
        if(isset($_FILES['image'])) {

            $pic = rand(1000,100000)."-".$_FILES['image']['name'];
            $pic_loc = $_FILES['pic']['tmp_name'];
            $type=$_FILES['image']['type'];

                switch ($type) {
                    case "image/gif ":
                        if(($_FILES['image']['size']>5242880)&&($_FILES['image']['size']==0)){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($pic_loc,$folder.$pic);
                        }
                        echo "Image is a gif";
                        break;
                    case "image/jpeg":
                        if(($_FILES['image']['size']>5242880)&&($_FILES['image']['size']==0)){
                            $_SESSION['imgsize']="Image size must be less than 5MB";
                        }else{
                            move_uploaded_file($pic_loc,$folder.$pic);
                        }
                        echo "Image is a jpeg";
                        break;
                    case "image/png ":
                        if(($_FILES['image']['size']>5242880)&&($_FILES['image']['size']==0)){
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
