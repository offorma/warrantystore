<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/13/17
 * Time: 11:18 AM
 */
session_start();
require_once 'db.php';
    if(isset($_POST["file-btn"])) {

        $folder="../wwwroot";
        //echo print_r($_FILES['image']);
        $imgFile = $_FILES['image']['name'];
        $tmp_dir = $_FILES['image']['tmp_name'];
        $imgSize = $_FILES['image']['size'];
        $rnumber = $_POST['rnumber'];
        $tcharge = $_POST['tcharge'];
        $cat = $_POST['category'];
        $tag[] = $_POST['tag'];
        echo $_POST['tag'];

        if(($imgFile)&&(!empty($rnumber))&&(sizeof($tag)>0)&&(!empty($rnumber))) {

             //generate random image name
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension and make it lowercase
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

            //echo "this image extension".($imgExt)."<br>";
            $pic = rand(1000,100000000)."-".$imgFile;


            //echo in_array($imgExt, $valid_extensions);

            if(in_array($imgExt, $valid_extensions)){//check if extension is valid

                      switch ($imgExt) {
                           case 'gif':
                               if ($imgSize >5242880) {
                                   $_SESSION['imgsize'] = "Image size must be less than 5MB";
                                   header('location: landing.php');
                               } else {
                                   if (!move_uploaded_file($tmp_dir, $folder . $pic)) {
                                       $_SESSION['fileerror'] = "<div class='alert alert-danger'>
                                       <span class='glyphicon glyphicon-info-sign'></span>Image cannot be moved</div>";
                                   } else {
                                       $rnumber1 = $conn->real_escape_string(strip_tags($_POST['rnumber']));
                                       $tcharge1 = floatval($conn->real_escape_string(strip_tags($_POST['tcharge'])));
                                       $catId = $conn->query("SELECT categoryid FROM category WHERE name='$cat'");
                                       $row = $catId->fetch_assoc();
                                       $categoryid = $row["categoryid"];
                                       $usersession = $_SESSION['userSession'];

                                       $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                       $urow = $user->fetch_assoc();
                                       $userid = $urow['userid'];

                                       move_uploaded_file($tmp_dir, $folder . $pic);
                                       $imgurl = $folder . $pic;
                                       $ece=$conn->query("INSERT INTO receipt (image_url, receipt_number, total_charge, categoryid, userid, details)VALUES ('$imgurl', '$rnumber1', '$tcharge1','$categoryid','$userid','')");

                                       echo $rid = mysqli_insert_id($ece);



                                           foreach ($tag as $select) {
                                               $conn->query(" INSERT INTO receipt_tag(receiptid,tagid)VALUES('$rid','$select')");
                                           }
                                       $conn->close();
                                       //header('location: landing.php');
                                       $_SESSION['filesuccess'] = "<div class='alert alert-success'>
                                       <span class='glyphicon glyphicon-info-sign'></span>File upload was successful. Image is a gif</div>";
                                   }
                               }
                               break;
                           case 'jpeg':
                               if ($imgSize > 5242880) {
                                   $_SESSION['imgsize'] = "Image size must be less than 5MB";
                                   header('location: landing.php');
                               } else {
                                   if (!move_uploaded_file($tmp_dir, $folder . $pic)) {
                                       $_SESSION['fileerror'] = "<div class='alert alert-danger'>
                                       <span class='glyphicon glyphicon-info-sign'></span>Image cannot be moved</div>";
                                   } else {
                                       $rnumber1 = $conn->real_escape_string(strip_tags($_POST['rnumber']));
                                       $tcharge1 = floatval($conn->real_escape_string(strip_tags($_POST['tcharge'])));
                                       $catId = $conn->query("SELECT categoryid FROM category WHERE name='$cat'");
                                       $row = $catId->fetch_assoc();
                                       $categoryid = $row["categoryid"];
                                       $usersession = $_SESSION['userSession'];

                                       $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                       $urow = $user->fetch_assoc();
                                       $userid = $urow['userid'];

                                       move_uploaded_file($tmp_dir, $folder . $pic);
                                       $imgurl = $folder . $pic;
                                       $conn->query("INSERT INTO receipt (image_url, receipt_number, total_charge, categoryid, userid, details)VALUES ('$imgurl', '$rnumber1', '$tcharge1','$categoryid','$userid','')");
                                       $conn->close();
                                       header('location: landing.php');
                                       $_SESSION['filesuccess'] = "<div class='alert alert-success'>
                                       <span class='glyphicon glyphicon-info-sign'></span>File upload was successful. Image is a jpeg</div>";
                                   }
                               }
                               break;
                           case 'png':
                               if ($imgSize > 5242880) {
                                   $_SESSION['imgsize'] = "Image size must be less than 5MB";
                                   header('location: landing.php');
                               } else {
                                   if(!move_uploaded_file($tmp_dir, $folder . $pic)){
                                       $_SESSION['fileerror'] = "<div class='alert alert-danger'>
                                       <span class='glyphicon glyphicon-info-sign'></span>Image cannot be moved</div>";
                                   }else{
                                       $rnumber1 = $conn->real_escape_string(strip_tags($_POST['rnumber']));
                                       $tcharge1 = floatval($conn->real_escape_string(strip_tags($_POST['tcharge'])));
                                       $catId = $conn->query("SELECT categoryid FROM category WHERE name='$cat'");
                                       $row = $catId->fetch_assoc();
                                       $categoryid =  $row["categoryid"];
                                       $usersession = $_SESSION['userSession'];

                                       $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                       $urow = $user->fetch_assoc();
                                       $userid = $urow['userid'];

                                       move_uploaded_file($tmp_dir, $folder . $pic);
                                       $imgurl = $folder . $pic;
                                       $conn->query("INSERT INTO receipt (image_url, receipt_number, total_charge, categoryid, userid, details)VALUES ('$imgurl', '$rnumber1', '$tcharge1','$categoryid','$userid','')");
                                       $conn->close();
                                       header('location: landing.php');
                                       $_SESSION['filesuccess'] = "<div class='alert alert-success'>
                                       <span class='glyphicon glyphicon-info-sign'></span>File upload was successful. Image is a png</div>";
                                   }
                               }
                               break;
                           case 'jpg':
                               if ($imgSize > 5242880) {
                                   $_SESSION['imgsize'] = "Image size must be less than 5MB";
                                   header('location: landing.php');
                               } else {
                                   if(!move_uploaded_file($tmp_dir, $folder . $pic)){
                                       $_SESSION['fileerror'] = "<div class='alert alert-danger'>
                                       <span class='glyphicon glyphicon-info-sign'></span>Image cannot be moved</div>";

                                   }else{
                                       $rnumber1 = $conn->real_escape_string(strip_tags($_POST['rnumber']));
                                       $tcharge1 = floatval($conn->real_escape_string(strip_tags($_POST['tcharge'])));
                                       $catId = $conn->query("SELECT categoryid FROM category WHERE name='$cat'");
                                       $row = $catId->fetch_assoc();
                                       $categoryid =  $row["categoryid"];
                                       $usersession = $_SESSION['userSession'];

                                       $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
                                       $urow = $user->fetch_assoc();
                                       $userid = $urow['userid'];

                                       move_uploaded_file($tmp_dir, $folder . $pic);
                                       $imgurl = $folder . $pic;
                                       $conn->query("INSERT INTO receipt (image_url, receipt_number, total_charge, categoryid, userid, details)VALUES ('$imgurl', '$rnumber1', '$tcharge1','$categoryid','$userid','')");
                                       $conn->close();
                                       header('location: landing.php');
                                       $_SESSION['filesuccess'] = "<div class='alert alert-success'>
                                       <span class='glyphicon glyphicon-info-sign'></span>File upload was successful. Image is a jpg</div>";
                                   }
                               }

                               break;
                       }

                }else{
                    $_SESSION['fileextention'] = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span>file must be an image with file extention of jpg, jpeg,png or gif</div>";
                header('location: landing.php');

                 }

               }
               else {
                   $_SESSION['emptyInput'] = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span>Please all input fields must be completed</div>";
                   header('location: landing.php');
               }
    }
