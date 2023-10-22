<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

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
    <link rel="stylesheet" href="homepage.css">


    <!-- material bootstrap -->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
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
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCTS</a>
                    </li>
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
                        <a class="nav-link" href="about.php">ABOUT</a>
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

    <!-- carousel -->
    <?php if (!isset($_GET['search_data_product']) and !isset($_GET['product_id']) and !isset($_GET['category'])) {
        ?>

        <div id="carouselExampleCaptions" class="carousel p-3 slide carousel-fade" data-mdb-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-mdb-target="#carouselExampleCaptions" data-mdb-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner rounded-4">
                <div class="carousel-item active">
                    <img src="../resources/caro1.png" class="d-block w-100" alt="Wild Landscape" />
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <div class="carousel-caption d-none d-sm-block mb-5" style="font-size:50px; opacity:0.8;">
                        <strong>HEY
                            <?php
                            if (isset($_SESSION['username']))
                                echo $_SESSION['username'];
                            else
                                echo "GUEST";
                            ?>!!
                        </strong>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="../resources/caro2.png" class="d-block w-100" alt="Camera" />
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <!-- <div class="carousel-caption d-none d-md-block mb-5">
                </div> -->
                </div>
                <div class="carousel-item">
                    <img src="../resources/caro3.png" class="d-block w-100" alt="Exotic Fruits" />
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.4)"></div>
                    <!-- <div class="carousel-caption d-none d-md-block mb-5">
                </div> -->
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCaptions"
                data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <?php
    }
    ?>

    <!-- product cards -->
    <div class="text-center product-container">
        <div class="row">
            <?php
            if (isset($_GET['search_data_product'])) // case when keyword is searched
                search_products();
            else if (isset($_GET['product_id'])) // case of "view more"
                display_single_product();
            else
                get_products(); // case when nothing is clicked
            ?>
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