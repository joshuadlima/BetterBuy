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

// get user details from form
$username = $_POST['username'];
$password = $_POST['password'];

// check if user already exists
$sql = "SELECT * FROM information WHERE username='$username'; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "user doesnt exist, please sign up instead";
} else {
    $row = mysqli_fetch_row($result);
    if ($row[4] != $password) {
        echo "wrong password entered";
    } else {
        echo "welcome $username";
    }

}

?>