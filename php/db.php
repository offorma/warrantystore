<?php
/**
 * Created by PhpStorm.
 * User: offormachukwunonso
 * Date: 2/26/17
 * Time: 3:53 PM
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);
$servername = "br-cdbr-azure-south-b.cloudapp.net";
$username = "bc0de30da1c8f0";
$password = "03527049";
$dbname = "warrantystore";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>