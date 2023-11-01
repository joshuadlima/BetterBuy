<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
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
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="homepage.css">


    <!-- material bootstrap -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">

            <a class="navbar-brand mt-2 mt-sm-0 rounded" style="background-color: red;" href="index.php">
                <img src="../resources/logo.png" height="50" alt="BetterBuy Logo" loading="lazy" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCTS</a>
                    </li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            PRODUCT CATEGORIES
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php get_categories(); ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">CART <i class="fa-solid fa-cart-shopping"></i>
                            <sup>
                                <?php cart_item() ?>
                            </sup></a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">TOTAL PRICE:
                            <?php
                            $total = computeTotalPrice();
                            echo "$total";
                            ?>
                        </span>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username']))
                            echo "<a class='nav-link' href='logout.php'>LOGOUT</a>";
                        else
                            echo "<a class='nav-link' href='../authentication/user_login.php'>LOGIN</a>";
                        ?>

                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search_data" action="index.php" method="GET">
                    <button class="btn btn-secondary" type="submit" value="Search"
                        name="search_data_product">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Calling cart function  -->
    <?php cart(); ?>

    <div class="about-section paddingTB60 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-6">
                    <div class="about-title clearfix">
                        <h1>About <span>BetterBuy.com</span></h1>
                        <h3>You Better Buy. </h3>
                        <p class="about-paddingB">Welcome to BetterBuy, where the stakes are high, and the savings are
                            even higher. Listen closely, mortal shoppers, for you have entered the realm of ruthless
                            discounts and unparalled quality. Here, indecisiveness is met with peril, and hesitation is
                            devoured by our relentless price slashes. Our deals are sharper than a double-edged sword,
                            and our laughter echoes through the halls of commerce like thunder on a stormy night. </p>
                        <p>Consider this your only warning: defy BetterBuy, and your wallet shall weep. Our prices are
                            not to be trifled with, and our wit is as sharp as a dagger's edge. You've ventured into our
                            domain, and now you must choose: embrace the irresistible allure of savings, or face the
                            wrath of empty pockets and eternal regret. The choice is yours, but remember, in the world
                            of BetterBuy, hesitation is a luxury you cannot afford. Shop wisely, or suffer the
                            consequences. </p>
                        <div class="about-icons">
                            <ul>
                                <li><a href="https://www.facebook.com/"><i id="social-fb"
                                            class="fa fa-facebook-square fa-3x social"></i></a> </li>
                                <li><a href="https://twitter.com/"><i id="social-tw"
                                            class="fa fa-twitter-square fa-3x social"></i></a> </li>
                                <li> <a href="mailto:betterbuy@gmail.com"><i id="social-em"
                                            class="fa fa-envelope-square fa-3x social"></i></a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="about-img">
                        <img src="https://devitems.com/preview/appmom/img/mobile/2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="p-3 text-center" style="background-color: red; color: white;">
        © 1996-2023, BetterBuy.com, Inc. or its affiliates
    </footer>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>

    <!-- material bootstrap js -->
    <script>
        $('.carousel').carousel({
            interval: 2000;
        })
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>