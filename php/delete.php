<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 6:48 PM
 */
session_start();
require_once 'db.php';

if (isset($_POST['btn-ok'])) {
    $url=$_POST['btn-ok'];
    echo $url;
}