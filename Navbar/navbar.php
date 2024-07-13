<section class="profile-menu" id="sidebar">
  <div class="close">
    Menu <button onclick="sidebar(false)" class="material-symbols-outlined">close</button>
  </div>
  <div class="profile">
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
  <section class="profile-sea-product">
    <div class="user-detail">
      <img id="profile" <?php if (!$log_in) {
                          echo "src='../assets/user-profile.svg'";
                        } else {
                          $image_url = $row['imageurl'];
                          echo "src='$image_url'";
                        } ?>height="30" id="profile" alt="" />
      <label for="profile"><?php if (!$log_in) {
                              echo "guest";
                            } else {
                              echo $row['username'];
                            } ?></label>
    </div>
    <div class="search-product" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
      <button type="submit" class="material-symbols-outlined">
        search
      </button>
    </div>
    <button onclick="sidebar(true)" class="material-symbols-outlined">menu</button>
  </section>
</header>
<nav>
  <div class="logo">
    <span class="shoes">Shoes</span>
    <span class="marketplace">Marketplace</span>
  </div>
  <ul class="nav-main">
    <li class="nav-item">
      <a class="button nav-item" href="../Home/index.php">
        <div class="nav-text">
          <span class="material-symbols-outlined">Home</span>
          Home
        </div>
        <span class="transition " id="index"></span>
      </a>
    </li>
    <li class="button dropdown nav-item">
      <button class="nav-text dropdown-toggle" id="nav_text" data-bs-toggle="dropdown">
        <span class="material-symbols-outlined">category</span> Category
      </button>
      <span class="transition"></span>
      <ul class="dropdown-menu">
        <li onclick="scroll_effect_category('All')">All</li>
        <li onclick="scroll_effect_category('Men')">Men</li>
        <li onclick="scroll_effect_category('Ladies')">Ladies</li>
        <li onclick="scroll_effect_category('Casual_shoes')">
          Casual shoes
        </li>
        <li onclick="scroll_effect_category('Formal_shoes')">
          Formal shoes
        </li>
        <li onclick="scroll_effect_category('Athletic_shoes')">
          Athletic shoes
        </li>
      </ul>
    </li>
    <li class="button nav-item">
      <a href="../Cart/cart.php" class="butto nav-item">

        <div class="nav-text">
          <span class="material-symbols-outlined">shopping_cart</span>
          Cart>
        </div>
        <span class="transition" id="cart"></span>
      </a>
    </li>
    <li class="button nav-item">
      <a href="../Contact_Us/contact_us.php" class="button nav-item">

        <div class="nav-text">
          <span class="material-symbols-outlined">support_agent</span>
          Contact Us
        </div>
        <span class="transition" id="contact_us"></span>
      </a>
    </li>
    <li class="button nav-item">
      <a href="../Product_services/product_services.php" class="button nav-item">

        <div class="nav-text">
          <span class="material-symbols-outlined">steps</span>
          Services
        </div>
        <span class="transition" id="product_service"></span>
      </a>
    </li>
  </ul>
</nav>