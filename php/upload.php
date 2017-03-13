<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 10:07 AM
 */
 session_start();
   if(isset($_FILES['image'])){
       $rnd=rand(100,999);
       $rnd=$rnd."_";

       $file_name = $rnd.trim($_FILES['image']['name']);
       $file_size =$_FILES['image']['size'];
       $file_tmp =$_FILES['image']['tmp_name'];
       $file_type=$_FILES['image']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));//get file extension

       $expensions= array("jpeg","jpg","png","gif");

       if(in_array($file_ext,$expensions)=== false){
           $errors= true;
               $_SESSION['imgtext']="extension not allowed, please choose a JPEG or PNG file.";
               header('location: landing.php');
       }

       if($file_size > 5242880){
           $errors= true;
           $_SESSION['imgsize']='File size cannot exceed 5 MB';
           header('location: landing.php');
       }

       if($errors!=true){
            $target="uploads/".$file_name;
           move_uploaded_file($file_tmp,$target);
          $_SESSION['imgsuccess']='Image upload was sucessful';
           header('location: landing.php');
       }else {
           echo "Sorry, there was a problem uploading your file.";
       }

   }
