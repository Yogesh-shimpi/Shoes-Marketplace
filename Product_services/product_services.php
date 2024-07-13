<?php include '../config.php';?>
<?php 
include '../backend/userinfodata.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./product_services.css?v=<?= $version ?>">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../Navbar/navbar.css?v=<?= $version ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="../navabr.css?v=<?=$version?>">
</head>

<body>
    <?php include '../Navbar/navbar.php';?>
  <main>
    <main class="section">
    <div class="heading">
      Services
    </div>
    <div class="services_card">
      <button><span class="material-symbols-outlined">
          history
        </span>
        <span class="card_heading">
          Tracking history
        </span>
        <div class="card_description">

          Tracking history, in the context of web usage, refers to the recording and analysis of a user's online activities. This includes the websites visited, pages viewed, time spent on each site, and interactions such as clicks and form submissions.
        </div>
      </button>
      <button onclick="service_detail('tracking_history')">

        <span class="material-symbols-outlined">
          electric_boltshopping_cart
        </span>
        <span class="card_heading">Fast delivery</span>
        <div class="card_description">fast delivery involves monitoring the real-time status and movement of packages from the point of dispatch to the final delivery destination. It provides updates at various stages such as order processing, shipment, transit, and delivery.</div>
      </button>
      <button><span class="material-symbols-outlined">
          sell
        </span>
        <span class="card_heading">
          Sell Your Product</span>
        <div class="card_description">SwiftTrack Delivery Tracking System offers real-time tracking, detailed logs, instant notifications, and a user-friendly interface to streamline your delivery process. Customers can directly track their orders, enhancing their satisfaction. The system provides performance analytics for better decision-making, ensuring increased efficiency and improved transparency. </div>
      </button>
      <button><span class="material-symbols-outlined">
          security
        </span>
        <span class="card_heading">Security</span>
        <div class="card_description">Ensuring robust security is crucial for any e-commerce website. We employ SSL/TLS encryption to safeguard data integrity, implement strong password protocols, and integrate trusted payment gateways compliant with industry standards like PCI-DSS. Our regular security audits and multi-factor authentication ensure continuous protection. </div>
      </button>
    </div>
    <section class="service_detail">
      <div class="card_detail" id="tracking_history">
        <span class="detail_heading">1. Tracking history</span>
        <div class="paragraph">
          <li><span class="title">USPS Tracking®:</span>
            <div class="detail">USPS provides tracking information for packages through their USPS Tracking® service. You can track your packages anytime, anywhere by entering your tracking number on the USPS website. The tracking history includes various checkpoints where your package was scanned during transit.</div>
          </li>
          <li><span class="title">AfterShip:</span>
            <div class="detail">AfterShip, a package tracking platform, defines tracking history as the scan history of a package. It shows the checkpoints where the package was scanned, providing insights into its journey. Carriers typically allow customers to view tracking history for a few weeks after delivery, and some may charge a small fee to extend access.</div>
          </li>

        </div>
      </div>
      <div class="card_detail">
        <span class="detail_heading">2. Fast delivery </span>
        <div class="paragraph">
          <li><span class="title">Real-time Inventory Management:</span>
            <div class="detail">Ensure that the website's inventory system is always up-to-date. This prevents overselling and helps in accurately predicting delivery times.</div>
          </li>
          <li><span class="title">Optimized Order Processing:</span>
            <div class="detail">Streamline the order processing workflow to minimize the time taken from order confirmation to shipment. This can include automated picking, packing, and labeling processes.
            </div>
          </li>
        </div>
      </div>
      <div class="card_detail">
        <span class="detail_heading">3. Sell Your Product</span>
        <div class="paragraph">
          <li><span class="title">High-Quality Images and Videos:</span>
            <div class="detail">Use high-resolution images and videos to showcase your product from multiple angles. Include zoom-in capabilities and lifestyle images to help customers visualize the product in real life.</div>
          </li>
          <li><span class="title">Competitive Pricing:</span>
            <div class="detail">Research your competitors’ pricing and set competitive prices for your products. Offer discounts, bundles, and promotions to attract price-sensitive customers.
            </div>
          </li>
        </div>
      </div>
      <div class="card_detail">
        <span class="detail_heading">4. Security
        </span>
        <div class="paragraph">
          <li><span class="title">Two-Factor Authentication (2FA):</span>
            <div class="detail">Implement two-factor authentication for both customers and administrative users. This adds an extra layer of security by requiring a second form of verification, such as a code sent to a mobile device.</div>
          </li>
          <li><span class="title">Strong Password Policies: </span>
            <div class="detail">Enforce strong password policies for all users. Encourage the use of complex passwords and consider implementing password expiration and reset policies.</div>
          </li>
        </div>
      </div>
    </section>
    </main>
    
  </main>
  <footer>Copyright &copy; Yogesh Shimpi - All right reserved!</footer>
  <script src="../Navbar/navbar.js?v=<?=$version?>"></script>
  <script src="./product_services.js?v=<?=$version?>"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>