<?php
session_start();
include 'connection.php';
// include 'username_exist.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $POB = $_POST['POB'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $user = $_SESSION['username'];
    $pass = $_SESSION['password'];


    $sql = "select username from user where username = '$username'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 0 || $row['username']== $username){
        
        $sql ="UPDATE user set username = '$username', full_name = '$fullname' ,age = '$age',gender = '$gender',dob = '$DOB',dop = '$POB',address = '$address',email = '$email',mobile = '$mobile' where username = '$user' and password = '$pass'";
            
        if(mysqli_query($conn,$sql)){
            $_SESSION['username'] = $username;
            header("Location: ../Account/account.php");
            echo 'success';
            $_SESSION['exist'] = false;
            exit();
        }else{
            echo "data not updated";
        }
    }else{
        header("Location: ../Account/account.php");
        $_SESSION['exist'] = true;
}
}

?>
