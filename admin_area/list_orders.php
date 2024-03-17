<?php
global $conn;
$select_query = "select * from categories";
$result = mysqli_query($conn, $select_query);
$rowcount = mysqli_num_rows($result);
$count = 0;
if ($rowcount == 0) {
    echo "<h2 class='text-danger text-center mt-5'>No users</h2>";
} else {

    echo
        "
<h3 class='text-center text-success'>ALL ORDERS</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>SERIAL NO.</th>
            <th>ORDER NO.</th>
            <th>PRODUCT ID</th>
            <th>PRODUCT NAME</th>
            <th>RAZORPAY PAYMENT ID</th>
            <th>QUANTITY</th>
            <th>TOTAL COST</th>
        </tr>
    </thead>
<tbody class='bg-secondary text-light'>
";
    global $conn;
    $get_products = "select * from ordered_products ";
    $result = mysqli_query($conn, $get_products);
    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {

        $orders_product_id = $row['ordered_products_id'];
        $product_id = $row['product_id'];
        $razorpay_payment_id = $row['razorpay_payment_id'];
        $product_quantity = $row['product_quantity'];
        $count++;
        $product_name_query = "select * from products where product_id='$product_id'";
        $result2 = mysqli_query($conn, $product_name_query);
        while ($row2 = mysqli_fetch_array($result2)) {
            $product_name = $row2['product_name'];
            $cost = $product_quantity * $row2['product_price'];
        }
        global $product_name;
        echo "
    <tr class='text-center'>
        <td>$count</td>
        <td>$orders_product_id</td>
        <td> $product_id</td>
        <td>$product_name</td>
        <td>$razorpay_payment_id</td>
        <td>$product_quantity</td>
        <td>$cost</td>
    </tr>
    
     ";


    }
}
echo "</tbody>
    </table>";
?>