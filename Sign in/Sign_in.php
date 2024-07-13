<?php include '../config.php'?>
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Sign_in.css?v=<?=$version?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous" />
    <title>Sign In | Shoes Marketplace</title>
</head>
<body>
    <header>Shoes Marketplace</header>
    <section class="hero">
        <div class="Sign_in">Sign In</div>
        <form action="../backend/Sign_in_code.php" method="post" onsubmit="return uploadform()" class="input">
          <div class="input">
              <label >Username</label>
              <div class="input-group">
                <div class="input-group-text">
                  <span class="material-symbols-outlined">
                    person
                    </span></div>
                <input class="form-control" id="username" name="username" type="text">
              </div>
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
        <div class="input">

            <label >Password</label>
            <div class="input-group">
              <div class="input-group-text">
                <span class="material-symbols-outlined">
                  password
                  </span></div>
              <input  class="form-control" name="password" id="password" type="password">
              <div class="input-group-text">
                <span onclick="password_visible()" id="eye" class="material-symbols-outlined">
                  visibility_off
                  </span></div>
            </div>
            <span class="error">
                <?php
                if($authentication == "true"){
                  echo "The password is incorrect";
                } else{
                  echo "";
                }
                ?>
                </span>
            </div>
            <div class="forget">
              <div class="remember">
                <input type="checkbox" name="" id="">
                <label>Remember me</label>
              </div>
              <a class="button" href="../Forget_password/forgetpassword." >Forget password?</a>
            </div>
            <input type="submit" class="submit bg-success" value="Sign In">
        </form>
        <div class="sign_up">
          Do not have an account. <a href="../Sign up/Sign_up.php">Sign up</a>
        </div>
    </section>
    <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
    <script src="./Sign_in.js?v=<?=$version?>"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>
</html>