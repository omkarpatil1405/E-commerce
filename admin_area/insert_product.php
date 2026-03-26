<?php

include('../includes/connect.php');

if(isset($_POST['insert_product'])){

    // Sanitize and fetch form data
    $product_title = mysqli_real_escape_string($con, $_POST['product_title']);
    $product_description = mysqli_real_escape_string($con, $_POST['product_description']);
    $product_keywords = mysqli_real_escape_string($con, $_POST['product_keywords']);
    $product_category = mysqli_real_escape_string($con, $_POST['product_category']);
    $product_brand = mysqli_real_escape_string($con, $_POST['product_brand']);
    $product_price = mysqli_real_escape_string($con, $_POST['product_price']);

    // Check if file inputs exist
    $product_image1 = isset($_FILES['product_image1']['name']) ? $_FILES['product_image1']['name'] : '';
    $product_image2 = isset($_FILES['product_image2']['name']) ? $_FILES['product_image2']['name'] : '';
    $product_image3 = isset($_FILES['product_image3']['name']) ? $_FILES['product_image3']['name'] : '';

    $temp_image1 = isset($_FILES['product_image1']['tmp_name']) ? $_FILES['product_image1']['tmp_name'] : '';
    $temp_image2 = isset($_FILES['product_image2']['tmp_name']) ? $_FILES['product_image2']['tmp_name'] : '';
    $temp_image3 = isset($_FILES['product_image3']['tmp_name']) ? $_FILES['product_image3']['tmp_name'] : '';

    // Check if all fields are filled
    if ($product_title == '' || $product_description == '' || $product_keywords == '' || $product_category == '' || $product_brand == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '') {
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        // Move uploaded files to the product_images directory
        if ($_FILES['product_image1']['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($temp_image1, "./product_images/$product_image1");
        } else {
            echo "<script>alert('Error uploading Product Image 1')</script>";
            exit();
        }

        if ($_FILES['product_image2']['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($temp_image2, "./product_images/$product_image2");
        } else {
            echo "<script>alert('Error uploading Product Image 2')</script>";
            exit();
        }

        if ($_FILES['product_image3']['error'] == UPLOAD_ERR_OK) {
            move_uploaded_file($temp_image3, "./product_images/$product_image3");
        } else {
            echo "<script>alert('Error uploading Product Image 3')</script>";
            exit();
        }

        // Insert product into the database
        $insert_products = "INSERT INTO `products` 
                            (product_title, product_description, product_keyword, category_id, brand_id, product_image1, product_image2, product_image3,product_price)
                            VALUES ('$product_title', '$product_description', '$product_keywords', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price')";

        $result_query = mysqli_query($con, $insert_products);
        if($result_query){
            echo "<script>alert('Successfully inserted the product')</script>";
        } else {
            echo "<script>alert('Error inserting product')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!--css link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <!-- Title -->
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" required="required">
            </div>

            <!-- Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" required="required">
            </div>

            <!-- Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" required="required">
            </div>

            <!-- Category -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_category" class="form-select" required="required">
                <option value="">Select a category</option>
            <?php
                $select_query = "SELECT * FROM `categories`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $category_title = $row['category_title'];
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
            ?>
               </select>
            </div>

            <!-- Brand -->
            <div class="form-outline mb-4 w-50 m-auto">
               <select name="product_brand" class="form-select" required="required">
                <option value="">Select a brand</option>
                <?php
                $select_query = "SELECT * FROM `brands`";
                $result_query = mysqli_query($con, $select_query);
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $brand_title = $row['brand_title'];
                    $brand_id = $row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
               ?>
               </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image 1</label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image 2</label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image 3</label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" required="required">
            </div>

            <!-- Submit Button -->
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product" class="btn btn-primary" value="Insert Product">
                <a type="button" class="btn btn-primary" href="index.php">Back</a>
            </div>

        </form>

    </div>
</body>
</html>
