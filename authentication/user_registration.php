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

include('../includes/connect.php');
include('../functions/common_functions.php');

// check if user already exists
if (isset($_POST['user_register'])) {

    // get user details from form
    $user_username = $_POST['user_username'];
    $user_address = $_POST['user_address'];
    $user_phone = $_POST['user_phone'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_ip = getIPAddress();

    session_start();
    $_SESSION['user_username'] = $user_username;
    $_SESSION['user_address'] = $user_address;
    $_SESSION['user_phone'] = $user_phone;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['user_password'] = hash('md5', $user_password);
    $_SESSION['user_ip'] = $user_ip;

    $sql = "SELECT * FROM user_table WHERE username='$user_username'; ";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 0) {

        // otp check
        $otp = rand(100000, 999999);
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
            $mail->addAddress($user_email, $user_username); //Add a recipient

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
        header('Location: user_registration_auth.php');

    } else {
        echo "<script>alert('username already exists :(')</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BetterBuy</title>

    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- normal css -->

    <!-- material bootstrap -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                    <form method="POST" class="mx-1 mx-md-4">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="user_username" name="user_username"
                                                    class="form-control" required="required" />
                                                <label class="form-label" for="user_username">Your Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-location-dot fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="user_address" name="user_address"
                                                    class="form-control" />
                                                <label class="form-label" for="user_address">Your Address</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="user_phone" name="user_phone"
                                                    class="form-control" />
                                                <label class="form-label" for="user_phone">Your Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="user_email" name="user_email"
                                                    class="form-control" />
                                                <label class="form-label" for="user_email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="user_password" name="user_password"
                                                    class="form-control" />
                                                <label class="form-label" for="user_password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="conf_user_password" name="conf_user_password"
                                                    class="form-control" />
                                                <label class="form-label" for="conf_user_password">Repeat your
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-1">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mb-2">
                                            <strong class="small">
                                                <a href="user_login.php">Already have an account? Login!</a>
                                            </strong>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Register" class="btn btn-primary btn-lg"
                                                name="user_register">
                                            <!-- <button type="button" class="btn btn-primary btn-lg">Register</button> -->
                                        </div>



                                    </form>

                                </div>

                                <!-- <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <div id="password-message">
                                        <h3>Password must contain:</h3>
                                        <p class="password-message-item invalid">At least
                                            <b>one lowercase letter</b>
                                        </p>
                                        <p class="password-message-item invalid">At least
                                            <b>one uppercase letter</b>
                                        </p>
                                        <p class="password-message-item invalid">At least
                                            <b>one number</b>
                                        </p>
                                        <p class="password-message-item invalid">Minimum
                                            <b>8 characters</b>
                                        </p>
                                        <p class="password-message-item invalid">Passwords
                                            <b>match</b>
                                        </p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- material bootstrap js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>