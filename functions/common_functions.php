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
                        <a href='#' class='btn btn-primary'>ADD TO CART</a>
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
                        <a href='#' class='btn btn-primary'>ADD TO CART</a>
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
            <a href='#' class='btn btn-primary'>ADD TO CART</a>
        </div>  
    </div>
</div>";


}
?>