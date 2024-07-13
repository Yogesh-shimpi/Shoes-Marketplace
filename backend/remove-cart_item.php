<?php 
    include '../backend/connection.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM cart where id = '$id'";
        if(mysqli_query($conn,$sql)){
            header("Location: ../Cart/cart.php");
        }else{
            echo "the item is not deleted.";
        }
    }
?>