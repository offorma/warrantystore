<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:29 PM
 */
session_start();
session_unset();
if (isset($_SESSION['userSession'])!="") {
    header("Location: landing.php");
}
require_once 'db.php';

if(isset($_POST['signup-btn'])) {
    if (($_POST['password1']!=$_POST['password2'])) {// this checks to see if both password fields are a match
        $_SESSION['passmsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Password fields do not match</div>";
        header("Location: loginpg.php#signup");
    }
    if (empty($_POST['username'])) {//this checks if username field is empty
        $_SESSION['usernamemsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Username field cannot be empty</div>";
        header("Location: loginpg.php#signup");

    }
    if (empty($_POST['email'])) {// this checks if email field is empty
        $_SESSION['emailmsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Email field cannot be empty</div>";
        header("Location: loginpg.php#signup");

    }

    $uname = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $upass = strip_tags($_POST['password1']);

    $uname = $conn->real_escape_string($uname);
    $email = $conn->real_escape_string($email);
    $upass = $conn->real_escape_string($upass);

    $hashed_password = password_hash($upass, PASSWORD_DEFAULT); //here i am hassing the password

    $check_email = $conn->query("SELECT email FROM user WHERE email='$email'");
    $count=$check_email->num_rows;

    if ($count==0) {

        $query = "INSERT INTO user(username,email,password) VALUES('$uname','$email','$hashed_password')";

        if ($conn->query($query)) {
            $msg = "<div class='alert alert-success'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
     </div>";
            $_SESSION['userSession']=$uname;
            header("Location: landing.php");
        }else {

            $_SESSION['sqlmsg'] = "<div class='alert alert-danger'>
      <span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
     </div>";
        }

    } else {
        header("Location: loginpg.php");

        $_SESSION['errormsg'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
    </div>";

    }

    $conn->close();

}