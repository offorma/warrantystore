<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 5:29 PM
 */
session_start();

require_once 'db.php';

require '/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

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

                $unam = strip_tags($un);
                $emai = strip_tags($em);
                $upas = strip_tags($up);

                $uname = $conn->real_escape_string($unam);
                $email = $conn->real_escape_string($emai);
                $upass = $conn->real_escape_string($upas);

                $hash = md5( rand(0,1000) ); // Generate random 32 character hash and
                $active=0;
                $admin=0;

                $hashed_password = password_hash($upass, PASSWORD_DEFAULT); //here i am hashing the password

                $check_email = $conn->query("SELECT email FROM user WHERE email ='$email'");
                $count=$check_email->num_rows;

                if ($count==0) {

                    $query = "INSERT INTO user(username,email,password,hash,active,admin) VALUES('$uname','$email','$hashed_password','$hash','$active','$admin')";

                    if ($conn->query($query)) {



                        $mail->IsSMTP();
                        $mail->Host = 'ssl://smtp.gmail.com';
                        $mail->Port = 465; //can be 587
                        $mail->SMTPAuth = TRUE;

                        $mail->Username = 'warrantystoresafe@gmail.com';

                        $mail->Password = 'warranty@team3';


                        $mail->setFrom('offorma@gmail.com', 'Warranty Store');
                        $mail->addAddress("$email", "$uname");
                        $mail->Subject  = 'Signup | Verification';
                        $mail->Body     = 'Thanks for signing up!
                        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
                        ------------------------
                        Username: '.$unam.'
                        Password: '.$upass.'
                        ------------------------
 
                        Please click this link to activate your account:
                        http://teamewarranty.azurewebsites.net/php/verify.php?email='.$email.'&hash='.$hash.'';
                        if(!$mail->send()) {
                            $_SESSION['mailmsg']= "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Failed to send Verification Email !
                            </div>";
                            header("Location: loginpg.php");
                        }
                        } else {
                            $_SESSION['mailmsg']= "<div class='alert alert-success'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered please verify account by clicking on the link sent to your email !
                            </div>";

                            header("Location: loginpg.php");
                        }

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

    $conn->close();
        ?>

