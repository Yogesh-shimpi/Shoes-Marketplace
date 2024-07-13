<?php
session_start();
include 'connection.php';
// include 'username_exist.php';
if (isset($_POST['submit'])) {
        if (isset($_FILES['imagename']) ) {
        $imagename = $_FILES['imagename']['name'];
        $imageurl = '../user image data/' . basename($imagename);
    } else {
        echo "Image upload failed. Please try again.";
        exit();
    }
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $DOP = $_POST['DOP'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_no'];
    if($_POST['password'] == $_POST['confirm_password']){
        $password = $_POST['password'];
        $sql = "select username from user where username = '$username'";
    // while($row = $result->fetch_assoc()){
    $result = mysqli_query($conn , $sql);
        if(mysqli_num_rows($result) == 0){
            $sql ="INSERT INTO user (full_name,age,gender,dob,dop,address,email,mobile,password,username,imageurl) VALUES ('$fullname','$age','$gender','$DOB','$DOP','$address','$email','$mobile','$password','$username','$imageurl')";

            if(mysqli_query($conn,$sql)){
                if(move_uploaded_file($_FILES['imagename']['tmp_name'],$imageurl)){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: ../index.php");
                exit();
                }else{echo"file nto uplodes";}
            }else{
                echo "data not inserted";
            }
            unset($_SESSION['exist']);
        }else{
            header("Location: ../Sign up/Sign_up.php");
            $_SESSION['exist'] = true;
exit();
        }
    // }
    }
}
?>
