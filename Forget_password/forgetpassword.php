<?php include '../config.php' ?>
<?php 
  session_start();
  if(isset($_SESSION['authentication']) == null){
    $authentication = "";
  }else{
    $authentication  = $_SESSION['authentication'];
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./forgetpassword.css?v=<?=$version?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ga+Maamli&family=Lilita+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
  </head>
  <body>
    <section class="hero">
      <header>Shoes Marketplace</header>

      <form action="../backend/forgetpassword.php" method="post" onsubmit="return uploadform()" class="forgetpass">
        <div class="label">Forget Password</div>

        
        <div  class="form-group">
            <label>Username</label>
            <input type="text" id="username" name="username">
            <span class="error">
                <?php
                if($authentication == "false"){
                  echo "The username is incorrect";
                } else{
                  echo "";
                }
                ?>
            </span>
        </div>
        <div class="form-group">
            <label>New password</label>
            <input type="text" id="password" name="password">
            <span class="error">
                <?php
                if($authentication == "true"){
                  echo "The password is same to the previous password.";
                } else{
                  echo "";
                }
                ?></span>
        </div>      
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="text" id="confirm_password" name="confirm_password">
                    <span class="error"></span>
                </div>      
        <input type="submit" class="submit" value="submit">
      </form>
    </section>
  <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
  <script src="./forgetpassword.js?v=<?=$version?>"></script>
  </body>
</html>
