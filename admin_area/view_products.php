<?php
global $conn;
$select_query = "select * from categories";
$result = mysqli_query($conn, $select_query);
$rowcount = mysqli_num_rows($result);
$count = 0;
if ($rowcount == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No products listed</h2>";
} else {

    echo
        "
<h3 class='text-center text-success'>ALL PRODUCTS</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>PRODUCT ID</th>
            <th>PRODUCT TITLE</th>
            <th>PRODUCT IMAGE</th>
            <th>PRODUCT PRICE</th>
            <th>TOTAL SOLD</th>
            <th>OPERATION</th>
        </tr>
    </thead>
<tbody class='bg-secondary text-light'>
";
    global $conn;
    $get_products = "select * from products";
    $result = mysqli_query($conn, $get_products);
    $number = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];

        $number++;
        $query = "select product_quantity from ordered_products where product_id='$product_id'";
        $result1 = mysqli_query($conn, $query);
        $product_sold = 0;
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $product_sold += $row1['product_quantity'];
        }
        echo "
    <tr class='text-center'>
        <td>$number</td>
        <td>$product_name</td>
        <td><img src='../product_images/$product_image' height='150px' ></td>
        <td>$product_price/-</td>
        <td>$product_sold</td>
        <td><a href='index.php?delete_products=$product_id' class='btn btn-primary btn-sm'>DELETE</a></td>
    </tr>
    
     ";


    }
    echo "</tbody>
</table>";
}
?>