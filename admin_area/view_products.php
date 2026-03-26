<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>

</head>
<body>
<h3 class="text-success text-center">All Products</h3>
    <table class="table table-bordered mt-5 text-center">
        <thead>
           <tr>
            <th class="bg-primary">Product Id</th>
            <th class="bg-primary">Product Title</th>
            <th class="bg-primary">Product Image</th>
            <th class="bg-primary">Product Price</th>
            <th class="bg-primary">Delete</th>
           </tr>
        </thead>
        <tbody>
            <?php
            $get_products="Select * from `products`";
            $result=mysqli_query($con,$get_products);
            $number=0;
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image1=$row['product_image1'];
                $product_price=$row['product_price'];
                $number++;
            ?>
               <tr>
            <td class='bg-light'><?php echo $number?></td>
            <td class='bg-light'><?php echo $product_title?></td>
            <td class='bg-light'><img src='./product_images/<?php echo $product_image1?>' class='product_img'></td>
            <td class='bg-light'><?php echo $product_price?></td>
            <td class='bg-light'><a href='index.php?delete_product=<?php echo $product_id?>'><i class='fa-solid fa-trash'></i></a></td>
         </tr>

            <?php
            }
             ?> 
    
        </tbody>
    </table>

</body>
</html>