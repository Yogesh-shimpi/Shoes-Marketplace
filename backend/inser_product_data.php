<?php
    session_start();
    include './connection.php';
    if(isset($_POST['submit'])){
        $img = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
        $folder = "../product_image_data/" . $img;
        $brand_name = $_POST['brand-name'];
        $product_name = $_POST['product-name'];
        $discounted_price = $_POST['discounted-price'];
        $price = $_POST['price'];
        $discounted = $_POST['discounted'];
        $category = $_POST['category'];
        $product_detail = serialize($_POST['product_detail']);
        $username =  $_SESSION['username'];

        $sql = "INSERT INTO product_detail (username,image_url,product_name,price,discounted_price,discount,brand,shoes_type,product_detail) VALUES ('$username','$folder','$product_name','$price','$discounted_price','$discounted','$brand_name','$category','$product_detail')";
        if(move_uploaded_file($tmp_image,$folder)){
            if(mysqli_query($conn , $sql)){
                header("Location: ../Account/account.php");
                exit();
            }
        }
    }
?>