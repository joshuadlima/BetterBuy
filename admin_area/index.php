<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- bootstrap js link -->
    <div class="cointainer-fluid p-0">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark ">
            <!-- Container wrapper -->
            <div class="container-fluid">

                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">BetterBuy.com</a>

                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    </ul>

                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->



        <!-- Second child -->
        <div>
            <h3 class="text-center p-2">Manage Details</h3>
        </div>
        <!-- Third child -->
        <div class="row bg-light">
            <div class="bg-dark d-flex flex-row justify-content-around" style="padding: 10px;">


                <div class="button text-center">
                    <button class="btn btn-light" style="margin:10px"><a href="index.php?insert_products"
                            class="nav-link text-dark border-1">Insert Products</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">View
                            products</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="index.php?insert_category"
                            class="nav-link text-dark">Insert Categories</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">View
                            Categories</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">Insert
                            Brands</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">View
                            Brands</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">All
                            orders</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">All
                            payments</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href="" class="nav-link text-dark">List
                            users</a></button>
                    <button class="btn btn-light" style="margin:10px"><a href=""
                            class="nav-link text-dark">Logout</a></button>
                </div>
            </div>
        </div>
        <!-- Fourth child -->
        <div class="container my-5">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            ?>
            <?php
            if (isset($_GET['insert_products'])) {
                include('insert_products.php');
            }
            ?>
        </div>
    </div>

    <!-- footer -->
    <div class="bg-dark p-3 text-center" style="color: white;">
        © 1996-2023, BetterBuy.com, Inc. or its affiliates
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>