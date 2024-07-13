<?php include '../config.php'; ?>
<?php
include '../backend/userinfodata.php';
if(isset($_SESSION['authentication']) == null){
  $authentication = "";
}else{
  $authentication = $_SESSION['authentication'];
}
if(isset($_SESSION['username']) == null && isset($_SESSION['password']) == null){
  $alert = true;
}else{
  $alert = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./contact_Us.css?v=<?= $version ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Navbar/navbar.css?v=<?= $version ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <?php include'../Navbar/navbar.php';?>
  <main>
    <section class="section">
      <div class="label">Contact Us</div>
      <form action="../backend/contact_us_data.php" method="post"  onsubmit="return uploadform()" class="form">
        <div class="input">
          <label>Username</label>
          <input type="text" id="username" name="username">
          <span class="error">
            <?php 
                if($authentication == "username"){
                  echo "username is incorrect";
                }else{
                  echo "";
                }
            ?></span>
        </div>
        <div class="input">
          <label>Mobile no.</label>
          <input type="text" id="mobile" name="mobile">
          <span class="error">
            <?php 
                if($authentication == "mobile"){
                  echo "Mobile no. is incorrect";
                }else{
                  echo "";
                }
            ?>
          </span>
        </div>
        <div class="input">
          <label>Email id</label>
          <input type="email" id="email" name="email">
          <span class="error">
            <?php 
                if($authentication == "email"){
                  echo "Email Id is incorrect";
                }else{
                  echo "";
                }
            ?></span>
        </div>
        <div class="input">
          <label>Description</label>
          <textarea id="description" name="description" rows="4"></textarea>
          <span class="error"></span>
        </div>
  <button  <?php
      if($alert){
        echo "id = 'alert' type = 'button'";
      }else{
        echo "type='submit'";
      }
  ?>  class="submit bg-success">Submit</button>
      </form>
    </section>
  </main>
  <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
  <script src="../Navbar/navbar.js?v=<?= $version ?>"></script>
  <script src="./contact_us.js?v=<?= $version ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>