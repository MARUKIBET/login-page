<?php

// params to connect to the database

$dbHost = "Localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "assign";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if(!$conn){
        die ("Cannot connect to the database");
    }
?>
