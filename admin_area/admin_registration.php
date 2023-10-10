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

// check if admin already exists
if (isset($_POST['admin_register'])) {

    // get admin details from form
    $admin_username = $_POST['admin_username'];
    $admin_address = $_POST['admin_address'];
    $admin_phone = $_POST['admin_phone'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_ip = getIPAddress();

    session_start();
    $_SESSION['admin_username'] = $admin_username;
    $_SESSION['admin_address'] = $admin_address;
    $_SESSION['admin_phone'] = $admin_phone;
    $_SESSION['admin_email'] = $admin_email;
    $_SESSION['admin_password'] = hash('md5', $admin_password);
    $_SESSION['admin_ip'] = $admin_ip;

    $sql = "SELECT * FROM admin_table WHERE admin_username='$admin_username'; ";
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
            $mail->addAddress($admin_email, $user_adminname); //Add a recipient

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
        header('Location: admin_registration_auth.php');

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
                                                <input type="text" id="admin_username" name="admin_username"
                                                    class="form-control" required="required" />
                                                <label class="form-label" for="admin_username">Your Username</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-location-dot fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="admin_address" name="user_address"
                                                    class="form-control" />
                                                <label class="form-label" for="admin_address">Your Address</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-phone fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="tel" id="admin_phone" name="admin_phone"
                                                    class="form-control" />
                                                <label class="form-label" for="admin_phone">Your Phone Number</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="admin_email" name="admin_email"
                                                    class="form-control" />
                                                <label class="form-label" for="admin_email">Your Email</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="admin_password" name="admin_password"
                                                    class="form-control" />
                                                <label class="form-label" for="admin_password">Password</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="conf_admin_password" name="conf_admin_password"
                                                    class="form-control" />
                                                <label class="form-label" for="conf_admin_password">Repeat your
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
                                                <a href="admin_login.php">Already have an account? Login!</a>
                                            </strong>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" value="Register" class="btn btn-primary btn-lg"
                                                name="admin_register">
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