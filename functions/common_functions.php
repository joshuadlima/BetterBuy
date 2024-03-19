<?php
include ('../includes/connect.php');

// function to get products from db
function get_products()
{
    global $conn;
    // $select_query;
    global $select_query;

    if (isset ($_GET['category']))
        $select_query = "SELECT * FROM `products` ORDER BY rand()";
    else
        $select_query = "SELECT * FROM `products` ORDER BY rand() LIMIT 0, 8";

    $result_query = mysqli_query($conn, $select_query);

    $count = 0;
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $product_id = $row_data['product_id'];
        $product_name = $row_data['product_name'];
        $product_price = $row_data['product_price'];
        $product_category = $row_data['category_id'];
        $product_image = $row_data['product_image'];
        $product_description = $row_data['product_description'];

        if (!isset ($_GET['category']) or $_GET['category'] == $product_category) {
            $count++;
            echo "<div class='col-lg-3 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='bg-image hover-zoom hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='$product_image'
                            class='w-100' />
                        <a href='index.php?product_id=$product_id'>
                            <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                        </a>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>Rs. $product_price.00</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>ADD TO CART</a>
                        <a href='index.php?product_id=$product_id' class='btn btn-primary'>VIEW MORE</a>
                    </div>
                </div>
            </div>";
        }
    }

    // in case of 0 products being displayed
    if (!$count) {
        echo
            "<div class='alert alert-warning alert-dismissible fade show' role='alert' style='background-color: pink;'>
            <strong>SORRY! OUT OF STOCK
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}

// function to get categories from db
function get_categories()
{
    global $conn;
    $select_cat = "SELECT * FROM `categories`";
    $result_cat = mysqli_query($conn, $select_cat);
    while ($row_data = mysqli_fetch_assoc($result_cat)) {
        $cat_name = $row_data['category_name'];
        $cat_id = $row_data['category_id'];
        echo "<li><a class='dropdown-item' href='index.php?category=$cat_id'>$cat_name</a></li>";
    }
}

// function to search a product with its name /part of name
function search_products()
{
    global $conn;
    $search_value = $_GET['search_data'];
    $select_query = "SELECT * FROM `products` WHERE product_name LIKE '%$search_value%' ORDER BY rand()";
    $result_query = mysqli_query($conn, $select_query);

    $count = 0;
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $product_id = $row_data['product_id'];
        $product_name = $row_data['product_name'];
        $product_price = $row_data['product_price'];
        $product_category = $row_data['category_id'];
        $product_image = $row_data['product_image'];
        $product_description = $row_data['product_description'];

        if (!isset ($_GET['category']) or $_GET['category'] == $product_category) {
            $count++;
            echo "<div class='col-lg-3 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='bg-image hover-zoom hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='$product_image'
                            class='w-100' />
                        <a href='index.php?product_id=$product_id'>
                            <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                        </a>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>Rs. $product_price.00</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>ADD TO CART</a>
                        <a href='index.php?product_id=$product_id' class='btn btn-primary'>VIEW MORE</a>
                    </div>  
                </div>
            </div>";
        }
    }

    // in case of 0 products being displayed
    if (!$count) {
        echo
            "<div class='alert alert-warning alert-dismissible fade show' role='alert' style='background-color: pink;'>
            <strong>SORRY! OUT OF STOCK
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}

// function to display info of a product after "view more" is clicked
function display_single_product()
{
    global $conn;
    $product_id = $_GET['product_id'];
    $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
    $result_query = mysqli_query($conn, $select_query);

    $row_data = mysqli_fetch_assoc($result_query);
    $product_id = $row_data['product_id'];
    $product_name = $row_data['product_name'];
    $product_price = $row_data['product_price'];
    $product_category = $row_data['category_id'];
    $product_image = $row_data['product_image'];
    $product_description = $row_data['product_description'];


    // for the image
    echo "<div class='col-lg-6 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <img src='$product_image'
                        class='w-100' />
                </div>
            </div>";

    // for the image info
    echo "<div class='col-lg-6 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>Description: $product_description</p>
                        <p class='card-text'>Rs. $product_price.00</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>ADD TO CART</a>
                    </div>  
                </div>
        </div>";

    // run python
    $output = shell_exec(escapeshellcmd('python ./reccommendation.py'));

    // decode json contents
    $str = file_get_contents('./sample.json');
    $json = json_decode($str, true);

    // var_dump($json['40.0']);
    // echo "< " . $json['40.0'] . " > \n";

    // Others Also Bought (reccommendations): 
    echo "<div class='col-lg-12 col-md-12 mt-3'>
                <div class='card shadow bg-white rounded'>
                    <div class='card-body'>
                        <h3 class='card-title'>Others Also Bought: </h3>
                    </div>  
                </div>
        </div>";

    $key = $product_id . '.0';
    recommend_products($key, $json);
}

// get ip adress function  
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty ($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty ($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

//cart function
function cart()
{
    if (isset ($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_id = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "select * from cart_details where ip_address='$get_ip_id' and product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This item is already present inside the cart')</script>";
            echo "<script>location.replace('../homepage')</script>";
        } else {
            $insert_query = "insert into cart_details (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_id',1)";
            $result_query = mysqli_query($conn, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>location.replace('../homepage')</script>";
        }
    }
}

//function to get cart item numbers
function cart_item()
{
    if (isset ($_GET['add_to_cart'])) {
        global $conn;
        $get_ip_id = getIPAddress();
        $select_query = "select * from cart_details where ip_address='$get_ip_id'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $conn;
        $get_ip_id = getIPAddress();
        $select_query = "select * from cart_details where ip_address='$get_ip_id'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
    //echo ""
}

// get total cart price
function computeTotalPrice()
{
    global $conn;
    $total_price = 0;
    $select_query = "SELECT quantity,product_price FROM cart_details,products WHERE cart_details.product_id=products.product_id";
    $result_query = mysqli_query($conn, $select_query);
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $product_price = $row_data['product_price'];
        $product_quantity = $row_data['quantity'];
        $total_price += ($product_price * $product_quantity);
    }

    return $total_price;
}

// get total cart price
function update_ordered_products($razorpay_payment_id)
{
    global $conn;
    $select_query = "SELECT product_id,quantity FROM cart_details";
    $result_query = mysqli_query($conn, $select_query);
    $handle = fopen("../resources/purchase_history_apriori.csv", "a");
    $i = 0;
    while ($row_data = mysqli_fetch_assoc($result_query)) {
        $product_id = $row_data['product_id'];
        $product_quantity = $row_data['quantity'];
        $line[$i] = $product_id;
        $i++;
        //echo "$line";
        $insert_query = "INSERT INTO ordered_products(`razorpay_payment_id`, `product_id`, `product_quantity`) VALUES('$razorpay_payment_id', '$product_id', '$product_quantity')";
        mysqli_query($conn, $insert_query);
    }
    fputcsv($handle, $line);
    fclose($handle);
}

// product recommendations
function recommend_products($key, $json)
{
    if (key_exists($key, $json)) {
        $suggestions = $json[$key];
        global $conn;
        global $select_query;

        $count = 0;
        while ($count < min(4, count($suggestions))) {
            $pid = $suggestions[$count];
            $select_query = "SELECT * FROM `products` WHERE `product_id` = $pid ORDER BY rand() LIMIT 0, 4";
            $result_query = mysqli_query($conn, $select_query);
            $row_data = mysqli_fetch_assoc($result_query);

            $product_id = $row_data['product_id'];
            $product_name = $row_data['product_name'];
            $product_price = $row_data['product_price'];
            $product_category = $row_data['category_id'];
            $product_image = $row_data['product_image'];
            $product_description = $row_data['product_description'];

            $count++;
            echo "<div class='col-lg-3 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='bg-image hover-zoom hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='$product_image'
                            class='w-100' />
                        <a href='index.php?product_id=$product_id'>
                            <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                        </a>
                    </div>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_name</h5>
                        <p class='card-text'>Rs. $product_price.00</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>ADD TO CART</a>
                        <a href='index.php?product_id=$product_id' class='btn btn-primary'>VIEW MORE</a>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo
            "<div class='alert alert-warning alert-dismissible fade show' role='alert' style='background-color: pink;'>
            <strong>SORRY! NO PRODUCT HISTORY :(
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
}
