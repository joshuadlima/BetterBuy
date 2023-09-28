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
    <!-- bootstrap js link -->
<div class="container-fluid p-0">
    <!-- First child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <!-- logo -->
        <!-- <img src="" alt=""> -->
        BetterBuy.com
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="" class="nav-link">Welcome Guest</a>
            </li>
        </ul>
        <div class="container-fluid">
       
        
        </div>
    </nav>
    <!-- Second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Details</h3>
    </div>
    <!-- Third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
                    <a href="#">
                    <img src="" alt="" class="admin-image">
                </a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="index.php?insert_products" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View products</a></button>
                <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
            </div>
        </div>
    </div>
    <!-- Fourth child -->
    <div class="container my-5">
        <?php
        if(isset($_GET['insert_category']))
        {
            include('insert_categories.php');
        } 
        ?>
        <?php
        if(isset($_GET['insert_products']))
        {
            include('insert_products.php');
        } 
        ?>
    </div>
    <div class="bg-info p-3 text-center footer">
        <p>All rights reserved</p>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  
</body>
</html>