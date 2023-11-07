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
                        <a class="nav-link" href="orders.php">ORDERS</a>
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
<?php
    global $conn;
    if(isset($_SESSION['username']))
    {
    //echo $_SESSION['username'];
    $usersearch=$_SESSION['username'];
    $select_query="select * from user_orders where username='$usersearch'";
    }
    else
    {
        $select_query="select * from user_orders where 0";
    }
    $result=mysqli_query($conn,$select_query);
    $rowcount=mysqli_num_rows($result);
    $count=0;
    if($rowcount==0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No orders</h2>";
    }
    else
    {

echo 
"
<h3 class='text-center text-success mt-5z'>All orders</h3>
<table class='table table-bordered-mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>Order ID</th>
            <th>Amount</th>
            <th>Order Date</th>
            <th>Razorpay ID</th>
            <th>Order Status</th>
        </tr>
    </thead>
<tbody class='bg-secondary text-light'>
"; 
global $conn;
    $count=0;
    while($row=mysqli_fetch_assoc($result))
    {
        
        $order_id=$row['order_id'];
        $amount_due=$row['amount_due'];
        $razorpay_payment_id=$row['razorpay_payment_id'];
        $orderdate=$row['order_date'];
        $orderstatus=$row['order_status'];
    echo "
    <tr class='text-center'>
        <td>$order_id</td>
        <td>$amount_due</td>
        <td> $orderdate</td>
        <td>$razorpay_payment_id</td>
        <td>$orderstatus</td>
        
    </tr>
    
     ";
    

}
}
echo "</tbody>
    </table>";
?>
</body>