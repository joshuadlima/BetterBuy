<?php
include('../includes/connect.php');

// function to get products from db
function get_products()
{
    global $conn;
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

        if (!isset($_GET['category']) or $_GET['category'] == $product_category) {
            $count++;
            echo "<div class='col-lg-3 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='bg-image hover-zoom hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='../product_images/$product_image'
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

        if (!isset($_GET['category']) or $_GET['category'] == $product_category) {
            $count++;
            echo "<div class='col-lg-3 col-md-6 mb-4'>
                <div class='card shadow bg-white rounded'>
                    <div class='bg-image hover-zoom hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='../product_images/$product_image'
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
                    <img src='../product_images/$product_image'
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


}

// get ip adress funcntion  
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  


//cart function
function cart(){
if(isset($_GET['add_to_cart'])){
    global $conn;
    $get_ip_id = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from cart_details where ip_address='$get_ip_id' and product_id='$get_product_id'";
    $result_query=mysqli_query($conn,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
    echo "<script>alert('This item is already present inside the cart')</script>";
    echo "<script>window.open('../homepage/index.php,'_self')</script>";
    }
    else{
    $insert_query="insert into cart_details (product_id,ip_address,quantity) values ('$get_product_id','$get_ip_id',0)";
    $result_query=mysqli_query($conn,$insert_query);
    echo "<script>alert('Item is added to cart')</script>";
    echo "<script>window.open('../homepage/index.php,'_self')</script>";
    }
}
}
//function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $conn;
        $get_ip_id = getIPAddress();
        $select_query="select * from cart_details where ip_address='$get_ip_id'";
        $result_query=mysqli_query($conn,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    }
        else{
            global $conn;
            $get_ip_id = getIPAddress();
            $select_query="select * from cart_details where ip_address='$get_ip_id'";
            $result_query=mysqli_query($conn,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }
    echo $count_cart_items;
    //echo ""
}
function total_cart_price(){
 global $conn;
 $get_ip_add=getIPAddress();
 $total_price=0;
 $cart_query="select * from cart_details where ip_address='$get_ip_add'";
 $result=mysqli_query($conn,$cart_query);
 while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="select * from products where product_id='$product_id'";
    $result_products=mysqli_query($conn,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
    $product_price=array($row_product_price['product_price']); 
    $product_values=array_sum($product_price);
    $total_price+=$product_values;
    }
 }
 echo $total_price;
}
