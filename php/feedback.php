<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/5/17
 * Time: 10:11 PM
 */
session_start();
require_once 'db.php';
if(isset($_POST["feed"])) {
    if(!(empty($_POST['message']))){
        $usersession = $_SESSION['userSession'];
        $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
        $urow = $user->fetch_assoc();
        $userid = $urow['userid'];

        $mes = strip_tags($_POST['message']);

        $message = $conn->real_escape_string($mes);

        $query = "INSERT INTO feedback(details, userid) VALUES('$message','$userid')";
        if ($conn->query($query)) {
            $_SESSION['feedmsg'] = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> Your feedback has been recieved and will be treated as soon as possible</div>";
            header("Location: index.php");
        }else{
            $_SESSION['feedmsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> Somthing went wrong and your feedback has not been sent</div>";
        }
    }else{
        $_SESSION['feedmsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> Somthing went wrong and your feedback has not been sent</div>";
    }

}