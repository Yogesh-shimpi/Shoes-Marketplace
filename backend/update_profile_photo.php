<?php
session_start(); 
    include './connection.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_FILES['newimage']) ) {
            $newimage = $_FILES['newimage']['name'];
            $tempimage = $_FILES['newimage']['tmp_name'];
            $imageurl = '../user image data/' . basename($newimage);
            $username = $_SESSION['username'];
    
            $sql = "update user set imageurl = '$imageurl' where username = '$username'";
            
            if( mysqli_query($conn,$sql)){
                if(move_uploaded_file($tempimage,$imageurl)){
                    header("Location: ../Account/account.php");
                    echo "image updated successfully";
                    exit();
                }else{
                    echo "file can't upload";
                }
            }else{
                echo "query problem";
            }
        }else{
            echo "image problem";
        }}
?>