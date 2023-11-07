<?php
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    $delete_product="delete from categories where category_id='$delete_id'";
    $result=mysqli_query($conn,$delete_product);
    if($result)
    {
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}

?>