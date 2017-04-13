<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 3/20/17
 * Time: 8:58 PM
 */
session_start();
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:logout.php');

}
require_once 'db.php';
if(isset($_POST["createcat-btn"])) {
    if(isset($_POST["category"])&&(!empty($_POST["category"]))){

        $cat = $conn->real_escape_string(strip_tags($_POST['category']));
        $usersession = $_SESSION['userSession'];

        $user = $conn->query("SELECT userid FROM user WHERE username='$usersession'");
        $urow = $user->fetch_assoc();
        $userid = $urow['userid'];

        $check_tag = $conn->query("SELECT name FROM category WHERE name like '%$cat%'");
        $count=$check_tag->num_rows;

        if ($count==0) {

            $query = "INSERT INTO category(name,userid) VALUES('$cat','$userid')";

            if ($conn->query($query)) {
                $_SESSION['msgstag'] = "<div class='alert alert-success'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Category successfully created!
             </div>";
                header("Location: landing.php");
            } else {

                $_SESSION['tagsqlmsg'] = "<div class='alert alert-danger'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while creating category!
             </div>";
                header("Location: landing.php");
            }
        }
    }else {
        $_SESSION['tagreqmsg'] = "<div class='alert alert-danger'>
              <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Category name is required!
             </div>";
        header("Location: landing.php");
    }


}