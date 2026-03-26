<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-4 text-center">
    <thead>
        <tr>
          <th class="bg-primary">Sr no</th>
          <th class="bg-primary">Brand Title</th>
          <th class="bg-primary">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $select_brand="Select * from `brands`";
         $result=mysqli_query($con,$select_brand);
         $number=0;
         while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
            ?>
        <tr>
            <td class='bg-light'><?php echo $number;?></td>
            <td class='bg-light'><?php echo $brand_title;?></td>
            <td class='bg-light'><a href="index.php?delete_brand=<?php echo $brand_id?>"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
         }
         ?>
    </tbody>
</table>