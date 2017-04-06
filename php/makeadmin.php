<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/6/17
 * Time: 6:24 PM
 */
session_start();
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:logout.php');

}

require_once 'db.php';


if(isset($_POST['make'])) {
    $id = $_POST['id'];

    if($conn->query("UPDATE user SET admin=1 WHERE userid='$id'")) {
        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span>User account has been assigned admin privilege!
                            </div>";
        header("Location: viewusers.php");
    }else{
        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span>Failed to assign admin privilege!
                            </div>";
        header("Location: viewusers.php");
    }

    if(isset($_POST['unmake'])) {
        $id = $_POST['id'];

        if ($conn->query("UPDATE user SET admin=0 WHERE userid='$id'")){
            $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span>Admin privilege has been revoked!
                            </div>";
            header("Location: viewusers.php");
        } else {
            $_SESSION['verifymsg'] = "<div class='alert alert-danger'>
                             <span class='glyphicon glyphicon-info-sign'></span>User account failed to be revoked!
                            </div>";
            header("Location: viewusers.php");
        }
    }

}