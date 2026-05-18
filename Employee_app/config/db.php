<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "employee_db";

/*=====Testing Connection====*/
$conn = mysqli_connect($host, $user, $password, $database);

/*===Checking for Errors====*/
if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}

?>