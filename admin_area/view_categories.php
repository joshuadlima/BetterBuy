<?php
    global $conn;
    $select_query="select * from categories";
    $result=mysqli_query($conn,$select_query);
    $rowcount=mysqli_num_rows($result);
    $count=0;
    if($rowcount==0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No categories</h2>";
    }
    else
    {


echo "

<h3 class='text-center text-success'>All categories</h3>
<table class='table table-bordered mt-5'>
    <thead class='bg-info'>
        <tr>
            <th>Sr. No</th>
            <th>Category Title</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class='bg-secondary text-light'>
 ";   
    while($row=mysqli_fetch_assoc($result))
    {   
        $count++;
        $category_id=$row['category_id'];
        $category_name=$row['category_name'];
        echo "
        <tr>
            <td>$count</td>
            <td>$category_name</td>
            <td><a href='index.php?delete_category=$category_id''>Delete</a></td>
        </tr>
        ";
    }
   echo " </tbody>
    </table>";
}
?>
        
  
