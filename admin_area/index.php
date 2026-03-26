<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!--css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

       <!--font awesome link-->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
     
   
   <link rel="stylesheet" href="../style.css">
   <style>
    .admin_image{
    width: 100px;
    object-fit: contain;
    }
     .product_img{
        width: 100px;
        height: 100px;
        object-fit:contain;
     }
     body{
      overflow-x:hidden;
        
    }
    
    </style>
</head>
<body>
    <!--first part--> 
 <div class="class container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <img src="../images/ecommerce.png" alt="" class="brand">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php" style="color:white">Home</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php" style="color:white">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin_registration.php" style="color:white">Register</a>
            </li>
         </div>
            <nav class="navbar navbar-expand-lg">
            <ul class="class navbar-nav">
            <?php
               if(!isset($_SESSION['admin_name'])){
               echo " <li class='nav-item'>
                  <a class='nav-link' href='#' style='color:white'>Welcome guest</a>
                </li>  ";
               }else{
                echo "<li class='nav-item'>
               <a class='nav-link' href='index.php' style='color:white'>Welcome ".$_SESSION['admin_name']."</a>
               </li> ";
               }
             ?>      
            </ul> 

            </nav>
        </div>
    </nav>
    <!--second part-->
    <div class="class bg-light">
        <h3 class="text-center p-2">Manage details</h3>
    </div>
    <!--third part-->
    <div class="row">
       <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="px-5">
            <a href="#"><img src="../images/images.jpg" alt="" class="admin_image"></a>
            <p class="text-light text-center"> 
                <?php
                 echo isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Guest';
                 ?></p>
        </div>
        <div class=" text-center">
        
       
        <button><a href="insert_product.php" class="nav-link  m-2">Insert Products</a></button>
        <button><a href="index.php?insert_categories" class="nav-link  m-2">Insert Categories</a></button>
        <button><a href="index.php?insert_brands" class="nav-link  m-2">Insert Brands</a></button>
         <button><a href="index.php?view_products" class="nav-link m-2">View Products</a></button>
        <button><a href="index.php?view_categories" class="nav-link  m-2">ViewCategories</a></button>
        <button><a href="index.php?view_brands" class="nav-link m-2">View Brands</a></button>
        <button><a href="index.php?list_users" class="nav-link m-2">List users</a></button>
        <button><a href="admin_logout.php" class="nav-link m-2">Logout</a></button>
        
        </div>
       </div>
    </div>

    <!--fourth part-->
     
    <div class="container my-3">
        <?php
        if(isset($_GET['insert_categories'])){
            include('insert_categories.php');
        }

        if(isset($_GET['insert_brands'])){
            include('insert_brands.php');
        }
        
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include('view_brands.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['delete_brand'])){
            include('delete_brand.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        ?>
    </div>
    

    <br><br><br><br><br><br>
    <footer>
       <div class=" bg-info p-3 text-center">
       <p>All right reserved ©- Designed by Omkar Patil-2025</p>
       </div>
       </footer>
</div>

 


<!--js link--> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  
 

</body>
</html>