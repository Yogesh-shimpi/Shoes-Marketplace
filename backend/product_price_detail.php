<?php

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];

    $count_query = "SELECT COUNT(*) AS total FROM cart where username = '$username'"; 
    $productresult = mysqli_query($conn, $count_query); 
    $productrow = mysqli_fetch_assoc($productresult); 
    
    $count = $productrow['total'];
    
    $productsql = "SELECT sum(price) as total_sum FROM cart where username = '$username'";
    $productresult = mysqli_query($conn,$productsql);
    $productrow = mysqli_fetch_assoc($productresult);
    
    $sum_of_price = $productrow['total_sum'];

    $productsql = "SELECT sum(discounted_price) as total_sum FROM cart where username = '$username'";
    $productresult = mysqli_query($conn,$productsql);
    $productrow = mysqli_fetch_assoc($productresult);
    
    $sum_of_discounted_price = $productrow['total_sum'];

    $discount = $sum_of_price - $sum_of_discounted_price;

    }
?>