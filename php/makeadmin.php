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

}?>

require_once 'db.php';


if(isset($_POST['signup-btn'])) {

}