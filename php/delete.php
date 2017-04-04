<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 6:48 PM
 */
session_start();
require_once 'db.php';
$url=$_POST['btn-ok'];
echo $url;

if (isset($_POST['btn-ok'])) {
    echo "hdh";
}