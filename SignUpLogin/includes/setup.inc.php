<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS signuplogin";
if (!mysqli_query($conn, $sql)) {
    die("Error creating database: " . mysqli_error($conn));
}

// Create Table
$database = "signuplogin";
$conn = mysqli_connect($servername, $username, $password, $database); 

$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
phone VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL
)";

if (!mysqli_query($conn, $sql)) {

    die("Error creating table: " . mysqli_error($conn));
}

mysqli_close($conn);

?>