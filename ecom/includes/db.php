<?php

$host = "localhost";
$username = "root";
$password = "password";
$database = "bca4_test";

$conn = mysqli_connect($host, $username, $password, $database);
if(!$conn){
    echo "Database connection failed" . mysqli_connect_errno();
}