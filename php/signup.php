<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:29 PM
 */
session_start();

require_once 'db.php';

        if(isset($_POST['signup-btn'])) {
            if (($_POST['password1'] != $_POST['password2']) || (empty($_POST['password1'])) || (empty($_POST['password2']))) {// this checks to see if both password fields are a match
                $_SESSION['passmsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Password fields cannot be empty or they do not match</div>";
                header("Location: loginpg.php");
            }else{
                $up=$_POST['password1'];
            }
            if (empty($_POST['username'])) {//this checks if username field is empty
                $_SESSION['usernamemsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Username field cannot be empty</div>";
                header("Location: loginpg.php");

            }else{
                $un=$_POST['username'];
            }
            if (empty($_POST['email'])) {// this checks if email field is empty
                $_SESSION['emailmsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Email field cannot be empty</div>";
                header("Location: loginpg.php");
            }else{
                $em=$_POST['email'];
            }

                $unam = strip_tags($up);
                $emai = strip_tags($un);
                $upas = strip_tags($em);

                $uname = $conn->real_escape_string($unam);
                $email = $conn->real_escape_string($emai);
                $upass = $conn->real_escape_string($upas);

                $hashed_password = password_hash($upass, PASSWORD_DEFAULT); //here i am hashing the password

                $check_email = $conn->query("SELECT email FROM user WHERE email ='$email'");
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
                 </div>"; header("Location: loginpg.php");
                    }

                } else {

                    $_SESSION['errormsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
                </div>";
                    header("Location: loginpg.php");
                }

            }

            $conn->close();
        ?>

