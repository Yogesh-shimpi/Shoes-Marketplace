<?php 
session_start();
include 'connection.php';
  if(isset($_SESSION['username']) == null && isset($_SESSION['password']) == null){
    $log_in = false;
  }else{
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
  $sql = "select * from user where  username = '$username' and password = '$password'";
  $result = mysqli_query($conn , $sql);
  $row = mysqli_fetch_assoc($result);
  $log_in = true;
}
?>