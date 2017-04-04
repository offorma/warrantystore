<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 6:48 PM
 */
session_start();
require_once 'db.php';
if(!isset($_SESSION['userSession'])){
    header('location:index.php');

}

if (isset($_POST['btn-ok'])) {
    $file = $_POST['url'];
    if (!unlink($file))
    {
        $_SESSION['filemsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> Oops!! Your file could not be deleted </div>";
        header('location:gallery.php');
    }
    else{
        $usersession = $_SESSION['userSession'];
        $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
        $urow = $user->fetch_assoc();
        $userid = $urow['userid'];

        $query = $conn->query("DELETE FROM receipt where userid = '$userid'AND image_url='$file'");

        $_SESSION['filesuc'] = "<div class='alert alert-success'>
                <span class='glyphicon glyphicon-info-sign'></span> Your file was successfully deleted</div>";
        header('location:gallery.php');
    }
}