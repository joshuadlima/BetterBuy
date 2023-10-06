<?php
include('../includes/connect.php');
if(isset($_POST['insert_product']))
{
    $product_name=$_POST['product_name'];
    $product_description=$_POST['product_description'];
    $product_category=$_POST['product_category'];
    $product_price=$_POST['product_price'];
    
    //accessing images
    $product_image=$_FILES['product_image']['name'];
    
    //acessing image temp name
    $temp_image=$_FILES['product_image']['tmp_name'];

    //checking empty condition
    if($product_name=='' or  $product_description=='' or $product_category=='' or $product_price=='' or $product_image=='' or $temp_image=='')
    {
        echo "<script> alert('Please fill all the fields')</script>";
        exit();
    }
    else{
    move_uploaded_file($temp_image,"../product_images/$product_image");
    //insert query
    $insert_products="insert into products (product_name,product_description,category_id,product_image,product_price) values ('$product_name','$product_description','$product_category','$product_image','$product_price')";
    $result_query=mysqli_query($conn,$insert_products);
    if($result_query)
    {
        echo "<script> alert('Product inserted successfully')</script>";
    }    
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
        <!-- FORM -->
        <form method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product <Title></Title></label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product title" autocomplete="off" required>
            </div>
            <!-- product desc -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Description<Title></Title></label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required>
            </div>
            <!-- categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="" class="form-label">Category</label>
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_query = "select * from categories";
                    $result_query = mysqli_query($conn, $select_query);
                    while($row=mysqli_fetch_assoc($result_query))
                    {
                       $category_name=$row['category_name'];
                       $category_id=$row['category_id'];
                       echo "<option value='$category_id'>$category_name</option>"; 
                    }

                    ?>
                </select>

            </div>
            <!-- image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Image <Title></Title></label>
                <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Price<Title></Title></label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter price" autocomplete="off" required>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" value="Insert Product" name="insert_product" class="btn btn-info">
            </div>

        </form>
    </div>
</body>

</html>