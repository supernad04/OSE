<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "osedb";

$con = new mysqli($servername, $username, $password, $database);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
?>