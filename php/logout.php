<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 7:41 PM
 */



session_start();
session_destroy();
header("Location: index.php");

