<?php include '../config.php'; ?>
<?php include '../backend/userinfodata.php'; ?>
<?php
include '../backend/connection.php';
 include '../backend/product_price_detail.php';
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $sql = "select * from cart where username = '$username'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    while ($item_row = mysqli_fetch_assoc($result)) {
      $allproduct[] = $item_row;
    }
    $cart_empty = false;
  } else {
    $cart_empty = true;
  }
  $user_login = true;
} else {
  $user_login = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../Navbar/navbar.css?v=<?= $version ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./cart.css?v=<?= $version ?>" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.23.0/dist/bootstrap-table.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <?php include '../Navbar/navbar.php'; ?>
  <main class="hero">
    <section class="cart-page">
      <div class="heading">
        Item's that add in cart
      </div>
      <div class="cart-product-price">
        <div class="left-side">
          <?php
          if ($user_login) {
            if (!$cart_empty) {
              foreach ($allproduct as $item_row) {

          ?>
                <div class="product-item">
                  <img src="<?php echo $item_row['image_url']; ?>" alt="">
                  <div class="cart_product_info">
                    <span class="product-brand">
                      <?php echo $item_row['product_brand']; ?>
                    </span>

                    <span class="product-name">
                      <?php echo $item_row['product_name']; ?>
                    </span>
                    <div class="product-pricing">
                      <span class="discounted-price">₹<?php echo $item_row['discounted_price']; ?></span>
                      <span class="price">₹<?php echo $item_row['price']; ?></span>
                      <span class="discount">
                        <?php echo $item_row['discount']; ?>%off</span>
                    </div>
                    <form action="../backend/remove-cart_item.php" method="post">
                      <input type="text" name="id" value="<?php echo $item_row['id']; ?>" style="display: none;">
                      <button class="remove" name="submit" type="submit">Remove</button>
                    </form>
                  </div>
                </div><?php }
                  } else {
                      ?> <div class="empty">!Oops, The cart is empty</div><?php
                                                                        }
                                                                      } else { ?>
            <div class="empty">Please login to add item in cart</div><?php } ?>
        </div>
        <div class="right-side">
          <div class="price-detail">price detail</div>
          <div class="product_bill">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Product name</th>
                  <th>Price</th>
                  <th>Discount</th>
                </tr>
              </thead>
              <tbody>
          <?php
          if ($user_login) {
            if (!$cart_empty) {
              foreach ($allproduct as $item_row) {

          ?>
                <tr>
                  <td class="name_column"><?php echo $item_row['product_name']?></td>
                  <td class="price_column">₹<?php echo $item_row['price']?></td>
                  <td class="discount_column">₹<?php echo $item_row['price'] - $item_row['discounted_price']?></td>
                </tr>
                <?php }}}?>

              </tbody>
            </table>
          </div>
          <div class="total_price">
            <div >
              <span class="label">Quantity:</span>
              <span class="amount quantity">(<?php
                if($user_login){
                  if(!$cart_empty){
                    echo $count ;
                  }
                  else{
                    echo "0";
                  }
                }else{
                  echo "0";
                }
               ?> items)</span>
            </div> 
            <div >
              <span class="label">Total amount:</span>
              <span class="amount  price_column">₹<?php
                if($user_login){
                  if(!$cart_empty){
                    echo $sum_of_price ;
                  }
                  else{
                    echo "0";
                  }
                }else{
                  echo "0";
                }
               ?></span>
            </div>
            <div >
              <span class="label">Discount:</span>
              <span class="amount discount_column">- ₹<?php
                if($user_login){
                  if(!$cart_empty){
                    echo $discount ;
                  }
                  else{
                    echo "0";
                  }
                }else{
                  echo "0";
                }
               ?></span>
            </div>
          </div>
          <div class="savings">Yout will save ₹<?php
                if($user_login){
                  if(!$cart_empty){
                    echo $sum_of_discounted_price ;
                  }
                  else{
                    echo "0";
                  }
                }else{
                  echo "0";
                }
               ?> on this order.</div>
        </div>
      </div>
    </section>
  </main>
  <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
  <script src="../Navbar/navbar.js?v=<?= $version ?>" defer></script>
  <script src="./cart.js?v=<?= $version ?>" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>