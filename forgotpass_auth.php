<?php

// connecting to the database
$svrname = "localhost";
$usrname = "root";
$psword = "";
$dtabase = "users";

// Create the connection
$conn = mysqli_connect($svrname, $usrname, $psword, $dtabase);

// Check the connection
if (!$conn)
    die("Connection failed: " . $conn->connect_error);

session_start();
$username = $_SESSION['username'];
$otp = $_SESSION['otp'];

$getotp = $_POST['otp'];
$newpassword = $_POST['password'];

if ($otp == $getotp) {
    echo "password changed successfully";

    // MODIFY user details into the database
    $sql = "UPDATE `information` SET `password`='$newpassword' WHERE `username`='$username';";
    $result = mysqli_query($conn, $sql);
} else {
    echo "wrong otp entered, password not changed";
}

?>