<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome <?php echo $_SESSION['username']  ?></title>
    <!--css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
     
    <link rel="stylesheet" href="../style.css">

    <style>
      .profile_img{
    width: 80%;
    height: 80%;
    object-fit: contain;
     }
    body{
      overflow-x:hidden;
        
    }
    .edit_image{
      width:100px;
      height:100px;
      object-fit: contain;
    }
    </style>
     
  </head>
  <body class="p-0 m-0 border- bd-red m-0 border-0">
  
  <nav class="navbar navbar-expand-lg bg-secondary">
      <div class="container-fluid m-2">
        <img src="../Images/ecommerce.png" alt="" class="brand">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php" style="color:white">Home</a>
            </li>
             
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php" style="color:white">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php" style="color:white">MyAccount</a>
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
              <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"><sub>
                <?php
                cart_item();
                ?>
              </sub></i></a>
            </li>
            <div class="container-fluid p-0">
        
        <form class="d-flex" role="search" action="../search_product.php" method="get">
          
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
               <a class='nav-link' href='#' style='color:white'>Welcome ".$_SESSION['username']."</a>
               </li> ";
               }
             ?>       
            <?php
               if(!isset($_SESSION['username'])){
               echo "<li class='nav-item'>
               <a class='nav-link' href='user_login.php' style='color:white'>login</a>
               </li> ";
               }else{
                echo "<li class='nav-item'>
               <a class='nav-link' href='logout.php' style='color:white'>logout</a>
               </li> ";
               }
             ?>       
  
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
   <ul class="navbar-nav text-center">
   <li class="nav-item bg-dark">
          <a href="#" class="nav-link" style="color:white" ><h4>Your Profile</h4></a>
        </li>

        <?php

          $username=$_SESSION['username'];
          $user_image="Select * from `user_table` where username='$username'";
          $user_image=mysqli_query($con,$user_image);
          $row_image=mysqli_fetch_array($user_image);
          $user_image=$row_image['user_image'];
          echo "<li class='nav-item bg-light'>
         <img src='./user_images/$user_image' class='profile_img py-4'>
        </li>"; 


         ?>
   
        <li class="nav-item">
          <a href="profile.php?edit_account" class="nav-link" >Edit Account</a>
        </li>
        <li class="nav-item">
          <a href="profile.php?delete_account" class="nav-link" >Delete Account</a>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link" >Logout</a>
        </li>
   </ul>
    </div>
    <div class="col-md-10 text-center">

      <?php
       if(isset($_GET['edit_account'])){
        include('edit_account.php');
       }
       if(isset($_GET['delete_account'])){
        include('delete_account.php');
       }

     ?>
    </div>

  </div>
 
       
   
   
  
      


  
    <!--js link--> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
  </body>
</html>