<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/6/17
 * Time: 6:25 PM
 */
session_start();
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:logout.php');

}
require_once 'db.php';

if(isset($_POST['activate'])) {
    $id = $_POST['id'];

    if($conn->query("UPDATE user SET active=1 WHERE userid='$id'")) {
        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;User account has been activated!
                            </div>";
        header("Location: viewusers.php");
    }else{
        $_SESSION['verifymsg'] = "<div class='alert alert-danger'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;User account could not be activated!
                            </div>";
        header("Location: viewusers.php");
    }

}
if(isset($_POST['deactivate'])) {
    $id = $_POST['id'];

    if($conn->query("UPDATE user SET active=0 WHERE userid='$id'")) {

        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;User account has been de-activated!
                            </div>";
        header("Location: viewusers.php");
    }else{
        $_SESSION['verifymsg'] = "<div class='alert alert-danger'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;User account could not be de-activated!
                            </div>";
        header("Location: viewusers.php");
    }

}