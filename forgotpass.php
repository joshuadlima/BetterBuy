<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer\Exception.php';
require 'PHPMailer\SMTP.php';
require 'PHPMailer\PHPMailer.php';

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

// create the table in the database (only run once)
// $sql = "CREATE TABLE `information` (`username` VARCHAR(10) NOT NULL , `first_name` VARCHAR(10) NOT NULL , `last_name` VARCHAR(10) NOT NULL , `emailid` VARCHAR(40) NOT NULL , `password` VARCHAR(20) NOT NULL , PRIMARY KEY (`username`));";
// $result = mysqli_query($conn, $sql);

// get username from form
$username = $_POST['username'];

// check if user already exists
$sql = "SELECT * FROM information WHERE username='$username'; ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    // get access to the row
    $row = mysqli_fetch_assoc($result);
    $email = $row['emailid'];

    // otp check
    $otp = rand(100000, 999999);

    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['otp'] = $otp;

    // -------------------- mailer -----------------------
    // Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'anon.xaea12@gmail.com'; //SMTP username
        $mail->Password = 'pjaqvhlgqujbrnku'; //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('anon.xaea12@gmail.com', 'BetterBuy');
        $mail->addAddress($email, $username); //Add a recipient

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = 'OTP';
        $mail->Body = 'The one time password for your session is: ' . $otp;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    // -------------------- mailer -----------------------


    // redirect browser
    header('Location: forgotpass_auth.html');

} else {
    echo "user doesnt exist";
}

?>