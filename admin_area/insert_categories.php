<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat']))
{
    $category_name=$_POST['cat_title'];
    
    
    
    $select_query="Select * from categories where category_name='$category_name'";
    $result_select=mysqli_query($conn,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0)
    {
        echo "<script>alert('This category is already present in the database')</script>";
    }
    else
    {
        $insert_query="insert into categories (category_name) values ('$category_name') ";
        $result=mysqli_query($conn,$insert_query);
        if($result)
        {
            echo "<script>alert('Category has be inserted')</script>";
        }
    }
}

?>
<h2 class="class-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
<div class="input-group mb-3 w-90">
<span class="input-group-text bg-info" id="basic-addon1"></span>
<input type="text" name="cat_title" placeholder="Insert Categories" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-2 w-10 mb-2 m-auto">
<input type="submit" value="Insert Categories" name="insert_cat" placeholder="Insert Categories" class="form-control bg-info" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
<!-- <button class="bg-info p-3 border-0">Insert Categories</button> -->
</div>
</form>
