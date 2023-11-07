<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  

// function computeTotalPrice()
// {
//     global $conn;
//     $total_price = 0;
//     $select_query = "SELECT quantity,product_price FROM cart_details,products WHERE cart_details.product_id=products.product_id";
//     $result_query = mysqli_query($conn, $select_query);
//     while ($row_data = mysqli_fetch_assoc($result_query)) {
//         $product_price = $row_data['product_price'];
//         $product_quantity = $row_data['quantity'];
//         $total_price += ($product_price * $product_quantity);
//     }
//     echo $total_price;
// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart details</title>

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
                        <a class="nav-link" href="about.php">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">ORDERS</a>
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
            </div>
        </div>
    </nav>

    <!-- Calling cart function  -->
    <?php
    cart();
    ?>
    <!-- table to display the cart items -->
    <div class="container" style="margin:auto; margin-top:50px; border-radius: 20px;">
        <div class="row">
            <table class="table table-bordered text-center">


                <!-- php code to display dynamic data -->
                <?php
                $get_ip_add = getIPAddress();
                $total_price = 0;
                $cart_query = "select * from cart_details where ip_address='$get_ip_add'";
                $result = mysqli_query($conn, $cart_query);
                $result_count = mysqli_num_rows($result);
                if ($result_count == 0) {
                    // if there are no items if the cart then....
                    echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                } else {
                    echo "
                        <thead>
                        <tr>
                            <th>PRODUCT NAME</th>
                            <th>PRODUCT IMAGE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL PRICE</th>
                            <th>REMOVE</th>
                            <th colspan='2'>OPERATIONS</th>
                        </tr>
                    </thead>
                    <tbody> ";
                    while ($row = mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $quantities = $row['quantity'];
                        $select_products = "select * from products where product_id='$product_id'";
                        $result_products = mysqli_query($conn, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_products)) {
                            $product_price = array($row_product_price['product_price']);
                            $price_table = $row_product_price['product_price'];
                            $product_name = $row_product_price['product_name'];
                            $product_image = $row_product_price['product_image'];
                            $product_values = array_sum($product_price);
                            $total_price += $product_values;
                            echo "<form method='get' action='cart.php?pr_id=$product_id&'>
                                <tr>
                                    <td>
                                         $product_name
                                    </td>
                                    <td>
                                        <img src='../product_images/$product_image' height='200px'
                                            class='cart_image'>
                                    </td>
                                    <td><input type='text' class='form-control w-50' name='qty' value='$quantities' ></td>";
                            ?>

                            <?php
                            if (isset($_GET['update_cart']) and $_GET['update_cart'] == $product_id) {
                                $product_id = $row_product_price['product_id'];
                                $quantities = $_GET['qty'];
                                $get_ip_add = getIPAddress();
                                $update_cart = "UPDATE cart_details SET quantity=$quantities WHERE ip_address='$get_ip_add' AND product_id=$product_id";
                                $result_product_quantity = mysqli_query($conn, $update_cart);
                                echo "<script>window.open('cart.php','_self');</script>";

                                //$total_price = $total_price * $quantities;
                                //$total_price=computeTotalPrice();
                                //compute_total();
                            }

                            ?>

                            <?php

                            echo "
                            <td>
                                 $price_table
                            </td>
                            <td><input type='checkbox' name='removeitem[]' value='$product_id'></td>
                            <td>

                            <button type='submit' class='btn btn-secondary' value='$product_id' name='update_cart'>
                                Update Cart
                            </button>
                                <input type='submit' class='btn btn-secondary' value='Remove Cart' name='remove_cart'>
                            </td>
                            </tr>
                            </form>";
                        }
                    }
                }
                ?>
                </tbody>
            </table>
            <!-- subtotal -->
            <form method="post">
                <div class="d-flex mb-3">
                    <h4 class="btn btn-dark m-2" style="pointer-events:none; box-shadow:none;">Subtotal:<strong>

                            <?php
                            $total = computeTotalPrice();
                            echo "$total";
                            ?>/-
                        </strong></h4>
                    <input type="submit" class='btn btn-primary m-2' value="Continue Shopping"
                        name="continue_shop">
                    <!-- Redirecting to homepage using 'continue shopping' button -->
                    <?php
                    if (isset($_POST['continue_shop'])) {
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                    ?>
                    <!-- <a> -->
                    <button class='btn btn-primary m-2'>
                        <a href="../authentication/checkout.php" style="color: white;">Checkout</a>
                    </button>
                    <!-- </a> -->
                </div>
            </form>

        </div>
    </div>

    <!-- function to remove items from cart -->
    <?php
    function remove_cart_item()
    {
        global $conn;
        if (isset($_GET['remove_cart'])) {
            foreach ($_GET['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "delete from cart_details where product_id='$remove_id'";
                $run_delete = mysqli_query($conn, $delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item = remove_cart_item();
    ?>


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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>

</body>

</html>