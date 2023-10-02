<?php
include('../includes/connect.php');

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

<body style="background-color: rgb(250, 250, 187);">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: orange;">
        <div class="container-fluid">

            <a class="navbar-brand mt-2 mt-sm-0 rounded" style="background-color: brown;" href="index.php">
                <img src="../resources/logo.png" height="50" alt="BetterBuy Logo" loading="lazy" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Product Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $select_cat = "SELECT * FROM `categories`";
                            $result_cat = mysqli_query($conn, $select_cat);
                            while ($row_data = mysqli_fetch_assoc($result_cat)) {
                                $cat_name = $row_data['category_name'];
                                $cat_id = $row_data['category_id'];
                                echo "<li><a class='dropdown-item' href='index.php?category=$cat_id'>$cat_name</a></li>";
                            }

                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cart</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- <div class="row align-items-center">
    <div class="col m-4">
            <div class="card" style="width: 18rem;">
                <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                    class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div> -->

    <div class="text-center product-container">

        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" >
                <div class="card shadow bg-white rounded" >
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card shadow bg-white rounded">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://img.freepik.com/free-photo/flowing-purple-mountain-spiral-bright-imagination-generated-by-ai_188544-9853.jpg?q=10&h=200"
                            class="card-img-top" />
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#!" class="btn btn-primary">Button</a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- footer -->
    <div class="p-3 text-center" style="background-color: orange;">
        © 1996-2023, BetterBuy.com, Inc. or its affiliates
    </div>

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