<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-4 text-center">
    <thead>
        <?php
         $get_users="Select * from `user_table`";
         $result=mysqli_query($con,$get_users);
         $row_count=mysqli_num_rows($result);


         if($row_count==0){
            echo "<h2 class='text-danger text-center mt-5'>No Users Available</h2>";
         }else{
            echo "<thead>
            <tr>
            <th class='bg-primary'>Sr no</th>
            <th class='bg-primary'>Username</th>
            <th class='bg-primary'>User Email</th>
            <th class='bg-primary'>User Image</th>
            <th class='bg-primary'>User Address</th>
            <th class='bg-primary'>User Mobile</th>
            </tr>
            </thead>
            <tbody>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
                $user_id=$row_data['user_id'];
                $username=$row_data['username'];
                $user_email=$row_data['user_email'];
                $user_image=$row_data['user_image'];
                $user_address=$row_data['user_address'];
                $user_mobile=$row_data['user_mobile'];
                $number++;
                echo "<tr>
                <td class='bg-light'>$number</td>
                <td class='bg-light'>$username</td>
                <td class='bg-light'>$user_email</td>
                <td class='bg-light'><img src='../user_area/user_images/$user_image' alt='$username' class='product_img'></td>
                <td class='bg-light'>$user_address</td>
                <td class='bg-light'>$user_mobile</td>
                <tr>";
            } 
        
        
        }


        ?>
    </thead>
</table>