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
       <h2 class="text-center mb-5">Admin Login</h2>
       <div class="row d-flex justify-contain-center">
        <div class="col-lg-6 col-xl-5">
            <img src="../images/login.jpg" alt="Admin Registration" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-4">
            <form action="" method="post">
                <div class="form-outline mb-4">
                    <label for="admin_name" class="form-label">Username</label>
                    <input type="text" id="admin_name" name="admin_name" placeholder="Enter Your Username" required="required" class="form-control" autocomplete="off">
                </div>
                <div class="form-outline mb-4">
                    <label for="admin_password" class="form-label">Password</label>
                    <input type="password" id="admin_password" name="admin_password" placeholder="Enter Your Password" required="required" autocomplete="off" class="form-control">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" name="admin_login" value="Login">
                    <p class="small fw-bold mt-2 pt-1 ">Don't have an Account? <a href="admin_registration.php">Register</a></p>
                </div>
            </form>
        </div>
       </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
  $admin_name=$_POST['admin_name'];
  $admin_password=$_POST['admin_password'];

   $select_query="Select * from `admin` where admin_name='$admin_name'";
   $result=mysqli_query($con,$select_query);
   $row_count=mysqli_num_rows($result);
   $row_data=mysqli_fetch_assoc($result);
   if($row_count>0){
     if(password_verify($admin_password,$row_data['admin_password'])){
      $_SESSION['admin_name']=$admin_name;
       echo "<script>alert('Login Successfully')</script>";
       echo "<script>window.open('index.php','_self')</script>";
      }else{
           echo "<script>alert('Invalid Credentials')</script>";
         }
   }else{
    echo "<script>alert('Invalid Credentials')</script>"; 
   }

}



?>