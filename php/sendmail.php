<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/8/17
 * Time: 3:01 PM
 */

require_once 'db.php';
require 'PHPMailer/PHPMailerAutoload.php';
?>
<?php include('header.php') ?>
<?php
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('index.php');

}

$mail = new PHPMailer;

if(isset($_POST["send"])){
    print_r($_POST);
        $email=$_POST["toemail"];
        $details=$_POST["details"];
        $reply=$_POST["reply"];

        echo"$details"."$reply"."$email";
        $username=$_POST["username"];

    $mail->IsSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->Port = 465; //can be 587
    $mail->SMTPAuth = TRUE;

    $mail->Username = 'warrantystoresafe@gmail.com';

    $mail->Password = 'warranty@team3';


    $mail->setFrom('warrantystoresafe@gmail.com', 'Warranty Store');
    $mail->addAddress("$email", "$username");
    $mail->Subject = 'Feedback Reply';
    $mail->Body =
        $details

    ."----------------------------------------------".

        $reply;

    if (!$mail->send()) {
        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> Failed to send reply!
                            </div>";
        //header("Location: viewfeedback.php");
    } else {
        $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                            <span class='glyphicon glyphicon-info-sign'></span> Reply was successfully sent!
                            </div>";

        //header("Location: viewfeedback.php");
    }
}