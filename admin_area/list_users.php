<?php
    global $conn;
    $select_query="select * from categories";
    $result=mysqli_query($conn,$select_query);
    $rowcount=mysqli_num_rows($result);
    $count=0;
    if($rowcount==0)
    {
        echo "<h2 class='text-danger text-center mt-5'>No users</h2>";
    }
    else
    {

echo 
"
<h3 class='text-center text-success'>All users</h3>
<table class='table table-bordered-mt-5'>
    <thead class='bg-info text-center'>
        <tr>
            <th>Sr. No</th>
            <th>UserName</th>
            <th>User email</th>
            <th>User address</th>
            <th>User Mobile</th>
        </tr>
    </thead>
<tbody class='bg-secondary text-light'>
"; 
global $conn;
    $get_products="select * from user_table";
    $result=mysqli_query($conn,$get_products);
    $count=0;
    while($row=mysqli_fetch_assoc($result))
    {
        
        $username=$row['username'];
        $user_email=$row['user_email'];
        $user_address=$row['user_address'];
        $user_mobile=$row['user_mobile'];
        $count++;
    echo "
    <tr class='text-center'>
        <td>$count</td>
        <td> $username</td>
        <td>$user_email</td>
        <td>$user_address</td>
        <td>$user_mobile</td>
    </tr>
    
     </tbody>
    </table>";
    

}
}
?>
