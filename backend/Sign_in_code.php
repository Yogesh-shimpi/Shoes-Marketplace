<?php
session_start();
include '../backend/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username'  ";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) != 0) {
        $user = mysqli_fetch_assoc($result);
        echo $user['password'];
        if ($password == $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];
            header("Location: ../Home/index.php");
            unset($_SESSION['authentication']);
            exit();
        } else {
            $_SESSION['authentication'] = "true";
            header("Location: ../Sign in/Sign_in.php");
        }
    } else {
        $_SESSION['authentication'] = "false";
        header("Location: ../Sign in/Sign_in.php");
    }
}
?>
