<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 10:07 AM
 */

   if(isset($_FILES['image'])){
       $rnd=rand(100,999);
       $rnd=$rnd."_";
       $errors= array();
       $file_name = $rnd.$_FILES['image']['name'];
       $file_size =$_FILES['image']['size'];
       $file_tmp =$_FILES['image']['tmp_name'];
       $file_type=$_FILES['image']['type'];
       $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

       $expensions= array("jpeg","jpg","png","gif");

       if(in_array($file_ext,$expensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
       }

       if($file_size > 5242880){
           $errors[]='File size must be excately 5 MB';
       }

       if(empty($errors)==true){

           move_uploaded_file($file_tmp,"uploads/".$file_name);
           echo "Success";
       }else{
           print_r($errors);
       }
   }
?>