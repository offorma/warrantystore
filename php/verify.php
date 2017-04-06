<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 4/6/17
 * Time: 12:33 PM
 */
require_once 'db.php';

if ((!empty($_GET['email']))&&(!empty($_GET['hash']))) {

    $emaill=$_GET['email'];
    $hashl=$_GET['hash'];
    $emai = strip_tags($emaill);
    $ha = strip_tags($hashl);

    $email = $conn->real_escape_string($emai);
    $hash = $conn->real_escape_string($ha);

    $conn->query("UPDATE user SET active=1 WHERE email='$email'And hash='$hash'");
    $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Account verification was successful. You can now login to your account !
                            </div>";
    header("Location: loginpg.php");

}