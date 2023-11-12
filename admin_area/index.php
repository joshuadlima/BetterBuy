<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
session_start();

if (!isset($_SESSION['admin_username'])) {
    header('Location: admin_login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light button d-flex justify-content-between" style="background-color:#BE3144;">

        <a class="navbar-brand mt-2 mt-sm-0 rounded" style="" href="index.php">
            <img src="../resources/logo1.png" height="50" alt="BetterBuy Logo" loading="lazy" />
        </a>
        <div class="">
        <button class="btn btn-light " style="margin:10px"><a href="index.php?insert_products" class="nav-link text-dark border-1">Insert Products</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="index.php?view_products" class="nav-link text-dark">View
                products</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="index.php?insert_category" class="nav-link text-dark">Insert Categories</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="index.php?view_categories" class="nav-link text-dark">View
                Categories</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="index.php?list_orders" class="nav-link text-dark">All
                orders</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="index.php?list_users" class="nav-link text-dark">List
                users</a></button>
        <button class="btn btn-light " style="margin:10px"><a href="admin_logout.php" class="nav-link text-dark">Logout</a></button>
        </div>
    </nav>

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
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['delete_products'])) {
            include('delete_products.php');
        }
        if (isset($_GET['view_categories'])) {
            include('view_categories.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['list_users'])) {
            include('list_users.php');
        }
        if (isset($_GET['list_orders'])) {
            include('list_orders.php');
        }
        ?>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- footer -->
    <footer class="p-3 text-center" style="background-color: red; color: white;">
        © 1996-2023, BetterBuy.com, Inc. or its affiliates
    </footer>
</body>

</html>