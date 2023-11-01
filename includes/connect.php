<?php

// connecting to the database
$svrname = "localhost";
$usrname = "root";
$psword = "";
$dtabase = "betterbuy";

// Create the connection
$conn = mysqli_connect($svrname, $usrname, $psword, $dtabase);

// Check the connection
if (!$conn)
    die("Connection failed: " . $conn->connect_error);

?>