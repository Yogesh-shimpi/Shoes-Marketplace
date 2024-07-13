<?php 
session_start();
    include 'connection.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $description = $_POST['description'];

       if(isset($_SESSION['username']) != null && isset($_SESSION['password']) != null){ 
        $user = $_SESSION['username'];
        $pass = $_SESSION['password'];
        $sql = "select username, mobile, email from user where username = '$user' and password = '$pass'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row['username'] == $username){
            if($row['mobile'] == $mobile){
                if($row['email'] == $email){
                    $stmt = $conn->prepare("INSERT INTO contact_us (Username, mobile_no, email_id, description) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $username, $mobile, $email, $description);

                        if($stmt->execute()){
                            unset($_SESSION['authentication']);
                            header("Location: ../Contact_Us/contact_us.php");
                            exit();
                        }
                    echo "invalid";
                }else{
                    $_SESSION['authentication'] = "email";
                    header("Location: ../Contact_Us/contact_us.php");
                }
            }else{
                $_SESSION['authentication'] = "mobile";
                header("Location: ../Contact_Us/contact_us.php");
            }
        }else{
            $_SESSION['authentication'] = "username";
            header("Location: ../Contact_Us/contact_us.php");
        }}else{
            header("Location: ../Contact_Us/contact_us.php");
        }
    }
?>