<?php
    global $conn;
    $select_query="select * from categories";
    $result=mysqli_query($conn,$select_query);
    $rowcount=mysqli_num_rows($result);
    $count=0;
    if($rowcount==0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No products listed</h2>";
    }
    else
    {

echo 
"
<h3 class='text-center text-success'>All products</h3>
<table class='table table-bordered-mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Delete</th>
        </tr>
    </thead>
<tbody class='bg-secondary text-light'>
"; 
global $conn;
    $get_products="select * from products";
    $result=mysqli_query($conn,$get_products);
    $number=0;
    while($row=mysqli_fetch_assoc($result))
    {
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $product_image=$row['product_image'];
        $product_price=$row['product_price'];
        $number++;
    echo "
    <tr class='text-center'>
        <td>$number</td>
        <td>$product_name</td>
        <td><img src='../product_images/$product_image' height='150px' ></td>
        <td>$product_price/-</td>
        <td>0</td>
        <td><a href='index.php?delete_products=$product_id'>delete</a></td>
    </tr>
    
     ";
    

}
echo "</tbody>
</table>";
}
?>
