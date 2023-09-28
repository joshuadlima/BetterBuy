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
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$otp = $_SESSION['otp'];

$getotp = $_POST['otp'];

if ($otp == $getotp) {
    // echo "user has been authenticated successfully";
    header('Location: ./homepage/index.php');

    // enter user details into the database
    $sql = "INSERT INTO `information` (`first_name`, `last_name`, `emailid`, `username`, `password`) VALUES ('$first_name', '$last_name', '$email', '$username', '$password');";
    $result = mysqli_query($conn, $sql);

} else {
    echo "wrong otp entered";
}
?>