<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce website</title>
    <!--css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
     
    <link rel="stylesheet" href="style.css">

    <style>
      .cart_img{
    width:100px;
    height:100px;
    object-fit:contain;
}
      body{
      overflow-x:hidden;
        
    }
   
     
    </style>
     
  </head>
  <body class="p-0 m-0 border- bd-red m-0 border-0">
  
  <nav class="navbar navbar-expand-lg bg-secondary">
      <div class="container-fluid m-2">
        <img src="./Images/ecommerce.png" alt="" class="brand">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php" style="color:white">Home</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link" href="display_all.php" style="color:white">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./user_area/user_registration.php" style="color:white">Register</a>
            </li>
           
         <!--   <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:white">
                More
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>-->
             <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sub>
                <?php
                cart_item();
                ?>
              </sub></i></a>
            </li>
            <div class="container-fluid p-0">
        
        <form class="d-flex" role="search" action="search_product.php" method="get">
          
          <input class="form-control me-9" type="search" placeholder="items" name="search_data">
        
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          
        </form>
             </div>      
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- calling cart function-->
     <?php
   
     cart();

      ?>

    <!-- second part-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <ul class="navbar-nav me-auto">
              <?php
               if(!isset($_SESSION['username'])){
               echo " <li class='nav-item'>
                  <a class='nav-link' href='#' style='color:white'>Welcome guest</a>
                </li>  ";
               }else{
                echo "<li class='nav-item'>
               <a class='nav-link' href='./user_area/profile.php' style='color:white'>Welcome ".$_SESSION['username']."</a>
               </li> ";
               }
             ?>       
            <?php
               if(!isset($_SESSION['username'])){
               echo "<li class='nav-item'>
               <a class='nav-link' href='./user_area/user_login.php' style='color:white'>login</a>
               </li> ";
               }else{
                echo "<li class='nav-item'>
               <a class='nav-link' href='./user_area/logout.php' style='color:white'>logout</a>
               </li> ";
               }
             ?>        
               <li class="nav-item">
               <a class="nav-link" href="./admin_area/admin_login.php" style="color:white">Admin</a>
               </li>
      </ul>

      
    </nav> 
<!--third part-->

     <div class="bg-light">
      <h3 class="text-center">Shoppy</h3>
      <p class="text-center">Our store are always open for you</p>
     </div>
  
<!--fourth part-->
  
       
      <div class="container">
        <form action="" method="post">
        <div class="row">
            <table class="table table-bordered">
                
                <tbody>
                  <!-- php code to display cart items -->
                   <?php
                     
                      $get_ip_add = getIPAddress();
                      $total_price=0;
                      $cart_query="select * from `cart_details` where ip_address='$get_ip_add' ";
                      $result=mysqli_query($con,$cart_query);
                      $result_count=mysqli_num_rows($result);
                      if($result_count>0){
                      echo " <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th>Operation</th>
                    </tr>
                </thead>";
                      while($row=mysqli_fetch_array($result)){
                        $product_id=$row['product_id'];
                        $select_products="select * from `products` where product_id='$product_id'";
                        $result_products=mysqli_query($con,$select_products);
                        while($row_product_price=mysqli_fetch_array($result_products)){
                          $product_price=array($row_product_price['product_price']);
                          $price_table=$row_product_price['product_price'];
                          $product_title=$row_product_price['product_title'];
                          $product_image1=$row_product_price['product_image1'];
                          $product_values=array_sum($product_price);
                          $total_price+=$product_values;
                          
                                          
                   ?>
                  <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty"></td>
                     <?php
                       $get_ip_add = getIPAddress();
                       if(isset($_POST['update_cart'])){
                       $quantities=$_POST['qty'];
                       $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                       $result_products_quantity=mysqli_query($con,$update_cart);
                       $total_price=$total_price*$quantities;
                       }
                     ?>
                    <td><?php echo $price_table ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php    echo $product_id    ?>"></td>
                    <td>
                      
                      <input type="submit" value="Update" class="btn btn-primary px-4 mx-3" name="update_cart">
                      <input type="submit" value="Remove" class="btn btn-primary px-4 mx-3" name="remove_cart">
                    </td>
                  </tr>
                  <?php
                   }}} 
               
                   else{
                     echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                   }
                  ?>
                </tbody>
            </table>
            <!-- subtotal and buttons-->
             <div class="d-flex mb-5">
              <?php
               
               $get_ip_add = getIPAddress();
               $cart_query="select * from `cart_details` where ip_address='$get_ip_add' ";
               $result=mysqli_query($con,$cart_query);
               $result_count=mysqli_num_rows($result);
              if($result_count>0){
               echo   "  <h4 class='px-3'>Subtotal:<strong class='text-danger'> $total_price/- </strong></h4>
              <a href='index.php' class='btn btn-primary p-2'><h5>Continue shopping</h5></a>";

               }else{
                echo "<a href='index.php' class='btn btn-primary p-2'><h5>Continue shopping</h5></a>";
               }

              ?>
              
              
              

             </div>
        </div>
      </div>
      </form>
      <!-- function to remove items-->
       <?php
       function remove_cart_item(){
       global $con;
       if(isset($_POST['remove_cart'])){
       foreach($_POST['removeitem'] as $remove_id){
        echo $remove_id;
        $delete_query="Delete from `cart_details` where product_id=$remove_id";
        $run_delete=mysqli_query($con,$delete_query);
        if($run_delete){
         echo "<script>window.open('cart.php','_self')</script>";

        }
       }
      }
       }
       echo $remove_item=remove_cart_item();





       ?>
   <br><br><br><br><br><br><br><br><br><br><br>
        <footer>
       <div class=" bg-info p-3 text-center" class="footer">
       <p>All right reserved ©- Designed by Omkar Patil-2025</p>
       </div>
       </footer>


  
    <!--js link--> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
  </body>
</html>