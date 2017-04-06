<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 6:48 PM
 */
session_start();
require_once 'db.php';

if (isset($_POST['login-btn'])) {
    if ((empty($_POST['email']))||($_POST['email']=="")) {// this checks if email field is empty
        $_SESSION['emailmessage'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Email field cannot be empty </div>";
        header('Location: loginpg.php');
    }
    if ((empty($_POST['password']))||($_POST['password']=="")) {//this checks if password field is empty
        $_SESSION['passwordmessage'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> Password field cannot be empty </div>";
        header('Location:loginpg.php');
    }


    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);

    $query = $conn->query("SELECT username, email, password, active, admin FROM user WHERE email='$email'");
    $row=$query->fetch_array();
    $admin =$row['admin'];
    $active = $row['active'];
    $count = $query->num_rows; // if email/password are correct returns must be 1 row
    if($active==1){
        if($admin==1){
            $_SESSION['admin'] = true;
        }
        if($active==1){
            $_SESSION['active'] = true;
        }
        if (password_verify($password, $row['password']) && $count==1) {
            $_SESSION['userSession'] = $row['username'];
            header("Location: index.php");
        } else {

            $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
            header("Location: loginpg.php");
        }
    }else{
        $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Please verify your account by clicking the link sent to your email!
        </div>";
        header("Location: loginpg.php");
    }

$conn->close();

}