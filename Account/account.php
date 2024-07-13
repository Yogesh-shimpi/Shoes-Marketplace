<?php include '../config.php' ?>
<?php
include '../backend/connection.php';
include '../backend/userinfodata.php';
$username = $_SESSION['username'];
$password = $_SESSION['password'];
if ($username == null && $password == null) {
    header("Location: ../Sign in/Sign_in.php");
}
$sql = "select * from user where  username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);


$exist =  "";
if (isset($_SESSION['exist']) != null) {
    $exist = $_SESSION['exist'];
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./account_style.css?v=<?= $version ?>" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>

<body>
<section class="profile-menu" id="sidebar">
  <div class="close">
    Menu <button onclick="sidebar(false)" class="material-symbols-outlined">close</button>
  </div>
  <div class="side-profile">
    <img <?php if (!$log_in) {
            echo "src='../assets/user-profile.svg'";
          } else {
            $image_url = $row['imageurl'];
            echo "src='$image_url'";
          } ?> alt="" />
    <div class="name">Hello, <?php if (!$log_in) {
                                echo "guest";
                              } else {
                                echo $row['username'];
                              } ?></div>
  </div>
  <div class="account">
    <li>
      <a <?php if (!$log_in) {
            echo "id='account'";
          } else {
            echo "href= '../Account/account.php'";
          } ?>>
        Account<button class="material-symbols-outlined">
          chevron_right
        </button>
      </a>
    </li>
    <li>
      <a href="../Contact_Us/contact_us.php">
        Contact Us<button class="material-symbols-outlined">
          chevron_right
        </button>
      </a>
    </li>
    <a href=""></a></li>

    <li>
      <a href="../About/about.php">About Us<button class="material-symbols-outlined">
          chevron_right
        </button></a>
    <li>
      <a href="../Product_services/product_services.php">Services<button class="material-symbols-outlined">
          chevron_right
        </button></a>
    </li>
    <?php
    if (!$log_in) {
    ?>
      <li>
        <div class="login">
          <button id="a"> Log In<span id="arrow" class="material-symbols-outlined">
              chevron_right
            </span>
          </button>
          <ul id="option_log_in">
            <li><a href="../Sign up/Sign_up.php">Sign Up</a></li>
            <li><a href="../Sign in/Sign_in.php">Sign In</a></li>
          </ul>
          </div=>
      </li>
    <?php } else { ?>
      <li>
        <a href="../backend/destroy.php" value="Log out">
          <form action="../backend/destrpy.php">
            <button type="submit">Log out</button>
          </form>
        </a>
      </li>
    <?php } ?>
  </div>
</section>
    <header>
        <a href="../Home/index.php">
            <button class="material-symbols-outlined">
                arrow_back
            </button>
        </a>
        <button onclick="sidebar(true)" class="material-symbols-outlined">
            menu
        </button>
    </header>
    <?php
    while ($row = $result->fetch_assoc()) {
    ?>
        <section class="user">
            <section class="profile">
                <div class="profile_div">

                    <img <?php
                            $imageurl = $row['imageurl'];
                            echo "src= '$imageurl'";

                            ?> alt="">
                    <div class="profile_name">
                        <span class="name"><?php echo $row['username']; ?></span>
                        <span class="address"><?php echo $row['address']; ?></span>
                    </div>
                </div>
            </section>
            <section class="personal_info">
                <div class="heading">Personal Info</div>
                <section class="main_data">
                    <section class="leftside">
                        <ul>
                            <li onclick="info_scroll('personal_info')">Personal Info</li>
                            <li onclick="info_scroll('Security')">Security</li>
                            <li onclick="info_scroll('Update')">Edit Info</li>
                            <li onclick="info_scroll('reviews')">Contact reviews</li>
                            <li onclick="info_scroll('sell-product')">Sell Products</li>
                            <li onclick="info_scroll('your_product')">Your Products</li>
                        </ul>
                    </section>
                    <section class="rightside">
                        <section class="info" id="personal_info">
                            <div class="section_heading">Personal Info</div>
                            <div class="detail">
                                <div class="detail_heading">
                                    Basic details
                                </div>
                                <div class="detail_data">
                                    <div class="line">
                                        <label>Profile Picture</label>
                                        <div class="input">
                                            <label for="profile_pic">A profile picture help personalise your account</label>
                                            <form class="update_profile_pic" id="uploadimage" action="../backend/update_profile_photo.php" method="post" enctype="multipart/form-data">
                                                <img id="profile_btn" <?php
                                                                        $imageurl = $row['imageurl'];
                                                                        echo "src='$imageurl'";
                                                                        ?> alt="">
                                                <label for="image" id="update_profile_btn" class="material-symbols-outlined">photo_camera</label>
                                                <input style="display: none;" accept="image/*" type="file" name="newimage" id="image">
                                                <input style="display: none;" type="submit">
                                            </form>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <label>Full Name</label>
                                        <div class="input">

                                            <div class="data"><?php echo $row['full_name']; ?></div>
                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <label>Date Of Birth</label>
                                        <div class="input">
                                            <div class="data"><?php echo $row['dob']; ?></div>
                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <label>Gender</label>
                                        <div class="input">

                                            <div class="data"><?php echo $row['gender']; ?></div>

                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail_heading">
                                    Contact info
                                </div>
                                <div class="detail_data">
                                    <div class="line">
                                        <label>Email Id</label>
                                        <div class="input">

                                            <div class="data"><?php echo $row['email']; ?></div>
                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                    <div class="line">
                                        <label>Mobile no.</label>
                                        <div class="input">
                                            <div class="data"><?php echo $row['mobile']; ?></div>
                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="detail_heading">
                                    Addresses
                                </div>
                                <div class="detail_data">
                                    <div class="line">
                                        <label>Address</label>
                                        <div class="input">

                                            <div class="data"><?php echo $row['address']; ?></div>

                                            <span class="material-symbols-outlined">
                                                chevron_right
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <section class="info" id="Security">
                                <div class="section_heading">Security</div>
                                <div class="detail">
                                    <div class="detail_heading">
                                        Password
                                    </div>
                                    <div class="detail_data">
                                        <div class="line">
                                            <label>Password</label>
                                            <div class="input">
                                                <input id="password" value="<?php echo $row['password']; ?>" readonly type="Password">
                                                <span class="material-symbols-outlined">
                                                    chevron_right
                                                </span>
                                            </div>
                                        </div>
                                        <div class="line">
                                            <label>Forget password</label>
                                            <a href="../Forget_password/forgetpassword.php" class="input">
                                                <div class="data">
                                                    Forget password
                                                </div>
                                                <span class="material-symbols-outlined">
                                                    chevron_right
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </section>
                            <section class="info" id="Update">
                                <div class="section_heading">Edit info</div>
                                <div class="detail">
                                    <div class="detail_heading">
                                        Update detail
                                    </div>
                                    <form action="../backend/userupdate.php" method="post" onsubmit="return uploadform()" class="detail_data">
                                        <div class="validation">
                                            <div class="line"><label for="username">Username</label>
                                                <div class="input">
                                                    <input type="text" id="username" name="username" value="<?php echo $row['username'];
                                                                                                            if ($log_in) ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="error">
                                                <?php if ($exist == true) {
                                                    echo "The username is already taken.";
                                                } else {
                                                    echo "";
                                                } ?>
                                            </span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="fullname">Full name</label>
                                                <div class="input">
                                                    <input type="text" id="fullname" name="fullname" value="<?php echo $row['full_name']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="age">Age</label>
                                                <div class="input">
                                                    <input type="number" name="age" id="age" value="<?php echo $row['age']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>

                                        <div class="validation">
                                            <div class="line">
                                                <label for="<?php $row['gender'] ?>">Gender</label>
                                                <div class="input">
                                                    <div class="radio">
                                                        <div class="gender">
                                                            <input type="radio" id="male" value="male" name="gender" <?php if ($row['gender'] == "male") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                            <span>Male</span>
                                                        </div>
                                                        <div class="gender">
                                                            <input type="radio" id="female" value="female" name="gender" <?php if ($row['gender'] == "female") {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                                            <span>Female</span>
                                                        </div>
                                                        <div class="gender">
                                                            <input type="radio" id="other" value="other" name="gender" <?php if ($row['gender'] == "other") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                            <span>Other</span>
                                                        </div>
                                                    </div>
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div>
                                            <span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="DOB">Date Of Birth</label>
                                                <div class="input">
                                                    <input type="date" id="DOB" name="DOB" value="<?php echo $row['dob']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="POB">Place of Birth</label>
                                                <div class="input">
                                                    <input type="text" id="POB" name="POB" value="<?php echo $row['dop']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="address">Address</label>
                                                <div class="input">
                                                    <textarea id="address" name="address" rows="4" id=""><?php echo $row['address']; ?></textarea>
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="email">Email Id</label>
                                                <div class="input">
                                                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <div class="validation">
                                            <div class="line">
                                                <label for="mobile">Mobile no.</label>
                                                <div class="input">
                                                    <input type="text" id="mobile" name="mobile" value="<?php echo $row['mobile']; ?>">
                                                    <span class="material-symbols-outlined">
                                                        Edit
                                                    </span>
                                                </div>
                                            </div><span class="error"></span>
                                        </div>
                                        <button type="submit" class="bg-success" id="submit">Update</button>
                                    </form>
                                </div>
                            </section>
                            <section class="info" id="reviews">
                                <div class="section_heading">Contact reviews</div>
                                <div class="detail">
                                    <div class="detail_heading">Reviews</div>
                                    <div class="detail_data">
                                        <?php
                                        $contact_sql = "select description from contact_us where username = '$username'";
                                        $contact_result = mysqli_query($conn, $contact_sql);

                                        if (mysqli_num_rows($contact_result) > 0) {
                                            while ($contact_row = mysqli_fetch_assoc($contact_result)) {
                                        ?>
                                                <div class="review_line">
                                                    <div class="user_info">
                                                        <img <?php $imageurl = $row['imageurl'];
                                                                echo "src= '$imageurl'"; ?> alt="">
                                                        <div class="username"><?php echo $row['username']; ?></div>
                                                    </div>
                                                    <div class="user_review"><?php echo $contact_row['description']; ?></div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "Sorry, we couldn't find contact reviews.";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </section>

                            <section class="info" id="sell-product">
                                <div class="section_heading">Sell Product</div>
                                <div class="detail">
                                    <div class="detail_heading">Product_detail</div>
                                    <section class="sell_product_info">
                                        <div class="left-side">
                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="product_name" class="" oninput=" floatlabel('product_label','product_name','product-name');" type="text">
                                                    <label id="product_label" for="product_name">Product name</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>

                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="Brand-name-input" oninput=" floatlabel('Brand_label','Brand-name-input','brand-name');" type="text">
                                                    <label id="Brand_label" for="Brand-name-input">Brand name</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>

                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="Price_name" oninput="floatlabel('Price_label','Price_name','price')" type="number">
                                                    <label id="Price_label" for="Price_name">Price</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="Discount-name" oninput="floatlabel('Discount_label','Discount-name','discounted')" type="number">
                                                    <label id="Discount_label" for="Discount-name">Discount percentage</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                            <div class="line">
                                                <div class="floattext">
                                                    <select id="Shoes-category" oninput="form_value('Shoes-category','category')">
                                                        <option value="Men">Men's</option>
                                                        <option value="Ladies">Ladies</option>
                                                        <option value="Casual shoes">Casual shoes</option>
                                                        <option value="Formal shoes">Formal shoes</option>
                                                        <option value="Athletic shoes">Athletic shoes</option>
                                                    </select>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>

                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="manufactor-date" type="date" class="activeinput" oninput="form_value('manufactor-date','manufactor_date')">
                                                    <label id="Manufactur_date_label" class="activelabel" for="manufactor-date"></label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="Manufactor" oninput="floatlabel('manufactor','Manufactor','manufactor_by')" type="text">
                                                    <label id="manufactor" for="Manufactor">Manufactor by</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="item-weight" oninput="floatlabel('item_weight','item-weight','weight')" type="number">
                                                    <label id="item_weight" for="item-weight">Item weight</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                            <div class="line">
                                                <div class="floattext">
                                                    <input id="country-of-orign" oninput="floatlabel('country_of_orign','country-of-orign','manufactor_country')" type="text">
                                                    <label id="country_of_orign" for="country-of-orign">Country of orign</label>
                                                </div>
                                                <span class="product_error"></span>
                                            </div>
                                        </div>
                                        <form action="../backend/inser_product_data.php" method="post" enctype="multipart/form-data" onsubmit="return uploadform()" class="shoe-card">
                                            <div class="right-side">
                                                <div class="image">
                                                    <img src="../assets/backgraoud_shoes.png" id="product-image">
                                                    <label for="upload_imge" id="change-image" class="material-symbols-outlined">
                                                        add_a_photo
                                                    </label>
                                                    <input type="file" name="image" accept="image/*" id="upload_imge">
                                                </div>
                                                <div class="product_info">
                                                    <input type="text" readonly name="brand-name" id="brand-name">
                                                    <input type="text" readonly id="product-name" name="product-name">
                                                    <div class="product-price">
                                                        <input type="text" readonly id="discounted-price" name="discounted-price">
                                                        <input type="text" readonly id="price" name="price">
                                                        <input type="text" readonly id="discounted" name="discounted">
                                                    </div>
                                                    <div class="product">
                                                        <div class="product-detail">
                                                            <label for="">Category:</label>
                                                            <input type="text" id="category" readonly name="category">
                                                        </div>
                                                        <div class="product-detail">
                                                            <label for="">Manufactor date:</label>
                                                            <input type="text" id="manufactor_date" readonly name="product_detail[]">
                                                        </div>
                                                        <div class="product-detail">
                                                            <label for="">Manufactor by:</label>
                                                            <input type="text" id="manufactor_by" readonly name="product_detail[]">
                                                        </div>
                                                        <div class="product-detail">
                                                            <label for="">Item weight:</label>
                                                            <input type="text" id="weight" readonly name="product_detail[]">
                                                        </div>
                                                        <div class="product-detail">
                                                            <label for="">Manufactor in country:</label>
                                                            <input type="text" id="manufactor_country" readonly name="product_detail[]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="submit" name="submit" value="Submit">
                                        </form>
                                    </section>
                                </div>
                            </section>
                            <section class="info" id="your_product">
                                <div class="section_heading">Your Products</div>
                                <div class="detail">
                                    <div class="detail_heading">Products</div>
                                    <div class="product_data">
                                        <?php
                                        $product_detail_sql = "SELECT * FROM product_detail where username = '$username'";
                                        $product_detail_result = mysqli_query($conn, $product_detail_sql);
                                        if (mysqli_num_rows($product_detail_result) > 0) {

                                            while ($product_detail_row = mysqli_fetch_assoc($product_detail_result)) {

                                                $product_detail = unserialize($product_detail_row['product_detail']);
                                        ?>
                                                <div class="product">
                                                    <img src="<?php echo $product_detail_row['image_url'] ?>" alt="">
                                                    <div class="product_info">
                                                        <div class="product_brand"><?php echo $product_detail_row['brand'] ?></div>
                                                        <div class="product_name"><?php echo $product_detail_row['product_name'] ?></div>
                                                        <div class="pricing">
                                                            <div class="discounted_price">₹<?php echo $product_detail_row['discounted_price'] ?></div>
                                                            <div class="price">₹<?php echo $product_detail_row['price'] ?></div>
                                                            <div class="discount"><?php echo $product_detail_row['discount'] ?>%off</div>
                                                        </div>
                                                        <form action="../backend/delere_product.php" method="post">
                                                            <input type="text" style="display: none;" name="id" value="<?php echo $product_detail_row['id'] ?>">
                                                            <button class="delete bg-danger" type="submit" name="submit">Delete the product</button>
                                                        </form>
                                                    </div>
                                                    <div class="product_detail">
                                                        <div class="manufactor_date">
                                                            <span class="label">Cateogry:</span>
                                                            <span class="data"><?php echo $product_detail_row['shoes_type'] ?></span>
                                                        </div>
                                                        <div class="manufactor_date">
                                                            <span class="label">Manufactor Date:</span>
                                                            <span class="data"><?php echo $product_detail[0]; ?></span>
                                                        </div>
                                                        <div class="manufactor_by">
                                                            <span class="label">Manufactor BY:</span>
                                                            <span class="data"><?php echo $product_detail[1]; ?></span>
                                                        </div>
                                                        <div class="weight">
                                                            <span class="label">Weight:</span>
                                                            <span class="data"><?php echo $product_detail[2]; ?></span>
                                                        </div>
                                                        <div class="manufactor_date">
                                                            <span class="label">Manufactor country:</span>
                                                            <span class="data"><?php echo $product_detail[3]; ?></span>

                                                        </div>
                                                    </div>
                                                </div><?php }
                                                } else {
                                                    echo "No product uploaded";
                                                } ?>

                                    </div>
                                </div>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        <?php
    } ?>
        <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>

        <script src="./account.js?v=<?= $version ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>