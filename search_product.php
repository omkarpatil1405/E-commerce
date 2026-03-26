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
           
           
             <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"><sub>
              <?php
                cart_item();
                ?>
              </sub></i></a>
            </li>
            <div class="container-fluid p-0">
        
        <form class="d-flex" role="search" action="" method="get">
          
          <input class="form-control me-9" type="search" placeholder="items" name="search_data">
        
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          
        </form>
             </div>      
          </ul>
        </div>
      </div>
    </nav>
    
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
      <p class="text-center">Our store is always open for you</p>
     </div>
  
<!--fourth part-->
  
  <div class="row">
      <div class="col-md-2 bg-light p-0 text-center">
      <!--sidenav-->
       <ul class="navbar-nav me-auto">
        <li class="nav-item bg-dark">
          <a href="#" class="nav-link" style="color:white"><h4>Brand</h4></a>
        </li>
        <?php
     
        getbrands();

        ?>
       
       </ul>
       <ul class="navbar-nav me-auto">
        <li class="nav-item bg-dark">
          <a href="#" class="nav-link" style="color:white" ><h4>Categories</h4></a>
        </li>
        
        <?php
     
       getcategories();
    
       ?>
        
       </ul>
      

       </div>
      <div class="col-md-10 p-0">
      <!--product-->
      <div class="row px-2">
       
      <!--fetching products-->
       <?php
        // calling function 
        search_product();
        get_unique_categories();
        get_unique_brands();

        
       ?>  
        

      <!--   <div class="col-md-4 mb-2"><div class="card">
         <img src="./images/tomato.jpg" class="card-img-top" alt="...">
         <div class="card-body">
         <h5 class="card-title">tomato</h5>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         <a href="#" class="btn btn-primary">Add to cart</a>
         <a href="#" class="btn btn-secondary">view more</a>
        </div>
        </div>
        </div>-->

        <!--row end-->



        </div>
      <!--col end-->
      
      
      </div>
   
   
   
        <footer>
       <div class=" bg-info p-3 text-center" class="footer">
       <p>All right reserved ©- Designed by Omkar Patil-2025</p>
       </div>
       </footer>


  
    <!--js link--> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
  </body>
</html>