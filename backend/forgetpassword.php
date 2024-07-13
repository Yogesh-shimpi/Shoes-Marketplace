<?php
session_start();
include './connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select username,password from user where username = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_assoc($result);
       if($row['password'] != $password){
        $sql = "UPDATE user SET password = '$password' where username = '$username' ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            
            header("Location: ../Sign in/Sign_in.php");
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            unset($_SESSION['authentication']);
            exit();
        }
       }else{
        $_SESSION['authentication'] = "true";
        header("Location: ../Forget_password/forgetpassword.php");
       }
    }else{
        $_SESSION['authentication'] = "false";
        header("Location: ../Forget_password/forgetpassword.php");
    }
}
