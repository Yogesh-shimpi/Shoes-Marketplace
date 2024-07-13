<?php 
session_start();
include './connection.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $sql = "select * from product_detail where id = '$id'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $username = $_SESSION['username'];
            $image_url = $row['image_url'];
            $product_brand = $row['brand']; 
            $product_name = $row['product_name'];
            $discounted_price = $row['discounted_price'];
            $price = $row['price'];
            $discount = $row['discount'];
            $sql = "INSERT INTO cart (username,image_url,product_name,product_brand,discounted_price,price,discount) VALUES ('$username','$image_url','$product_name','$product_brand','$discounted_price','$price','$discount')";
            if(mysqli_query($conn,$sql)){
              header("Location: ../Home/index.php");
              exit();
            }
        }
    }
?>