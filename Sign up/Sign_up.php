<?php include '../config.php'; ?>
<?php 
 session_start();
  $exist =  "";
if( isset($_SESSION['exist']) != null){
  $exist = $_SESSION['exist'];}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign up | Shoes marketplace</title>
    <link rel="stylesheet" href="./Sign_up.css?v=<?=$version?>" />
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
  </head>
  <body>
    <header>
      <h2>Shoes Marketplace</h2>
    </header>
    <section class="sign-up-form">
      <div class="sign_up_label">Sign up</div>
      <form action="../backend/insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return uploadform()"  class="userinfo">
      <div class="input-img" >
          <label for="image">Logo url</label>
          <div class="validation-image">
            <div class="image_select">
            <label for="image" class="img_label">Select image</label>
            <input
            type="file"
            id="image"
            accept="image/*"
            placeholder="image"
            name="imagename" />
            <img src="../assets/user-profile.svg"  id="user_profile">
            </div>
            <span class="error "></span>
          </div>

        </div>
        <div class="input">
          <label for="username">username :</label>
          <div class="validation">
          <input
            type="text"
            id="username"
            placeholder="username"
            name="username" />
            <span class="error">
              <?php
              if($exist == true){
                echo "The username is exist.";
              }
              ?>
            </span>
          </div>
        </div>
        <div class="input">
          <label for="fullname">Full name :</label>
          <div class="validation">
          <input
            type="text"
            id="fullname"
            placeholder="Full name"
            name="fullname" />
            <span class="error"></span>
          </div>
        </div>
        <div class="input">
          <label for="age">Age :</label>
          <div class="validation">
          <input
            type="number"
            id="age"
            placeholder="age" 
            name="age"/>
          <span class="error"></span></div>
        </div>
        <div class="radioinput">
          <label for="male">Gender :</label>
          <div class="validation">
          <div class="radio-sec">
            <div class="radio-btn">
              <input name="gender" id="male" value="male" type="radio">
              <label for="male">Male</label>
            </div>
            <div class="radio-btn">
              <input id="female" name="gender" value="female" type="radio">
              <label id="female">Female</label></div>
            <div class="radio-btn">
              <input name="gender" id="other" value="other" type="radio">
              <label for="other">Other</label></div>
          </div>
        <span class="error"></span></div>
        </div>
          <div class="input">
          <label for="DOB">Date of Birth :</label>
          <div class="validation">
          <input type="date" id="DOB" placeholder="Date of birth" name="DOB" />
        <span class="error"></span></div>
        </div>
        <div class="input">
          <label for="DOP"> Place of birth :</label>
          <div class="validation">
          <input type="text" id="DOP" name="DOP" placeholder="Place of birth" />
        <span class="error"></span></div>
          </div>
        <div class="input">
          <label for="floatingTextarea">Address :</label>
          <div class="validation">
          <div class="textarea-group">
            <textarea
              style="height: 100px"
              maxlength="400"
              rows="4"
              name="address"
              placeholder="Leave a address here"
              id="floatingTextarea"></textarea><div><span id="add_label">0</span>/400</div></div>
            <span class="error"></span></div>
        </div>
        <div class="input">
          <label for="email">Email :</label>
          <div class="validation">
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Email" />
          <span class="error"></span></div>
        </div>
        <div class="input">
          <label for="mobile_no">Mobile no. :</label>
          <div class="validation">
          <input
            type="text"
            name="mobile_no"
            id="mobile_no"
            placeholder="Mobile no." />
          <span class="error"></span></div>
        </div>
        <div class="input">
          <label for="password">Password :</label>
          <div class="validation">
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Password" />
          <span class="error"></span></div>
        </div>
        <div class="input">
          <label for="confirm_password">Confirm password :</label>
          <div class="validation">
          <input
            type="password"
            name="confirm_password"
            id="confirm_password"
            placeholder="confirm password" />
          <span class="error"></span></div>
        </div>

        <div class="btn-sec">
          <input type="reset" class="bg-danger"  name="submit" value="reset">
          <input type="submit" class="bg-success" id="submit" name="submit" value="Submit">
        </div>
      </form>
      </div>
    </section>
    <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
    <script src="./Sign_up.js?v=<?=$version?>"></script>
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
