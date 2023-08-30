<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Layout | CodingLab</title>
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <nav>
        <div class="menu">
            <div class="logo">
                <a href="homepage.html"><span style="color:black">B</span>etterBuy.com</a>
            </div>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Feedback</a></li>
            </ul>
        </div>
    </nav>

    <br><br><br><br>

    <div class="center">
        <div class="title">
            <?php
            session_start();
            $username = $_SESSION['username'] ?? null;
            echo "<h1>Welcome $username!!</h1>"
                ?>
        </div>
        <!-- <div class="sub_title">Pure HTML & CSS Only</div>
        <div class="btns">
            <button>Learn More</button>
            <button>Subscribe</button> -->
        <!-- </div> -->
    </div>
</body>

</html>