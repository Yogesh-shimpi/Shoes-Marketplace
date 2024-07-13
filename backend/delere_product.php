<?php 
    include './connection.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM product_detail WHERE id = '$id'";
        if(mysqli_query($conn,$sql)){
            header("Location: ../Account/account.php");
        }
    }
?>