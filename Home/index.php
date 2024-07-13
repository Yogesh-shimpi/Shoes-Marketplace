<?php include '../config.php'; ?>
<?php include '../backend/userinfodata.php'; ?>
<?php
include '../backend/connection.php';
$product_sql = "select * from product_detail";
$product_result = mysqli_query($conn, $product_sql);
if (isset($_SESSION['username'])) {
  $cart = false;
} else {
  $cart = true;
}
if (mysqli_num_rows($product_result) > 0) {
  while ($product_row = mysqli_fetch_assoc($product_result)) {
    $all_product[] = $product_row;
  }
}
?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shoes Marketplace</title>
  <link rel="stylesheet" href="../Navbar/navbar.css?v=<?= $version ?>" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./style.css?v=<?= $version ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
  <button id="home_top" class="material-symbols-outlined">
    arrow_upward
  </button>
  <?php include '../Navbar/navbar.php'; ?>
  <section class="area">
    <section class="banner">
      <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../assets/banner1.jpg" class="d-block" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="../assets/banner2.webp" class="d-block" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="./assets/banner3.jpg" class="d-block" alt="..." />
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>
    <section class="product">
      <section class="shoes-category" id="All">
        <div class="category-title">
          All <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            $product_detail = unserialize($product_row['product_detail']);
          ?>
            <div class="shoes-card">
              <div class="right-side">
                <div class="image">
                  <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                </div>
                <div class="product_info">
                  <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                  <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                  <div class="product-price">
                    <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                    <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                    <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                  </div>
                  <div class="product">
                    <div class="product-detail">
                      <label for="">Category:</label>
                      <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                    </div>
                    <div class="product-detail">
                      <label for="">Manufactor date:</label>
                      <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                    </div>
                    <div class="product-detail">
                      <label for="">Manufactor by:</label>
                      <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                    </div>
                    <div class="product-detail">
                      <label for="">Item weight:</label>
                      <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                    </div>
                    <div class="product-detail">
                      <label for="">Manufactor in country:</label>
                      <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                    </div>
                  </div>
                </div>
              </div>
              <form action="../backend/add_to_cart.php" method="post" class="buy">
                <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                <button class="add-to-cart" <?php if ($cart) {
                                              echo "type='button'";
                                            } else {
                                              echo "type ='submit'";
                                            } ?>>Add Cart</button>
              </form>
            </div><?php } ?>
        </div>
      </section>
      <section class="shoes-category" id="Men">
        <div class="category-title">
          Men <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            if ($product_row['shoes_type'] != "Ladies") {
              $product_detail = unserialize($product_row['product_detail']);
          ?>
              <div class="shoes-card">
                <div class="right-side">
                  <div class="image">
                    <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                  </div>
                  <div class="product_info">
                    <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                    <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                    <div class="product-price">
                      <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                      <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                      <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                    </div>
                    <div class="product">
                      <div class="product-detail">
                        <label for="">Category:</label>
                        <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor date:</label>
                        <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor by:</label>
                        <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Item weight:</label>
                        <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor in country:</label>
                        <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../backend/add_to_cart.php" method="post" class="buy">
                  <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                  <button class="add-to-cart" type="submit">Add Cart</button>
                </form>
              </div><?php }
                } ?>
        </div>
      </section>
      <section class="shoes-category" id="Ladies">
        <div class="category-title">
          ladies <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            if ($product_row['shoes_type'] == "Ladies") {
              $product_detail = unserialize($product_row['product_detail']);
          ?>
              <div class="shoes-card">
                <div class="right-side">
                  <div class="image">
                    <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                  </div>
                  <div class="product_info">
                    <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                    <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                    <div class="product-price">
                      <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                      <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                      <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                    </div>
                    <div class="product">
                      <div class="product-detail">
                        <label for="">Category:</label>
                        <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor date:</label>
                        <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor by:</label>
                        <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Item weight:</label>
                        <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor in country:</label>
                        <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../backend/add_to_cart.php" method="post" class="buy">
                  <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                  <button class="add-to-cart" type="submit">Add Cart</button>
                </form>
              </div><?php }
                } ?>
        </div>
      </section>
      <section class="shoes-category" id="Casual_shoes">
        <div class="category-title">
          Casual shoes
          <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            if ($product_row['shoes_type'] == "Casual shoes") {
              $product_detail = unserialize($product_row['product_detail']);
          ?>
              <div class="shoes-card">
                <div class="right-side">
                  <div class="image">
                    <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                  </div>
                  <div class="product_info">
                    <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                    <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                    <div class="product-price">
                      <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                      <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                      <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                    </div>
                    <div class="product">
                      <div class="product-detail">
                        <label for="">Category:</label>
                        <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor date:</label>
                        <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor by:</label>
                        <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Item weight:</label>
                        <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor in country:</label>
                        <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../backend/add_to_cart.php" method="post" class="buy">
                  <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                  <button class="add-to-cart" type="submit">Add Cart</button>
                </form>
              </div><?php }
                } ?>
        </div>
      </section>
      <section class="shoes-category" id="Formal_shoes">
        <div class="category-title">
          Formal shoes
          <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            if ($product_row['shoes_type'] == "Formal shoes") {
              $product_detail = unserialize($product_row['product_detail']);
          ?>
              <div class="shoes-card">
                <div class="right-side">
                  <div class="image">
                    <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                  </div>
                  <div class="product_info">
                    <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                    <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                    <div class="product-price">
                      <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                      <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                      <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                    </div>
                    <div class="product">
                      <div class="product-detail">
                        <label for="">Category:</label>
                        <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor date:</label>
                        <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor by:</label>
                        <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Item weight:</label>
                        <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor in country:</label>
                        <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../backend/add_to_cart.php" method="post" class="buy">
                  <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                  <button class="add-to-cart" type="submit">Add Cart</button>
                </form>
              </div><?php }
                } ?>
        </div>
        </div>
      </section>
      <section class="shoes-category" id="Athletic_shoes">
        <div class="category-title">
          Athletic shoes
          <span class="material-symbols-outlined"> chevron_right </span>
        </div>
        <div class="product-detail">
          <?php
          foreach ($all_product as $product_row) {

            if ($product_row['shoes_type'] == "Athletic shoes") {
              $product_detail = unserialize($product_row['product_detail']);
          ?>
              <div class="shoes-card">
                <div class="right-side">
                  <div class="image">
                    <img src="<?php echo $product_row['image_url']; ?>" id="product-image">
                  </div>
                  <div class="product_info">
                    <span name="brand-name" id="brand-name"><?php echo $product_row['brand']; ?></span>
                    <span id="product-name" name="product-name"><?php echo $product_row['product_name']; ?></span>
                    <div class="product-price">
                      <span id="discounted-price" name="discounted-price">₹<?php echo $product_row['discounted_price']; ?></span>
                      <span id="price" name="price">₹<?php echo $product_row['price'] ?></span>
                      <span id="discounted" name="discounted"><?php echo $product_row['discount']; ?>% off</span>
                    </div>
                    <div class="product">
                      <div class="product-detail">
                        <label for="">Category:</label>
                        <span id="category" name="category"><?php echo $product_row['shoes_type']; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor date:</label>
                        <span id="manufactor_date" name="product_detail[]"><?php echo $product_detail[0]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor by:</label>
                        <span id="manufactor_by" name="product_detail[]"><?php echo $product_detail[1]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Item weight:</label>
                        <span id="weight" name="product_detail[]"><?php echo $product_detail[2]; ?></span>
                      </div>
                      <div class="product-detail">
                        <label for="">Manufactor in country:</label>
                        <span id="manufactor_country" name="product_detail[]"><?php echo $product_detail[3]; ?></span>
                      </div>
                    </div>
                  </div>
                </div>
                <form action="../backend/add_to_cart.php" method="post" class="buy">
                  <input type="text" name="id" style="display: none;" value="<?php echo $product_row['id']; ?>">
                  <button class="add-to-cart" type="submit">Add Cart</button>
                </form>
              </div><?php }
                } ?>
        </div>
      </section>
    </section>
  </section>

  <script src="../Navbar/navbar.js?v=<?= $version ?>" defer></script>

  <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>

  <script src="./script.js?v=<?= $version ?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>