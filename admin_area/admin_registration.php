<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
     <!--css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />  
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
       <h2 class="text-center mb-5">Admin Registration</h2>
       <div class="row d-flex justify-contain-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/registration.jpg" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name" placeholder="Enter Your Username" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_email" class="form-label">Email</label>
                    <input type="email" id="admin_email" name="admin_email" placeholder="Enter Your Email" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter Your Password" required="required" autocomplete="off" class="form-control">
                </div>
                <div class="form-outline mb-4">
                    <label for="conf_admin_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_admin_password" name="conf_admin_password" placeholder="Enter Your Confirm Password" autocomplete="off" required="required" class="form-control">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="admin_register" value="Register">
                    <p class="small fw-bold mt-2 pt-1 ">Do you already have an Account? <a href="admin_login.php">Login</a></p>
                </div>
            </form>
        </div>
       </div>
    </div>
</body>
</html>


<?php
      if(isset($_POST['admin_register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['admin_password'];
    $conf_admin_password=$_POST['conf_admin_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    
    


    // select query
    $select_query="SELECT * from `admin` where admin_name='$admin_name' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Email already exist')</script>";
    }else if($admin_password!=$conf_admin_password){
        echo "<script>alert('Password does not match')</script>";
    }  
    
   else{
    // insert_query
   $insert_query="INSERT INTO  `admin` (admin_name,admin_email,admin_password) values ('$admin_name','$admin_email','$hash_password')";
   $sql_execute=mysqli_query($con,$insert_query);
   }
   if($sql_execute){
    echo "<script>alert('Registeration Done Successfully')</script>";
    echo "<script>window.open('../index.php','_self')</script>";
   }

  }

?>